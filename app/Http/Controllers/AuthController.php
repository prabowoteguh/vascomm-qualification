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
use Validator;
use Session;
use DB;

class AuthController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth:api', ['except' => ['login', 'respondWithToken', 'login_form']]);
    }

    public function login(Request $request) {
        $rules = [
            'email'    => 'required|email',
            'password' => 'required|min:8'
        ];
  
        $messages = [
            'email.required'    => 'Email wajib diisi',
            'email.email'       => 'Email tidak valid',
            'password.required' => 'Password wajib diisi',
            'password.string'   => 'Password harus berupa minimal 8 karakter'
        ];
  
        $validator = Validator::make($request->all(), $rules, $messages);

        $data = [
            'email'     => $request->input('email'),
            'password'  => $request->input('password'),
        ];
  
        Auth::attempt($data);
  
        if (Auth::check()) { 
            return redirect()->route('home');
        } else { 
            Session::flash('error', 'Email atau password salah');
            return redirect()->back()->withErrors('Email atau password salah')->withInput($request->all());
        }
    }

    public function showFormLogin(){
        if (Auth::check()) { 
            return redirect()->route('home');
        }
        return view('login');
    }

    public function showFormRegister()
    {
        return view('register');
    }
  
    public function register(Request $request)
    {
        $rules = [
            'name'     => 'required|min:3|max:35',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|confirmed'
        ];
  
        $messages = [
            'name.required'      => 'Nama Lengkap wajib diisi',
            'name.min'           => 'Nama lengkap minimal 3 karakter',
            'name.max'           => 'Nama lengkap maksimal 35 karakter',
            'email.required'     => 'Email wajib diisi',
            'email.email'        => 'Email tidak valid',
            'email.unique'       => 'Email sudah terdaftar',
            'password.required'  => 'Password wajib diisi',
            'password.confirmed' => 'Password tidak sama dengan konfirmasi password'
        ];
  
        $validator = Validator::make($request->all(), $rules, $messages);
  
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        /* ===== Your transaction goes here ===== */
        try {
            DB::beginTransaction();

            $attachment = '';
            $email = explode('@', $request->email);
            if ($request->hasFile('avatar')) {
				$file       = $request->file('avatar');
				$fileName   = $file->getClientOriginalName();
				$fileExt    = $file->getClientOriginalExtension();
				$attachment = 'uploads/avatars/avatar-'.$email[0].'-'.Date('dmY-His').'.'.$fileExt;
	        }

            $data = [
				'name'     => $request->name,
				'email'    => $request->email,
				'role'     => 2,
                'password' => Hash::make($request->password),
				'avatar'   => $attachment !== '' ? $attachment : "uploads/avatars/default.png",
            ];
            
			$create           = User::create($data);
            if ($create) {
                /*===== Upload File =====*/
            	if ($request->hasFile('avatar')) {
		            $file->move(public_path() . 'uploads/avatars/', 'avatar-'.$email[0].'-'.Date('dmY-His').'.'.$fileExt);
		        }
                DB::commit();
                Session::flash('success', 'User Created Successfully!'); 
                return redirect()->route('login')->with('success', 'Created Successfully!');
            } else {
                DB::rollback();
                return redirect()->back()->withInput($request->all())->withErrors('Oops! Something went wrong');
            }
        } catch (\Exception $th) {
            DB::rollback();
            return redirect()->back()->withInput($request->all())->withErrors(['Error : ' . $th->getMessage() . ', On File : ' . $th->getFile()]);
        }
    }
  
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}