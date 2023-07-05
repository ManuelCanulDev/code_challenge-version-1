<?php

namespace Tests\Feature;

use App\Models\Order;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class OrderTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_index(): void
    {
        $response = $this->get('orders');

        $response->assertStatus(302);
    }

    public function testCreateOrder()
    {
        $orderData = [
            'order_number' => 'ORD001',
            'status_id' => 1,
            'clients_id' => 1,
        ];

        $order = Order::create($orderData);

        $this->assertInstanceOf(Order::class, $order);
        $this->assertEquals('ORD001', $order->order_number);
        $this->assertEquals(1, $order->status_id);
        $this->assertEquals(1, $order->clients_id);
    }

    public function testUpdateOrder()
    {
        $order = Order::create([
            'order_number' => 'ORD001',
            'status_id' => 1,
            'clients_id' => 1,
        ]);

        $order->update([
            'order_number' => 'ORD002',
            'status_id' => 2,
            'clients_id' => 2,
        ]);

        $this->assertEquals('ORD002', $order->fresh()->order_number);
        $this->assertEquals(2, $order->fresh()->status_id);
        $this->assertEquals(2, $order->fresh()->clients_id);
    }


    public function testDeleteOrder()
    {
        $order = Order::create([
            'order_number' => 'ORD001',
            'status_id' => 1,
            'clients_id' => 1,
        ]);

        $order->delete();

        $this->assertDatabaseMissing('orders', ['id' => $order->id]);
    }
}
