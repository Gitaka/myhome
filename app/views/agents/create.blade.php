@extends('users.Registration')
@section('header')
Register As a MyHome Agent

@stop
@section('content')
{{Form::open(array('url'=>'agents','method'=>'POST','files'=>'true'))}}
 

{{Form::text('firstname',null,array('class'=>'form-control','placeholder'=>'First Name'))}}</br>
@if($errors->has('firstname'))<p style='color:red'>{{$errors->first('firstname')}}</p>@endif


{{Form::text('lastname',null,array('class'=>'form-control','placeholder'=>'Last Name'))}}</br>
 @if($errors->has('lastname'))<p style="color:red">{{$errors->first('lastname')}}</p>@endif


{{Form::text('location',null,array('class'=>'form-control','placeholder'=>'Location'))}}</br>
@if($errors->has('location'))<p style='color:red'>{{$errors->first('location')}}</p>@endif

{{Form::text('username',null,array('class'=>'form-control','placeholder'=>'User Name'))}}</br>
@if($errors->has('username'))<p style='color:red'>{{$errors->first('username')}}</p>@endif

{{Form::text('mobile',null,array('class'=>'form-control','placeholder'=>'Mobile No'))}}</br>
@if($errors->has('mobile'))<p style='color:red'>{{$errors->first('mobile')}}</p>@endif


{{Form::text('email',null,array('class'=>'form-control','placeholder'=>'Email'))}}</br>
@if($errors->has('email'))<p style='color:red'>{{$errors->first('email')}}</p>@endif


{{Form::password('password',array('class'=>'form-control','placeholder'=>'PassWord'))}}
@if($errors->has('password'))<p style='color:red'>{{$errors->first('password')}}</p>@endif
</br>
{{Form::label('logo','Upload Logo Image')}}</br>
{{Form::file('logo')}}</br>
@if($errors->has('logo'))<p style='color:red'>{{$errors->first('logo')}}</p>@endif

{{Form::submit('Register',array('class'=>"btn btn-success"))}}
{{Form::close()}}
@stop