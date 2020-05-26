<!-- Batch Field -->
<div class="form-group">
    {!! Form::label('batch', 'Batch:') !!}
    <p>{{ $batch->batch }}</p>
    {!! Form::label('created_at', 'created_at:') !!}
    <p>{{ $batch->created_at }}</p>
    {!! Form::label('updated_at', 'updated_at:') !!}
    <p>{{ $batch->updated_at }}</p>
</div>

