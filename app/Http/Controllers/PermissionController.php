<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::orderBy('created_at', 'desc')->get();
        return view('admin.pages.permissions.index', compact('permissions'));
    }


    // store new permission
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:permissions|min:3',
        ]);

        if ($validator->passes()) {
            Permission::create([
                'name' => $request->name,
            ]);
            return redirect()->route('permission.list')->with('success', 'Permission Created');
        } else {
            return redirect()->back()->withInput()->withErrors($validator);
        }
    }

    // Edit permission
    public function edit($id)
    {
        $permission = Permission::findOrFail($id);
        return response()->json($permission);
    }
    // Update permission
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3|unique:permissions,name,' . $id,
        ]);

        if ($validator->passes()) {
            $permission = Permission::findOrFail($id);
            $permission->update([
                'name' => $request->name,
            ]);
            return redirect()->route('permission.list')->with('success', 'Permission Updated');
        } else {
            return redirect()->back()->withInput()->withErrors($validator);
        }
    }

    // permission delete
    public function destroy($id)
    {
        $permission = Permission::findOrFail($id);
        $permission->delete();
        return redirect()->route('permission.list')->with('success', 'Permission Deleted');
    }
}
