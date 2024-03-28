<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function store(Request $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email'=> $request->email,
            'password'=> bcrypt($request->password),
        ]);
        // return view('register');
         Auth::login($user);
        return redirect(RouteServiceProvider::HOME);
    }
}
