<?php

namespace App\Http\Controllers\CRUDs;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;
use Gate;
use App\Models\Permission;

class PermissionController extends Controller
{

    public function index()
    {
        abort_if(Gate::denies('permission_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $permissions = Permission::all();
        
        return view('cruds.permissions.index', compact('permissions'));

    }

    public function show(Permission $permission)
    {
        abort_if(Gate::denies('permission_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response()->json(['data' => $permission]);
    }

    public function create()
    {
        abort_if(Gate::denies('permission_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('cruds.permissions.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:permissions',
        ]);

        Permission::create($request->all());

        return redirect(route('permissions.index') . '#permissions');
    }

    public function edit(Permission $permission)
    {
        abort_if(Gate::denies('permission_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('cruds.permissions.edit', compact('permission'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
        ]);

        $permission = Permission::find($id);
        $permission->update($request->all());
        
        return redirect(route('permissions.index') . '#permissions');
    }

    public function destroy(Permission $permission)
    {
        abort_if(Gate::denies('permission_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        
        $permission->roles()->sync([]);
        $permission->delete();
        
        return redirect(route('permissions.index') . '#permissions');
    }

    public function massDestroy(Request $request)
    {
        $request->validate([
            'ids' => 'required|array',
            'ids.*' => 'exists:permissions,id',
        ]);

        $permissions = Permission::whereIn('id', request('ids'))->get();
        foreach ($permissions as $permission) {
            $permission->roles()->sync([]);
            $permission->delete();
        }
        return redirect(route('permissions.index') . '#permissions');
    }
}