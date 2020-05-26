<!-- Faculty Name Field -->
<div class="form-group">
    {!! Form::label('faculty_name', 'Faculty Name:') !!}
    <p>{{ $faculty->faculty_name }}</p>
</div>

<!-- Faculty Code Field -->
<div class="form-group">
    {!! Form::label('faculty_code', 'Faculty Code:') !!}
    <p>{{ $faculty->faculty_code }}</p>
</div>

<!-- Faculty Description Field -->
<div class="form-group">
    {!! Form::label('faculty_description', 'Faculty Description:') !!}
    <p>{{ $faculty->faculty_description }}</p>
</div>

<!-- Status Field -->
<div class="form-group">
    {!! Form::label('status', 'Status:') !!}
    <p>{{ $faculty->status }}</p>
</div>

