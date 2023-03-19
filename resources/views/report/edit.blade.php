@extends('layout')
@section('title', 'Edit Report')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <br>
        <div class="float-left">
            <h2>Edit Report</h2>
        </div>
        <div class="float-right">
            <a class="btn btn-primary" href="{{ route('reports.index') }}" enctype="multipart/form-data">
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
<form action="{{ route('reports.update',$report->id_report) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Title:</strong>
                <input type="text" name="title" value="{{ $report->title }}" class="form-control"
                    placeholder="Title">
                @error('title')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Description:</strong>
                <textarea name="description" class="form-control" placeholder="Description"
                >{{ $report->description }}</textarea>
                @error('description')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Add Profiles:</strong>
                {{-- TODO - put data to profiles be selected--}}
                <div class="row">
                <div class="col-xs-10 col-sm-10 col-md-10">
                    <select name="profiles" class="form-control">
                        <option value="0" selected>Select</option>
                        @foreach ($profiles as $profile)
                            <option value="{{$profile->id_profile}}">{{ $profile->first_name .' '. $profile->last_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-xs-2 col-sm-2 col-md-2">
                    <button type="button" class="btn btn-success float-right" onclick=""> Add Profile</button>
                </div>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary ml-3">Submit</button>
    </div>
</form>
@endsection
@section('custom_js')
<script src="{{ mix('js/report.js')}}"></script>
@endsection