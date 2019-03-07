@extends('admins.admindashBoard')
@section('MenuContent')

<div class="row">
			<div class="container">
			<div class="col-lg-8 col-md-offset-1">
				<div class="panel panel-info">
					<div class="panel-heading">
						<h3 class="panel-title">Add New Ground</h3>			
					</div>
						<div class="panel-body">
						<form action="/addGround" method="post">
							{{csrf_field()}}
							<div class="form-group {{$errors->has('ground') ? 'has-error' : ''}}">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-area-chart"></i></span>
									<input type="text" name="ground" class="form-control" placeholder="Please Enter Ground Name" value="{{old('ground')}}">
								</div>
								<div class="col-md-offset-1 ">
								@if ($errors->has('ground'))
                                    <span class="help-block ">
                                        <p class="text-danger">{{ $errors->first('ground') }}</p>
                                    </span>
                                    @endif
                                </div>
							</div>
							<div class="form-group">
							<div>
							<input type="file" class="form-control" name="image" >
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
		</div>




@endsection