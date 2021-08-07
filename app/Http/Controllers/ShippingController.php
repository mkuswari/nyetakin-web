<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Order;
use App\Models\Province;
use App\Models\Shipping;
use Illuminate\Http\Request;

class ShippingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shippings = Shipping::all();

        return view('backoffice.shippings.index', compact('shippings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backoffice.shippings.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            "receipt_number" => "required"
        ]);

        Shipping::create([
            "order_id" => $request->order_id,
            "receipt_number" => $request->receipt_number,
        ]);

        session()->flash('success', 'Pesanan Berhasil Dikirimkan');


        return redirect()->route("shippings.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $shipping = Shipping::find($id);
        $order = Order::where("id", $shipping->order_id)->first();
        $getCity = City::where("city_id", $order->city_destination)->first();
        $city = $getCity->name;
        $getProvince = Province::where("province_id", $order->province_destination)->first();
        $province = $getProvince->name;

        return view('backoffice.shippings.show', compact('shipping', 'order', 'city', 'province'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $shipping = Shipping::find($id);

        $shipping->delete();

        session()->flash('success', 'Data Pengiriman berhasil dihapus');

        return redirect()->route("shippings.index");
    }
}
