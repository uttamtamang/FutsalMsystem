@extends('clients.clientdashboard')
@section('MenuContent')
<style type="text/css">
  .mybookTable td
  {
    background-color: white;
  }
    .mybookTable th
  {
    background-color:grey;
  }
 }
	</style>
  <div class="container-fluid">
  <h2 style="color:Grey;">My Bookings</h2>
    
  <br>
  <table class="table table-bordered mybookTable ">
    <thead>
      <tr> 
        <th style="width:10%";>SN</th>
        <th style="width:10%;">Ground</th>
        <th style="width:20%;">Date</th>
        <th style="width:20%;">Time</th>
        <th style="width:20%;">Rate</th>
        <th style="width:20%;">Action</th>
      </tr>
    </thead>
    <tbody id="myTable">
    @if($books->count())
    @foreach($books as $key=>$book)
      <tr>
        <td>{!! $key + 1 !!}</td>
        <td>{{$book->ground_id}}</td>
        <td>{{$book->date}}</td>
        <td>{{$book->time}}</td>
        <td>{{$book->rate}}</td>
        <td ><form action="/viewClientBookings/{{$book->id}}" id="idUser" method="post" >
          {{csrf_field()}}
        {{method_field('DELETE')}}
        <button  type="submit" class="btn btn-danger" id="confirm"><i class="fa fa-trash-o" style="font-size:20px"></i>Cancel Booking</button>
        </form></td>
      </tr>
    @endforeach
      @else
                <tr>
                    <td colspan="6"> No record found</td>
                </tr>
            @endif
    </tbody>
  </table>
  
</div>
<script type="text/javascript">
  
     $('#idUser').submit(function() {
   return confirm("Are you Sure u Want to delete this Booking?");
  });
</script>


@endsection