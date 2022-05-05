<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class TestController extends Controller
{
    public function testFiles()
    {
      return view('test');
    }

    public function upload(Request $request)
    {
      dd($request->files);

    }

    public function testModel(Request $request)
    {
        // $user = User::find(1);
        // $role = $user->role;
        // dd($role->users);

        //$userList = User::where('id', '>', 10)->get();

        $limit = 3;
        $page = (int) $request->get('page', 1);

        $userList = User::select('id', 'name')
          ->orderBy('id')
          ->skip($limit * ($page - 1))
          ->take($limit)
          ->get();

        dd($userList);

    }
}
