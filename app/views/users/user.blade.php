@extends('users.user_layout')
@section('info')
<div class='text-right'>
    @if(Auth::check())
                <label style="color:#FFC809;font-weight:normal">Logged in as:</label>
                {{{Auth::user()->username}}}</br>
                 <label style="color:#FFC809;font-weight:normal">Email:</label>{{{auth::user()->email}}}
                 <!--{{link_to('logout','Log out')}}-->
            

           
           @else
              {{link_to('login','Log In')}}
               
          
           @endif
</div>
@stop
@section('rent')
    
      <h2>Search for Property to <label style="color:red;font-weight:normal">Rent</label></h2>
      {{Form::open(array('url'=>'user/rsearch','method'=>'get'))}}
      {{Form::label('location','Location')}}</br>
      {{Form::text('location',null,array('class'=>'form-control'))}}</br>
      {{Form::label('type','PropertyType')}}</br>
      <select name='type' class="form-control">
        @foreach($rtype as $type)
         <option value='{{$type->id}}'>{{$type->type}}</option>

         @endforeach                
       </select></br>
      {{Form::label('maxprice','Maxprice')}}</br>
      {{Form::text('maxprice',null,array('class'=>'form-control'))}}</br>
      {{form::label('minprice','MinPrice')}}</br>
      {{Form::text('minprice',null,array('class'=>'form-control'))}}</br></br>
      {{Form::submit('Search',array('class'=>'btn btn-primary'))}}
      {{Form::close()}}
  
@stop
@section('buy')
     
     <h2>Search for Property to <label style="color:red;font-weight:normal">Buy</label></h2>
      {{Form::open(array('url'=>'user/bsearch','method'=>'get'))}}
      {{Form::label('location','Location')}}</br>
      {{Form::text('location',null,array('class'=>'form-control'))}}</br>
      {{Form::label('type','PropertyType')}}</br>
       <select name='type' class="form-control">
          @foreach($btype as $type)
          <option value='{{$type->id}}'>{{$type->type}}</option>
          @endforeach 
       </select></br>
      {{Form::label('maxprice','Maxprice')}}</br>
      {{Form::text('maxprice',null,array('class'=>'form-control'))}}</br>
      {{form::label('minprice','MinPrice')}}</br>
      {{Form::text('minprice',null,array('class'=>'form-control'))}}</br></br>
      {{Form::submit('Search',array('class'=>'btn btn-primary'))}}
      {{Form::close()}}
  

@stop
@section('user')
@foreach($user as $user)
<label style="font-weight:normal;color:#FFC809;font-size:120%">Username:&nbsp;</label>{{$user->username}}</br>
<label  style="font-weight:normal;color:#FFC809;font-size:120%">Mobile:&nbsp;</label>+254{{$user->mobile}}</br>
<label style="font-weight:normal;color:#FFC809;font-size:120%">Email:&nbsp;</label>{{$user->email}}</br>
@endforeach
@stop