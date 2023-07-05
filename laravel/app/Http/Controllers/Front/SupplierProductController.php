<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\SupplierProduct;
use Illuminate\Http\Request;
use Inertia\Inertia;

class SupplierProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $supplierProduct = SupplierProduct::with('supplier')->with('producto')->get();

        return Inertia::render(
            'SupplierProduct/Index',
            [
                'supplierProducts' => $supplierProduct
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render(
            'SupplierProduct/Create',[
                'suppliers' => Supplier::all(),
                'products' => Product::all()
            ]
        );
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

        SupplierProduct::create([
            'supplier_id' => $request->supplier_id,
            'product_id' => $request->product_id,
        ]);

        sleep(1);

        return redirect()->route('supplierProducts.index')->with('message', 'supplierProducts Creado');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $supplierProduct = SupplierProduct::find($id);

        return Inertia::render(
            'SupplierProduct/Edit',
            [
                'supplierProduct' =>  $supplierProduct,
                'suppliers' => Supplier::all(),
                'products' => Product::all()
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'supplier_id' => 'required',
            'product_id' => 'required',
        ]);

        $product = SupplierProduct::find($id);

        $product->supplier_id = $request->supplier_id;
        $product->product_id =  $request->product_id;
        $product->save();

        sleep(1);

        return redirect()->route('supplierProducts.index')->with('message', 'supplierProducts Editado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = SupplierProduct::find($id);
        $product->delete();

        sleep(1);

        return redirect()->route('supplierProducts.index')->with('message', 'supplierProducts Eliminado');
    }
}
