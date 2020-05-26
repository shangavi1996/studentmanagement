<!-- Firstname Field -->
<div class="form-group">
    {!! Form::label('firstname', 'Firstname:') !!}
    <p>{{ $admission->firstname }}</p>
</div>

<!-- Lastname Field -->
<div class="form-group">
    {!! Form::label('lastname', 'Lastname:') !!}
    <p>{{ $admission->lastname }}</p>
</div>

<!-- Address Field -->
<div class="form-group">
    {!! Form::label('address', 'Address:') !!}
    <p>{{ $admission->address }}</p>
</div>

<!-- Gender Field -->
<div class="form-group">
    {!! Form::label('gender', 'Gender:') !!}
    <p>{{ $admission->gender }}</p>
</div>

<!-- Telephone Field -->
<div class="form-group">
    {!! Form::label('telephone', 'Telephone:') !!}
    <p>{{ $admission->telephone }}</p>
</div>

<!-- Email Field -->
<div class="form-group">
    {!! Form::label('email', 'Email:') !!}
    <p>{{ $admission->email }}</p>
</div>

<!-- Image Field -->
<div class="form-group">
    {!! Form::label('image', 'Image:') !!}
    @if($admission->image != null)
            <p><img src="{{url('storage/students/'.$admission->user_id.'/'.$admission->image)}}" style="width: 50px;height:50px;"></p>
            @else
            <p><img src="{{url('storage/user')}}" style="width: 50px;height:50px;"></p>
            @endif
</div>

<!-- Dob Field -->
<div class="form-group">
    {!! Form::label('dob', 'Dob:') !!}
    <p>{{ $admission->dob }}</p>
</div>

<!-- User Id Field -->
<div class="form-group">
    {!! Form::label('user_id', 'User Id:') !!}
    <p>{{ $admission->user_id }}</p>
</div>



<!-- Status Field -->
<div class="form-group">
    {!! Form::label('status', 'Status:') !!}
    @if($admission->status==1)
            <p><button class="btn-success">Active</button></p>
            @else
            <p><button class="btn-danger">NotActive</button></p>
            @endif
</div>

<!-- Date Registered Field -->
<div class="form-group">
    {!! Form::label('date_registered', 'Date Registered:') !!}
    <p>{{ $admission->date_registered }}</p>
</div>

