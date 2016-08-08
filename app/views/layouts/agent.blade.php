<!DOCTYPE html>
<html>
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
      <title></title>

       <link rel="stylesheet" href="{{asset('bootstrap.min.css')}}">
      <link rel="stylesheet" href="{{asset('css/agent.css')}}">
      <link rel="stylesheet" href="{{asset('font-awesome/css/font-awesome.min.css')}}">

       <script src="{{asset('js/jquery.js')}}"></script>
       <script src="{{asset('js/subscription.js')}}"></script>
   </head>
   <body>
     <div class="wrapper">
        <div class="header" id="top">
            <div class="wrap">
                <!---start-logo-->
             <div class="logo">
                  <a href="/"><img src="{{asset('images/icons/myh4.png')}}" title="logo" /></a>
             </div>
                <!--End-logo-->
              
                <!--start-top-nav-->
                <div class="top-nav">
                  <ul>
                       <li>{{HTML::linkRoute('home','Home')}}</li>
                       <li>{{HTML::linkRoute('property','Property Listings')}}</li>
                       <li>{{HTML::linkRoute('searchAgent','Find Agent')}}</li>
                        <li>{{HTML::linkRoute('viewpost','Blog')}}</li>
                       <li>{{HTML::linkRoute('contact','Contact')}}</li>
                       <li style="float:right;padding-right:9%"> <li>{{HTML::linkRoute('agent_go_logout','LogOut')}}</li>


                    <div class="clear"> </div>
                  </ul>
                </div>
                <div class="clear"> </div>
                <!---End-top-nav-->
            </div>
          </div>
     <div class="container">
     <div class="identify">
      <div style="float:left">
           <div class="cssmenu">
              <ul id="nav">
             <!--<li>{{HTML::linkRoute('agentaccount','AgentsHomepage')}}</li>-->
             <li>{{HTML::linkRoute('agentland','AddLand')}}</li>
             <li>{{HTML::linkRoute('agentbuy','AddBuy')}}</li>
             <li>{{HTML::linkRoute('agentlisting','AddListing')}}</li>
             <li>{{HTML::linkRoute('agentrent','AddRent')}}</li>
             <li>{{HTML::linkRoute('agentInbox','Inbox')}}</li>
             <li>{{HTML::linkRoute('myrent','View Rent')}}</li>
             <li>{{HTML::linkRoute('myland','View Land')}}</li>
             <li>{{HTML::linkRoute('mybuy','View Buy')}}</li>
      
  
        </ul>
        </div>
      </div>
  <div style="float:right;">
  
  </div>
     </div>
   @if(Session::has('expire'))
      <p class="alert alert-danger">{{Session::get('expire')}}</p>
    @elseif(Session::has('maxUploads'))
      <p class="alert alert-danger">{{Session::get('maxUploads')}}</p>
    @elseif(Session::has('success'))
      <p class="alert alert-success">{{Session::get('success')}}</p>
   @endif
<div id="sub-details">
   <p>Gold Subscription Plan: Upload Unlimited listings @7500 ksh per month</p>
   <p>Silver Subscription Plan:- Upload 15 listings @5500ksh per Month </p>
   <p>Bronze(Default)Subsciption Plan:Upload Each Listing @350ksh </p>

</div>
<div id="subscription">
@foreach($subscription as $subscription)
   
  @if($subscription->type_id == 1)
     <h4>Subscribed to Bronze level.Upgrade to Subcribe to Silver or Gold Levels</h4>

      {{HTML::linkRoute('silvercheckout','Silver Membership',array($agentId))}}</br>
      {{HTML::linkRoute('goldcheckout','Gold Membership',array($agentId))}}
  @elseif($subscription->type_id == 2)
     <h4>Subscribed to Silver level.Subscribe to Gold Level</h4>

     {{HTML::linkRoute('goldcheckout','Gold Membership',array($agentId))}}
  @elseif($subscription->type_id == 3)
     <h4>Subscribed to Gold level.</h4>
  @endif
@endforeach
</div>
<div class="section">
<!--@yield('user')-->
@if(Session::has('edit_failed'))
<p class="alert alert-info">{{Session::get('edit_failed')}}</p>
@elseif(Session::has('edit_success'))
<p class="alert alert-info">{{Session::get('edit_success')}}</p>

@endif
<div id="agent-profile">
 <div id="agent-profile-header">Profile</div>
 <div id="agent-profile-body">
@foreach($agent as $agent)
<div id="agent-profile-body-agentlogo">
   <img src="{{asset($agent->logo_path)}}" title="logo" />
</div>
<div id="agent-profile-body-profileinfo">
  <div>
    
    UserName:<label id="label-style">{{$agent->username}}</label></br>
    FirstName:<label id="label-style">{{$agent->firstname}}</label>
    LastName:<label id="label-style">{{$agent->lastname}}</label></br>
    Email:<label id="label-style">{{$agent->email}}</label></br>
    Mobile:<label id="label-style">+2540{{$agent->mobile}}</label></br>
    Location:<label id="label-style">{{$agent->location}}</label>
  </div>
<div style="margin-top:8%;">
   <input type="button" class="btn btn-info btl-lg"data-toggle="modal" data-target="#edit-modal" value="EditProfile">
</div>
</div>

@endforeach
 </div>
