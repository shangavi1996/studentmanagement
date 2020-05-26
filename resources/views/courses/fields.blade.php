<!-- Course Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('course_name', 'Course Name:') !!}
    {!! Form::text('course_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Course Code Field -->
<div class="form-group col-sm-6">
    {!! Form::label('course_code', 'Course Code:') !!}
    {!! Form::text('course_code', null, ['class' => 'form-control']) !!}
</div>

<!-- Course Description Field -->
<div class="form-group col-sm-6">
    {!! Form::label('course_description', 'Course Description:') !!}
    {!! Form::textarea('course_description', null, ['class' => 'form-control']) !!}
</div>

<!-- Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status', 'Status:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('status', 0) !!}
        {!! Form::checkbox('status', '1', null) !!}
    </label>
</div>

<div class="form-group col-sm-6">
    {!! Form::label('level', 'Select Grade Level:') !!}
    <select class="form-control" name="level">
    <option value="1">level 1</option>
    <option value="2">level 2</option>
    <option value="3">level 3</option>
    <option value="4">level 4</option>
    <option value="5">level 5</option>
  </select>
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('courses.index') }}" class="btn btn-default">Cancel</a>
</div>
