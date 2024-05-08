  <!-- Main Sidebar Container -->
  <aside class="main-sidebar @if(Auth::user()->mode==1) sidebar-dark-primary  @else sidebar-light-info  @endif elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('dashboard')}}" class="brand-link">
       <div class="row">
        <div class="col-8">
          <img src="{{asset('tema')}}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
          <span class="brand-text font-weight-light">My Panel</span>
         
        </div>
        <div class="col-4 text-right">
          <input  class="switchmode" data-style="ios"   data-size="xs" type="checkbox"
          mode="{{Auth::user()->mode}}"
          data-on="<i class='bi bi-moon' aria-hidden='true'></i>"
          data-onstyle="dark"
          data-off="<i class='bi bi-brightness-high' aria-hidden='true'></i>"
          data-offstyle="light" @if (Auth::user()->mode == 1)
          checked
         @endif
            data-toggle="toggle">
        </div>
       </div>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('tema')}}/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{Auth::user()->name}}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Menüde Ara" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
    
          <li class="nav-item">
            <a href="{{route('dashboard')}}" class="nav-link @if(Request::segment(1)=='dashboard') active @endif">
              <i class="nav-icon fas fa-home"></i>
              <p>
               Anasayfa
                {{-- <span class="right badge badge-danger">New</span> --}}
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('blog')}}" class="nav-link @if(Request::segment(1)=='blog') active @endif">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Blog Yazıları
                {{-- <span class="right badge badge-danger">New</span> --}}
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('blogadd')}}" class="nav-link @if(Request::segment(1)=='blogadd') active @endif">
              <i class="nav-icon fas fa-plus"></i>
              <p>
                Blog Ekle
                {{-- <span class="right badge badge-danger">New</span> --}}
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('logout')}}" class="nav-link">
              <i class="nav-icon fas fa-door-open"></i>
              <p>
              Oturumu Kapat
              
              </p>
            </a>
          </li>
      
      
        
      
          {{-- <li class="nav-header">EXAMPLES</li> --}}
          
     
        
       
        
        
          
       
         
         
         
      
     
        
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
