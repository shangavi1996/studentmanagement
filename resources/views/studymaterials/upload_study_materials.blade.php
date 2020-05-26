@extends('layouts.app')

@section('content')



    <section class="content-header">
        <h1 class="pull-left">UploadStudyMaterials</h1>
        <h1 class="pull-right">
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">

            <form method="post" form action="{{ route('studymaterials.store') }}" enctype="multipart/form-data"   files ='true'>

            @csrf
    <div class="form-group col-sm-6">
    {!! Form::label('level', 'Select Grade Level:') !!}
    <select class="form-control" name="level" id="level">
    <option value=" ">Select level</option>
    <option value="1">level 1</option>
    <option value="2">level 2</option>
    <option value="3">level 3</option>
    <option value="4">level 4</option>
    <option value="5">level 5</option>
  </select>
</div>



    <div class="form-group col-sm-6">
    {!! Form::label('courses', 'Select course:') !!}
    <select class="form-control" name="course" id="course">
  </select>
</div>


<div class="form-group col-sm-6">
    {!! Form::label('image', 'Image:') !!}
  <input type="file" name="file" class="form-control">
</div>

<div class="form-group col-sm-12">
    <input type="submit" class="btn btn-primary" value="upload">
    <a href="{{ route('studymaterials.index') }}" class="btn btn-default">Cancel</a>
</div>

</form>


@section('footerscipts')

<script>

$(document).ready(function () {

    $(document).on('change', '#level', function() {
        var level_id = $(this).val();
        var div = $(this).parent();
        var op = " ";
        $.ajax({
            type: 'get',
            url: '{!!URL::to('/findcourse_to_level')!!}',
            headers: {
            "XAUTH_KEY": "secret"
        },
            data: {'id':level_id},
            success: function(data)
            {
                for (var i = 0; i < data.length; i++){
                    op += '<option value="'+data[i].course_name+'">'+data[i].course_name+'</option>';
                }
                $('#course').html(" ");
                 $('#course').append(op);
            },
            error: function(){
                console.log('success');
            },
        });
    });
});

</script>
@endsection







            </div>
        </div>
        <div class="text-center">
        
        </div>
    </div>
@endsection