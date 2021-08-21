<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Portfolio;
use App\Models\Product;
use App\Models\Review;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        $categories = Category::paginate(4);
        $products = Product::where("status", "active")->paginate(8);
        $designers = User::where("role", "designer")->paginate(4);
        return view('welcome', compact('categories', 'products', 'designers'));
    }

    public function category()
    {
        $categories = Category::all();
        return view('pages.category', compact("categories"));
    }

    public function categoryDetail($slug)
    {
        $category = Category::where("slug", $slug)->first();
        $products = Product::where([
            ["category_id", $category->id],
            ["status", "active"]
        ])->paginate(10);

        return view('pages.single.category', compact("category", "products"));
    }

    public function product(Request $request)
    {
        $products = Product::paginate(10);
        $categories = Category::all();

        $filterKeyword = $request->get("keyword");
        if ($filterKeyword) {
            $products = Product::where([
                ["name", "LIKE", "%$filterKeyword%"],
                ["status", "active"]
            ])->paginate(10);
        }

        return view('pages.product', compact("products", "categories"));
    }

    public function productDetail($slug)
    {
        $product = Product::where("slug", $slug)->first();
        $products = Product::all();
        $reviews = Review::all();

        $setting = Setting::latest()->first();

        return view("pages.single.product", compact("product", "products", "reviews", "setting"));
    }

    public function portfolio()
    {
        $portfolios = Portfolio::all();

        return view('pages.portfolio', compact("portfolios"));
    }

    public function cetakPasFoto()
    {
        $setting = Setting::first();

        return view("pages.pasfoto", compact("setting"));
    }


    public function portfolioDetail($slug)
    {
        $portfolio = Portfolio::where("slug", $slug)->first();

        return view("pages.single.portfolio", compact("portfolio"));
    }

    public function designer()
    {
        $designers = User::where("role", "designer")->paginate(6);

        return view('pages.designer', compact("designers"));
    }

    public function contact()
    {
        return view('pages.contact');
    }
}
