@extends('admins.admindashboard')
@section('MenuContent')
<style type="text/css">
  table{
    margin-top:5px;
  }
 }
	</style>
   @if(session()->has('success'))
            <div class="alert alert-success">
                {{{ session()->get('success') }}}
            </div>
        @endif
        
  <div class="container-fluid">
    <div class="row ">
            <form action="/viewAdminBookings">
            <div class="col-md-4" style="">
            <div id="datepicker" class="input-group date "data-date-format="yyyy-mm-dd" >
            <span class="input-group-addon date"><i class="fa fa-calendar"></i></span>
            <input type="text" name="datecal" id="calDate" class="form-control" 
            style="border-radius: 0px;" value="{{$date}}" >
            </div>
            </div>
            <div class=" col-md-2" style="padding:0px ">
            <button type="submit"  id="btncal" class="btn btn-success btn-block" >
            <i class="fa fa-search-minus "></i> Show Data</button>
            </div>
            </form>
          </div>

<table id="myTable" class="table-bordered" style="text-allign:centre">
  <tr class="header-table">
  	<th style="width:5%;">SN</th>
    <th style="width:10%;">Ground</th>
    <th style="width:15%;">Date</th>
    <th style="width:15%;">Time</th>
    <th style="width:10%;">For</th>
    <th style="width:15%;">Phone</th>
    <th style="width:10%;">Rate</th>
    <th style="width:5%;">Status</th>
    <th style="width:15%;">Action</th>
  </tr>
  <tbody>
  
  @if($books->count())
  @foreach($books as $key=>$book)
    <tr>
      <td>{!! $key + 1 !!}</td>
      <td>{{$book->ground_id}}</td>
      <td>{{$book->date}}</td>
      <td>{{$book->time}}</td>
      <td>{{$book->user_for}}</td>
      <td>{{$book->phone}}</td>
      <td>{{$book->rate}}</td>
      @if($book->status==1)
      <td>
      <form action="/viewAdminBookings/{{$book->id}}" method="post" >
          {{csrf_field()}}
        {{method_field('put')}}
        <button  type="submit" class="btn btn-success"id="confirm"> Paid</button>
        </form>
        </td>
      @else
      <td>
      <form action="/viewAdminBookings/{{$book->id}}" method="post" >
          {{csrf_field()}}
        {{method_field('put')}}
        <button  type="submit" class="btn btn-danger"id="confirm"> Booked</button>
        </form>
        </td>
      @endif
      <td>
      
      <form action="/viewAdminBookings/{{$book->id}}" id="idUser" method="post" >
          {{csrf_field()}}
        {{method_field('DELETE')}}
        <button  type="submit" class="btn btn-danger"id="confirm" @if($book->date<=date('Y-m-d') AND $book->status==1) 
         disabled @endif ><i class="fa fa-trash-o" style="font-size:20px"></i> Cancel Booking</button>
        </form>
        </td>
    </tr>
    @endforeach
    <tr style="background: #fff"><th colspan="6" >Total Collection :</th><th colspan="3">{{$total}}</th></tr></tr>
            @else
                <tr>
                    <td colspan="4"> No record found</td>
                </tr>
            @endif
  </tbody>
</table>

<script type="text/javascript" src="{{ URL::asset('js/datepicker.js')}}"></script>

<script type="text/javascript">
   $('#idUser').submit(function() {
   return confirm("Are you Sure u Want to delete this Booking?");
  });

  $(function(){
    $("#datepicker").datepicker({
      autoclose:true,
      todayHighlight:true,
      showAnim:'drop',
      orientation: "bottom left",
        showAnim: "drop"
    });

  });


</script>

@endsection