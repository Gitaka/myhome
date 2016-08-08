<!DOCTYPE html>
<html>
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
      <title></title>
      <link rel="stylesheet" href="{{asset('font-awesome/css/font-awesome.min.css')}}">
      <link rel="stylesheet" href="{{asset('bootstrap.min.css')}}">
      <link rel="stylesheet" href="{{asset('css/log.css')}}">
   </head>
   <body style="background-color:#f1f0ee">
     <div class="container-fluid">
       <header class="container-fluid">
         <div class="row"> 
           <div id="logo" class="col-sm-4">
      <img class="logo-responsive" src="{{asset('images/icons/mylogo.png')}}">
           </div>
           <div id="share-icons" class="col-sm-8">
                <ul>
            <li><a href="http://www.facebook.com"><img src="{{asset('images/icons/facebook.png')}}" title="facebook" /></a></li>
            <li><a href="http://www.twitter.com"><img src="{{asset('images/icons/twitter.png')}}" title="twitter" /></a></li>
            <li><a href="http://www.google-plus.com"><img src="{{asset('images/icons/google.png')}}" title="google plus" /></a></li>
               </ul>
           </div>
         </div>
       </header>
       <div class="row">
         <div class="top-nav">
           <div class="top-nav-left" >
                <span class="nav-btn"></span>
            <ul class='nav-menu'>
                <li class="active">{{HTML::linkRoute('home','Home')}}</li>
                <li>{{HTML::linkRoute('property','Property Listings')}}</li>
                <li>{{HTML::linkRoute('searchAgent','Find Agent')}}</li>
                <li>{{HTML::linkRoute('viewpost','Blog')}}</li>
                <li>{{HTML::linkRoute('contact','Talk To Us')}}</li>
            
            </ul>
         
              </div>
       
     </div>

    </div>
    <div id="user-login" class="row">
        <div class="col-sm-4"></div>
         <div id="user-add-details" class="col-sm-3">
          <div id="user-header">@yield('header')</div>
          <div id="more-details">
            @yield('content')
          </div>
          <div id="more-links" class="row">
            <div class="col-sm-6"> @yield('agent')</div>
             <div style="padding-left:5%;"class="col-sm-6"> @yield('register')</div>
         </div>
         </div>
       <div class="col-sm-5"></div>
      </div>

  </div>
 <script src="{{asset('js/bootstrap.min.js')}}"></script>
   </body>
  
</html>