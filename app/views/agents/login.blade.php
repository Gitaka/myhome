@extends('users.Registration')
@section('header')
Agent Sign In
@stop
@section('content')

@if(Session::has('agent_add'))
<p class="alert alert-info">{{Session::get('agent_add')}}</p>
@endif

{{Form::open(array('url'=>'agent/login','method'=>'POST'))}}
{{Form::text('email',null,array('class'=>'form-control','placeholder'=>'Email'))}}</br>
@if($errors->has('email'))<p style='color:red'>{{$errors->first('email')}}</p>@endif

{{Form::password('password',array('class'=>'form-control','placeholder'=>'PassWord'))}}</br>
@if($errors->has('password'))<p style='color:red'>{{$errors->first('password')}}</p>@endif

{{Form::submit('LogIn',array('class'=>"btn btn-success"))}}
{{Form::close()}}
@stop
@section('agent')
 <button class="btn btn-primary"> {{HTML::linkRoute('agentsCreate','Register As Agent')}}</button>
@stop