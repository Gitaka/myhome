<!DOCTYPE html>
<html>
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
      <title></title>

       <link rel="stylesheet" href="{{asset('bootstrap.min.css')}}">
      <link rel="stylesheet" href="{{asset('css/agent.css')}}">
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
                  <a href="/"><img src="{{asset('images/icons/myhomeicon.png')}}" title="logo" /></a>
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
              <li>{{HTML::linkRoute('addprop','Addproperty')}}</li>
              <li>{{HTML::linkRoute('addpost','PostBlog')}}</li>
              <li>{{HTML::linkRoute('message_inbox','Inbox')}}</li>
              <li>{{HTML::linkRoute('adminlogout','LogOut')}}</li>
             
        </ul>
        </div>
      </div>
      <div style="float:right;">
  
 @foreach($admin as $admin)
 <label style="color:#FFC809;font-weight:normal;font-size:120%">Logged In As:</label>
 {{$admin->firstname}}</br>
 <label style="color:#FFC809;font-weight:normal;font-size:120%">Email</label>{{$admin->email}}
 @endforeach


      </div>
     </div>
   
<div class="section">
      <div id="message_body">
       <div id="head"><h2>Inbox  Messages</h2></div>
        @foreach($messages as $message) 
        <div id="message"> 
          <label style="font-size:70%">from:</label>{{$message->email}}.&nbsp;&nbsp;{{HTML::linkRoute('read_inbox',substr($message->message,0,60),array($message->id))}}
        </div>
        @endforeach
          <div id="paginate">
      <?php
        for($number=1;$number<=$total_pages;$number++){
         echo'<a href="?page='.$number.'">'.$number.'</a> &nbsp &nbsp';

      }
    ?>
   </div>
      </div>
</div>
     </div><!--end container-->
  
    <!-- <div class="footer">
      <div id="footer_header">my<label style="color:#FFC809">HOME</label><small>.com</small></div>
      <div id="footer_section">
       <div id="left">
         <div id="left_aside">
         {{HTML::linkRoute('viewpost','Blog')}}
             </br> 
             About Us</br> 
              Kenya Locations</br>
            {{HTML::linkRoute('agentlogin','Agent Member Area')}} 
             </br> 
           
         </div>
         <div id="right_aside">
            {{HTML::linkRoute('contact','Contact')}}
              </br> 
              Nairobi Locations</br> 
         
          
         </div>
       </div>
          <div id="right">
        <div id="left_aside">
              
              Guides</br> 
              Press Center</br> 
            
        </div>
         <div id="right_aside">
              
              Cookie Policy</br> 
              Terms of use and Privacy</br> 
            
         </div>
       </div>
             
      </div>
      <div id="copy" style="padding-left:2%;">    
        <div style="float:left">&copy;  2015copyright my<label style="color:#FFC809">Home</label><small>.com</small></div>
       <div class="social">
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
 <script src="{{asset('js/bootstrap.min.js')}}"></script>-->
   </body>
  
</html>