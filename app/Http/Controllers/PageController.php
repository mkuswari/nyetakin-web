<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        $categories = Category::paginate(4);
        $products = Product::where("status", "active")->paginate(8);
        return view('welcome', compact('categories', 'products'));
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
        return view("pages.single.product", compact("product", "products"));
    }

    public function portfolio()
    {
        return view('pages.portfolio');
    }

    public function designer()
    {
        return view('pages.designer');
    }

    public function contact()
    {
        return view('pages.contact');
    }
}
