<!DOCTYPE html>
<html>
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
      <title></title>
      <link rel="stylesheet" href="{{asset('bootstrap.min.css')}}">
      <link rel="stylesheet" href="{{asset('css/view_property.css')}}">
      <link rel="stylesheet" href="{{asset('font-awesome/css/font-awesome.min.css')}}">

       <script src="{{asset('js/jquery.js')}}"></script>
       <script src="{{asset('js/overlay.js')}}"></script>
   </head>
   <body>
     <div class="wrapper">
       <div id="overlay"></div>
         <div id="frame">
        <table id="frame-table">
              <tr>
                 <td id="left"><img src="{{asset('images/left.png')}}"/></td>
                 <td id="right"><img src="{{asset('images/right.png')}}"/></td>
              </tr>
      </table>
            <img id="mainPic" src="">
         </div>
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
     	<div class="section">
     	 <div id="back">
         <i class="fa fa-upload"></i>&nbsp;&nbsp;
           <label style="color:#0099ff;font-weight:normal;">Save this Property</label>
        
        
        
       </div>
     	 @foreach($rent as $rent)
     	 <div id="info">
     	 	<label style="font-size:160%;">{{$rent->name}}</label>
     	 	<label style="float:right;font-size:140%">Ksh {{$rent->price}}</label></br>
          <label style="float:right;color:#0099ff;font-weight:normal;"><i class="fa fa-print"></i>&nbsp;&nbsp;
          {{HTML::linkRoute('rent_print','Print',array($rent->id))}}</label>
     	 	<label style="font-style:italic;font-weight:normal;font-size:120%;">{{$rent->location}}</label></br></br>
     	 </div>

         <div id="img">
         <div id="pic">
          <?php
            $path=$rent->photo;
            $images=json_decode($rent->imageFiles);
            $numOfImages=count($images);

          ?>
          <ul id="photos">
          @for($i=0;$i < $numOfImages;$i++)

       <li id="image_{{$i}}"><img  src="{{asset($rent->photo).'/'.$images[$i]}}" ></li>

         @endfor
         </ul>
         <!--<img src="{{asset($rent->photo)}}" title="logo" "width=100% height=98%"/>-->
        </div>
        <div id="mainImage">
             <img id="mainimg" src="{{asset($rent->photo).'/'.$images[0]}}" alt="">
        </div>
         </div>
         <div id="describe">
     <label style="font-size:170%;font-weight:normal">Property Features</label></br>
          {{$rent->description}}
    </div>

        @endforeach

     	</div>
    <div class="aside">
    	<div id="agent">
    	<div id="head"><h2>Agent Details</h2></div>
    	@foreach($agent as $agent)
          <div id="logo">
             <img src="{{asset($agent->logo_path)}}" title="logo" />
          </div>
          <div id="details">
          <label style="float:right;font-weight:normal;">
              <label style="font-size:70%;color:#0099ff">location:</label>{{$agent->location}}</label>
            <label style="float:left;font-weight:normal;">
            <label style="font-size:70%;color:#0099ff">Name:</label>{{$agent->username}}</br></label>
               <label><i class="fa fa-phone"></i>&nbsp;&nbsp;+254{{$agent->mobile}}</label></br>
		   
		  <label style="font-weight:normal;font-size:90%;font-style:italic">
		  	 <i class="fa fa-envelope"></i>&nbsp;&nbsp;
         {{HTML::linkRoute('contactagent','Contact Agent',array($agent->id))}}
		  </label>
          </div>
        @endforeach
    	</div>
	<div id="social">
      <div id="soc_head"><h3>Share</h3>  </div>
      <div id="icons">
          <a href="http://www.facebook.com"><img src="{{asset('images/fb.png')}}" title="facebook" alt=""></a>
            <a href="http://www.twitter.com"><img src="{{asset('images/twitter.png')}}" title="twitter" alt=""></a>
            <a href="http://www.googleplus.com"><img src="{{asset('images/gplus.png')}}" title="gplus" alt=""></a>
            <a href="#"><img src="{{asset('images/feed.png')}}" title="feed" alt=""></a>
            <a href="http://www.pinterest.com"><img src="{{asset('images/plus.png')}}" title="pinterest" alt=""></a>
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
      <div id="copy"style="padding-left:2%;">
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
   </body>
  
</html>
