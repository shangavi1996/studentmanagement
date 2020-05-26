<!-- Description Field -->
<div class="form-group">
    {!! Form::label('description', 'Description:') !!}
    <p>{{ $classroom->description }}</p>
</div>

<!-- Status Field -->
<div class="form-group">
    {!! Form::label('status', 'Status:') !!}
    <p>{{ $classroom->status }}</p>
</div>

<!-- Classroom Code Field -->
<div class="form-group">
    {!! Form::label('classroom_code', 'Classroom Code:') !!}
    <p>{{ $classroom->classroom_code }}</p>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $classroom->name }}</p>
</div>

