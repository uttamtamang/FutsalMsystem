@extends('admins.admindashBoard')
@section('MenuContent')

@if(session()->has('success'))
            <div class="alert-success">
                <h1> {!! session()->get('success') !!}</h1>
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="list-unstyled">
                    @foreach($errors->all() as $error)
                        <li> {{ $error  }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
<div class="row">

			<div class="col-lg-8 col-md-offset-2">
				<div class="panel panel-info">
					<div class="panel-heading">
						<h3 class="panel-title">Update Ground</h3>			
					</div>
						<div class="panel-body">
						<form action="{!! url('viewGround',$ground->id) !!}" method="post" enctype="multipart/form-data">
							{{csrf_field()}}
                            {!! method_field('put') !!}
							<div class="form-group {{$errors->has('ground') ? 'has-error' : ''}}">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-area-chart"></i></span>
									<input type="text" name="ground" class="form-control" value="{!! $ground->ground !!}">
								</div>
								
							</div>
							<div class="form-group">
                            <input type="file" class="form-control" accept="image/*" name="image">
													
                            </div>
                            @if($ground->image)
                            <div class="form-group">
                            <img src="{!! asset('uploads/grounds/'.$ground->image) !!}" class="img-fluid img-thumbnail"
                                 style="max-width: 100%">
                            </div>

                            @endif
							<div class="form-group col-md-8 col-md-offset-2">
								
									<input type="submit" value="Update" class="btn btn-info btn-block">
								
							</div>
						</form>
						</div>
							
					</div>
				</div>
			
		</div>




@endsection