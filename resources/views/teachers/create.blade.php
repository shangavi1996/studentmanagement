@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Teacher
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                <form method="post" form action="{{ route('teachers.store') }}" enctype="multipart/form-data"   files ='true'>
                   @csrf
                        @include('teachers.fields')

                   </form>
                </div>
            </div>
        </div>
    </div>
@endsection
