<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Inertia\Inertia;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $suppliers = Supplier::all();

        return Inertia::render(
            'Supplier/Index',
            [
                'suppliers' => $suppliers
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render(
            'Supplier/Create'
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        Supplier::create([
            'name' => $request->name,
        ]);

        sleep(1);

        return redirect()->route('suppliers.index')->with('message', 'suppliers Creado');
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
        $supplier = Supplier::find($id);

        return Inertia::render(
            'Supplier/Edit',
            [
                'supplier' =>  $supplier
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $product = Supplier::find($id);

        $product->name = $request->name;
        $product->save();

        sleep(1);

        return redirect()->route('suppliers.index')->with('message', 'suppliers Editado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Supplier::find($id);
        $product->delete();

        sleep(1);

        return redirect()->route('suppliers.index')->with('message', 'suppliers Eliminado');
    }
}
