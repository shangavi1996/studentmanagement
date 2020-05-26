<!-- Level Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('level_name', 'Level Name:') !!}
    {!! Form::text('level_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status', 'Status:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('status', 0) !!}
        {!! Form::checkbox('status', '1', null) !!}
    </label>
</div>


<!-- Course Id Field -->
<div class="form-group col-sm-6">
  <label for="classroom_id">Select Courses</label>
  <select class="form-control" id="course_id" name="course_id">
  @foreach($courses as $course)
    <option value="{{$course->id}}">{{$course->course_name}}</option>
 @endforeach
  </select>
</div>

<!-- Level Description Field -->
<div class="form-group col-sm-6">
    {!! Form::label('level_description', 'Level Description:') !!}
    {!! Form::text('level_description', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('levels.index') }}" class="btn btn-default">Cancel</a>
</div>
