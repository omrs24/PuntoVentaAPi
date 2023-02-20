<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

use Illuminate\Support\Facades\Hash;

class ApiController extends Controller
{
    //Response array 
    private $response = ["status" => 0,
                        "message" => ""];

    //gettoken
    public function getToken(Request $request){
        
        /**
         * Get Json data into seriallized array
         */
        $data = json_decode($request->getContent());

        /**
         * Validate if info has been send
         */
        if(!isset($data->email) || !isset($data->password)){
            $this->response["status"] = 400;
            $this->response["message"] = "You must send email and password";

            return response()->json($this->response,400);
        }
            
        /**
         * Look up on the email send
         */
        $user = User::where('email' , $data->email)->first();

        /**
         * If users does not exist return error message
         */
        if(!$user){
            $this->response["status"] = 401;
            $this->response["message"] = "User not found";

            return response()->json($this->response,401);
        }
        

        /**
         * If password is incorrect send error message
         */
        if(!Hash::check($data->password,$user->password)){
            $this->response["status"] = 401;
            $this->response["message"] = "Incorrect credentials";

            return response()->json($this->response,401);
        }

        $token = $user->createToken("ApiAccess");

        $this->response["status"] = 200;
        $this->response["message"] = $token->plainTextToken;


        return response()->json($this->response,200);

    }

    //
    public function users(Request $request){

        $users = User::all();

        return response()->json($users);

    }

    //
    public function usersfact(Request $request){

        $user = $user = User::factory()->create();

        return response()->json($user);

    }

    //
    public function login(Request $request){
        
    }
}
