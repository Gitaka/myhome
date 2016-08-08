@extends('users.Registration')
@section('header')
Register As a User
@stop
@section('content')

   
    {{Form::open(array('url'=>'user/register','method'=>'POST'))}}


      {{Form::text('username',null,array('class'=>'form-control','placeholder'=>'User Name'))}}</br>
      @if($errors->has('username'))<p style='color:red'>{{$errors->first('username')}}</p>@endif

    
      {{Form::text('email',null,array('class'=>'form-control','placeholder'=>'Email'))}}</br>
      @if($errors->has('email'))<p style='color:red'>{{$errors->first('email')}}</p>@endif

    
      {{Form::password('password',array('class'=>'form-control','placeholder'=>'PassWord'))}}</br>
      @if($errors->has('password'))<p style='color:red'>{{$errors->first('password')}}</p>@endif

       {{Form::submit('Register',array('class'=>"btn btn-success"))}}
       {{Form::close()}}

@stop

