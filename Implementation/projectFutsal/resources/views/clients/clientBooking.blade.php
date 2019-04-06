
@extends('clients.clientdashboard')
@section('MenuContent')
<style type="text/css">
.btn
  {
    height:70px;
    margin:5px;
  }
  .btnTime
  {
    padding-top:20px;
  }
</style>
<div class="container-fluid"  id="availTime">
  <div class="panel panel-info" >
  <div class="panel-heading"><h3>Available Time</h3></div>
  <div class="panel-body">
  	 <div class="row">
   @php
   
          $tt = date("Y-m-d",time());//current date
          $ground_id=($_REQUEST['ground']);
              $choice_date = ($_REQUEST['datecal'])? $_REQUEST["datecal"]:false;//date that came from the datepicker
              $need_sorting = ($tt==$choice_date)? true:false;
                foreach($availableTime as $time)
                {
                  $printer = '<div class="col-md-4"><div class="btn btn-primary btn-block btnTime"  data-toggle="modal" data-target="#bookModal" value="'.$time->rate.'">'.$time->time.'</div></div>';
                    foreach ($booking as $book )
                  {
                  if ($time->time==$book->time && $time->ground_id==$book->ground_id) {
                     $printer = '<div class="col-md-4"><div class="btn btn-danger btn-block btnTime" disabled  value="'.$time->rate.'">'.$time->time.'</div></div>';
                  }
                }
                  echo $printer;
                }

   @endphp
   <!-- if($need_sorting){
                    $hour= date("H",time());

                    if ($time->label==$booking->time) {
                     $printer = '<div class="col-md-4"><div class="btn btn-danger btn-block btnTime" disabled data-toggle="modal" data-target="#bookModal" value="'.$time->price.'">'.$time->label.'</div></div>';
                  }

                    if($hour>($time->maxTime)-2){
                      $printer = false;
                    }
                  } -->

  </div>
  </div>

 <div class="modal fade" role="dialog" id="bookModal" data-backdrop="static">
 	<div class="modal-dialog">
 		<div class="modal-content">
 			<div class="modal-header">
 				<button type="button" class="close" data-dismiss="modal">&times;</button>
 				<h3 class="modal-title">Client Booking Manual</h3>

 			</div>
 			<div class="modal-body">
				<div class="form">
 				<form class="form-horizontal" action="/bookNowClient" method="post">
          {{csrf_field()}}
  				<div class="form-group">
    				<label class="control-label col-sm-3" >Date:</label>
  				  	<div class="col-sm-9">
   				   	<input type="text" name="popupDate" class="form-control" id="popupDate" value={{$_REQUEST["datecal"]}} readonly="readonly">
 				    </div>
			  	</div>
			  	<div class="form-group">
    				<label class="control-label col-sm-3" >Time:</label>
  				  	<div class="col-sm-9">
   				   	<input type="text" name="time" class="form-control" id="time" readonly="readonly">
 				    </div>
			  	</div>
			    				<div class="form-group">
    				<label class="control-label col-sm-3" >Price:</label>
    				<div class="col-sm-9">
     			    <input type="text" name="price"class="form-control" id="price" readonly="readonly">
    			</div>
  				</div>
                  <div class="form-group">
    				<label class="control-label col-sm-3" >Mobile no:</label>
    				<div class="col-sm-9"> 
     			    <input type="tel" name="contact"  required class="form-control" id="phone" placeholder="9800000000"
                    pattern="[0-9]{3}[0-9]{3}[0-9]{4}" >
    			</div>
  				</div>
         
  				<div class="form-group">
            <input type="hidden" name="user" value="{{ Auth::user()->id }}">
            <input type="hidden" name="user_for" value="{{ Auth::user()->name }}">
            <input type="hidden" name="ground" value="{{$_REQUEST["ground"]}}">
          </div>
  				<div class="form-group ">
   				<div class=" col-md-offset-3 col-md-4">
    	  		<input type="submit" class="btn btn-success btn-block" id="book-btn"style="height: 50px" value="Book Now">
    			</div>
  				</div>
			</form>
 				</div>
 			</div>

 		</div>
 	</div>
 </div>


</div>

<script type="text/javascript">


$(document).ready(function(){
           $("#calDate").val('{{$_REQUEST["datecal"]}}');
    });


		$(document).ready(function(){
    $("#btncal").click(function(){
       $("#popupDate").val($("#calDate").val());
    });
});

    $(document).ready(function(){
    $(".btnTime").click(function(){
      $("#time").val($(this).text());
    });
});
        $(document).ready(function(){
    $(".btnTime").click(function(){
     $("#price").val($(this).attr("value"));
    });
});
$(document).ready(function(){
    $("#book-btn").click(function(){
     $('#bookModal').modal('show');

    });
});



</script>
@endsection