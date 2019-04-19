<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Admin Field</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('bootstrap/css/font-awesome.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/topmenu.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/simple-sidebar.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/AdminTable.css') }}">
    <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <link  rel="stylesheet" type="text/css" href="{{ asset('bootstrap/datepicker.min.css') }}">
    <link href="{{{ URL::asset('css/loginform.css')}}}" rel="stylesheet">
</head>
<body style="background-image: url('{{ URL::to('images/dash.jpg') }}');background-repeat: no-repeat;background-size:cover">
<div class="container-fluid" style="height: 100%;width: 100%">
  <div class="row">
  @include('layouts.nav')
   </div> 
   <div class="row">
  <section>
  @yield('content')
  </section>
  </div>
  <div class="row">
<footer>
    @include('layouts.footer')
</footer>      
</div>


