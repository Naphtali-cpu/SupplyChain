<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Merchants;
use App\Models\Products;
use App\Models\Supplier;
use Illuminate\Http\Request;

class MerchantBuyerController extends Controller {

    public function index() {
        return view('orders.make-order');
    }

    public function merchdashboard() {
        return view('merchant-dash');
    }

    public function registeredredirect() {
        $suppliers = Supplier::paginate(20);

        return view('registered-suppliers', compact('suppliers'));
    }

//    Function to make order to the wholesaler/ Jane

    public function store(ProductRequest $request, Products $order) {
        /*

        Loop through selected quantity from frontend and add multiple products in DB

        */
        for($i = 0; $i < (int)$request->quantity; $i++){
            Products::create([
                'name' => $request->name,
                'description' => $request->description,
                'quantity' => $request->quantity,
                'price' => $request->price
            ]);
        }

        return redirect() ->back()->with('status', 'Order Made Successfully!');
    }

}
