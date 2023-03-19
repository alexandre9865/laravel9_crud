@extends('layout')
@section('title', 'Edit Profile')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <br>
        <div class="float-left">
            <h2>Edit Profile</h2>
        </div>
        <div class="float-right">
            <a class="btn btn-primary" href="{{ route('profiles.index') }}" enctype="multipart/form-data">
                Back</a>
        </div>
    </div>
</div>
@if(session('status'))
<div class="alert alert-success mb-1 mt-1">
    {{ session('status') }}
</div>
@endif
<br>
<form action="{{ route('profiles.update',$profile->id_profile) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>First Name:</strong>
                <input type="text" name="first_name" value="{{ $profile->first_name }}" class="form-control"
                    placeholder="First Name">
                @error('first_name')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Last Name:</strong>
                <input type="text" name="last_name" class="form-control" placeholder="Last Name"
                    value="{{ $profile->last_name }}">
                @error('last_name')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Date Of Birth:</strong>
                <input type="text" name="dbo" id="dbo" value="{{ $profile->dbo }}" class="form-control"
                    placeholder="Date Of Birth">
                @error('dbo')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Gender:</strong>
                <select name="gender" class="form-control">
                    <option value="0" {{ $profile->gender == '0' ? 'selected' : '' }}>Male</option>
                    <option value="1" {{ $profile->gender == '1' ? 'selected' : '' }}>Female</option>
                    <option value="2" {{ $profile->gender == '2' ? 'selected' : '' }}>Other</option>
                </select>
                @error('gender')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <button type="submit" class="btn btn-primary ml-3">Submit</button>
    </div>
</form>
@endsection
@section('custom_js')
<script src="{{ mix('js/profile.js')}}"></script>
@endsection