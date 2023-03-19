@extends('layout')

@section('title', 'Report List')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <br>
        <div class="float-left">
            <h2>Report List</h2>
        </div>
        <div class="float-right mb-2">
            <a class="btn btn-success" href="{{ route('reports.create') }}"> Create Report</a>
        </div>
    </div>
</div>
@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif
@if ($message = Session::get('error'))
    <div class="alert alert-danger">
        <p>{{ $message }}</p>
    </div>
@endif
<br>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Profiles Associated</th>
            <th width="230px">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($reports as $report)
            <tr>
                <td>{{ $report->title }}</td>
                <td>{{ $report->description }}</td>
                <td>{{ $report->profile }}</td>
                <td>
                    <form action="{{ route('reports.destroy',$report->id_report) }}" method="Post">
                        <a class="btn btn-primary" href="{{ route('reports.edit',$report->id_report) }}">Edit</a>
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
@section('custom_js')
<script src="{{ mix('js/report.js')}}"></script>
@endsection