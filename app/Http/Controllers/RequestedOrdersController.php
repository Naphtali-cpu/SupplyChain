<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RequestedOrdersController extends Controller {
    public function index(Products $requestedorders) {

        /*
         *   Select unique value from DB i.e from column name to fetch each purchase instead of multiple purchases that have multiple quantities
         */

        $requestedorders = Products::select('name',  DB::raw("count(name) as quantity"), 'description', 'price')
            ->groupBy('name', 'description', 'price')
            ->get();

        return view('orders.requested-orders-list', compact('requestedorders'));
    }
}
