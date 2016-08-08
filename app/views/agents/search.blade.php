
    
  
      @extends('users.Registration')
      @section('header')
          Search For Agent
      @stop
      @section('content')
      {{Form::open(array('url'=>'agent/search/results','method'=>'get'))}}

      {{Form::label('location','Location')}}</br>
      {{Form::text('location',null,array('class'=>'form-control','placeholder'=>'Agents Location eg Nairobi'))}}</br>
       @if($errors->has('location'))<p style="color:red">{{$errors->first('location')}}</p>@endif
      {{Form::label('agentname','AgentName')}}</br>
      {{Form::text('agentname',null,array('class'=>'form-control','placeholder'=>'Agents name eg John Doe'))}}</br></br>
  
      {{Form::submit('Search',array('class'=>'btn btn-success'))}}
      {{Form::close()}}
      
      @stop
 
 