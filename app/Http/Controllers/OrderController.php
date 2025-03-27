<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Client;
use App\Models\OrderStatus;
use App\Models\DeliveryPhoto;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    // Mostrar todos los pedidos
    public function index()
    {
        $orders = Order::with(['client', 'status', 'deliveryPhoto'])->get(); // Traer todos los pedidos con sus relaciones
        return view('orders.index', compact('orders'));
    }

    // Mostrar el formulario para crear un nuevo pedido
    public function create()
    {
        $clients = Client::all(); // Traer todos los clientes
        $statuses = OrderStatus::all(); // Traer todos los estados de orden
        $deliveryPhotos = DeliveryPhoto::all(); // Traer todas las fotos de entrega
        return view('orders.create', compact('clients', 'statuses', 'deliveryPhotos'));
    }

    // Guardar un nuevo pedido
    public function store(Request $request)
    {
        $request->validate([
            'Client_ID' => 'required|exists:_client,id',
            'Status_ID' => 'required|exists:_order_status,id',
            'InvoiceNumber' => 'required|string',
            'DateTime' => 'required|date',
            'DeliveryAddress' => 'required|string',
            'Notes' => 'nullable|string',
            'Delivery_Photo_ID' => 'nullable|exists:_delivery_photo,id',
        ]);

        Order::create($request->all());
        return redirect()->route('orders.index')->with('success', 'Pedido creado correctamente');
    }

    // Mostrar el formulario para editar un pedido
    public function edit($id)
    {
        $order = Order::findOrFail($id);
        $clients = Client::all();
        $statuses = OrderStatus::all();
        $deliveryPhotos = DeliveryPhoto::all();
        return view('orders.edit', compact('order', 'clients', 'statuses', 'deliveryPhotos'));
    }

    // Actualizar un pedido
    public function update(Request $request, $id)
    {
        $request->validate([
            'Client_ID' => 'required|exists:_client,id',
            'Status_ID' => 'required|exists:_order_status,id',
            'InvoiceNumber' => 'required|string',
            'DateTime' => 'required|date',
            'DeliveryAddress' => 'required|string',
            'Notes' => 'nullable|string',
            'Delivery_Photo_ID' => 'nullable|exists:_delivery_photo,id',
        ]);

        $order = Order::findOrFail($id);
        $order->update($request->all());
        return redirect()->route('orders.index')->with('success', 'Pedido actualizado correctamente');
    }

    // Eliminar un pedido
    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();
        return redirect()->route('orders.index')->with('success', 'Pedido eliminado correctamente');
    }
}
