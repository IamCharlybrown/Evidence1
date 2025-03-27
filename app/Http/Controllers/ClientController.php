<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    // Mostrar el listado de clientes
    public function index()
    {
        $clients = Client::all();
        return view('clients.index', compact('clients'));
    }

    // Mostrar el formulario para crear un cliente
    public function create()
    {
        return view('clients.create');
    }

    // Almacenar un nuevo cliente
    public function store(Request $request)
    {
        $request->validate([
            'Name' => 'required|string|max:255',
            'Client_Number' => 'required|integer|unique:_client,Client_Number',
            'FiscalData' => 'required|string',
        ]);

        Client::create([
            'Name' => $request->Name,
            'Client_Number' => $request->Client_Number,
            'FiscalData' => $request->FiscalData,
        ]);

        return redirect()->route('clients.index')->with('success', 'Client created successfully.');
    }

    // Mostrar el formulario para editar un cliente
    public function edit($id)
    {
        $client = Client::findOrFail($id);
        return view('clients.edit', compact('client'));
    }

    // Actualizar la información de un cliente
    public function update(Request $request, $id)
    {
        $request->validate([
            'Name' => 'required|string|max:255',
            'Client_Number' => 'required|integer|unique:_client,Client_Number,' . $id,
            'FiscalData' => 'required|string',
        ]);

        $client = Client::findOrFail($id);
        $client->update([
            'Name' => $request->Name,
            'Client_Number' => $request->Client_Number,
            'FiscalData' => $request->FiscalData,
        ]);

        return redirect()->route('clients.index')->with('success', 'Client updated successfully.');
    }

    // Eliminar un cliente
    public function destroy($id)
    {
        $client = Client::findOrFail($id);
        $client->delete();

        return redirect()->route('clients.index')->with('success', 'Client deleted successfully.');
    }
}