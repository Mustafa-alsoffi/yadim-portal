<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{


    public function main()
    {
        $users = User::all();
        return view('users.main', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
        ]);

        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'super' => $request->super ? 1 : 0,
            'password' => bcrypt($request->password),
        ]);

        $user->save();
        $message = 'User created successfully.';
        return redirect()->route('users.main')->with('success', $message);
    }

    public function edit(User $user)
    {
        // $user = $user->find($id);
        return view('users.edit', compact('user'));
    }
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,',
            'password' => 'nullable|min:6',
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password ? bcrypt($request->password) : $user->password,
        ]);

        $message = 'User updated successfully.';
        return redirect()->route('users.main')->with('success', $message);
    }

    public function destroy(User $user, String $id)
    {
        $user->destroy($id);
        $message = 'User deleted successfully.';
        return redirect()->route('users.main')->with('success', $message);
    }
}
