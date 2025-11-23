<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('roles')->paginate(10); // many-to-many relation
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::all();
        return view('admin.users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'roles' => 'required|array|exists:roles,id', // plusieurs rôles
            'password' => 'required|min:6',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $user->roles()->sync($request->roles); // assigner les rôles

        return redirect()->route('admin.users.index')->with('success', 'Utilisateur ajouté avec succès');
    }

    public function edit(User $user)
    {
        $roles = Role::all();
        $assignedRoles = $user->roles->pluck('id')->toArray();
        return view('admin.users.edit', compact('user', 'roles', 'assignedRoles'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'roles' => 'required|array|exists:roles,id', // plusieurs rôles
        ]);

        $user->update($request->only('name', 'email'));

        $user->roles()->sync($request->roles); // mettre à jour les rôles

        return redirect()->route('admin.users.index')->with('success', 'Utilisateur modifié');
    }

    public function destroy(User $user)
    {
        $user->roles()->detach(); // supprimer les liens pivot avant suppression
        $user->delete();

        return back()->with('success', 'Utilisateur supprimé');
    }
}
