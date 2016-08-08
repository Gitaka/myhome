@extends('master')
@section('content')
<h1>hey</h1>
@foreach($user as $user)
<h2>Edit/Change User Info</h2>
 {{$user->username}}
@endforeach</br></br>
{{Form::open(array('url'=>'','method'=>'PUT'))}}
{{Form::label('username','Username')}}</br>
{{Form::text('username',$user->username)}}</br>

{{Form::label('password','')}}</br>
{{Form::text('password')}}</br>

{{Form::label('mobile','Mobile')}}</br>
{{Form::text('mobile',$user->mobile)}}</br>

{{Form::hidden('id',$user->id)}}
{{Form::submit('Edit')}}
{{Form::close()}}
@stop

