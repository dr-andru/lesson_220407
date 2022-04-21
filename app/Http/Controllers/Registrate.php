<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\Registrate as RegistrateRequests;

class Registrate extends Controller
{
    public function index()
    {
       return view('login.registrate');
    }

    public function registrate(RegistrateRequests $request)
    {
        $user = new User();

        $user->email = $request->request->get('email');
        $user->password = User::hashPassword($request->request->get('password'));
        $user->name = $request->request->get('name');

        $user->save();

        return redirect('/login');
    }
}
