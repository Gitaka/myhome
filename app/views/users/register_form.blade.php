<!DOCTYPE html>
<html>
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
      <title></title>
       <link rel="stylesheet" href="{{asset('css/inbox.css')}}">
      <link rel="stylesheet" href="{{asset('bootstrap.min.css')}}">
      <link rel="stylesheet" href="{{asset('font-awesome/css/font-awesome.min.css')}}">
       <script src="{{asset('js/jquery.js')}}"></script>
       <script src="{{asset('js/subscription.js')}}"></script>
   </head>
   <body>
       <div class="container-fluid">
           <header class="conrainer-fluid">
             <div class="row">
                <div id="menu-header" class="col-sm-2">
                  
                  <label id="page-title">Agent</label></br><label style="color:#fff;font-weight:normal;">Contact</label>
                </div>
                <nav class="col-sm-10">
                   <div id="nav"style="padding-left:40%;">
                          <ul id="nav-style"class="nav navbar-nav">
                               <li>{{HTML::linkRoute('home','Home')}}</li>
                             <li>{{HTML::linkRoute('property','Property Listings')}}</li>
                             <li>{{HTML::linkRoute('searchAgent','Find Agent')}}</li>
                              <li>{{HTML::linkRoute('viewpost','Blog')}}</li>
                             <li>{{HTML::linkRoute('contact','Contact')}}</li>
                            
                             <li style="float:right;">{{HTML::linkRoute('login','SignIn')}}</li>
                          </ul>
                    </div>
                 </nav>
                </div>
           </header>
           <section class="container-fluid">
             <div id="wrapper" class="row">
                   <div id="vertical-nav" class="col-sm-4">
                      <div id="profile-pic">
                         <img src="{{asset($logo)}}" class="img-rounded" alt="Cinque Terre" width="350" height="250">
                         
                      </div>
                      <div id="menu">
                       <div id="agent-details">
                         @foreach($agent as $agent)
                           <label id="agent-details-style">First Name : </label>{{$agent->firstname}}</br>
                           <label id="agent-details-style">Last Name : </label>{{$agent->lastname}}</br>
                           <label id="agent-details-style">User Name : </label>{{$agent->username}}</br>
                           <label id="agent-details-style">Location : </label>{{$agent->location}}</br>
                           <label id="agent-details-style">Mobile : </label>0{{$agent->mobile}}</br>
                           <label id="agent-details-style">Email : </label>{{$agent->email}}
                         @endforeach
                       </div>
                      </div>
                   </div>
                   <div id="content" class="col-sm-8">
                       <div class="container-fluid">
                           <div id="profile-info" class="row">
                            <h2>Get In touch With Agent.</h2>
                               <div id="contact-agent">
                              

                                    @yield('content')
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