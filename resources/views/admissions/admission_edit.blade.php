@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
           {{Auth::user()->name}}
        </h1>
   </section>
   <div class="content">
   @include('flash::message')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($admission, ['route' => ['admissions.edit_update', $admission->first()->id], 'method' => 'patch','files'=>'true']) !!}

                        @include('admissions.edit_field')
                        <button class="btn btn-primary form-control" type=submit >Change</a>

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection