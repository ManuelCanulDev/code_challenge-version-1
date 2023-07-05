<?php

namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Http\Request;
use Inertia\Inertia;


class OrderDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orderDetail = OrderDetail::with('producto')->with('order')->get();

        return Inertia::render(
            'OrderDetail/Index',
            [
                'orderDetail' => $orderDetail
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render(
            'OrderDetail/Create',[
                'orders' => Order::all(),
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
            'order_id' => 'required',
            'product_id' => 'required',
            'price' => 'required',
        ]);

        OrderDetail::create([
            'order_id' => $request->order_id,
            'product_id' => $request->product_id,
            'price' => $request->price
        ]);

        sleep(1);

        return redirect()->route('orderDetails.index')->with('message', 'Order Details Creado');
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
        $orderDetail = OrderDetail::find($id);

        return Inertia::render(
            'OrderDetail/Edit',
            [
                'orderDetail' =>  $orderDetail,
                'orders' => Order::all(),
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
            'order_id' => 'required',
            'product_id' => 'required',
            'price' => 'required',
        ]);

        $product = OrderDetail::find($id);

        $product->order_id = $request->order_id;
        $product->product_id =  $request->product_id;
        $product->price = $request->price;
        $product->save();

        sleep(1);

        return redirect()->route('orderDetails.index')->with('message', 'Order Details Editado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = OrderDetail::find($id);
        $product->delete();

        sleep(1);

        return redirect()->route('orderDetails.index')->with('message', 'Order Details Eliminado');
    }
}
