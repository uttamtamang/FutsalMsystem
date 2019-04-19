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
						<h3 class="panel-title">Add New Time and Rate </h3>			
					</div>
						<div class="panel-body">
						<form action="/viewRateTime" method="post">
							{{csrf_field()}}
							<div class="form-group {{$errors->has('time') ? 'has-error' : ''}}">
								<div class="input-group">
									<span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
									<input type="text" name="time" class="form-control" placeholder="Please Enter Time Here"
									 value="{{old('time')}}">
								</div>
								<div class="col-md-offset-1 ">
								@if ($errors->has('time'))
                                    <span class="help-block ">
                                        <p class="text-danger">{{ $errors->first('time') }}</p>
                                    </span>
                                    @endif
                                </div>
							</div>
							<div class="form-group {{$errors->has('ground') ? 'has-error' : ''}}">
							
								<div class="input-group" style="width:100%">
								<span class="input-group-addon"><i class="fa fa-area-chart"></i></span>
									<select	class="form-control" name="grounds" id="inputGroupSelect01">
										<option value="">Please Select The Ground</option>
										@if($ground->count())
										@foreach($ground as $key=>$grounds)    
                                            
                                            <option value="{{$grounds->id }}">{{ $grounds->ground }}</option>
                                            @endforeach
										@endif
									</select>
								</div>
								<div class="col-md-offset-1 ">
								@if ($errors->has('ground'))
                                    <span class="help-block ">
                                        <p class="text-danger">{{ $errors->first('ground') }}</p>
                                    </span>
                                    @endif
                                </div>
							</div>
							<div class="form-group {{$errors->has('rate') ? 'has-error' : ''}}">
								<div class="input-group">
									<span class="input-group-addon"><i class="	fa fa-rupee"></i></span>
									<input type="text" name="rate" class="form-control" placeholder="Please Rate Here" 
									value="{{old('rate')}}">
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
								
									<input type="submit" value="Add" class="btn btn-info btn-block">
								
							</div>
						</form>
						</div>
							
					</div>
				</div>
		</div>
@endsection