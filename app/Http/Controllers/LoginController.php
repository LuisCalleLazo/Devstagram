<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        // dd($request->remember);

        $validator = Validator::make($request->all(), [
            'email' => ['required', 'email'],
            'password' => ['required', 'min:7', 'max:12']
        ]);


        info($request->password);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        if(auth()->attempt($request->only('email', 'password'), $request->remember))
        {
            return back()->with('message', 'Credenciales incorrectas');
        }

        return redirect()->route('posts.index');
        // dd('Autenticando...');
    }
}
