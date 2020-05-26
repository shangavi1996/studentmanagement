@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Class
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($class, ['route' => ['classes.update', $class->id], 'method' => 'patch']) !!}

                        @include('classes.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection