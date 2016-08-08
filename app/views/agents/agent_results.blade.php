<!DOCTYPE html>
<html>
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
      <title></title>
      <link rel="stylesheet" href="{{asset('bootstrap.min.css')}}">
      <link rel="stylesheet" href="{{asset('css/results.css')}}">
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
        <div id="head">
          <p>Agents found in:{{$location}}</p>
        </div>
        <div id="section">
          @foreach($agents as $agent)
           <div id="agent">
             <div id="logo">
               <img src="{{asset($agent->logo_path)}}" title="logo" style="width:90%;height:85%"/>
             </div>
             <div id="info">
               <div id="name">
                  {{$agent->username}}</br>
                   {{$agent->location}}</br></br></br></br></br>
         <i class="fa fa-envelope "></i>&nbsp;&nbsp;
          {{HTML::linkRoute('contactagent','Email Agent')}}
               </div>
          <div id="mobile">
        <label style="float:right;padding-right:5%;"><i class="fa fa-phone fa-2x"></i>&nbsp;&nbsp;mobile:0{{$agent->mobile}}</label></br></br></br></br></br>
      </br></br>
      <i class="fa fa-home"></i>
          {{HTML::linkRoute('agentRent','View Rent',array($agent->id))}}

         &nbsp;  <i class="fa fa-home"></i>
          {{HTML::linkRoute('agentSale','View Sale',array($agent->id))}}
           &nbsp;  <i class="fa fa-home"></i>
          {{HTML::linkRoute('agentLand','View Land',array($agent->id))}}
           </div>
        

             </div>
           </div>
         @endforeach
         {{$agents->appends(array('location'=>$location,'agentname'=>$agentname))->links()}}
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