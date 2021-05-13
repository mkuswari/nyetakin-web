<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return view('backoffice.dashboard');
    }
}
