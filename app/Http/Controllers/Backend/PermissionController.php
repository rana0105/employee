<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Permission;
use DB;

class PermissionController extends Controller
{
    
    public function index()
    {
        $permissions = Permission::all();

        return view('backend.permission.index')->withPermissions($permissions);
    }

    
    public function create()

    {
        return view('backend.permission.create');
    }

   
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255|unique:permissions,name',
            'guard_name' => '',
            'display_name' => ''
            ],[
            'name.required' => 'Permission name is mandatory',
            'name.unique' => 'Permission name is unique, please new name !',
            ]);
        $permission = new Permission;

        $permission->name = $request->name;
        $permission->guard_name = $request->guard_name;
        $permission->display_name = $request->display_name;
        $permission->save();

        return redirect()->route('permissions.index')->with(['success' => 'Data have been successfully created !']);
    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        $permission = Permission::find($id);
        return view('backend.permission.edit')->withPermission($permission);
    }

    
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => '',
            'guard_name' => '',
            'display_name' => ''
            ]);
        $permission = Permission::find($id);

        $permission->name = $request->name;
        $permission->guard_name = $request->guard_name;
        $permission->display_name = $request->display_name;
        $permission->save();

        return redirect()->route('permissions.index')->with(['success' => 'Data have been successfully updated !']);
    }

   
    public function destroy($id)
    {
        //dd($id);
        $permission = Permission::find($id);

        $permission->delete();

        return redirect()->route('permissions.index')->with(['success' => 'Data have been successfully deleted !']);
    }
}
