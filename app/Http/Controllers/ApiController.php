<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

use Illuminate\Support\Facades\Hash;

class ApiController extends Controller
{
    //
    public function users(Request $request){

        $users = User::all();

        return response()->json($users);

    }

    public function usersfact(Request $request){

        $user = $user = User::factory()->create();

        return response()->json($user);

    }

    //
    public function login(Request $request){
        
    }
}
