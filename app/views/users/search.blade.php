<!DOCTYPE html>
<html>
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
      <title></title>
      <link rel="stylesheet" href="{{asset('bootstrap.min.css')}}">
    
   </head>
   <body>
  @extends('users.user_layout')

  @section('s4')
     {{Form::open(array('url'=>'#','method'=>'get'))}}
      
      <div style="width:80%;float:left;padding-right:0%;">{{Form::text('location',null,array('class'=>'form-control','placeholder'=>'Agents Location eg Nairobi'))}}</div>
      <!--<div style="width:20%;float:right;">{{Form::submit('Search',array('class'=>'btn btn-danger'))}}</div>-->
      </br></br></br>
      <div style="padding-right:30%">{{Form::text('agentname',null,array('class'=>'form-control','placeholder'=>'Agents name eg John Doe'))}}</div>
      </br>
      {{Form::submit('Search Agent',array('class'=>'btn btn-danger'))}}
      {{Form::close()}}
  @stop
  @section('s3')

   
      {{Form::open(array('url'=>'user/rsearch','method'=>'get'))}}
      <div style="width:80%;float:left;padding-right:0%;">{{Form::text('location',null,array('class'=>'form-control','placeholder'=>'Location eg Nairobi'))}}</div>
      <div style="width:20%;float:right;">{{Form::submit('Search Rent',array('class'=>'btn btn-danger'))}}</div>
      <div>
         <ul>
             <li><label>PropertyType</label>
                 <select name='type'class='form-control'>
                      @foreach($rtype as $type)
                        <option value='{{$type->id}}'>{{$type->type}}</option>
                      @endforeach                
                </select>
             </li>
            <li><label>MinPrice</label>
                 <select class="form-control" name="minprice">
                  <option value="0">0</option>
                  <option value="10000">10,000</option>
                  <option value="50000">50,000</option>
                  <option value="100000">100,000</option>
                  <option value="200000">200,000</option>
                  <option value="300000">300,000</option>
                  <option value="400000">400,000</option>
                  <option value="500000">500,000</option>
                  <option value="600000">600,000</option>


                </select>
             </li>
             <li><label>MaxPrice</label>
                 <select class="form-control" name="maxprice">
                  <option value="10000">10,000</option>
                  <option value="50000">50,000</option>
                  <option value="100000">100,000</option>
                  <option value="200000">200,000</option>
                  <option value="300000">300,000</option>
                  <option value="400000">400,000</option>
                  <option value="500000">500,000</option>
                  <option value="600000">600,000</option>
                </select>
             </li>

         </ul>
      </div>
   
      {{Form::close()}}
 
  @stop
 @section('s2')
    
      {{Form::open(array('url'=>'user/bsearch','method'=>'get'))}}
      <div style="width:80%;float:left;padding-right:0%;">{{Form::text('location',null,array('class'=>'form-control','placeholder'=>'Location eg Nairobi'))}}</div>
      <div style="width:20%;float:right;">&nbsp;{{Form::submit('Search Buy',array('class'=>'btn btn-danger'))}}</div>
      <div>
          <ul>
             <li><label>PropertyType</label>
                   <select name='type' class='form-control'>
                        @foreach($btype as $type)
                        <option value='{{$type->id}}'>{{$type->type}}</option>
                        @endforeach 
                   </select>
             </li>
              <li><label>MinPrice</label>
                <select class="form-control" name="minPrice">
                  <option value="0">0</option>
                  <option value="1000000">1000,000</option>
                  <option value="5000000">5000,000</option>
                  <option value="10000000">10,000,000</option>
                  <option value="2000000">25,000,000</option>
                  <option value="50000000">50,000,000</option>
                  <option value="75000000">75,000,000</option>
                  <option value="100000000">100,000,000</option>
                  <option value="over">100,000,000 +</option>
                </select>
             </li>
             <li><label>MaxPrice</label>
                 <select class="form-control" name="maxPrice">
                  <option value="1000000">1000,000</option>
                  <option value="5000000">5000,000</option>
                  <option value="10000000">10,000,000</option>
                  <option value="2000000">25,000,000</option>
                  <option value="50000000">50,000,000</option>
                  <option value="75000000">75,000,000</option>
                  <option value="100000000">100,000,000</option>
                  <option value="over">100,000,000 +</option>

                </select>
             </li>
          
          </ul>
      </div>
    
      {{Form::close()}}
  
 @stop
  @section('s5')
    
      {{Form::open(array('url'=>'user/lsearch','method'=>'get'))}}
      <div style="width:80%;float:left;padding-right:0%;">{{Form::text('location',null,array('class'=>'form-control','placeholder'=>'Location eg Nairobi'))}}</div>
      <div style="width:20%;float:right;">{{Form::submit('Search Land',array('class'=>'btn btn-danger'))}}</div>
      <div>
          <ul>
              <li><label>Land Size (Acres)</label>
                <select class="form-control" name="size">
            
                  <option value="1">1/8 acre</option>
                  <option value="2">1/4 acre</option>
                  <option value="3">1/2 acre</option>
                  <option value="4">1 acre</option>
                  <option value="5">2 acres</option>
                  <option value="6">5 acres</option>
                  <option value="7">10 acres</option>
                  <option value="8">100+ acres</option>
                </select>
             </li>
              <li><label>MinPrice</label>
                <select class="form-control" name="minprice">
                  <option value="0">0</option>
                  <option value="1000000">1000,000</option>
                  <option value="5000000">5000,000</option>
                  <option value="10000000">10,000,000</option>
                  <option value="2000000">25,000,000</option>
                  <option value="50000000">50,000,000</option>
                  <option value="75000000">75,000,000</option>
                  <option value="100000000">100,000,000</option>
                  <option value="over">100,000,000 +</option>
                </select>
             </li>
             <li><label>MaxPrice</label>
                 <select class="form-control" name="maxprice">
                  <option value="1000000">1000,000</option>
                  <option value="5000000">5000,000</option>
                  <option value="10000000">10,000,000</option>
                  <option value="2000000">25,000,000</option>
                  <option value="50000000">50,000,000</option>
                  <option value="75000000">75,000,000</option>
                  <option value="100000000">100,000,000</option>
                  <option value="over">100,000,000 +</option>
                 </select>
             </li>
  
          </ul>
      </div>
    
      {{Form::close()}}
  
 @stop


