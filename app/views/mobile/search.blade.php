<!DOCTYPE html>
<html>
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
      <title></title>
      <link rel="stylesheet" href="{{asset('bootstrap.min.css')}}">
    
   </head>
   <body>
  @extends('mobile.index')

  @section('search')
 
     {{Form::open(array('url'=>'m/index/search','method'=>'post'))}}
      <div style="padding-right:10%;">
        
                 <select name='type'class='form-control' id='res'>
                        <option value='1'>For Sale</option>
                        <option value='2'>For Rent</option>
                        <option value='3'>Land</option>            
                </select>
      </div></br>
      <div style="padding-right:10%">
        {{Form::text('location',null,array('id'=>'res','class'=>'form-control','placeholder'=>'Location'))}}
      </div>
      </br>
      <div style="padding-right:10%">
        {{Form::text('maxPrice',null,array('id'=>'res','class'=>'form-control','placeholder'=>'MaxPrice'))}}
      </div></br>
      {{Form::submit('Search ',array('class'=>'btn btn-danger'))}}
      {{Form::close()}}
  @stop
    </body>
</html>