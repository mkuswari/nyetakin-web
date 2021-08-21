<?php

namespace App\Http\Controllers;

use App\Models\Income;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;

class IncomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function allIncome()
    {
        $incomes = Income::all();

        return view("backoffice.incomes.index", compact('incomes'));
    }
}
