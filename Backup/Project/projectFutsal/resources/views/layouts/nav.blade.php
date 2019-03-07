<nav class="navbar navbar-inverse " >
  <div class="container-fluid">
    <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> 
      </button>
      <a class="navbar-brand" href="{{ url('/') }}">JANATA FUTSAL</a>
    </div>
     <div class="collapse navbar-collapse navbar-right" id="myNavbar">
    <ul class="nav navbar-nav navbar-right">
         @guest
         <li><a href="{{ route('login') }}"><span ><i class="fa fa-futbol-o" style="font-size:15px"></i></span> Login</a></li>
         @if (Route::has('register'))
      <li><a href="{{ route('register') }}"><span ><i class="fa fa-user" style="font-size:17px"></i></span> Register</a></li>

      @endif
      @else
         <li class="u-email">
          <span > @yield('user')</span>
         </li>
        
      @endguest
    </ul>
  </div>
</div>
</nav> 
