
@extends('admins.masterAdmin')
@section('sidebar')
<nav class="main-nav">
 	<ul class="main-nav-ul">
 		<li><a href="#" style="text-align:center;">Admin Dashboard</a></li>
 		<li class="has-sub "><a href="#"><i class="fa fa-area-chart" style="font-size:18px"></i> Manage Ground<span class="caret sub-arrow"></span></a>
 			<ul >
 				<li><a href="/addGround">Add Ground</a></li>
 				<li><a href="/viewGround">View Ground</a></li>
 			</ul>
 		</li>
    <li class="has-sub"><a href="#"><i class="fa fa-rupee" style="font-size:18px"></i> Manage Rate_Time<span class="caret sub-arrow"></span></a>
      <ul >
        <li><a href="/addRateTime">Add RateTime</a></li>
        <li ><a href="/viewRateTime">View RateTime</a></li>
      </ul>
    </li>
 		<li  class=""><a href="/Users"><i class="fa fa-user" style="font-size:18px;color:white;"></i> View Users</a></li>
 		<li  class=""><a href="/viewBooking"><i class="fa fa-soccer-ball-o" style="font-size:15px"></i> Bookings Details</a></li>
 		<li  class=""><a href="/bookNowAdmin"><i class="fa fa-soccer-ball-o" style="font-size:15px"></i> Book Field Admin</a></li>
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


 <script type="text/javascript">
 $(document).ready(function(e)
 {
 $('.has-sub').click(function(){

 $("ul ul").slideToggle(500);
 });



 });
 

 </script>
@endsection

