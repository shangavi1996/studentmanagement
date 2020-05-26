<div class="form-group col-sm-6">
    {!! Form::label('firstname', 'Firstname:') !!}
    <input type="text" name="firstname" value="{{ old('firstname',$admission->first()->firstname) }}" class="form-control" >
</div>

<!-- Lastname Field -->
<div class="form-group col-sm-6">
    {!! Form::label('lastname', 'Lastname:') !!}
    <input type="text" name="lastname"value="{{ old('lastname',$admission->first()->lastname) }}" class="form-control">
</div>

<!-- Address Field -->
<div class="form-group col-sm-6">
    {!! Form::label('address', 'Address:') !!}
    <input type="text" name="address" value="{{ old('address',$admission->first()->address) }}" class="form-control" >
</div>


<div class="form-group col-sm-6">
    {!! Form::label('telephone', 'Telephone:') !!}
    <input type="text" name="telephone" value="{{ old('telephone',$admission->first()->telephone) }}" class="form-control" >
</div>

<div class="form-group col-sm-6">
    {!! Form::label('dob', 'Dob:') !!}
    <input type="text" name="dob" value="{{ old('dob',$admission->first()->dob) }}" class="form-control" id="dob" >

</div>

<div class="form-group col-sm-6">
    {!! Form::label('password', 'Password:') !!}
    <input type="password" name="password" value="{{ old('dob',$admission->first()->password) }}" class="form-control" id="dob" >

</div>

<div class="form-group col-sm-6">
    {!! Form::label('image', 'Image:') !!}
    {!! Form::file('image', null, ['class' => 'form-control']) !!}
</div>


@push('scripts')
    <script type="text/javascript">
        $('#dob').datetimepicker({
            format: 'YYYY-MM-DD',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush