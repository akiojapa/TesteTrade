<?php

namespace App\Http\Controllers;

use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    
    public function index(Request $request) {
        return view('login.index');
    }

    public function store(Request $request) {
        if(!Auth::attempt($request->only(['email', 'password']))) {
            throw new AuthenticationException('Credenciais inválidas');
        }

        return redirect()->route('campeonato.index');
    }


}
