@extends('layout')

@section('title', 'Profile List')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <br>
        <div class="float-left">
            <h2>Profile List</h2>
        </div>
        <div class="float-right mb-2">
            <a class="btn btn-success" href="{{ route('profiles.create') }}"> Create Profile</a>
        </div>
    </div>
</div>
@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif
<br>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Gender</th>
            <th>Date Of Birth</th>
            <th width="230px">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($profiles as $profile)
            <tr>
                <td>{{ $profile->first_name }}</td>
                <td>{{ $profile->last_name }}</td>
                <td>{{ $profile->gender_name }}</td>
                <td>{{ $profile->dbo }}</td>
                <td>
                    <form action="{{ route('profiles.destroy',$profile->id_profile) }}" method="Post">
                        <a class="btn btn-primary" href="{{ route('profiles.edit',$profile->id_profile) }}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
    </tbody>
</table>
@endsection