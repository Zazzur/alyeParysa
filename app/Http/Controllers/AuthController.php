<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register_process(Request $request)
{
    $data = $request->validate([
        'email' => ['required', 'email', 'string', 'unique:users,email'],
        'name' => ['required', 'string'],
        'password' => ['required', 'confirmed']
    ]);

    $user = User::create([
        'email' => $data['email'],
        'name' => $data['name'],
        'password' => bcrypt($data['password']),
    ]);

    if ($user) {
        auth('web')->login($user);
    }

    return redirect()->route('home');
}

    public function login(){
        return view('login');
    }
    

}
