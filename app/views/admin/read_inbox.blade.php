

<!DOCTYPE html>
<html>
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
      <title></title>

       <link rel="stylesheet" href="{{asset('bootstrap.min.css')}}">
      <link rel="stylesheet" href="{{asset('css/inbox.css')}}">
      <link rel="stylesheet" href="{{asset('font-awesome/css/font-awesome.min.css')}}">

       <script src="{{asset('js/jquery.js')}}"></script>
   </head>
   <body>
     <div class="wrapper">
     <div class="header" id="top">
            <div class="wrap">
                <!---start-logo-->
             <div class="logo">
                  <a href="/"><img src="{{asset('images/logo2.png')}}" title="logo" /></a>
             </div>
                <!---End-logo-->
              
                <!---start-top-nav-->
                <div class="top-nav">
                  <ul>
                    <li>{{HTML::linkRoute('home','Home')}}</li>
                    <li><a href="about.html">About</a></li>
                    <li>{{HTML::linkRoute('property','property')}}</li>
                    <li>{{HTML::linkRoute('searchAgent','Find Agent')}}</li>
                    <li>{{HTML::linkRoute('viewpost','Blog')}}</li>
                   <li>{{HTML::linkRoute('contact','Contact')}}</li>
                    <li>{{HTML::linkRoute('adminlogout','LogOut')}}</li>
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
               <li>{{HTML::linkRoute('admin_index','AdminHomepage')}}</li>
              <li>{{HTML::linkRoute('addprop','Addproperty')}}</li>
              <li>{{HTML::linkRoute('addbuy','Buy')}}</li>
              <li>{{HTML::linkRoute('addrent','Rent')}}</li>
              <li>{{HTML::linkRoute('addpost','PostBlog')}}</li>
              <li>{{HTML::linkRoute('message_inbox','Inbox')}}</li>
              <li>{{HTML::linkRoute('adminlogout','LogOut')}}</li>
  
        </ul>
        </div>
      </div>
      </div>
      <div class="section">
 
      <div id="m_body">
         <div id="head2">Read Message</div>
         <div id="info">
          @foreach($message as $message)
          <div id="name"><label style="font-size:90%;font-family:normal;color:#000">From:</label>{{$message->fullname}}</div>
          <div id="email"><label style="font-size:90%;font-family:normal;color:#000">Email:</label>{{$message->email}}</div>
          <div id="message_content">{{nl2br($message->message)}}</div>
          <div id="date_sent"><label style="font-size:90%;font-family:normal;color:#000">Sent at:</label>{{$message->created_at}}</div>
          @endforeach
        
          </div>
      </div>

      </div>
  </div>
  <script src="{{asset('js/jquery.js')}}"></script>
 <script src="{{asset('js/bootstrap.min.js')}}"></script>
   </body>
  
</html>