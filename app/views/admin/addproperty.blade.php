<!DOCTYPE html>
<html>
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
      <title>Add Properties</title>
      <link rel="stylesheet" href="{{asset('bootstrap.min.css')}}">
      <link rel="stylesheet" href="{{asset('css/main.css')}}">
   </head>
   <body>


@extends('layouts.inserts')
@section('insert')  
   
      <h2>Add Property Listings</h2>

       {{Form::open(array('url'=>'admin/addprop','method'=>'POST','files'=>'true'))}}

       {{Form::label('name','PropertyName')}}</br>
       {{Form::text('name',null,array('class'=>'form-control'))}}</br>
  @if($errors->has('name'))<p style="color:red">{{$errors->first('name')}}</p>@endif

       {{Form::label('location','PropertyLocation')}}</br>
       {{Form::text('location',null,array('class'=>'form-control'))}}</br>
  @if($errors->has('location'))<p style="color:red">{{$errors->first('location')}}</p>@endif

       {{Form::label('ownername','NameOfOwner')}}</br>
       {{Form::text('owner',null,array('class'=>'form-control'))}}</br>
  @if($errors->has('owner'))<p style="color:red">{{$errors->first('owner')}}</p>@endif

       {{Form::label('email','Email')}}</br>
       {{Form::text('email',null,array('class'=>'form-control'))}}</br>
  @if($errors->has('email'))<p style="color:red">{{$errors->first('email')}}</p>@endif

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

 {{Form::label('noBedrooms','Bedrooms')}}</br>

       <select name='bedrooms' class="form-control">
         <option value='1'>1</option> 
         <option value='2'>2</option>   
         <option value='3'>3</option>   
         <option value='4'>4</option>   
         <option value='5'>5</option>   
         <option value='6'>6</option>            
       </select></br>
  @if($errors->has('bedrooms'))<p style="color:red">{{$errors->first('bedrooms')}}</p>@endif


 {{Form::label('outsideSpace','OutsideSpace')}}</br>

       <select name='outsidespace' class="form-control">
         <option value='Garden'>Garden</option> 
         <option value='Parking'>Parking</option>   
         <option value='Driveway'>DriveWay</option>   
           
       </select></br>
  @if($errors->has('outsidespace'))<p style="color:red">{{$errors->first('outsidespace')}}</p>@endif

 {{Form::label('status','Status')}}</br>

       <select name='status' class="form-control">
         <option value='preowned'>Pre-Owned</option> 
         <option value='new'>New</option>    
           
       </select></br>
  @if($errors->has('status'))<p style="color:red">{{$errors->first('status')}}</p>@endif
  
 {{Form::label('propertyphoto','PropertyPhoto')}}</br>
       {{Form::file('photo[]',array('multiple'=>'true'))}}</br></br>
  @if($errors->has('photo'))<p style="color:red">{{$errors->first('photo','Maximum of 5 Images accepted Only')}}</p>@endif

       {{Form::submit('submit',array('class'=>'btn btn-primary'))}}
       {{Form::close()}}</br>       

    
@stop
   </body>
  
</html>