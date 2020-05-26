<!-- Class Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('class_name', 'Class Name:') !!}
    {!! Form::text('class_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Class Code Field -->
<div class="form-group col-sm-6">
    {!! Form::label('class_code', 'Class Code:') !!}
    {!! Form::text('class_code', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('classes.index') }}" class="btn btn-default">Cancel</a>
</div>
