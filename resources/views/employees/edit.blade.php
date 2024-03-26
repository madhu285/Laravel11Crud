@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="card">
                <form action="{{ route('employees.update',['employee' => $employees->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <div class="col-md-4">
                        <label for="employee_id">Employee Id</label>
                        <input type="text" name="employee_id" id="employee_id" required class="form-control" placeholder="Employee Id" value="{{$employees->employee_id}}" readonly>
                        </div>
                        <div class="col-md-4">
                        <label for="employee_id">Employee Name</label>
                        <input type="text" name="employee_name" id="employee_name" required class="form-control" value="{{$employees->employee_name}}">
                        </div>
                        <div class="col-md-4">
                        <label for="employee_id">Employee Email</label>
                        <input type="text" name="employee_email" id="employee_email" required class="form-control" value="{{$employees->employee_email}}">
                        </div>
                        <div class="col-md-4">
                        <label for="employee_id">Employee Designation</label>
                        <input type="text" name="employee_designation" id="employee_designation" required class="form-control" value="{{$employees->employee_designation}}">
                        </div>
                        <div class="col-md-4">
                        <label for="employee_id">Employee Photo</label>
                        <input type="file" name="employee_photo" id="employee_photo" required class="form-control">
                        </div>
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection