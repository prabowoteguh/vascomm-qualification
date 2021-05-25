<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LaporanController extends Controller
{
    function index(){
        $bacod_token = session("bacod_token");
        if(empty($bacod_token)){
            return redirect("/login");
        }
        return view("laporan");
    }
}