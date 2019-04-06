@extends('admins.admindashboard')
@section('MenuContent')

<table id="myTable" class="table-bordered">
  <tr class="header-table">
  	<th style="width:5%;">SN</th>
    <th style="width:25%;">Time</th>
    <th style="width:25%;">Ground</th>
    <th style="width:25%;">Rate</th>
    <th style="width:10%;">Edit</th>
    <th style="width:10%;">Delete</th>
  </tr>
  <tbody>
  @if($ratetimes->count())
                @foreach($ratetimes as $key=>$ratetime)
                    <tr>
                        <td>{!! $key + 1 !!}</td>
                        <td>{!! str_limit($ratetime->time) !!}</td>
                        <td>{!! str_limit($ratetime->ground_id) !!}</td>
                        <td>{!! str_limit($ratetime->rate) !!}</td>
                                               
                        <td>
                            <a href="{!! url('admins/editRateTime',$ratetime->id) !!}" type="button" class="btn btn-primary "><i class="fa fa-edit" style="font-size:20px"></i>Edit</a>
                            
                        </td>
                        <td>
                        <form action="{!! url('admins/viewRateTime',[$ratetime->id]) !!}" method="POST">
                                @csrf
                                {!! method_field('DELETE') !!}
                                <button type="submit" class="btn btn-danger "><i class="fa fa-trash-o" style="font-size:20px"></i> Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="4"> No record found</td>
                </tr>
            @endif
  </tbody>
</table>

@endsection