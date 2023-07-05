<?php

namespace Tests\Feature;

use App\Models\Client;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ClientTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_index(): void
    {
        $response = $this->get('clientes');

        $response->assertStatus(302);
    }

    public function testCreateClient()
    {
        $client = Client::create([
            'name' => 'John',
            'lastname' => 'Doe',
            'email' => 'john@example.com',
        ]);

        $this->assertInstanceOf(Client::class, $client);
        $this->assertEquals('John', $client->name);
        $this->assertEquals('Doe', $client->lastname);
        $this->assertEquals('john@example.com', $client->email);
    }

    public function testEditClient()
    {
        // Crear un cliente de prueba
        $client = Client::create([
            'name' => 'John',
            'lastname' => 'Doe',
            'email' => 'john@example.com',
        ]);

        // Realizar la edición del cliente
        $client->update([
            'name' => 'Jane',
            'lastname' => 'Smith',
            'email' => 'jane@example.com',
        ]);

        // Obtener el cliente actualizado de la base de datos
        $updatedClient = Client::find($client->id);

        // Verificar que los cambios se hayan aplicado correctamente
        $this->assertEquals('Jane', $updatedClient->name);
        $this->assertEquals('Smith', $updatedClient->lastname);
        $this->assertEquals('jane@example.com', $updatedClient->email);
    }

    public function testDeleteClient()
    {
        // Crear un cliente de prueba
        $client = Client::create([
            'name' => 'John',
            'lastname' => 'Doe',
            'email' => 'john@example.com',
        ]);

        // Obtener el ID del cliente
        $clientId = $client->id;

        // Eliminar el cliente
        $client->delete();

        // Verificar que el cliente haya sido eliminado de la base de datos
        $this->assertDatabaseMissing('clients', ['id' => $clientId]);
    }
}
