@extends('layouts.master')

@section('content')
<div id='reg_container' class="container">
    
                    <form method="POST"  id="signup-form" action="{{ route('register') }}">
                        @csrf
                        <h2 class="form-title" style="text-align:center; color:#0FDACD">Registration Form</h2>
                        <div class="form-group row">
                            <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                             name="name" value="{{ old('name') }}" placeholder="Enter Your Name"  required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            
                        </div>
                        <div class="form-group row">
                           
                                <input id="address" type="text" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}"
                                placeholder="Enter Your Address" name="address" >
                                @if ($errors->has('address'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            
                        </div>
                        <div class="form-group row">
                            
                                <input id="phone" type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}"
                                placeholder="Enter Your Phone Number" name="phone" >

                                @if ($errors->has('phone'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            
                        </div>
                        
                        <div class="form-group row">

                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                placeholder="Enter Your Email Address" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            
                        </div>

                        <div class="form-group row">
       
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                placeholder="Enter Your Password" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            
                        </div>

                        <div class="form-group row">
                     
                                <input id="password-confirm" type="password" class="form-control" 
                                placeholder="Confirm Your Password" name="password_confirmation" required>
                            
                        </div>

                        <div class="form-group row mb-0">
                        <input type="submit" name="submit" id="submit" class="form-submit" value="Register"/>
                        </div>
                        
                    </form>
                    <p class="loginhere"> Have already an account ? <a href="/login" >Login here</a></p>
               
</div>
@endsection
