<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Permission;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $permissions = Permission::all();
        // return view('admin.permissions.index', compact('permissions'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function show(Permission $permission)
    {
        // return view('admin.permissions.show', compact('permission'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        // $permissions = Permission::all()->pluck('name_route', 'id')->prepend(trans('global.pleaseSelect'), '');
        // return view('admin.permissions.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'route_id' => 'required',
        //     'license_plate' => 'required|max:10|unique:buses',
        // ]);
        
        // $permission = Permission::find($request->category_id);
        // $permission->buses()->create([
        //     'license_plate' => $request->license_plate,
        //     'latitude' => 14.0695183,
        //     'longitude' => 100.6032949,
        // ]);
        
        // return redirect()->route('admin.permissions.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function edit(Permission $permission)
    {
        // $permissions = Permission::all()->pluck('name_route', 'id')->prepend(trans('global.pleaseSelect'), '');
        // $permission->load('route');
        // return view('admin.permissions.edit', compact('permissions', 'permission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $request->validate([
        //     'route_id' => 'required',
        //     'license_plate' => 'required|max:10',
        // ]);
        
        // $permission = Permission::find($id);
        // $permission->route_id = $request->route_id;
        // $permission->license_plate = $request->license_plate;
        // $permission->save();
        // return redirect()->route('admin.permissions.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission)
    {
        // $permission->delete();
        // return redirect()->route('admin.permissions.index');
    }
}