<?php

namespace App\Http\Controllers\Api\RESTfulCRUD;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        return User::all();
    }

    public function show(User $user)
    {
        return $user;
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8',
        ]);

        $user = User::create($request->all());

        return response()->json(['user' => $user, 'message' => 'Stored Successfully' ], 201);
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'first_name' => 'sometimes|string',
            'last_name' => 'sometimes|string',
            'email' => 'sometimes|email|unique:users,email,' . $user->id,
            'password' => 'sometimes|string|min:8',
        ]);

        $user->update($request->all());

        return response()->json(['user' => $user, 'message' => 'Updated Successfully' ], 200);
    }

    public function destroy(User $user)
    {
        $user->delete();

        return response()->json(['message' => 'Deleted Successfully' ], 200);
    }
}
