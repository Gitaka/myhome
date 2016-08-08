<!DOCTYPE html>
<html>
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
      <title></title>
      <link rel="stylesheet" href="{{asset('bootstrap.min.css')}}">
    
       <script src="{{asset('js/jquery.js')}}"></script>
   </head>
   <body>
    
    @extends('mobile.find')
    @section('section')
      {{Form::open(array('url'=>'m/agentsfind','method'=>'get'))}}

      {{Form::label('location','Location')}}</br>
      {{Form::text('location',null,array('class'=>'form-control','placeholder'=>'Agents Location eg Nairobi'))}}</br>
       @if($errors->has('location'))<p style="color:red">{{$errors->first('location')}}</p>@endif
      {{Form::label('agentname','AgentName')}}</br>
      {{Form::text('agentname',null,array('class'=>'form-control','placeholder'=>'Agents name eg John Doe'))}}</br></br>
  
      {{Form::submit('Search',array('class'=>'btn btn-success'))}}
      {{Form::close()}}
      
    @stop
</body>
</html>