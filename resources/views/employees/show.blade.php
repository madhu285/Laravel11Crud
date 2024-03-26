@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8">
            <table>
                <tbody>
                    <tr>
                        <?php $i = 1; ?>
                        @foreach($employees as $key => $employee)
                        <td>S.No: {{$i++}}</td>
                        <td>Employee Id: {{$employee->employee_id}}</td>
                        <td>Employee Name: {{$employee->employee_name}}</td>
                        <td>Employee Email: {{$employee->employee_email}}</td>
                        <td>Employee Designation: {{ $employee->employee_designation}}</td>
                        <td><img src="{{ URL::asset($employee->employee_photo) }}"></td>
                        <td>Created At: {{$employee->created_at}}</td>
                        <td>Updated At: {{$employee->updated_at}}</td>
                        @endforeach
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection