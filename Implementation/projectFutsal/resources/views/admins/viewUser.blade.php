@extends('admins.admindashBoard')
@section('MenuContent')
<div class="row" >
<div class="col-md-4">
<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search with names.."
style="background: #f5f7f5;; color: rgb(61, 38, 38);">
</div>
</div>

<table id="myTable" class="table-bordered">
  <tr class="header-table">
  	<th style="width:10%;">SN</th>
    <th style="width:20%;">User Name</th>
    <th style="width:20%;">Adddress</th>
    <th style="width:15%;">Phone Number</th>
    <th style="width:20%;">Email Address</th>
    <th style="width:15%;">Joined At</th>
  </tr>
  <tbody>
  @if($users->count())
                @foreach($users as $key=>$user)
                    <tr>
                        <td>{!! $key + 1 !!}</td>
                        <td>{!! str_limit($user->name,60) !!}</td>
                        <td>{!! str_limit($user->address,60) !!}</td>
                        <td>{!! str_limit($user->phone,60) !!}</td>
                        <td>{!! str_limit($user->email,60) !!}</td>
                        <td>{!! str_limit($user->created_at,60) !!}</td>
                        
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="4"> No record found</td>
                </tr>
            @endif

  </tbody>
</table>
<script>
function myFunction() {
  // Declare variables 
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    } 
  }
}
</script>

@endsection