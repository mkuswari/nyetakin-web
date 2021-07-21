<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\City;
use App\Models\Courier;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Payment;
use App\Models\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Kavist\RajaOngkir\Facades\RajaOngkir;

class CheckoutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function checkoutPage()
    {
        $items = Cart::with("product")->where("user_id", Auth::user()->id)->get();
        $couriers = Courier::pluck('name', 'code');
        $provinces = Province::pluck('name', 'province_id');

        return view("frontoffice.checkout.index", compact("items", "couriers", "provinces"));
    }

    public function getCities($id)
    {
        $city = City::where("province_id", $id)->pluck('name', 'city_id');

        return json_encode($city);
    }

    public function getCost(Request $request)
    {
        $cost = RajaOngkir::ongkosKirim([
            "origin" => 23, // Berisi ID Kota, contohnya disini sayaa menggunakan kota bandung dengan ID 23
            "destination" => $request->city_destination,
            "weight" => $request->weight,
            "courier" => $request->courier,
        ])->get();

        return json_encode($cost);
    }

    public function checkoutAction(Request $request)
    {
        $this->validate($request, [
            "name" => "required",
            "phone" => "required",
            "email" => "required",
            "province_destination" => "required",
            "city_destination" => "required",
            "address" => "required",
            "zip_code" => "required",
            "courier" => "required",
            "services" => "required",
            "total_billing" => "required",
        ]);

        $order = Order::create([
            "user_id" => Auth::user()->id,
            "invoice_number" => '#INV' . uniqid(),
            "name" => $request->name,
            "phone" => $request->phone,
            "email" => $request->email,
            "province_destination" => $request->province_destination,
            "city_destination" => $request->city_destination,
            "address" => $request->address,
            "zip_code" => $request->zip_code,
            "courier" => $request->courier,
            "services" => $request->services,
            "total_billing" => $request->total_billing,
            "status" => 0
        ]);

        $carts = Cart::where("user_id", Auth::user()->id)->get();

        foreach ($carts as $cart) {
            OrderDetail::create([
                "order_id" => $order->id,
                "product_id" => $cart->product_id,
                "quantity" => $cart->quantity,
            ]);

            $cart->delete();
        }

        return redirect()->route("checkout.overview", $order->id);
    }

    public function checkoutOverview($id)
    {
        $detail = Order::find($id);
        $getCity = City::where("city_id", $detail->city_destination)->first();
        $city = $getCity->name;
        $getProvince = Province::where("province_id", $detail->province_destination)->first();
        $province = $getProvince->name;

        $items = OrderDetail::with('product')->where("order_id", $id)->get();

        return view("frontoffice.checkout.overview", compact('detail', "city", "province", "items"));
    }

    public function checkoutConfirmation(Request $request)
    {
        $this->validate($request, [
            "name" => "required|max:64",
            "total_amount" => "required",
            "payment_slip" => "required|image|mimes:jpeg,png,jpg,gif|max:2048",
        ]);

        $uniqueName = uniqid();
        $imgName = $uniqueName . '.' . $request->payment_slip->extension();
        $request->payment_slip->move(public_path('uploads/payments/'), $imgName);

        Payment::create([
            "order_id" => $request->order_id,
            "name" => $request->name,
            "total_amount" => $request->total_amount,
            "payment_slip" => $imgName,
        ]);

        return redirect()->route('checkout.success');

    }

    public function checkoutSuccess()
    {
        return view('frontoffice.checkout.success');
    }
}
