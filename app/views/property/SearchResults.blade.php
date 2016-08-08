<!DOCTYPE html>
<html>
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
      <title>{{$title}}</title>
      <link rel="stylesheet" href="{{asset('bootstrap.min.css')}}">
      <link rel="stylesheet" href="{{asset('css/main.css')}}">
   </head>
   <body>
  @extends('master')
  @section('content')
    <div id="searchresults">
       <h2>hey</h2>
       @foreach($rents as $rent)
       {{$rent->name}}
       {{$rent->description}}
       @endforeach
       
    </div>
  @stop

 
   </body>
  
</html>

