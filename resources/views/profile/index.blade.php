@extends('layout')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Profile list</h2>
        </div>
        <div class="pull-right mb-2">
            {{-- <a class="btn btn-success" href="{{ route('profile.create') }}"> Create Profile</a>  TODO --}}
        </div>
    </div>
</div>
@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Profile ID</th>
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
                <td>{{ $profile->id_profile }}</td>
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