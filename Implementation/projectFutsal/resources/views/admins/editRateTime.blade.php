@extends('admins.admindashboard')
@section('MenuContent')

<div class="row">
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
			
			<div class="col-lg-8 col-md-offset-2">
				<div class="panel panel-info">
					<div class="panel-heading">
						<h3 class="panel-title">Edit Time and Rate for  "#Ground - {!! $ratetime->ground_id !!}"   </h3>			
					</div>
						<div class="panel-body">
						<form action="{!! url('viewRateTime',$ratetime->id) !!}" method="post">
							{{csrf_field()}}
							{!! method_field('put') !!}
							<div class="form-group {{$errors->has('time') ? 'has-error' : ''}}">
								<div class="input-group">
									<span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
									<input type="text" name="time" class="form-control" value="{!! $ratetime->time !!}">
								</div>
								<div class="col-md-offset-1 ">
								@if ($errors->has('time'))
                                    <span class="help-block ">
                                        <p class="text-danger">{{ $errors->first('time') }}</p>
                                    </span>
                                    @endif
                                </div>
							</div>
							
							<div class="form-group {{$errors->has('rate') ? 'has-error' : ''}}">
								<div class="input-group">
									<span class="input-group-addon"><i class="	fa fa-rupee"></i></span>
									<input type="text" name="rate" class="form-control" value="{!! $ratetime->rate !!}">
								</div>
								<div class="col-md-offset-1 ">
								@if ($errors->has('rate'))
                                    <span class="help-block ">
                                        <p class="text-danger">{{ $errors->first('rate') }}</p>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            
							
							<div class="form-group col-md-8 col-md-offset-2">
								
									<input type="submit" value="Update" class="btn btn-info btn-block">
								
							</div>
						</form>
						</div>
							
					</div>
				</div>
			
		</div>




@endsection