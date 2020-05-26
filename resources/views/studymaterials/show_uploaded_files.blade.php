@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">your uploded files are here</h1>
        <h1 class="pull-right">
           
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                   
        <div class="table-responsive">
    <table class="table" id="courses-table">
        <thead>
            <tr>
                <th>Grade Level</th>
        <th>couse Name</th>
        <th>File</th>
        <th>Uploaded at</th>
       
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($uploadedfiles as $file)
            <tr>
                <td>Grade&ensp;{{ $file->level }}</td>
            <td>{{ $file->subject }}</td>
            <td>{{ $file->filename }}</td>
            <td>{{ $file->created_at }}</td>
         
            <td><a class="btn btn-primary" href="{{ route('study_file_download',[$file->level, $file->subject,$file->filename]) }}">Download</a></td>
            <td><a class="btn btn-danger" href="{{ route('delete_file_download',[$file->level, $file->subject,$file->filename,$file->id]) }}">delete</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

            </div>
        </div>
        <div class="text-center">
        
        </div>
    </div>
@endsection
