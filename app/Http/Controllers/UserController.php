<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class UserController extends Controller
{

    public function register_index()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $data = $request->validate(
            [
                'name' => 'required',
                'email' => 'required|unique:users,email',
                'password' => 'required|confirmed',

            ]
            );
            $data['password'] = bcrypt($data['password']);
            $data['role'] = 'user';

        $query = User::create($data);
        auth()->login($query);

        return redirect('/tasks');
    }

    public function login_index()
    {
        return view('/login');
    }

    public function login(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if(auth()->attempt($data))
        {
            return redirect('/tasks');
        }
    }

    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/tasks');
    }
}
