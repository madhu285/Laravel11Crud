@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                        <a href="{{ route('employees.create')}}" class="btn btn-primary">Add</a>
                        <table class="table table-striped" id="dtExample">
                            <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>Employee Id</th>
                                    <th>Employee Name</th>
                                    <th>Employee Email</th>
                                    <th>Employee Designation</th>
                                    <th>Employee Photo</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                    <th>Action</th>
                                </tr>

                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                @if(count($employees) == 0)
                                <tr><td class="text-center">No Records Found</td></tr>
                                @else
                                @foreach($employees as $key => $employee)
                                <tr>
                                    <td>{{ $i++}}</td>
                                    <td>{{ $employee->employee_id }}</td>
                                    <td>{{ $employee->employee_name }}</td>
                                    <td>{{ $employee->employee_email }}</td>
                                    <td>{{ $employee->employee_designation }}</td>
                                    <td><img src="{{ URL::asset($employee->employee_photo) }}" width="60px" height="60px"></td>
                                    <td>{{ $employee->created_at}}</td>
                                    <td>{{ $employee->updated_at}}</td>
                                    <td><a href="{{ route('employees.edit',['employee' => $employee->id])}}" class="btn btn-warning">Edit</a>
                                    <a href="{{ route('employees.show',['employee' => $employee->id])}}" class="btn btn-secondary">View</a>
                                    <form action="{{ route('employees.destroy', ['employee' => $employee->id]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>

                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
