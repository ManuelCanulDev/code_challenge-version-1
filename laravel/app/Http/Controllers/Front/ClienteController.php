<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clientes = Client::all();

        return Inertia::render(
            'Clientes/Index',
            [
                'clientes' => $clientes
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render(
            'Clientes/Create'
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'lastname' => 'required',
            'email' => 'required'
        ]);

        Client::create([
            'name' => $request->name,
            'lastname' => $request->lastname,
            'email' => $request->email
        ]);

        sleep(1);

        return redirect()->route('clientes.index')->with('message', 'Cliente Creado');
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
        $cliente = Client::find($id);

        return Inertia::render(
            'Clientes/Edit',
            [
                'cliente' =>  $cliente
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
            'lastname' => 'required',
            'email' => 'required'
        ]);

        $cliente = Client::find($id);

        $cliente->name = $request->name;
        $cliente->lastname =  $request->lastname;
        $cliente->email = $request->email;
        $cliente->save();

        sleep(1);

        return redirect()->route('clientes.index')->with('message', 'Cliente Editado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cliente = Client::find($id);
        $cliente->delete();

        sleep(1);

        return redirect()->route('clientes.index')->with('message', 'Cliente Eliminado');
    }
}
