<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Mostrar la lista de usuarios
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    // Mostrar el formulario para crear un nuevo usuario
    public function create()
    {
        $roles = Role::all(); // Para mostrar todos los roles en el formulario
        return view('users.create', compact('roles'));
    }

    // Almacenar un nuevo usuario
    public function store(Request $request)
    {
        $request->validate([
            'role_id' => 'required|exists:_role,id',
            'Name' => 'required|string|max:255',
            'Email' => 'required|string|email|max:255|unique:_user,Email',
            'Password' => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'role_id' => $request->role_id,
            'Name' => $request->Name,
            'Email' => $request->Email,
            'Password' => Hash::make($request->Password),
        ]);

        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    // Mostrar el formulario para editar un usuario
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all(); // Para mostrar todos los roles en el formulario
        return view('users.edit', compact('user', 'roles'));
    }

    // Actualizar un usuario
    public function update(Request $request, $id)
    {
        $request->validate([
            'role_id' => 'required|exists:_role,id',
            'Name' => 'required|string|max:255',
            'Email' => 'required|string|email|max:255|unique:_user,Email,' . $id,
            'Password' => 'nullable|string|min:8|confirmed',
        ]);

        $user = User::findOrFail($id);
        $user->update([
            'role_id' => $request->role_id,
            'Name' => $request->Name,
            'Email' => $request->Email,
            'Password' => $request->Password ? Hash::make($request->Password) : $user->Password,
        ]);

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    // Eliminar un usuario
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }
}
