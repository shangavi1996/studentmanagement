<!-- Firstname Field -->

<div class="form-group">


<div class="form-group">
    {!! Form::label('firstname', 'Firstname:') !!}
   {{ $admission->first()->firstname }}
</div>

<!-- Lastname Field -->
<div class="form-group">
    {!! Form::label('lastname', 'Lastname:') !!}
  {{ $admission->first()->lastname }}
</div>

<!-- Address Field -->
<div class="form-group">
    {!! Form::label('address', 'Address:') !!}
    {{ $admission->first()->address }}
</div>

<!-- Gender Field -->

<!-- Telephone Field -->
<div class="form-group">
    {!! Form::label('telephone', 'Telephone:') !!}
    {{ $admission->first()->telephone }}
</div>

<!-- Email Field -->
<!-- Image Field -->

<!-- Dob Field -->
<div class="form-group">
    {!! Form::label('dob', 'Dob:') !!}
    {{ $admission->first()->dob }}
</div>

</div>

<!-- User Id Field -->


<!-- Class Id Field -->

<!-- Status Field -->


