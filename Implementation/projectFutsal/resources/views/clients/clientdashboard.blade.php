
@extends('clients.masterClient')
@section('sidebar')
<nav class="main-nav">
 	<ul class="main-nav-ul">
 		<li><a href="/clientdash" style="text-align:center;">Client Dashboard</a></li>
		<li  class=""><a href="{{url('/editprofile',Auth::user()->id)}}"><i class="fa fa-user" style="font-size:18px;color:white;"></i>
		 Edit Profile</a></li>
 		<li  class=""><a href="/viewClientBookings"><i class="fa fa-soccer-ball-o" style="font-size:15px"></i> Bookings Details</a></li>
 		<li  class=""><a href="/bookNowClient"><i class="fa fa-soccer-ball-o" style="font-size:15px"></i> Book Now</a></li>
 		<li>
		 <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
													<i class="fa fa-sign-out" style="font-size:18px;color:white;"></i>
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
		</li>

 	</ul>
 </nav>
@endsection

