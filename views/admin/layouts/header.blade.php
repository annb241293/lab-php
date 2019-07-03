
<header class="main-header">
  <!-- Logo -->
  <a href="{{getUrl('/')}}" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><b>A</b>LT</span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><b>Admin</b>LTE</span>
  </a>
  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top">


    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        
        <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <img src="https://images-na.ssl-images-amazon.com/images/I/518bFMriYqL._SX425_.jpg" class="user-image" alt="User Image">
            <span class="hidden-xs">{{$_SESSION['auth']}}</span>
          </a>
          <ul class="dropdown-menu">
            <!-- User image -->
            <li class="user-header">
              <img src="https://images-na.ssl-images-amazon.com/images/I/518bFMriYqL._SX425_.jpg" class="img-circle" alt="User Image">

              <p>
                {{$_SESSION['auth']}}
              </p>
            </li>
            
            <li class="user-footer">
              <div class="pull-left">
                <a href="#" class="btn btn-default btn-flat">Profile</a>
              </div>
              <div class="pull-right">
                <a href="{{getUrl('log-out')}}" class="btn btn-default btn-flat">Sign out</a>
              </div>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>
</header>