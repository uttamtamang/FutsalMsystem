@extends('admins.admindashBoard')
@section('MenuContent')

<div class="row">
			
			<div class="col-lg-8 col-md-offset-2">
				<div class="panel panel-info">
					<div class="panel-heading">
						<h3 class="panel-title">Add New Time and Rate</h3>			
					</div>
						<div class="panel-body">
						<form action="/addRateTime" method="post">
							{{csrf_field()}}
							<div class="form-group {{$errors->has('time') ? 'has-error' : ''}}">
								<div class="input-group">
									<span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
									<input type="text" name="time" class="form-control" placeholder="Please Enter Time Here" value="{{old('time')}}">
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
									<select	class="form-control" name="ground" id="">
										<option value="">Please Select The Ground</option>
										<option value="First">First</option>
										<option value="Second">Second</option>
										<option value="Third">Third</option>
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
									<input type="text" name="rate" class="form-control" placeholder="Please Rate Here" value="{{old('rate')}}">
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