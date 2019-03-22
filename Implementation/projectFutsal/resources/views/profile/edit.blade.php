@extends('layouts.master')
@section('user')
<a href="#"><i class="fa fa-bell"></i></a>
Welcome {{ Auth::user()->name }}
@endsection
@section('content')
<div id='reg_container' class="container">
   
                    <form method="POST" action="{{ url('/editprofile', Auth::user()->id)}}">
                        @csrf
                        {!!method_field('put')!!}
                        <h2 class="form-title" style="text-align:center; color:#0FDACD">Profile Update Form</h2>
                        <div class="form-group row">
                                                   
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{!!(Auth::user()->name)!!}">

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            
                        </div>
                        <div class="form-group row">
                                                       
                                <input id="address" type="text" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" value="{!!(Auth::user()->address)!!}">
                                @if ($errors->has('address'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            
                        </div>
                        <div class="form-group row">
                            
                                <input id="phone" type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{!!(Auth::user()->phone)!!}"> 

                                @if ($errors->has('phone'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            
                        </div>
                        
                        <div class="form-group row">
                      
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{!!(Auth::user()->email)!!}" readonly>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                           
                        </div>

                       

                        <div class="form-group row mb-0">
                            <input type="submit" name="submit" id="submit" class="form-submit" value="Update"/>
                             </div>
                    </form>
                </div>
</div>
@endsection
