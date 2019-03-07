@extends('Admins.AdminDashBoard')
@section('calender')
<style type="text/css">
    #groundpicker{
      margin-bottom: 10px;
      width:100%;
    }
  #datepicker
  {margin-bottom: 10px;
  }
  #datepicker  span:hover{
    cursor:pointer;
  }
  .col-md-4
  {
    height: 90px;
  }
  .btn
  {
    height:70px;
  }
  #btnground{
    height:35px;
    width:100%;
  }
  .btnTime
  {
    padding-top:20px;
  }

</style>
<div class="panel panel-info">
              <div class="panel-heading "><h5 align="center">Select Ground & Date:</h5></div>
              <div class="panel-body">
                <form action="/adminBooking">
                  <div id="groundpicker" class="input-group">
                    <select class="form-control" name="ground" required>
                      <option value="">Select Ground First</option>
                      <option value="First">First</option>
                      <option value="Second">Second</option>
                      <option value="Third">Third</option>
                    </select>

                  </div>
            	<div id="datepicker" class="input-group date "data-date-format="yyyy-mm-dd" >
            	<input type="text" name="datecal" id="calDate" class="form-control" >
            	<span class="input-group-addon date"><i class="fa fa-calendar"></i></span>
            	</div>
            	<div class="">
            	<input type="submit" name="btncal" id="btncal" class="btn btn-primary btn-block" value="Check available booking" >
            </div>
            </form>
              </div>
              <script type="text/javascript" src="{{ URL::asset('js/datepicker.js')}}"></script>

            <script type="text/javascript">

              $(function(){
                $("#datepicker").datepicker({
                  autoclose:true,
                  todayHighlight:true,
                  startDate:"today",
                  showAnim:'drop',
                  endDate:"+14d",
                  orientation: "bottom left",
                  showAnim: "drop"
                }).datepicker('update',new Date());

              });

                $(document).ready(function(){
                $("#btncal").click(function(){
                   $("#popupDate").val($("#calDate").val());
                });
            });
            </script>
            @endsection