<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $users = User::all();
        // return view('admin.users.index', compact('users'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        // return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        // $users = User::all()->pluck('name_route', 'id')->prepend(trans('global.pleaseSelect'), '');
        // return view('admin.users.create', compact('users'));
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
        
        // $user = User::find($request->category_id);
        // $user->buses()->create([
        //     'license_plate' => $request->license_plate,
        //     'latitude' => 14.0695183,
        //     'longitude' => 100.6032949,
        // ]);
        
        // return redirect()->route('admin.users.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        // $users = User::all()->pluck('name_route', 'id')->prepend(trans('global.pleaseSelect'), '');
        // $user->load('route');
        // return view('admin.users.edit', compact('users', 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $request->validate([
        //     'route_id' => 'required',
        //     'license_plate' => 'required|max:10',
        // ]);
        
        // $user = User::find($id);
        // $user->route_id = $request->route_id;
        // $user->license_plate = $request->license_plate;
        // $user->save();
        // return redirect()->route('admin.users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        // $user->delete();
        // return redirect()->route('admin.users.index');
    }
}