</div>
<div id="edit-modal" class="modal fade" role="dialog">
 <div class="modal-dialog">
   <div class="modal-content">
       <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit Profile</h4>
       </div>
       <div class="modal-body">
{{Form::open(array('url'=>'agentEdit','method'=>'PUT','files'=>'true'))}}
 {{Form::hidden('id',$agent_id)}}
{{Form::label('firstname','Firstname')}}</br>
{{Form::text('firstname',null,array('class'=>'form-control'))}}</br>
@if($errors->has('firstname'))<p style='color:red'>{{$errors->first('firstname')}}</p>@endif

{{Form::label('lastname','lastname')}}</br>
{{Form::text('lastname',null,array('class'=>'form-control'))}}</br>
 @if($errors->has('lastname'))<p style="color:red">{{$errors->first('lastname')}}</p>@endif

{{Form::label('location','Location')}}</br>
{{Form::text('location',null,array('class'=>'form-control'))}}</br>
@if($errors->has('location'))<p style='color:red'>{{$errors->first('location')}}</p>@endif

{{Form::label('username','Username')}}</br>
{{Form::text('username',null,array('class'=>'form-control'))}}</br>
@if($errors->has('username'))<p style='color:red'>{{$errors->first('username')}}</p>@endif

{{Form::label('mobile','Mobile')}}</br>
{{Form::text('mobile',null,array('class'=>'form-control'))}}</br>
@if($errors->has('mobile'))<p style='color:red'>{{$errors->first('mobile')}}</p>@endif

{{Form::label('email','email')}}</br>
{{Form::text('email',null,array('class'=>'form-control'))}}</br>
@if($errors->has('email'))<p style='color:red'>{{$errors->first('email')}}</p>@endif

{{Form::label('password','Password')}}
{{Form::password('password',array('class'=>'form-control'))}}
@if($errors->has('password'))<p style='color:red'>{{$errors->first('password')}}</p>@endif

{{Form::label('logo','Upload Logo Image')}}</br>
{{Form::file('logo')}}</br>
@if($errors->has('logo'))<p style='color:red'>{{$errors->first('logo')}}</p>@endif

{{Form::submit('Save',array('class'=>"btn btn-primary"))}}
{{Form::close()}}
       </div>
    </div>
 </div>
</div>
</div>
     </div><!--end container-->-->
  
     <div class="footer">
            <div class="footer-top-grid">
               <div class="footer-top-grid-header">My<label style="color:#026660;font-size:250%;font-weight:normal">Home</label>.com</div>
               <div class="footer-top-grid-body">
                     <div class="footer-top-grid-body-1">
                          <div class="footer-top-grid-body-1-left">
                             About Us</br></br>
                             {{HTML::linkRoute('agentlogin','Agent Member Area')}}</br></br>
                             {{HTML::linkRoute('viewpost','Blog')}}</br></br>
                             {{HTML::linkRoute('contact','Contact')}}</br></br>
                             {{HTML::linkRoute('login','SignIn')}}</br></br>

                          </div>
                          <div class="footer-top-grid-body-1-right">
                             Site Map</br></br>
                             FindAgent</br></br>
                             Blog</br></br>
                             contact</br></br>
                             New Listings</br></br>

                          </div>
                     </div>
                     <div class="footer-top-grid-body-2">
                          <div class="footer-top-grid-body-2-left">
                            Guides</br></br>
                            Press Center</br></br>
                          </div>
                          <div class="footer-top-grid-body-2-right">
                            Contacts
                              <h4><i class=" fa fa-envelope " >&nbsp;&nbsp;</i>P.O.BOX 88888,Nairobi</h4>
                              <h4> <i class=" fa fa-phone " ></i>&nbsp;&nbsp;Telephone:3456787645</h4>
                              <h4><i class=" fa fa-phone " ></i>&nbsp;&nbsp;Mobile Number:+254727980834</h4>
                              <h4><i class=" fa fa-envelope " ></i>&nbsp;&nbsp;Email Adress:Info@myHome</h4>
                              <h5><i class=" fa fa-home fa-2x " ></i>&nbsp;&nbsp;Find our Offices at myHome,Nairobi.</h5>
                          </div>
                     </div>
               </div>
              
            </div>
            <div class="footer-bottom-grid">
               <div class="footer-bottom-grid-copywrite">
                &copy;  2016copyright my<label style="color:#026660;font-weight:normal">Home</label>
               </div>
               <div class="footer-bottom-grid-social">
                    <ul>  
                         <li class="facebook"><a href="http://www.facebook.com"><span> </span></a></li>
                         <li class="twitter"><a href="http://www.twitter.com"><span> </span></a></li>
                         <li class="rss"><a href="#"><span> </span></a></li>  
                         <li class="google"><a href="http://www.google_plus.com"><span> </span></a></li>     
                     </ul>
               </div>
            </div>
     </div>
     </div>
<script type="text/javascript">
   $(document).ready(function(){
     $('#data1').show();
     $('#buy').click(function(){
         $('#data1').show();
         $('#data2').hide();
     });
     $('#rent').click(function(){
        $('#data2').show();
        $('#data1').hide();
     });
   });
</script>
  <script src="{{asset('js/jquery.js')}}"></script>
 <script src="{{asset('js/bootstrap.min.js')}}"></script>
   </body>
  
</html>