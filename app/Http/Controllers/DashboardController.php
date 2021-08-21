<?php

namespace App\Http\Controllers;

use App\Models\Income;
use App\Models\Order;
use App\Models\Product;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware([
            'auth',
            'role:admin,designer'
        ]);
    }

    public function index()
    {
        $total_users = User::all()->count();
        $total_products = Product::all()->count();
        $total_orders = Order::all()->count();
        $total_reviews = Review::all()->count();

        $orders = Order::latest()->paginate(10);

        $laba_bersih = Income::sum("income");


        return view('backoffice.dashboard', compact('total_users', 'total_products', 'total_orders', 'total_reviews', 'orders', 'laba_bersih'));
    }
}
