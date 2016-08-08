@extends('layouts.inserts')
@section('insert')

<h2>Add Property for <label style="color:red">Rent</label></h2>
{{Form::open(array('url'=>'admin/addrent','method'=>'POST','files'=>'true'))}}

       {{Form::label('name','PropertyName')}}</br>
       {{Form::text('name',null,array('class'=>'form-control'))}}</br>
  @if($errors->has('name'))<p style="color:red">{{$errors->first('name')}}</p>@endif

       {{Form::label('location','PropertyLocation')}}</br>
       {{Form::text('location',null,array('class'=>'form-control'))}}</br>
  @if($errors->has('location'))<p style="color:red">{{$errors->first('location')}}</p>@endif

       {{Form::label('ownername','NameOfOwner')}}</br>
       {{Form::text('owner',null,array('class'=>'form-control'))}}</br>
  @if($errors->has('owner'))<p style="color:red">{{$errors->first('owner')}}</p>@endif

       {{Form::label('contactinfo','MobileContact')}}</br>
       {{Form::text('mobile',null,array('class'=>'form-control'))}}</br>
  @if($errors->has('mobile'))<p style="color:red">{{$errors->first('mobile')}}</p>@endif

       {{Form::label('prorpertyType','PropertyType')}}</br>
     
       <select name='type_id' class="form-control">
         @foreach($type as $type)
         <option value='{{$type->id}}'>{{$type->type}}</option>

         @endforeach                  
       </select></br>
  @if($errors->has('type_id'))<p style="color:red">{{$errors->first('type_id')}}</p>@endif

       {{Form::label('price','Price')}}</br>
       {{Form::text('price',null,array('class'=>'form-control'))}}</br>
  @if($errors->has('price'))<p style="color:red">{{$errors->first('price')}}</p>@endif

       {{Form::label('maxprice','MaxPrice')}}</br>
       {{Form::text('maxprice',null,array('class'=>'form-control'))}}</br>
  @if($errors->has('maxprice'))<p style="color:red">{{$errors->first('maxprice')}}</p>@endif

       {{Form::label('minprice','MinPrice')}}</br>
       {{Form::text('minprice',null,array('class'=>'form-control'))}}</br>
  @if($errors->has('minprice'))<p style="color:red">{{$errors->first('minprice')}}</p>@endif

       {{Form::label('propertydescription','PropertyDescription')}}</br>
       {{Form::textarea('description',null,array('class'=>'form-control'))}}</br>
  @if($errors->has('description'))<p style="color:red">{{$errors->first('description')}}</p>@endif

       {{Form::label('propertyphoto','PropertyPhoto')}}</br>
       {{Form::file('photo')}}</br></br>
  @if($errors->has('photo'))<p style="color:red">{{$errors->first('photo')}}</p>@endif

      {{Form::hidden('id',$id)}}

       {{Form::submit('submit',array('class'=>'btn btn-primary'))}}
       {{Form::close()}}</br>       
@stop