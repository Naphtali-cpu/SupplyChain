<?php

namespace App\Http\Controllers;

use App\Http\Requests\MerchantRequest;
use App\Models\Merchants;
use Illuminate\Http\Request;

class MerchantController extends Controller
{
    public function index(Merchants $model) {
        $merchants = Merchants::paginate(20);

        return view('merchants.merchant-list', compact('merchants'));
    }

    public function addMerchant()
    {
        return view('merchants.add-merchant');
    }

    public function store(MerchantRequest $request, Merchants $merchants)
    {
        $merchants->create($request->all());

        return redirect() ->back()->with('status', 'Added Merchant Successfully!');
    }

    public function edit(Merchants $merchant)
    {
        return view('merchants.edit-merchant', compact('merchant'));
    }

    public function destroy(Merchants $merchant)
    {
        $merchant->delete();

        return redirect() ->back()->with('status', 'Deleted Merchant Successfully!');
    }

    public function update(MerchantRequest $request, Merchants $merchant)
    {
        $merchant->update($request->all());

        return redirect() ->back()->with('status', 'Updated Merchant Successfully!');
    }
}
