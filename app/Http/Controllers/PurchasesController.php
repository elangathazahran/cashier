<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PurchasesController extends Controller
{
    public function index () {
        return view('pages.dashboard.purchases.index');
    }
}
