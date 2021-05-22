@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('User Listing') }}</div>

                <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <th>Sr. No</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Type</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                @foreach($users as $key => $user)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->type }}</td>
                                    <td><a href="" class="btn btn-info">Edit</a> <a href="" class="btn btn-danger">Delete</a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="float-right">
                            {{ $users->links('pagination::bootstrap-4') }}    
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
