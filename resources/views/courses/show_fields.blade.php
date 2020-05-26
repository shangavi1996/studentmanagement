<!-- Course Name Field -->
<div class="form-group">
    {!! Form::label('course_name', 'Course Name:') !!}
    <p>{{ $course->course_name }}</p>
</div>

<!-- Course Code Field -->
<div class="form-group">
    {!! Form::label('course_code', 'Course Code:') !!}
    <p>{{ $course->course_code }}</p>
</div>

<!-- Course Description Field -->
<div class="form-group">
    {!! Form::label('course_description', 'Course Description:') !!}
    <p>{{ $course->course_description }}</p>
</div>

<!-- Status Field -->
<div class="form-group">
    {!! Form::label('status', 'Status:') !!}

    @if($course->status==1)
    <p><button class="btn-success">Avaiable</button></p>
    @else
    <p><button class="btn-danger">NotAvailable</button></p>
    @endif
</div>

