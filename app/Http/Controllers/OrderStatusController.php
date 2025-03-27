<?php

namespace App\Http\Controllers;

use App\Models\OrderStatus;
use Illuminate\Http\Request;

class OrderStatusController extends Controller
{
    // Mostrar todos los estados de orden
    public function index()
    {
        $orderStatuses = OrderStatus::all(); // Traer todos los estados de orden
        return view('orderStatus.index', compact('orderStatuses'));
    }

    // Mostrar el formulario para crear un nuevo estado
    public function create()
    {
        return view('orderStatus.create');
    }

    // Guardar un nuevo estado
    public function store(Request $request)
    {
        $request->validate([
            'Status' => 'required|string|max:255',
        ]);

        OrderStatus::create($request->all());
        return redirect()->route('orderStatus.index')->with('success', 'Estado de orden creado correctamente');
    }

    // Mostrar el formulario para editar un estado
    public function edit($id)
    {
        $orderStatus = OrderStatus::findOrFail($id);
        return view('orderStatus.edit', compact('orderStatus'));
    }

    // Actualizar un estado
    public function update(Request $request, $id)
    {
        $request->validate([
            'Status' => 'required|string|max:255',
        ]);

        $orderStatus = OrderStatus::findOrFail($id);
        $orderStatus->update($request->all());
        return redirect()->route('orderStatus.index')->with('success', 'Estado de orden actualizado correctamente');
    }

    // Eliminar un estado
    public function destroy($id)
    {
        $orderStatus = OrderStatus::findOrFail($id);
        $orderStatus->delete();
        return redirect()->route('orderStatus.index')->with('success', 'Estado de orden eliminado correctamente');
    }
}
