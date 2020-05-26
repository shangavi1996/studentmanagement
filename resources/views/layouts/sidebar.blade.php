<aside class="main-sidebar" id="sidebar-wrapper">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        @if(Auth::user()->role == 2)   
        <div class="user-panel">
      
            <div class="pull-left image">
        <img src="{{url('storage/teachers/'.Auth::user()->id.'/'.$teacher->first()->img_filename)}}" style="width: 50px;height:50px;" class="img-circle" alt="User Image"/>
     
            </div>
    
            <div class="pull-left info">
                @if (Auth::guest())
                <p></p>
                @else
                    <p>{{ Auth::user()->name}}</p>
                @endif
                <!-- Status -->
                <i class="fa fa-circle text-success"></i> Online
            </div>
        </div>
        @endif

        @if(Auth::user()->role == 3)   
        <div class="user-panel">
      
            <div class="pull-left image">
            @if(Auth::user()->role == 3)
                @if($admission->first->image!=null)
                <img src="{{url('storage/students/'.Auth::user()->id.'/'.$admission->first()->image)}}" style="width: 50px;height:50px;" class="img-circle" alt="User Image"/>
                @else
                <img src="{{url('storage/user')}}" style="width: 50px;height:50px;" class="img-circle" alt="User Image"/>
                @endif
           @endif

     
            </div>
    
            <div class="pull-left info">
                @if (Auth::guest())
                <p></p>
                @else
                    <p>{{ Auth::user()->name}}</p>
                @endif
                <!-- Status -->
                <i class="fa fa-circle text-success"></i> Online
            </div>
        </div>
        @endif

  <!-- admin -->
        @if(Auth::user()->role == 1)   
        <div class="user-panel">
      
            <div class="pull-left image">
            <img src="{{url('storage/user')}}"  style="width: 50px;height:50px;" class="img-circle" alt="User Image"/>
     
            </div>
    
            <div class="pull-left info">
                @if (Auth::guest())
                <p></p>
                @else
                    <p>{{ Auth::user()->name}}</p>
                @endif
                <!-- Status -->
                <i class="fa fa-circle text-success"></i> Online
            </div>
        </div>
        @endif
        <!-- search form (Optional) -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
          <span class="input-group-btn">
            <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
            </button>
          </span>
            </div>
        </form>
        <!-- Sidebar Menu -->

        <ul class="sidebar-menu" data-widget="tree">
            @include('layouts.menu')
        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>