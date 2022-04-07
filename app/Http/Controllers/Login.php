<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class Login extends Controller
{
    public function login()
    {
       return view('login.index');
    }

    public function getLogin(Request $request)
    {
        $user = User::where('email', $request->request->get('email'))
          ->where('password', hash('sha256', $request->request->get('password')))
          ->get();
        dd($user);
    }
}
