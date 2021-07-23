<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Models\User;
use Session;
use DB;

class EmployeeController extends Controller
{
    public function __construct()
    {
        //
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $record = User::paginate(10);
        return view('employees.index', compact('record'));
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
        /* ===== Your Validation is Here ===== */
   		$this->validate($request, [
			'name'     => 'required',
			'email'    => 'required|email|unique:users',
			'role' => 'required',
	    ]);

        /* ===== Your transaction goes here ===== */
        try {
            DB::beginTransaction();
            $attachment = "uploads/avatars/default.png";
            $email      = explode('@', $request->email);
            if ($request->hasFile('avatar')) {
				$file       = $request->file('avatar');
				$fileName   = $file->getClientOriginalName();
				$fileExt    = $file->getClientOriginalExtension();
				$attachment = 'uploads/avatars/avatar-'.$email[0].'-'.Date('dmY-His').'.'.$fileExt;
	        }

            $data = [
				'name'   => $request->name,
				'email'  => $request->email,
				'role'   => $request->role,
				'avatar' => $attachment,
            ];
            
			$create           = new User($data);
			$create->password = app('hash')->make('12345678');
            $create->save();

            if ($create) {
                DB::commit();
                Session::flash('success', 'User Created Successfully!'); 
                return redirect()->back()->with('success', 'User Created Successfully!');
            } else {
                DB::rollback();
                Session::flash('failed', 'Oops! Something went wrong'); 
                return redirect()->back()->withInput($request->all())->with('failed', 'Oops! Something went wrong');
            }
        } catch (\Exception $th) {
            DB::rollback();
            Session::flash('success', 'Error : ' . $th->getMessage() . ', On File : ' . $th->getFile()); 
            return redirect()->back()->withInput($request->all())->withErrors(['error', 'Error : ' . $th->getMessage() . ', On File : ' . $th->getFile()]);
        }
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
    public function edit(Employee $employee, $id)
    {
        $record = User::findOrfail($id);
        return view('employees.create', compact('record'));
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
        /* ===== Your Validation is Here ===== */
   		$this->validate($request, [
			'name'  => 'required',
			'email' => 'required|email|unique:users,email,'. $request->id,
			'role'  => 'required',
	    ]);

        /* ===== Your transaction goes here ===== */
        try {
            DB::beginTransaction();
            $attachment = "uploads/avatars/default.png";
            $email      = explode('@', $request->email);
            if ($request->hasFile('avatar')) {
				$file       = $request->file('avatar');
				$fileName   = $file->getClientOriginalName();
				$fileExt    = $file->getClientOriginalExtension();
				$attachment = 'uploads/avatars/avatar-'.$email[0].'-'.Date('dmY-His').'.'.$fileExt;
	        }

            $data = [
				'name'   => $request->name,
				'email'  => $request->email,
				'role'   => $request->role,
				'avatar' => $attachment,
            ];
            
			$user   = User::findOrfail($request->id);
            $update = $user->update($data);

            if ($update) {
                DB::commit();
                Session::flash('success', 'User Updated Successfully!'); 
                return redirect()->back()->with('success', 'User Updated Successfully!');
            } else {
                DB::rollback();
                Session::flash('failed', 'Oops! Something went wrong'); 
                return redirect()->back()->withInput($request->all())->with('failed', 'Oops! Something went wrong');
            }
        } catch (\Exception $th) {
            DB::rollback();
            Session::flash('success', 'Error : ' . $th->getMessage() . ', On File : ' . $th->getFile()); 
            return redirect()->back()->withInput($request->all())->withErrors(['error', 'Error : ' . $th->getMessage() . ', On File : ' . $th->getFile()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee, $id)
    {
        try {
            DB::beginTransaction();
            $user   = User::findOrfail($id);
            $delete = $user->delete();

            if ($delete) {
                DB::commit();
                Session::flash('success', 'User Deleted Successfully!'); 
                return redirect()->back()->with('success', 'User Deleted Successfully!');
            } else {
                DB::rollback();
                Session::flash('failed', 'Oops! Something went wrong'); 
                return redirect()->back()->with('failed', 'Oops! Something went wrong');
            }
        } catch (\Exception $th) {
            DB::rollback();
            Session::flash('success', 'Error : ' . $th->getMessage() . ', On File : ' . $th->getFile()); 
            return redirect()->back()->withErrors(['error', 'Error : ' . $th->getMessage() . ', On File : ' . $th->getFile()]);
        }
    }
}
