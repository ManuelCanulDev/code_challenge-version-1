<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Order;
use Illuminate\Http\Request;
use Inertia\Inertia;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::with('cliente')->get();

        return Inertia::render(
            'Order/Index',
            [
                'orders' => $orders
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render(
            'Order/Create',[
                'clientes' => Client::all()
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'order_number' => 'required',
            'status_id' => 'required|integer',
            'clients_id' => 'required'
        ]);

        Order::create([
            'order_number' => $request->order_number,
            'status_id' => $request->status_id,
            'clients_id' => $request->clients_id
        ]);

        sleep(1);

        return redirect()->route('orders.index')->with('message', 'Order Creado');
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
        $order = Order::find($id);

        return Inertia::render(
            'Order/Edit',
            [
                'order' =>  $order,
                'clientes' => Client::all()
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'order_number' => 'required',
            'status_id' => 'required|integer',
            'clients_id' => 'required'
        ]);

        $order = Order::find($id);

        $order->order_number = $request->order_number;
        $order->status_id =  $request->status_id;
        $order->clients_id = $request->clients_id;
        $order->save();

        sleep(1);

        return redirect()->route('orders.index')->with('message', 'Order Editado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $order = Order::find($id);
        $order->delete();

        sleep(1);

        return redirect()->route('orders.index')->with('message', 'Order Eliminado');
    }
}
