<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $users = User::all();
        return view('users.home', ['users' => $users]);
    }
    public function create()
    {
        $data['emp_id'] = 'CRI -' . mt_rand(1, 1000);
        return view('employees.create',$data);
    }

    public function store(Request $request)
    {
        // print_r($request->all()); exit;
    
    }

    public function show($id)
    {
        $employees = User::find($id);
        return view('employees.show', ['employees' => $employees]);
    }

    public function edit($id)
    {
        $employees = User::find($id);
        return view('employees.edit', ['employees' => $employees]);
    }

    public function update(Request $request, $id)
    {
        // Logic to update a employees
    }

    public function destroy($id)
    {
        // Logic to delete a employees
    }
}
