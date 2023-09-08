<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class RegisterController extends Controller
{
    public function show()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $input = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        $input['role'] = 'user';
        $input['password'] = Hash::make($request->password);

        $user = User::create($input);

        Auth::login($user);

        Session::flash('success', 'Register Successfully');

        return redirect()->route('home');
    }
}
