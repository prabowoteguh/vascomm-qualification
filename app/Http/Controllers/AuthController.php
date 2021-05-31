<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class AuthController extends Controller
{
    function login(){
        $bacod_token = session("bacod_token");
        if(!empty($bacod_token)){
            return redirect("/home");
        }
        return view("login");
    }
    function logout_action(){
        session()->forget("bacod_token");
        return redirect("/login");
    }
    function login_action(Request $request){
        $client = new Client(['base_uri' => 'https://api-restu.smksumatra40.sch.id/public/']);
        $email = $request->email;
        $password = $request->password;

        $params = array(
            "email" => $email,
            "password" => $password,
        );
        $response = $client->request('POST', 'login', ["form_params" => $params])->getBody();
        $response = json_decode($response);

        if($response->success){
            $token = $response->data->token->access;
            $user = $response->data->user;
            $request->session()->put("bacod_token", $token);
            $request->session()->put("user", $user);
            return redirect("/home");
        }else{
            $message = $response->message;
            return redirect("/login?message=$message");
        }
    }
}