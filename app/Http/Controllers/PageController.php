<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function category()
    {
        return view('pages.category');
    }

    public function product()
    {
        return view('pages.product');
    }

    public function portfolio()
    {
        return view('pages.portfolio');
    }

    public function designer()
    {
        return view('pages.designer');
    }

    public function about()
    {
        return view('pages.about');
    }
}
