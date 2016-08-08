<!DOCTYPE html>
<html>
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
      <title></title>

       <link rel="stylesheet" href="{{asset('bootstrap.min.css')}}">
      <link rel="stylesheet" href="{{asset('css/style.css')}}">
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
                    <li>{{HTML::linkRoute('login','SignIn')}}</li>
                    <div class="clear"> </div>
                  </ul>
                </div>
                <div class="clear"> </div>
                <!---End-top-nav-->
          </div>

     </div>
     <div class="container">
     <div class='search'>
       <div id="s1">
         <div class='info'>
           <label style='color:#ffffff;font-size:200%; font-family:Open Sans;'>Your One Stop Property Center</label>
          <label style='color:#000000;font-family:Open Sans;font-size:550%'>MyHOME</label>
          
         </div>
        <div class='b'>
           <h2 style='color:#00000'>Search For Property</h2>
           <button type="button" id='buy' class="btn btn-primary btn-lg">Buy</button>
           </br></br>
           <button type="button" id='rent' class="btn btn-primary btn-lg">Rent</button>  

        </div>
       </div>
       <div id="s2">@yield('s2')</div>
       <div id="s3">@yield('s3')</div>
     </div>
     <div class="section">
 <div class='slider'>
     <div class="img_slider">
         <div id="myCarousel" class="carousel slide" data-interval="2000" data-ride="carousel">
            <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
            <li data-target="#myCarousel" data-slide-to="3"></li>
         
            </ol>

    <div class="carousel-inner">
    <div class="item active">
    <img src="images/image1.jpg" class="img-responsive" id="respon">
    <div class="carousel-caption">
      <h5></h5>
     </div>
    </div>
     <div class="item">
    <img src="images/image2.jpg" class="img-responsive" id="respon">
    <div class="carousel-caption">
      <h5></h5>
     </div>
    </div>
    <div class="item">
    <img src="images/image3.jpg" class="img-responsive" id="respon">
    <div class="carousel-caption">
      <h5></h5>
     </div>
    </div>
  
    <div class="item">
    <img src="images/image4.jpg" class="img-responsive" id="respon">
    <div class="carousel-caption">
      <h5></h5><p></p>
     </div>
    </div>
</div>

 </div>
 </div>
    

     </div>
        <div class="adds">
         <div id="add_head">Browse Through Top Locations</div>
             <div id="add_body2">
                 <h2 style="text-decoration:underline;">Browse kenyan Locations</h2>
             </div>
             <div id="add_body">
                 <h2 style="text-decoration:underline">Top Location Search</h2>

             </div>
             <div id="add_body1">
                <h2 style="text-decoration:underline">Popular Searches</h2>
             </div>

        </div>
   </div>
<div class='aside'>
 <div class='widget_1'>
   <div id="widgetHead">Recent Tweets</div>
   <div id="widgetBody"></div>

  </div>
  <div class='widget_2'>
 <div id="widgetHead2">Join Mail List</div>
 <div id="widgetBody2">
    <h4>Your Name</h4><input type="text" class="form-control" placeholder="name">
    <h4>Email</h4><input type="text" class="form-control" placeholder="Email Adress">
   </br><input type="checkbox"> You Agree to Terms Of Use And Privacy </br>
    <input type="submit" class="btn btn-danger" value="Send">

 </div>
  </div>
  <div class="widget_3">
      <div id="widgetHead3">Follow Us</div>
      <div id="widgetBody3">
     
          <a href="http://www.facebook.com"><img src="{{asset('images/fb.png')}}" title="facebook" alt=""></a>
            <a href="http://www.twitter.com"><img src="{{asset('images/twitter.png')}}" title="twitter" alt=""></a>
            <a href="http://www.googleplus.com"><img src="{{asset('images/gplus.png')}}" title="gplus" alt=""></a>
            <a href="#"><img src="{{asset('images/feed.png')}}" title="feed" alt=""></a>
            <a href="http://www.pinterest.com"><img src="{{asset('images/plus.png')}}" title="pinterest" alt=""></a>
   
      </div>
  </div>
  <div class="widget_4">
      <div id="widgetHead4">Contacts</div>
      <div id="widgetBody4">
       <h4><i class=" fa fa-envelope " >&nbsp;&nbsp;</i>P.O.BOX 88888,Nairobi</h4>
       <h4> <i class=" fa fa-phone " ></i>&nbsp;&nbsp;Telephone:3456787645</h4>
       <h4><i class=" fa fa-phone " ></i>&nbsp;&nbsp;Mobile Number:+254727980834</h4>
       <h4> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:+254727980834</h4>
       <h4><i class=" fa fa-envelope " ></i>&nbsp;&nbsp;Email Adress:Info@myHome</h4>
        <h5><i class=" fa fa-home fa-2x " ></i>&nbsp;&nbsp;Find our Offices at mYhome oppsite sheria,Nairobi.</h5>
      </div>
  </div>
</div>
     </div>
  
     <div class="footer">
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
     </div><!--end footer-->
     </div>
<script type="text/javascript">
   $(document).ready(function(){
     $('#s2').show();
     $('#buy').click(function(){
         $('#s2').show();
         $('#s3').hide();
     });
     $('#rent').click(function(){
        $('#s3').show();
        $('#s2').hide();
     });
   });
</script>
  <script src="{{asset('js/jquery.js')}}"></script>
 <script src="{{asset('js/bootstrap.min.js')}}"></script>
   </body>
  
</html>