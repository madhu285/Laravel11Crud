@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                        <a href="{{ route('users.create')}}" class="btn btn-primary">Add</a>
                        <table class="table table-striped" id="dtExample">
                            <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>User Id</th>
                                    <th>Email</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                    <th>Action</th>
                                </tr>

                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                @if(count($users) == 0)
                                <tr><td>No Records Found</td></tr>
                                @else
                                @foreach($users as $key => $user)
                                <tr>
                                    <td>{{ $i++}}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->created_at}}</td>
                                    <td>{{ $user->updated_at}}</td>
                                    <td><a href="{{ route('users.edit',['user' => $user->id])}}" class="btn btn-warning">Edit</a>
                                    <a href="{{ route('users.show',['user' => $user->id])}}" class="btn btn-secondary">View</a>
                                    <a href="{{ route('users.destroy',['user' => $user->id])}}" class="btn btn-danger">Delete</a></td>
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
