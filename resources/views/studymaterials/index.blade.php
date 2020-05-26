@extends('layouts.app')

@section('content')



    <section class="content-header">
        <h1 class="pull-left">StudyMaterials</h1>
        <h1 class="pull-right">

        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
            <a  class="btn btn-primary" href="{{ route('studymaterials.view_files') }}">View Uploaded files</a>
             <a  class="btn btn-success" href="{{ route('studymaterials.show_upload_files') }}">Upload files</a>
            </div>
        </div>
        <div class="text-center">
        
        </div>
    </div>
@endsection