@extends('admins.admindashboard')
@section('MenuContent')
@if(session()->has('success'))
            <div class="alert alert-success">
                {{{ session()->get('success') }}}
            </div>
        @endif
        
<table id="myTable" class="table-bordered">
  <tr class="header-table">
  	<th style="width:10%;">SN</th>
    <th style="width:20%;">Ground</th>
    <th style="width:40%;">Image</th>
    <th style="width:15%;">Edit</th>
    <th style="width:15%;">Delete</th>
  </tr>
  <tbody>
  @if($grounds->count())
                @foreach($grounds as $key=>$ground)
                    <tr>
                        <td>{!! $key + 1 !!}</td>
                        <td>{!! str_limit($ground->ground,60) !!}</td>
                        <td>
                            @if($ground->image)
                                <img src="{{ $ground->getImagePath() }}" class="img-fluid img-thumbnail"
                                     style="max-width: 150px;" alt="{!! $ground->ground !!}">
                            @else
                                <span class="badge badge-danger">  No Image Found </span>
                            @endif
                        </td>
                                               
                        <td>
                            <a href="{!! url('/editGround',$ground->id) !!}" type="button" class="btn btn-primary btn-sm"><i class="fa fa-edit" style="font-size:20px"></i>Edit</a>
                            
                        </td>
                        <td>
                        <form action="{!! url('/viewGround',[$ground->id]) !!}" method="POST">
                                @csrf
                                {!! method_field('DELETE') !!}
                                <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash-o" style="font-size:20px"></i> Delete</button>
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