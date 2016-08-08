<!DOCTYPE html>
<html>
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
      <title></title>
      <link rel="stylesheet" href="{{asset('bootstrap.min.css')}}">
      <link rel="stylesheet" href="{{asset('css/view_property2.css')}}">
       <link rel="stylesheet" href="{{asset('font-awesome/css/font-awesome.min.css')}}">
       <script src="{{asset('js/jquery.js')}}"></script>
       <script src="{{asset('js/overlay.js')}}"></script>
   </head>
   <body>
   </body>
         <div class="wrapper">
                <div id="overlay"></div>
         <div id="frame">
        <table id="frame-table">
              <tr>
                 <td id="left"><img src="{{asset('images/icons/left.jpg')}}"/></td>
                 <td id="right"><img src="{{asset('images/icons/right.jpg')}}"/></td>
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
                <!--End-logo-->
              
                <!--start-top-nav-->
                <div class="top-nav">
                  <ul>
                       <li>{{HTML::linkRoute('home','Home')}}</li>
                       <li>{{HTML::linkRoute('property','Property Listings')}}</li>
                       <li>{{HTML::linkRoute('searchAgent','Find Agent')}}</li>
                        <li>{{HTML::linkRoute('viewpost','Blog')}}</li>
                       <li>{{HTML::linkRoute('contact','Contact')}}</li>
                       <li style="float:right;padding-right:2%">{{HTML::linkRoute('register','Register')}}</li>
                       <li style="float:right;padding-right:1%">{{HTML::linkRoute('login','SignIn')}}</li>


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
           <label style="color:#336666;font-weight:normal;">Save this Property</label>
        
        
       </div>
       @foreach($land as $land)
       <div id="info">
        <label style="font-size:160%;">{{$land->name}}</label>
        <label style="float:right;font-size:140%">Ksh {{$land->price}}</label></br>
          <label style="float:right;color:#0099ff;font-weight:normal;"><i class="fa fa-print"></i>&nbsp;&nbsp;
          {{HTML::linkRoute('land_print','Print',array($land->id))}}</label>
        <label style="font-style:italic;font-weight:normal;font-size:120%;">{{$land->location}}</label></br></br>
       </div>

         <div id="img">
         <div id="pic">
          <?php
            $path=$land->photo;
            $images=json_decode($land->imageFiles);
            $numOfImages=count($images);

          ?>
          <ul id="photos">
          @for($i=0;$i < $numOfImages;$i++)

       <li id="image_{{$i}}"><img  src="{{asset($land->photo).'/'.$images[$i]}}" ></li>

         @endfor
         </ul>
         <!--<img src="{{asset($land->photo)}}" title="logo" "width=100% height=98%"/>-->
        </div>
        <div id="mainImage">
             <img id="mainimg" src="{{asset($land->photo).'/'.$images[0]}}" alt="">
        </div>
         </div>
         <div id="describe">
              <label style="font-size:170%;font-weight:normal">Property Features</label></br>
                {{$land->description}}
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
       </div>
       <div id="footer">
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
    </body>
</html>