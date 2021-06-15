<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('frontoffice.home');
    }

    public function myOrder()
    {
        $orders = Order::where("user_id", Auth::user()->id)->get();

        return view('frontoffice.orders.index', compact('orders'));
    }

    public function detailOrder($id)
    {
        $detail = Order::find($id)->where("user_id", Auth::user()->id)->first();
        $items = OrderDetail::with('product')->where("order_id", $id)->get();
        $getCity = City::where("city_id", $detail->city_destination)->first();
        $city = $getCity->name;
        $getProvince = Province::where("province_id", $detail->province_destination)->first();
        $province = $getProvince->name;

        return view('frontoffice.orders.detail', compact('detail', "items", "city", "province"));
    }
}
