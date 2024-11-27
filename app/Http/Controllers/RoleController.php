<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    // show index file
    public function index()
    {
        $roles = Role::orderBy('created_at', 'desc')->get();
        // $permissions = Permission::orderBy('created_at', 'desc')->get();
        return view('admin.pages.roles.index', compact('roles'));
    }
    public function create()
    {
        $permissions = Permission::orderBy('created_at', 'desc')->get();
        return view('admin.pages.roles.create', compact('permissions'));
    }

    // store new role
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:roles|min:3',
        ]);

        if ($validator->passes()) {
            $roles = Role::create([
                'name' => $request->name,
                'guard_name' => 'web',
            ]);

            if (!empty($request->permission)) {
                foreach ($request->permission as $name)
                    $roles->givePermissionTo($name);
            }
            return redirect()->route('role.list')->with('success', 'Role Added Successfully.');
        } else {
            return redirect()->route('role.create')->withInput()->withErrors($validator);
        }
    }

    // edit role
    public function edit($id)
    {
        $role = Role::findOrFail($id);
        $hasPermissions = $role->permissions->pluck('name');
        $permissions = Permission::orderBy('created_at', 'desc')->get();

        return view('admin.pages.roles.edit', ['hasPermissions' => $hasPermissions, 'permissions' => $permissions, 'role' => $role]);
    }

    // update role
    public function update(Request $request, $id)
    {
        $role = Role::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3|unique:roles,name,' . $id . ',id',
        ]);

        if ($validator->passes()) {
            $role->name = $request->name;
            $role->save();

            if (!empty($request->permission)) {
                $role->syncPermissions($request->permission);
            } else {
                $role->syncPermissions([]);
            }
            return redirect()->route('role.list')->with('success', 'Role Updated Successfully.');
        } else {
            return redirect()->route('role.edit')->withInput()->withErrors($validator);
        }
    }

    // delete role

    public function destroy($id)
    {
        $role = Role::findOrFail($id);
        $role->delete();

        return redirect()->route('role.list')->with('success', 'Role deleted successfully.');
    }
}
