<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\City;
use App\Models\Courier;
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

    public function checkoutAction()
    {
        //
    }
}
