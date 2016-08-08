<!DOCTYPE html>
<html>
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
      <title></title>
       <link rel="stylesheet" href="{{asset('css/agentsindex.css')}}">
      <link rel="stylesheet" href="{{asset('bootstrap.min.css')}}">
      <link rel="stylesheet" href="{{asset('font-awesome/css/font-awesome.min.css')}}">
       <script src="{{asset('js/jquery.js')}}"></script>
       <script src="{{asset('js/subscription.js')}}"></script>
   </head>
   <body>
       <div id="container"class="container-fluid">
           <header class="conrainer-fluid">
             <div class="row">
                <div id="menu-header" class="col-sm-2">
                  
                  <label id="page-title">Agent</label><label style="color:#fff;font-weight:normal;">Dashboard</label>
                </div>
                <nav class="col-sm-10">
                   <div id="nav"style="padding-left:40%;">
                          <ul id="nav-style"class="nav navbar-nav">
                               <li class="active">{{HTML::linkRoute('home','Home')}}</li>
                               <li>{{HTML::linkRoute('agentInbox','Inbox')}}</li>
                               <li>{{HTML::linkRoute('searchAgent','Tasks')}}</li>
                                <li>{{HTML::linkRoute('viewpost','Blog')}}</li>
                               <li>{{HTML::linkRoute('contact','Notifications')}}</li>
                               <li>{{HTML::linkRoute('agent_go_logout','LogOut')}}</li>
                          </ul>
                    </div>
                 </nav>
                </div>
           </header>
           <section class="container-fluid">
             <div id="wrapper" class="row">
                   <div id="vertical-nav" class="col-sm-2">
                      <div id="profile-pic">
                         <img src="{{asset($logo)}}" class="img-rounded" alt="Cinque Terre" width="200" height="150">
                         
                      </div>
                      <div id="menu">
                          <ul> 
                               <li class="vertical-active"><i class=" fa fa-user" >&nbsp;&nbsp;</i>{{HTML::linkRoute('agentaccount','My Profile')}}</li>
                     
                               <li>{{HTML::linkRoute('agentlisting','AddListing')}}</li>
                               <li>{{HTML::linkRoute('myrent','View Rent')}}</li>
                               <li>{{HTML::linkRoute('myland','View Land')}}</li>
                               <li>{{HTML::linkRoute('mybuy','View Buy')}}</li>
                              <li><i class=" fa fa-bar-chart-o" >&nbsp;&nbsp;</i>{{HTML::linkRoute('agentInbox','Analysis')}}</li>
                          </ul>
                      </div>
                   </div>
                   <div id="content" class="col-sm-10">
                       <div class="container-fluid">
                           <div id="profile-info" class="row">
                               @if(Session::has('expire'))
                                  <p class="alert alert-danger">{{Session::get('expire')}}</p>
                                @elseif(Session::has('maxUploads'))
                                  <p class="alert alert-danger">{{Session::get('maxUploads')}}</p>
                                @elseif(Session::has('success'))
                                  <p class="alert alert-success">{{Session::get('success')}}</p>
                               @endif
                               @if(Session::has('edit_failed'))
                               <p class="alert alert-info">{{Session::get('edit_failed')}}</p>
                               @elseif(Session::has('edit_success'))
                               <p class="alert alert-info">{{Session::get('edit_success')}}</p>
                               @endif
                               <div id="left-aside" class="col-sm-4">
                                   <div id="account-profile">
                                      <div id="circle">
                                           <img src="{{asset($logo)}}" class="img-circle" alt="Cinque Terre" width="95" height="95">

                                      </div>
                                      <h4 style="font-size:120%;font-weight:normal;">Myhome.co.ke</h4>
                                   </div>
                                   <div id="account-about">
                                      <div id="account-about-header">
                                         <h3><i class=" fa fa-pencil-square-o" >&nbsp;&nbsp;</i>About</h3>
                                      </div>
                                      <div id="account-about-status">

                                         @foreach($agent as $agent)
                                            UserName: <label id="label-style">{{$agent->username}}</label></br>
                                            FirstName: <label id="label-style">{{$agent->firstname}}</label></br>
                                            LastName: <label id="label-style">{{$agent->lastname}}</label></br>
                                            Email: <label id="label-style">{{$agent->email}}</label></br>
                                            Mobile: <label id="label-style">+2540{{$agent->mobile}}</label></br>
                                           
                                       
                                      </div>
                                      <div id="account-about-location">
                                         <h3><i class=" fa fa-location-arrow" >&nbsp;&nbsp;</i> Location:-</h3></br>
                                          <label id="label-style">{{$agent->location}}</label>
                                      </div>
                                        @endforeach
                                   </div>
                               </div>
                               <div id="right-aside" class="col-sm-8">
                                  <div id="user-priviledges">
                                    <div id="user-subscription-header"><i class=" fa fa-plus-square-o" >&nbsp;&nbsp;</i>Subscriptions</div>
                                    <div id="user-subscription-body">
                                      <h4>Choose a Subscription Plan.</h4>
                                    
                                        @foreach($subscription as $subscription)
   
                                            @if($subscription->type_id == 1)
                                               <h5>Subscribed to Bronze level.Upgrade to Subcribe to Silver or Gold Levels.</h5>
                                  <button type="button" class="btn btn-success btn-lg">
                                   {{HTML::linkRoute('goldcheckout','Gold Membership',array($agentId))}}
                                  </button>
                                   <button type="button" class="btn btn-success btn-lg">
                                   {{HTML::linkRoute('silvercheckout','Silver Membership',array($agentId))}}
                                  </button>
                                                
                                                
                                            @elseif($subscription->type_id == 2)
                                               <h5>Subscribed to Silver level.Subscribe to Gold Level.</h5>

                                                <button type="button" class="btn btn-success btn-lg">
                                                 {{HTML::linkRoute('goldcheckout','Gold Membership',array($agentId))}}
                                                </button>
                                            @elseif($subscription->type_id == 3)
                                               <h5>Subscribed to Gold level.</h5>
                                            @endif
                                      @endforeach
                                    </div>
                                    <div id="user-subscription-footer">
                                       <table border="1" style="width:100%">
                                          <caption>Subscription Models</caption>
                                              <tr id="table-header">
                                                  <td>Gold</td>
                                                  <td>Silver</td>
                                                  <td>Gold</td>
                                              </tr>
                                              <tr id="table-style">
                                                   <td>7500 ksh</td>
                                                   <td>3500 Ksh</td>
                                                   <td>350 Ksh</td>
                                              </tr>
                                              <tr id="table-style">
                                                   <td>Post Unlimited Listings</td>
                                                   <td>Post 15 Listings</td>
                                                   <td>Post 1 Listing</td>
                                              </tr>
                                              <tr id="table-style">
                                                   <td>Unlimited Photo Uploads</td>
                                                   <td>Unlimited Photo Uploads</td>
                                                   <td>Maximum 15 Photo Uploads</td>
                                              </tr>
                                              <tr id="table-style">
                                                   <td>Duration: Monthly</td>
                                                   <td>Duration: 15 Days</td>
                                                   <td>Duration: @Listing Posted</td>
                                              </tr>
                                       </table>  
                                    </div>
                                    <div id="user-edit-profile">
                                       <h3 class="glyphicon glyphicon-pencil"> Edit Agent Profile:</h3></br>
                                        <input type="button" class="btn btn-success btl-lg"data-toggle="modal" data-target="#edit-modal" value="Edit Profile">
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

                                    {{Form::submit('Save',array('class'=>"btn btn-success"))}}
                                    {{Form::close()}}
                                           </div>
                                        </div>
                                     </div>
                                    </div>
                                    </div>
                                  </div>
                               </div>
                           </div>
                       </div>
                   </div>
             </div>
           </section>
       </div>
  <script src="{{asset('js/jquery.js')}}"></script>
 <script src="{{asset('js/bootstrap.min.js')}}"></script>
   </body>
</html>