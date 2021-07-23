<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        // $this->middleware('web');
    }

    function index()
    {
        if (Auth::check()) { 
            return view('home');
        }
        return view('login');
    }
}
