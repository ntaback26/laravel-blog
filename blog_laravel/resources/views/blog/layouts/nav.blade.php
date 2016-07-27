<!-- Nav -->
<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <a class="navbar-brand" href="{{route('blog.page.index')}}">Blog</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse">
      <ul class="nav navbar-nav navbar-right">
        @if (Auth::check())
          <li>
            <a href="#">
              <i class="fa fa-user"></i> {{ Auth::user()->name }}</i> 
            </a>
          </li>
          @if (Auth::user()->role = 'admin') 
            <li>
              <a href="{{route('admin.dashboard')}}">
                <i class="fa fa-lock"></i> Admin Control Panel</i> 
              </a>
            </li>
          @endif
          <li>
            <a href="{{route('logout')}}">
              <i class="fa fa-sign-out"></i> Log out
            </a>
          </li>
        @else
          <li>
            <a href="#" data-toggle="modal" data-target="#signinModal">
              <i class="fa fa-sign-in"></i> Sign in
            </a>
          </li>
          <li>
            <a href="#" data-toggle="modal" data-target="#signupModal">
              <i class="fa fa-user-plus"></i> Sign up
            </a>
          </li>
        @endif
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>