<?php

namespace App\Http\Controllers\CRUDs;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;
use Gate;
use App\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('role_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        
        $roles = Role::all();
        
        return view('cruds.roles.index', compact('roles'));
    }

    public function show(Role $role)
    {
        abort_if(Gate::denies('role_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
       
        return response()->json(['data' => $role]);
    }

    public function store(Request $request)
    {
        abort_if(Gate::denies('role_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $request->validate([
            'title' => 'required|unique:roles',
        ]);

        Role::create($request->all());

        return redirect(route('roles.index') . '#roles');
    }

    public function edit(Role $role)
    {
        abort_if(Gate::denies('role_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        
        return view('cruds.roles.edit', compact('role'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|unique:roles',
        ]);

        $role = Role::find($id);
        $role->title = $request->title;
        $role->save();
        
        return redirect(route('roles.index') . '#roles');
    }

    public function destroy(Role $role)
    {
        abort_if(Gate::denies('role_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        
        $role->permissions()->sync([]);
        $role->users()->sync([]);
        $role->delete();
        
        return redirect(route('roles.index') . '#roles');
    }

    public function massDestroy(Request $request)
    {
        $request->validate([
            'ids' => 'required|array',
            'ids.*' => 'exists:roles,id',
        ]);

        $roles = Role::whereIn('id', request('ids'))->get();
        foreach ($roles as $role) {
            $role->permissions()->sync([]);
            $role->users()->sync([]);
            $role->delete();
        }
        return redirect(route('roles.index') . '#roles');
    }
}