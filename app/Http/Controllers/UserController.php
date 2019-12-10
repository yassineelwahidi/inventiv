<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function register(Request $request)
    {
//        $user = User::create([
//            'name'=>$request->name,
//            'email'=>$request->email,
//            'password'=>bcrypt($request->password),
//        ]);
//        return response()->json([
//            'logged'=>true,
//            'name'=>$user->name,
//            'email'=>$user->email,
//            'id'=>$user->id,
//        ]);
        return 'ok';
    }
}
