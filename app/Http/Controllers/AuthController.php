<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Auth;

class AuthController extends Controller
{
    function loginProcess(Request $request)
    {

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $role = auth()->user()->role;

            if ($role === 'admin') {
                return redirect('/admin/dashboard');
            } elseif ($role === 'user') {
                return redirect('/');
            }
        }


        return view('auth.login');
    }

    // public function deleteUser($id)
    // {
    //     if (auth()->id() == $id) {
    //         return redirect()->back()->with('error', 'You cannot delete your own admin account!');
    //     }

    //     $user = User::find($id);

    //     if ($user) {
    //         $user->delete();
    //         return redirect('/admin/users')->with('success', 'User deleted successfully.');
    //     }

    //     return redirect('/admin/users')->with('error', 'User not found.');
    // }

    public function editUser($id)
    {
        $user = User::find($id);

        return view('admin.userEdit', compact('user'));
    }

    public function updateUser(Request $request, $id)
    {
        $user = User::find($id);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;

        $user->save();

        return redirect('/admin/users')->with('success', 'User updated successfully!');
    }

    public function signupProcess(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'role' => 'user',
        ]);

        return redirect('/login')->with('success', 'Registration successful! Please login.');
    }

    function allUsers()
    {
        $users = User::get();

        return view('admin.users', compact('users'));
    }
}
