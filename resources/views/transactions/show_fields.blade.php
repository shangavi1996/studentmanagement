<!-- Student Id Field -->
<div class="form-group">
    {!! Form::label('student_id', 'Student Id:') !!}
    <p>{{ $transaction->student_id }}</p>
</div>

<!-- Fee Id Field -->
<div class="form-group">
    {!! Form::label('fee_id', 'Fee Id:') !!}
    <p>{{ $transaction->fee_id }}</p>
</div>

<!-- Use Id Field -->
<div class="form-group">
    {!! Form::label('use_id', 'Use Id:') !!}
    <p>{{ $transaction->use_id }}</p>
</div>

<!-- Paid Field -->
<div class="form-group">
    {!! Form::label('paid', 'Paid:') !!}
    <p>{{ $transaction->paid }}</p>
</div>

<!-- Remark Field -->
<div class="form-group">
    {!! Form::label('remark', 'Remark:') !!}
    <p>{{ $transaction->remark }}</p>
</div>

<!-- Description Field -->
<div class="form-group">
    {!! Form::label('description', 'Description:') !!}
    <p>{{ $transaction->description }}</p>
</div>

<!-- Trabsaction Date Field -->
<div class="form-group">
    {!! Form::label('trabsaction_date', 'Trabsaction Date:') !!}
    <p>{{ $transaction->trabsaction_date }}</p>
</div>

