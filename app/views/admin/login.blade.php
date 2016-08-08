@extends('users.registration');
@section('content')
<h2>LOgIn</h2>
      {{Form::open(array('url'=>'admin/signin','method'=>'POST'))}}
       {{Form::label('email','Email')}}  </br>
       {{Form::text('email',null,array('class'=>'form-control'))}}  </br>
       {{Form::label('password','Password')}}  </br>
       {{Form::password('password',array('class'=>'form-control'))}}  </br>
      {{Form::submit('Submit',array('class'=>"btn btn-primary"))}}
      {{Form::close()}}
@stop  