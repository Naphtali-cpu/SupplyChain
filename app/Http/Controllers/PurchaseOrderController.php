<?php

namespace App\Http\Controllers;

use App\Http\Requests\PurchaseOrderRequest;
use App\Models\PurchaseOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PurchaseOrderController extends Controller
{
    public function index(PurchaseOrder $purchases) {

      /*
       * Select unique value from DB i.e from column name to fetch each purchase instead of multiple purchases that have multiple quantities
       */

        $purchases = PurchaseOrder::select('name',  DB::raw("count(name) as quantity"), 'description', 'supplier')
            ->groupBy('name', 'description', 'supplier')
            ->get();

        return view('purchases.purchase-list', compact('purchases'));
    }

    public function addPurchase()
    {
        return view('purchases.add-purchase');
    }

    public function store(PurchaseOrderRequest $request, PurchaseOrder $purchases)
    {
        /*

        Loop through selected quantity from frontend and add multiple products in DB

        */
        for($i = 0; $i < (int)$request->quantity; $i++){
            PurchaseOrder::create([
                'name' => $request->name,
                'description' => $request->description,
                'quantity' => $request->quantity,
                'supplier' => $request->supplier
            ]);
        }

        return redirect() ->back()->with('status', 'Added Purchase Successfully!');
    }

    public function edit(PurchaseOrder $purchase) {
//        dd($purchase);
        return view('purchases.edit-purchase', compact('purchase'));
    }

    public function editProduct($purchases){
        return view('purchases.edit-purchase', compact('purchases'));
    }

    public function destroy(PurchaseOrder $purchases)
    {
        $purchases->delete();

        return redirect() ->back()->with('status', 'Deleted Purchase Successfully!');
    }

    public function update(PurchaseOrderRequest $request, PurchaseOrder $purchases)
    {
        $purchases->update($request->all());

        return redirect() ->back()->with('status', 'Updated Purchase Successfully!');
    }
}
