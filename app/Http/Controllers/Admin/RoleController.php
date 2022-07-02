<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::withCount('users')->paginate();
        return view('dashboard.roles.index', ['roles' => $roles]);
    }

    public function create()
    {
        return view('dashboard.roles.create', ['role' => new Role]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'abilities' => 'required|array'
        ]);
        Role::create($request->all());
        return redirect()->route('roles.index')
            ->with('success', 'Role Added');
    }

    public function edit(Role $role)
    {
        return view('dashboard.roles.edit',['role' => $role]);
    }

    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => 'required',
            'abilities' => 'required|array'
        ]);
        $role->update($request->all());
        return redirect()->route('roles.index')
            ->with('success', 'Role updated');
    }

    public function destroy(Role $role)
    {
        $role->delete();
        //    Category::destroy($id);
        return redirect()->route('dashboard.roles.index')
            ->with('success', 'Role deleted');
    }

}
