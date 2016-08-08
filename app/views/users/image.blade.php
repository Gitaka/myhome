{{Form::open(array('url'=>'testimage','method'=>'POST','files'=>'true'))}}
 
{{Form::label('firstname','Firstname')}}</br>
{{Form::text('firstname',null,array('class'=>'form-control'))}}</br>
@if($errors->has('firstname'))<p style='color:red'>{{$errors->first('firstname')}}</p>@endif


{{Form::label('logo','Upload Logo Image')}}</br>
{{Form::file('logo')}}</br>
@if($errors->has('logo'))<p style='color:red'>{{$errors->first('logo')}}</p>@endif

{{Form::submit('Register',array('class'=>"btn btn-primary"))}}
{{Form::close()}}