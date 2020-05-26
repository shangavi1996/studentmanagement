<!-- Firstname Field -->
<div class="form-group">
    {!! Form::label('firstname', 'Firstname:') !!}
    <p>{{ $teacher->firstname }}</p>
</div>

<!-- Lastname Field -->
<div class="form-group">
    {!! Form::label('lastname', 'Lastname:') !!}
    <p>{{ $teacher->lastname }}</p>
</div>

<!-- Address Field -->
<div class="form-group">
    {!! Form::label('address', 'Address:') !!}
    <p>{{ $teacher->address }}</p>
</div>

<!-- Gender Field -->
<div class="form-group">
    {!! Form::label('gender', 'Gender:') !!}
    <p>{{ $teacher->gender }}</p>
</div>

<!-- Telephone Field -->
<div class="form-group">
    {!! Form::label('telephone', 'Telephone:') !!}
    <p>{{ $teacher->telephone }}</p>
</div>

<!-- Email Field -->
<div class="form-group">
    {!! Form::label('email', 'Email:') !!}
    <p>{{ $teacher->email }}</p>
</div>

<!-- Image Field -->
<div class="form-group">
    {!! Form::label('image', 'Image:') !!}
    @if($teacher->img_filename != null)
            <p><img src="{{url('storage/teachers/'.$teacher->user_id.'/'.$teacher->img_filename)}}" style="width: 50px;height:50px;"></p>
            @else
            <p><img src="{{url('storage/user')}}" style="width: 50px;height:50px;"></p>
            @endif
</div>

<!-- Dob Field -->
<div class="form-group">
    {!! Form::label('dob', 'Dob:') !!}
    <p>{{ $teacher->dob }}</p>
</div>

<!-- User Id Field -->

<!-- Class Id Field -->


<!-- Status Field -->
<div class="form-group">
    {!! Form::label('status', 'Status:') !!}
    @if($teacher->status==1)
            <p><button class="btn-success">Active</button></p>
            @else
            <p><button class="btn-danger">NotActive</button></p>
            @endif
</div>

<!-- Date Registered Field -->
<div class="form-group">
    {!! Form::label('date_registered', 'Date Registered:') !!}
    <p>{{ $teacher->date_registered }}</p>
</div>

