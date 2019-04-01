
@extends('layouts.master')

@section('content')
<div id='reg_container' class="container">
<form method="POST" id="signup-form" action="{{ route('login') }}">
                        @csrf
                        <h2 class="form-title" style="text-align:center; color:#0FDACD">Login Form</h2>
                        <div class="form-group row">
                        
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" 
                                name="email" value="{{ old('email') }}" placeholder="Please Enter your email" required autofocus>

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
                        <div class="form-group">
                        <input type="submit" name="submit" id="submit" class="form-submit" value="Log In"/>
                        </div>
                               
                            
                        
                    </form>
                    @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif              
</div>
            
@endsection
