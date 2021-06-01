<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Arr;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use App\Mail\OtpMail;
use App\Libraries\Helpers;
use JWTAuth;

class AuthController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth:api', ['except' => ['login', 'respondWithToken', 'login_form']]);
    }

    public function login(Request $request) {
        $email       = $request->email;
		$password    = $request->password;
        $success     = false;
        $status_code = 403;
        $message     = http_status_code($status_code);
        $data        = array();

        if (empty($email) or empty($password)) {
            $status_code = 400;
            $message     = "You must fill all the fields";
        } else {
            if (strlen($password) < 6) {
                $message = "Password should be min 6 character";
            } else {
                if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $credentials = [
                        'email'    => $email,
                        'password' => $password,
                        'role'     => 1
                    ];
                } else {
                    $credentials = [
                        'phone'    => $email,
                        'password' => $password,
                        'role'     => 1
                    ];
                }

                $token = auth()->attempt($credentials);

                if (!$token) {
                    $status_code = 401;
                    $message     = "User tidak ditemukan";
                } else {
                    $success       = true;
                    $status_code   = 200;
                    $message       = "Login Success!";
                    $data["user"]  = auth()->user();
                    $data["token"] = array(
                        "access"  => $token,
                        "type"    => "bearer",
                        "expires" => (int) auth('api')->factory()->getTTL() * 60,
                    );
                }
            }
        }

        $response = b_json_response($success, $status_code, $message, $data);
        
        if($response['success']){
            $token = $response['data']['token']['access'];
            $user  = $response['data']['user'];
            $request->session()->put("bacod_token", $token);
            $request->session()->put("user", $user);
            return redirect("/home");
        }else{
            $message = $response['message'];
            return redirect("/login?message=$message");
        }
    }

    protected function respondWithToken($token)
    {
        $success       = true;
        $status_code   = 200;
        $message       = "Login Success!";
        $data["user"]  = auth()->user();
        $data["token"] = array(
            "access"  => $token,
            "type"    => "bearer",
            "expires" => (int) auth('api')->factory()->getTTL() * 60,
        );
        $response = b_json_response($success, $status_code, $message, $data);
        return response()->json($response, $status_code);
    }

    public function login_form(){
        $bacod_token = session("bacod_token");
        if(!empty($bacod_token)){
            return redirect("/home");
        }
        return view("login");
    }

    public function logout(Request $request){
        session()->forget("bacod_token");
        // auth()->logout();
        // auth()->invalidate();
        return redirect("/login");
    }
}