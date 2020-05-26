@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Term
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($term, ['route' => ['terms.update', $term->id], 'method' => 'patch']) !!}

                        @include('terms.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection