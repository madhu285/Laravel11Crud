<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use Illuminate\Support\Facades\Storage;
use Auth;

class EmployeeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $employees = Employee::all();
        return view('employees.home', ['employees' => $employees]);
    }

    public function create()
    {
        $data['emp_id'] = 'CRI -' . mt_rand(1, 1000);
        return view('employees.create',$data);
    }

    public function store(Request $request)
    {
        // print_r($request->all()); exit;
        $user_id                = Auth::id();
        $employee_id            = $request->employee_id;
        $employee_name          = $request->employee_name;
        $employee_email         = $request->employee_email;
        $employee_designation   = $request->employee_designation;
        $employee_photo         = $request->employee_photo;

        if(request()->employee_photo){
            $usermageupload= $employee_photo;
            $userimage= $usermageupload->getClientOriginalName();
            $image=url('assets/uploads/').'/'.$userimage;
            $valtest = $usermageupload->move(public_path('/assets/uploads/'),$userimage);
        }

        $emp_arr = array(
            'user_id'               => $user_id,
            'employee_id'           => $employee_id,
            'employee_name'         => $employee_name,
            'employee_email'        => $employee_email,
            'employee_designation'  => $employee_designation,
            'employee_photo'        => $image,
            'created_at'            => date('Y-m-d H:i:s'),
            'updated_at'            => date('Y-m-d H:i:s')
        );

        $data_inserted = Employee::insert($emp_arr);
        return redirect('/employees')->with('message','Employee Details Submitted Successfully');


    }

    public function show($id)
    {
        $employees = Employee::find($id);
        return view('employees.show', ['employees' => $employees]);
    }

    public function edit($id)
    {
        $employees = Employee::find($id);
        return view('employees.edit', ['employees' => $employees]);
    }

    public function update(Request $request, $id)
    {
        // Logic to update a employees
        $employee_name        = $request->employee_name;
        $employee_email       = $request->employee_email;
        $employee_designation = $request->employee_designation;
        $employee_photo       = $request->employee_photo;
        $updated_at           = date('Y-m-d H:i:s');

        if(request()->employee_photo){
            $usermageupload= $employee_photo;
            $userimage= $usermageupload->getClientOriginalName();
            $image=url('assets/uploads/').'/'.$userimage;
            $valtest = $usermageupload->move(public_path('/assets/uploads/'),$userimage);
        }

        $employees_update = array(
            'employee_name'         => $employee_name,
            'employee_email'        => $employee_email,
            'employee_designation'  => $employee_designation,
            'employee_photo'        => $image,
            'updated_at'            => $updated_at
        );

        $update_data = Employee::where('id','=',$id)->update($employees_update);  
        
        if($employees_update){
        return redirect('/employees')->with('message','Employee Deleted Successfully');
        }else{
          return redirect('/employees')->with('error','Record not found');  
        }
    }

    public function destroy($id)
    {
        // Logic to delete a employees
        $employees = Employee::find($id);
        if($employees){
            $employees->delete();
            return redirect('/employees')->with('message','Employee Deleted Successfully');
        }else{
            return redirect('/employees')->with('error','Record not found');
        }
        
    }
}
