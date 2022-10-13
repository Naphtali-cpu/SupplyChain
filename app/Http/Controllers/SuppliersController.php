<?php

namespace App\Http\Controllers;

use App\Http\Requests\SupplierRequest;
use App\Models\Supplier;
use Illuminate\Http\Request;

class SuppliersController extends Controller {

    public function index(Supplier $model) {
        $suppliers = Supplier::paginate(20);

        return view('suppliers.supplier-list', compact('suppliers'));
    }

    public function addSupplier()
    {
        return view('suppliers.add-supplier');
    }

    public function store(SupplierRequest $request, Supplier $supplier)
    {
        $supplier->create($request->all());

        return redirect() ->back()->with('status', 'Added Supplier Successfully!');
    }

    public function edit(Supplier $supplier)
    {
        return view('suppliers.edit-supplier', compact('supplier'));
    }

    public function destroy(Supplier $supplier)
    {
        $supplier->delete();

        return redirect() ->back()->with('status', 'Deleted Supplier Successfully!');
    }

    public function update(SupplierRequest $request, Supplier $supplier)
    {
        $supplier->update($request->all());

        return redirect() ->back()->with('status', 'Updated Supplier Successfully!');
    }
}
