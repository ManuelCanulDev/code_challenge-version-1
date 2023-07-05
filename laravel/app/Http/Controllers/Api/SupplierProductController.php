<?php

namespace App\Http\Controllers\Api;

use App\Models\SupplierProduct;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SupplierProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return SupplierProduct::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'supplier_id' => 'required',
            'product_id' => 'required',
        ]);

        return SupplierProduct::created($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(SupplierProduct $supplierProduct)
    {
        return $supplierProduct;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SupplierProduct $supplierProduct)
    {
        $request->validate([
            'supplier_id' => 'required',
            'product_id' => 'required',
        ]);

        $supplierProduct->update($request->all());

        return $supplierProduct;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SupplierProduct $supplierProduct)
    {
        $supplierProduct->delete();

        return response()->json(['mensaje' => 'Eliminado :)']);
    }
}
