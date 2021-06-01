<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class EmployeeController extends Controller
{
    public function __construct() {
        $bacod_token = session("bacod_token");
        if(empty($bacod_token)){
            return redirect("/login");
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $basicauth   = new Client(['base_uri' => 'https: //api-restu.smksumatra40.sch.id/public/']);
        $newresponse = $basicauth->request('GET', 'user/employee',
            ['debug'   => true], 
            ['headers' => 
                [
                    'Authorization' => "Bearer {".session("bacod_token")."}"
                ]
            ]
        )->getBody()->getContents();
        return view('employees.index', json_decode($newresponse));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employees.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $basicauth   = new Client(['base_uri' => 'https: //api-restu.smksumatra40.sch.id/public/']);
        $formData = [
            'name'     => $request->name,
            'email'    => $request->email,
            'phone'    => $request->phone,
            'address'  => $request->address,
            'position' => $request->position,
            'role'     => 2,
            'avatar'   => '-'
        ];
        $newresponse = $basicauth->request('POST', 'user/create',
            ["form_params" => $formData],
            ['debug'   => true], 
            ['headers' => 
                [
                    'Authorization' => "Bearer {".session("bacod_token")."}"
                ]
            ]
        )->getBody()->getContents();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee, $id)
    {
        $basicauth   = new Client(['base_uri' => 'https: //api-restu.smksumatra40.sch.id/public/']);
        $newresponse = $basicauth->request('DELETE', 'user/delete/'.$id,
            ['debug'   => true], 
            ['headers' => 
                [
                    'Authorization' => "Bearer {".session("bacod_token")."}"
                ]
            ]
        )->getBody()->getContents();
        return view('employees.index', json_decode($newresponse));
    }
}
