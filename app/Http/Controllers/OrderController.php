<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Province;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::all();

        return view('backoffice.orders.index', compact('orders'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $detail = Order::find($id);
        $getCity = City::where("city_id", $detail->city_destination)->first();
        $city = $getCity->name;
        $getProvince = Province::where("province_id", $detail->province_destination)->first();
        $province = $getProvince->name;
        $items = OrderDetail::with('product')->where("order_id", $id)->get();

        return view('backoffice.orders.show', compact('detail', "city", "province", "items"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = Order::find($id);

        return view("backoffice.orders.edit", compact("order"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $order = Order::find($id);

        $order->update([
            "status" => $request->status
        ]);

        session()->flash('success', 'Status Pesanan berhasil diupdates');

        return redirect()->route("orders.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = Order::find($id);

        $order->delete();

        session()->flash('success', 'Data Order telah dihapus');

        return redirect()->route("orders.index");
    }
}
