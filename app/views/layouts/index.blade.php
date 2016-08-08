<!DOCTYPE HTML>
<html lang="en">
  <head>
    <title>MyHome.co.ke</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href="css/style.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" type="text/css" media="screen and (max-width:420px) "  href="css/small.css">
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="{{asset('font-awesome/css/font-awesome.min.css')}}">
  <script src="{{asset('js/jquery.js')}}"></script>
  <script type="text/javascript">
      $(document).ready(function(){
         var windowWidth = window.innerWidth;
         function getBaseUrl(){
             var protocol = window.location.protocol;
                host =  window.location.host;
                pathname = window.location.pathname;

           var BASE_URL = protocol + "//" +host + "/";
               return BASE_URL;
              }
          var BASE_URL = getBaseUrl();
       
         if(screen.width <= 450 || windowWidth <= 450){
             $('#body').css('display','none');
             window.location = BASE_URL + "mobile";
         }
   });
  </script>
  </head>
  <body style="background-color:#f1f0ee" id="body">
    <div id="wrap">
     <div class="header">
           <div class="header-top">
                <div class="logo">
                    <img class="logo-responsive" src="{{asset('images/icons/mylogo.png')}}">
                    
                </div>
                <div class="social_icons">
                   <ul>
            <li><a href="http://www.facebook.com"><img src="{{asset('images/icons/facebook.png')}}" title="facebook" /></a></li>
            <li><a href="http://www.twitter.com"><img src="{{asset('images/icons/twitter.png')}}" title="twitter" /></a></li>
            <li><a href="http://www.google-plus.com"><img src="{{asset('images/icons/google.png')}}" title="google plus" /></a></li>
               </ul>
                </div>
           </div>
           <div class="top-nav">
              <div class="top-nav-left ">
                <span class="nav-btn"></span>
            <ul class='nav-menu'>
                <li class="active">{{HTML::linkRoute('home','Home')}}</li>
                <li>{{HTML::linkRoute('property','Property Listings')}}</li>
                <li>{{HTML::linkRoute('searchAgent','Find Agent')}}</li>
                <li>{{HTML::linkRoute('viewpost','Blog')}}</li>
                <li>{{HTML::linkRoute('contact','Talk To Us')}}</li>
            
            </ul>
         
              </div>
              <div class="top-nav-right">
                 <ul>
                  <li>{{HTML::linkRoute('login','SignIn')}}</li>
                  <li>{{HTML::linkRoute('register','Register')}}</li>
                 </ul>
              </div>
           </div>
          </div>
        </div>
          <div id="container">
              <div class="search ">
                <div class="search-box">
                   <div class="search-nav">
                       <ul>
                          <li><button type="button" id="buy"class="btn btn-default btn-lg">For Sale</button></li>
                          <li><button type="button" id="rent"class="btn btn-default btn-lg">For Rent</button></li>
                           <li><button type="button" id="land"class="btn btn-default btn-lg">Land</button></li>
                          <li><button type="button" id="agent"class="btn btn-default btn-lg">Find Agent</button></li>
                       </ul>
                   </div>
                   <div class="search-loc">
                       <div id="s2">@yield('s2')</div>
                       <div id="s3" style="display:none">@yield('s3')</div>
                       <div id="s4"style="display:none">@yield('s4')</div> 
                       <div id="s5" style="display:none">@yield('s5')</div>
                   </div>
                </div>
              </div>
              
              <div class="content">
                  <div class="welcome-grid">
                      <div class="welcome-grid-header">Welcome To Our Site!</div>
                      <div class="welcome-grid-body">We Offer Search For On The Market Properties Giving You a Cutting Edge As Soon As They Come.</div>
                  </div>
                  <div class="about-grid">
                    <div class="mid-grid-left">
                     <div id="devs">
                      <div class="devs-head">
                        <div style="padding-left:35%"><img src="{{asset('images/icons/icon2.png')}}"></div>
                        <div style="padding-left:25%;font-size:200%">Developments</div>
                      </div>
                      <div class="devs-content">
                         Get Latest on upcoming new hot Properties Across Kenya,by Creating Your Instant Property alert.SignUp now!!!!!! or Join Our Mailing List.
                      </div>
                     </div>
                     <div id="loc">
                       <div class="loc-head">
                        <div style="padding-left:35%"><img src="{{asset('images/icons/icon3.png')}}"></div>
                        <div style="padding-left:25%;font-size:200%">Browse Kenya Locations</div>
                      </div>
                      <div class="loc-content">
                         <ul>
                            <li>Nairobi</li>
                            <li>Mombassa</li>
                            <li>Kisumu</li>
                            <li>Eldoret</li>
                            <li>Nyeri</li>
                         </ul>
                      </div>

                     </div>
                  </div>
                   <div class="mid-grid-right">
                      <div id="sales">
                       <div class="sales-head">
                        <div style="padding-left:35%"><img src="{{asset('images/icons/icon1.png')}}"></div>
                        <div style="padding-left:25%;font-size:200%">Free Expert Valuation</div>
                      </div>
                      <div class="sales-content">
                         Arrange A Free Valuation Of Your Property.Get Tips And Advice .
                      </div>

                      </div>
                   </div>

                  </div>
              </div>
              <div class="featured-listings">
                   <div class="listings-header">Featured Property Listings</div>   
                <div class="listings-body">
                  @foreach($featured as $property)
                   <div id="property" class="col-md-4">
                    <div id="pic">  
                      
                       
                            <?php
                               $path=$property->photo;
                              $images=json_decode($property->imageFiles);
                              $numOfImages=count($images);

                            ?>
                             @for($i=0;$i < $numOfImages;$i++)
             
                            @endfor
        
                  
                    
               <img src="{{asset($property->photo).'/'.$images[0]}}" title="property photo"style="width:100%;height:90%"/>
                    </div>
                    <div id="info">
                    
                      <label style="color:#FFC809">Ksh {{$property->price}}</label></br>
                        <label>{{HTML::linkRoute('viewprop',$property->name,array($property->id))}}</label>
                      <!--<small style="font-size:60%">Location</small>-->
                     <label style="font-size:50%;font-style:italic;font-weight:normal">Location: {{$property->location}}</label>
                    <label style="font-size:60%;float:right;font-style:italic;font-weight:normal">{{HTML::linkRoute('viewprop','View Property',array($property->id))}}</label>
                   </div>
                   <div id="share">
                    <i class="fa fa-upload fa-1x"></i>&nbsp;&nbsp;
                      <label style="font-size:90%;color:#0099FF;font-weight:normal">Save</label>
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      &nbsp;&nbsp;&nbsp;&nbsp;
                     <i class="fa fa-print fa-1x"></i>&nbsp;&nbsp;
                      <label style="font-size:90%;color:#0099FF;font-weight:normal">{{HTML::linkRoute('prop_print','Print',array($property->id))}}</label>
                   </div>
                   </div>
                    @endforeach

                </div>
                  <div class="pagination-section">
                  <?php
                  for($number=1;$number<=$total_pages;$number++){
                    echo'<a href="?page='.$number.'">'.$number.'</a> &nbsp &nbsp';

                    }
                  ?>
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
    <script type="text/javascript">
   $(document).ready(function(){
    $('#s2').show();
    $('#rent').click(function(){
       $('#s3').show();
       $('#s2').hide();
       $('#s4').hide();
       $('#s5').hide();
       $('#rent').css({'background-color':'#fff','color':'red'});
       $('#buy').css({'background-color':'#026660','color':'#000'});
       $('#agent').css({'background-color':'#026660','color':'#000'});
       $('#land').css({'background-color':'#026660','color':'#000'});
    });
     $('#buy').click(function(){
         $('#s2').show();
         $('#s3').hide();
         $('#s4').hide();
         $('#s5').hide();
         $('#buy').css({'background-color':'#fff','color':'red'});
         $('#rent').css({'background-color':'#026660','color':'#000'});
         $('#agent').css({'background-color':'#026660','color':'#000'});
         $('#land').css({'background-color':'#026660','color':'#000'});
     });
    $('#agent').click(function(){
        $('#s4').show();
        $('#s2').hide();
        $('#s3').hide();
        $('#s5').hide();
      $('#agent').css({'background-color':'#fff','color':'red'});
      $('#buy').css({'background-color':'#026660','color':'#000'});
      $('#rent').css({'background-color':'#026660','color':'#000'});
      $('#land').css({'background-color':'#026660','color':'#000'});
    });
   $('#land').click(function(){
        $('#s5').show();
        $('#s2').hide();
        $('#s3').hide();
        $('#s4').hide();
      $('#land').css({'background-color':'#fff','color':'red'});
      $('#buy').css({'background-color':'#026660','color':'#000'});
      $('#rent').css({'background-color':'#026660','color':'#000'});
      $('#agent').css({'background-color':'#026660','color':'#000'});
    });
   });
</script>

    </body>
</html>