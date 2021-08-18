<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin,designer');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payments = Payment::all();

        return view("backoffice.payments.index", compact('payments'));
    }
}
