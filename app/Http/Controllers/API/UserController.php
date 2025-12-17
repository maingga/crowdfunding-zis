<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        return User::all();
    }

    public function show($id)
    {
        return User::findOrFail($id);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama'=>'required|string|max:150',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|string|min:6',
            'role'=>'required|in:donatur,takmir,admin',
            'no_hp'=>'nullable|string|max:20',
            'alamat'=>'nullable|string',
        ]);

        $validated['password'] = Hash::make($validated['password']);
        $user = User::create($validated);

        return response()->json($user, 201);
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validated = $request->validate([
            'nama'=>'sometimes|string|max:150',
            'email'=>'sometimes|email|unique:users,email,'.$id.',user_id',
            'password'=>'nullable|string|min:6',
            'role'=>'sometimes|in:donatur,takmir,admin',
            'no_hp'=>'nullable|string|max:20',
            'alamat'=>'nullable|string',
        ]);

        if(isset($validated['password'])){
            $validated['password'] = Hash::make($validated['password']);
        }

        $user->update($validated);

        return response()->json($user);
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return response()->json(['message'=>'User deleted']);
    }
}
