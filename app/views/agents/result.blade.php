<!DOCTYPE html>
<html>
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
      <title></title>
      <link rel="stylesheet" href="{{asset('bootstrap.min.css')}}">
    
       <script src="{{asset('js/jquery.js')}}"></script>
       <style type="text/css">
          #agents{
          	width:900px;
          	height:250px;
          	background-color:#585858;
          	border-bottom:1px solid red;
          	margin-bottom:1%;
          }
          #logo{
          	width:40%;
          	height:90%;
          	background-color:#c0c0c0;
          	float:left;
          }
          #info{
          	width:55%;
          	height:90%;
          	background-color:#f0f0f0;
          	float:right;
          }
       </style>
   </head>
   <body>
@extends('agents.agent_results')
@section('agent')
@foreach($agents as $agent)
<div id="agents">
<div id="logo"></div>
<div id="info">
 {{$agent->username}}</br>
 <label>0{{$agent->mobile}}</label></br>

 <label>View property for sale</label>
  <label>View property for rent</label>
</div>
</div>


@endforeach
@stop
</body>
</html>