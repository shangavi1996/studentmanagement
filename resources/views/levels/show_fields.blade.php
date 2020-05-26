<!-- Level Name Field -->
<div class="form-group">
    {!! Form::label('level_name', 'Level Name:') !!}
    <p>{{ $level->level_name }}</p>
</div>

<!-- Status Field -->
<div class="form-group">
    {!! Form::label('status', 'Status:') !!}
    <p>{{ $level->status }}</p>
</div>

<!-- Course Id Field -->
<div class="form-group">
    {!! Form::label('course_id', 'Course Id:') !!}
    <p>{{ $level->course_id }}</p>
</div>

<!-- Level Description Field -->
<div class="form-group">
    {!! Form::label('level_description', 'Level Description:') !!}
    <p>{{ $level->level_description }}</p>
</div>

