@extends('layouts.a_inserts')
@section('insert')

<h2>Add Property for <label style="color:red">Land</label></h2>
{{Form::open(array('url'=>'agent/addland','method'=>'POST','files'=>'true'))}}

       {{Form::label('name','LandName')}}</br>
       {{Form::text('name',null,array('class'=>'form-control'))}}</br>
  @if($errors->has('name'))<p style="color:red">{{$errors->first('name')}}</p>@endif

       {{Form::label('location','Location')}}</br>
       {{Form::text('location',null,array('class'=>'form-control'))}}</br>
  @if($errors->has('location'))<p style="color:red">{{$errors->first('location')}}</p>@endif

       {{Form::label('ownername','NameOfOwner')}}</br>
       {{Form::text('owner',null,array('class'=>'form-control'))}}</br>
  @if($errors->has('owner'))<p style="color:red">{{$errors->first('owner')}}</p>@endif

       {{Form::label('contactinfo','MobileContact')}}</br>
       {{Form::text('mobile',null,array('class'=>'form-control'))}}</br>
  @if($errors->has('mobile'))<p style="color:red">{{$errors->first('mobile')}}</p>@endif

       {{Form::label('prorpertyType','LandSize')}}</br>

       <select name='size' class="form-control">
         @foreach($size as $size)
         <option value='{{$size->id}}'>{{$size->size}}</option>

         @endforeach                  
       </select></br>
  @if($errors->has('size'))<p style="color:red">{{$errors->first('size')}}</p>@endif

       {{Form::label('price','Price')}}</br>
       {{Form::text('price',null,array('class'=>'form-control'))}}</br>
  @if($errors->has('price'))<p style="color:red">{{$errors->first('price')}}</p>@endif

       {{Form::label('maxprice','MaxPrice')}}</br>
       {{Form::text('maxprice',null,array('class'=>'form-control'))}}</br>
  @if($errors->has('maxprice'))<p style="color:red">{{$errors->first('maxprice')}}</p>@endif

       {{Form::label('minprice','MinPrice')}}</br>
       {{Form::text('minprice',null,array('class'=>'form-control'))}}</br>
  @if($errors->has('minprice'))<p style="color:red">{{$errors->first('minprice')}}</p>@endif

       {{Form::label('landdescription','LandDescription')}}</br>
       {{Form::textarea('description',null,array('class'=>'form-control'))}}</br>
  @if($errors->has('description'))<p style="color:red">{{$errors->first('description')}}</p>@endif

       {{Form::label('landphoto','landPhoto')}}</br>
       {{Form::file('photo[]',array('multiple'=>'true'))}}</br></br>
       <!--{{Form::file('photo')}}-->
  @if($errors->has('photo'))<p style="color:red">{{$errors->first('photo','Maximum of 5 images accepted only')}}</p>@endif

{{Form::hidden('id',$agent->id)}}
       {{Form::submit('submit',array('class'=>'btn btn-primary'))}}
       {{Form::close()}}</br>       
@stop