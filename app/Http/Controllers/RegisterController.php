<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'max:30'],
            'username' => ['required', 'unique:users','min:3','max:20'],
            'email' => ['required', 'unique:users', 'email', 'max:60'],
            'password' => ['required', 'min:7', 'max:12', 'confirmed']
        ]);



        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->username = Str::slug($request->username);
        $user->password = Hash::make($request->password);

        $user->save();

        // Autenticando usuario
        auth()->attempt([
            'email' => $request->email,
            'password' => $request->password,
        ]);

        // Otra manera de autenticar
        auth()->attempt($request->only('email', 'password'));

        return redirect()->route('posts.index', ['user' => $user->username]);
    }
}


