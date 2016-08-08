@extends('users.register_form')
@section('content')
@if(Session::has('agent_message'))
<div class="alert alert-success">{{Session::get('agent_message')}}</div>
@endif
 {{Form::open(array('url'=>'agent/contact','method'=>'POST'))}}

      
       {{Form::text('fullname',null,array('class'=>'form-control','placeholder'=>'FirstName and LastName'))}}</br>
  @if($errors->has('fullname'))<p style="color:red">{{$errors->first('fullname')}}</p>@endif

 
       {{Form::text('subject',null,array('class'=>'form-control','placeholder'=>'Enter the Name of Property as the Subject'))}}</br>
  @if($errors->has('subject'))<p style="color:red">{{$errors->first('subject')}}</p>@endif

       
       {{Form::text('email',null,array('class'=>'form-control','placeholder'=>'Email'))}}</br>
  @if($errors->has('email'))<p style="color:red">{{$errors->first('email')}}</p>@endif

       
       {{Form::text('telephone',null,array('class'=>'form-control','placeholder'=>'Mobile No'))}}</br>
  @if($errors->has('telephone'))<p style="color:red">{{$errors->first('telephone')}}</p>@endif</br>

       {{Form::textarea('message',null,array('class'=>'form-control','placeholder'=>'Message'))}}</br>
  @if($errors->has('message'))<p style="color:red">{{$errors->first('message')}}</p>@endif

       <!-- {{Form::label('type of enquiry','Type Of Enquiry')}}</br>
       {{Form::radio('requestdetails','RequestDetails')}}<label>Request Details</label></br>
      {{Form::radio('arrangeview','arrangeview')}}<label>Arrange View</label></br>



      {{Form::checkbox('requestdetails','RequestDetails')}}<label>Request Details</label></br>
      {{Form::checkbox('arrangeview','arrangeview')}}<label>Arrange View</label></br>-->

      {{Form::hidden('id',$agent_id)}}

       {{Form::submit('Send',array('class'=>'btn btn-success'))}}
       {{Form::close()}}     
@stop