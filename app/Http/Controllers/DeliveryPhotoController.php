<?php

namespace App\Http\Controllers;

use App\Models\DeliveryPhoto;
use App\Models\OrderStatus;
use Illuminate\Http\Request;

class DeliveryPhotoController extends Controller
{
    // Mostrar todos los DeliveryPhotos
    public function index()
    {
        $deliveryPhotos = DeliveryPhoto::with('status')->get(); // Traer todas las fotos de entrega junto con el estado
        return view('deliveryPhotos.index', compact('deliveryPhotos'));
    }

    // Mostrar el formulario para crear un nuevo DeliveryPhoto
    public function create()
    {
        $statuses = OrderStatus::all(); // Traer todos los estados de orden
        return view('deliveryPhotos.create', compact('statuses'));
    }

    // Guardar un nuevo DeliveryPhoto
    public function store(Request $request)
    {
        $request->validate([
            'Status_ID' => 'required|exists:_order_status,id',
            'PhotoURL' => 'required|url',
            'Type' => 'required|string',
        ]);

        DeliveryPhoto::create($request->all());
        return redirect()->route('deliveryPhotos.index')->with('success', 'Foto de entrega creada correctamente');
    }

    // Mostrar el formulario para editar un DeliveryPhoto
    public function edit($id)
    {
        $deliveryPhoto = DeliveryPhoto::findOrFail($id);
        $statuses = OrderStatus::all();
        return view('deliveryPhotos.edit', compact('deliveryPhoto', 'statuses'));
    }

    // Actualizar un DeliveryPhoto
    public function update(Request $request, $id)
    {
        $request->validate([
            'Status_ID' => 'required|exists:_order_status,id',
            'PhotoURL' => 'required|url',
            'Type' => 'required|string',
        ]);

        $deliveryPhoto = DeliveryPhoto::findOrFail($id);
        $deliveryPhoto->update($request->all());
        return redirect()->route('deliveryPhotos.index')->with('success', 'Foto de entrega actualizada correctamente');
    }

    // Eliminar un DeliveryPhoto
    public function destroy($id)
    {
        $deliveryPhoto = DeliveryPhoto::findOrFail($id);
        $deliveryPhoto->delete();
        return redirect()->route('deliveryPhotos.index')->with('success', 'Foto de entrega eliminada correctamente');
    }
}
