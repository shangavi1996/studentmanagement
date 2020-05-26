

<li class="treeview">
<a href="#">
<i class="fa fa-dashboard"></i><span>General</span>
<span class="pull-right-container">
<i class="fa fa-angle-left pull-right>"></i>
</span>


<ul class="treeview-menu">


<li class="{{ Request::is('courses*') ? 'active' : '' }}">
    <a href="{{ route('courses.index') }}"><i class="fa fa-edit"></i><span>Courses</span></a>
</li>
</ul></li>








<li class="treeview">
<a href="#">
<i class="fa fa-dashboard"></i><span>Others</span>
<span class="pull-right-container">
<i class="fa fa-angle-left pull-right>"></i>
</span>
<ul class="treeview-menu">


<li class="{{ Request::is('admissions*') ? 'active' : '' }}">
    <a href="{{ route('admissions.index') }}"><i class="fa fa-edit"></i><span>Admissions</span></a>
</li>




<li class="{{ Request::is('teachers*') ? 'active' : '' }}">
    <a href="{{ url('teacher') }}"><i class="fa fa-edit"></i><span>Teachers</span></a>
</li>


</ul>

