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
     	<div class="section">
     	 <div id="back"><i class="fa fa-upload"></i>&nbsp;&nbsp;
           <label style="color:#0099ff;font-weight:normal;">Save this Property</label></div>
     	 @foreach($property as $property)
     	 <div id="info">
     	 	<label style="font-size:160%;">{{$property->name}}</label>
     	 	<label style="float:right;font-size:140%">Ksh {{$property->price}}</label></br>
        <label style="float:right;color:#0099ff;font-weight:normal;"><i class="fa fa-print"></i>&nbsp;&nbsp;
          {{HTML::linkRoute('prop_print','Print',array($property->id))}}</label>
     	 	<label style="font-style:italic;font-weight:normal;font-size:120%;">{{$property->location}}</label></br></br>
     	 </div>
         <div id="img">
         <div id="pic">
        
       <img src="{{asset($property->imgpath)}}" title="property photo" style="width:90%;height:100%"/>
        </div>
           
         </div>
         <div id="describe">{{$property->description}}</br></div>

        @endforeach

     	</div>
    <div class="aside">
    	<div id="agent">
    	<div id="head"><h2>Agent Details</h2></div>
    	@foreach($agent as $agent)
          <div id="logo">
           <img src="{{asset('images/admin_logo2.jpg')}}"/>
          </div>
          <div id="details">
          	<label style="float:right;font-weight:normal;"></label>
            
		   +254{{$agent->mobile}}</br>
		  <label style="font-weight:normal;font-size:90%;font-style:italic">
		  	{{HTML::linkRoute('contactagent','Contact Agent',array($agent->id))}}
		  </label>
          </div>
        @endforeach
    	</div>
	<div id="social">
      <div id="soc_head"><h3>Share</h3>
     <div>
          <a href="http://www.facebook.com"><img src="{{asset('images/fb.png')}}" title="facebook" alt=""></a>
            <a href="http://www.twitter.com"><img src="{{asset('images/twitter.png')}}" title="twitter" alt=""></a>
            <a href="http://www.googleplus.com"><img src="{{asset('images/gplus.png')}}" title="gplus" alt=""></a>
            <a href="#"><img src="{{asset('images/feed.png')}}" title="feed" alt=""></a>
            <a href="http://www.pinterest.com"><img src="{{asset('images/plus.png')}}" title="pinterest" alt=""></a>
    </div>
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
          <div id="rightbox">
         
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
