<!-- Navbar -->



<nav class="main-header navbar navbar-expand navbar-white navbar-light">

<!-- SEARCH FORM -->
<ul class="navbar-nav">
    <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
        <a href="{{route('dashboard')}}" class="nav-link">Dashboard</a>
    </li>
</ul>

<!-- Right navbar links -->
<ul class="navbar-nav ml-auto">
  <!-- Notifications Dropdown Menu -->

  <li class="nav-item dropdown user-menu">
    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
      <img src="{{asset('images/avatar5.png')}}" class="user-image img-circle elevation-2" alt="User Image">
      <span class="d-none d-md-inline">{{$user->name}}</span>
    </a>
    <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
      <!-- User image -->
      <li class="user-header bg-primary">
        <img src="{{asset('images/avatar5.png')}}" class="img-circle elevation-2" alt="User Image">
        @if(Auth::user()->role === \App\Models\User::ROLE_ADMIN)
        <p>
        Admin

        </p>
      @else
        <p>
          User
        </p>
      @endif
      </li>
      <!-- Menu Body -->

      <!-- Menu Footer-->
      <li class="user-footer">
        <a href="#" class="btn btn-default btn-flat">Profile</a>
        <a href="{{ route('logout') }}" class="btn btn-default btn-flat float-right">Sign out</a>
      </li>
    </ul>
  </li>
  <ul class="navbar-nav ml-auto">
      <li class="nav-item">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
              <i class="fas fa-expand-arrows-alt"></i>
          </a>
      </li>
      <li class="nav-item">
          <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
              <i class="fas fa-th-large"></i>
          </a>
      </li>
  </ul>
</ul>
</nav>
<!-- /.navbar -->
