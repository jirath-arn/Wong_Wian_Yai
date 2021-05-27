<?php

namespace App\Http\Controllers\CRUDs;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;
use Gate;
use App\Models\User;
use App\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        
        $users = User::all();
        
        return view('cruds.users.index', compact('users'));
    }

    public function show(User $user)
    {
        abort_if(Gate::denies('user_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        
        return response()->json(['data' => $user]);
    }

    public function store(Request $request)
    {
        abort_if(Gate::denies('user_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $request->validate([
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $role = Role::where('title', 'like', 'User')->get();

        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        $user->roles()->sync($role[0]->id);

        return redirect(route('users.index') . '#users');
    }

    public function edit(User $user)
    {
        abort_if(Gate::denies('user_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        
        return view('cruds.users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'username' => ['required', 'string', 'max:255', 'unique:users'],
        ]);

        $user = User::find($id);
        $user->username = $request->username;
        $user->save();
        
        return redirect(route('users.index') . '#users');
    }

    public function destroy(User $user)
    {
        abort_if(Gate::denies('user_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        
        $user->roles()->sync([]);
        $user->restaurants()->delete();
        $user->reviews()->delete();
        $user->delete();

        return redirect(route('users.index') . '#users');
    }

    public function massDestroy(Request $request)
    {
        $request->validate([
            'ids' => 'required|array',
            'ids.*' => 'exists:users,id',
        ]);

        $users = User::whereIn('id', request('ids'))->get();
        foreach ($users as $user) {
            $user->roles()->sync([]);
            $user->restaurants()->delete();
            $user->reviews()->delete();
            $user->delete();
        }
        return redirect(route('users.index') . '#users');
    }
}