@section('user')
@foreach($user as $user)

    <label >User Name:</label><label id="username">{{$user->username}}</label></br>
    <label>Email: </label><label id="useremail">{{$user->email}}</label></br>
    <input type="button" class="btn btn-info btl-lg"data-toggle="modal" data-target="#edit-modal" value="EditProfile">

<div id="edit-modal" class="modal fade" role="dialog">
 <div class="modal-dialog">
   <div class="modal-content">
       <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit Profile</h4>
       </div>
       <div class="modal-body">
{{Form::open(array('url'=>'user/edit','method'=>'PUT'))}}

 {{Form::hidden('id',$user->id)}}
{{Form::label('username','Username')}}</br>
{{Form::text('username',null,array('class'=>'form-control'))}}</br>
@if($errors->has('username'))<p style='color:red'>{{$errors->first('username')}}</p>@endif

{{Form::label('email','email')}}</br>
{{Form::text('email',null,array('class'=>'form-control'))}}</br>
@if($errors->has('email'))<p style='color:red'>{{$errors->first('email')}}</p>@endif

{{Form::label('password','Password')}}
{{Form::password('password',array('class'=>'form-control'))}}</br>
@if($errors->has('password'))<p style='color:red'>{{$errors->first('password')}}</p>@endif

{{Form::submit('Save',array('class'=>"btn btn-primary"))}}
{{Form::close()}}
       </div>
    </div>
 </div>
</div>
@endforeach
@stop
   </body>
  
</html>