@extends('users.Registration')
@section('header')
User Sign In
@stop
@section('content')
       {{Form::open(array('url'=>'user/login','method'=>'post'))}}
       
       {{Form::text('username',null,array('class'=>'form-control','placeholder'=>'User Name'))}}</br>
   
       {{Form::password('password',array('class'=>'form-control','placeholder'=>'PassWord'))}}</br>
       {{Form::submit('LogIn',array('class'=>"btn btn-success"))}}
       {{Form::close()}}
   
@stop
 
 @section('agent')
   <button class="btn btn-primary"> {{HTML::linkRoute('agentlogin','Agent Sign In')}}</button>
 @stop
 @section('register')
 <button class="btn btn-primary"> {{HTML::linkRoute('register','Register')}}</button>

 @stop