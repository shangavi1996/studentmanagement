@extends('layouts.app')

@section('css')

<style>

@import url(https://fonts.googleapis.com/css?family=Roboto:900,300);

.container123 {
  width: 400px;
  margin-left:400px;
  margin-top:100px;
  background-color: white;
  padding: 0 20px 20px;
  border-radius: 6px;
  -webkit-border-radius: 6px;
  -moz-border-radius: 6px;
  box-shadow: 0 2px 5px rgba(0,0,0,0.075);
  -webkit-box-shadow: 0 2px 5px rgba(0,0,0,0.075);
  -moz-box-shadow: 0 2px 5px rgba(0,0,0,0.075);
  text-align: center;
}
.container123:hover .avatar-flip {
  transform: rotateY(180deg);
  -webkit-transform: rotateY(180deg);
}
.container123:hover .avatar-flip img:first-child {
  opacity: 0;
}
.container123:hover .avatar-flip img:last-child {
  opacity: 1;
}
.avatar-flip {
  border-radius: 100px;
  overflow: hidden;
  height: 150px;
  width: 150px;
  position: relative;
  margin: auto;
  top: -60px;
  transition: all 0.3s ease-in-out;
  -webkit-transition: all 0.3s ease-in-out;
  -moz-transition: all 0.3s ease-in-out;
  box-shadow: 0 0 0 13px #f0f0f0;
  -webkit-box-shadow: 0 0 0 13px #f0f0f0;
  -moz-box-shadow: 0 0 0 13px #f0f0f0;
}
.avatar-flip img {
  position: absolute;
  left: 0;
  top: 0;
  border-radius: 100px;
  transition: all 0.3s ease-in-out;
  -webkit-transition: all 0.3s ease-in-out;
  -moz-transition: all 0.3s ease-in-out;
}
.avatar-flip img:first-child {
  z-index: 1;
}
.avatar-flip img:last-child {
  z-index: 0;
  transform: rotateY(180deg);
  -webkit-transform: rotateY(180deg);
  opacity: 0;
}


</style>
@endsection

@section('content')



<br>
<div class="container123">
  <div class="avatar-flip">
    
    @if($admission->first()->image != null)
    
            <img src="{{url('storage/students/'.$admission->first()->user_id.'/'.$admission->first()->image)}}" height="150" width="150">
            @else
           <img src="{{url('storage/user')}}" height="150" width="150">
            @endif
    </div>
    @include('admissions.show_fields2')
    <a href="{{url('edit_parent',$admission->first()->id)}}" class="btn btn-primary">Edit Profile</a>

  </div>
 
 </div>
@endsection
 