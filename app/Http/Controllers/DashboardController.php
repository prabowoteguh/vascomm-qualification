<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        // $this->middleware('api');
    }

    function index()
    {
        $bacod_token = session("bacod_token");
        if (empty($bacod_token)) {
            return redirect("/login");
        }
        return view("home");
    }
}
