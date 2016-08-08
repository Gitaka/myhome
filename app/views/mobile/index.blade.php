<!DOCTYPE html>
<html>
   <head>
      <meta name="description"
        content="view Property Listings In all Of Kenya">
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
      <title>mobile.Myhome.co.ke</title>

       <link rel="stylesheet" href="{{asset('bootstrap.min.css')}}">
       <link rel="stylesheet" href="{{asset('css/mobile/style.css')}}">
       <link rel="stylesheet" href="{{asset('font-awesome/css/font-awesome.min.css')}}">
       <script src="{{asset('js/jquery.js')}}"></script>
         <script type="text/javascript">
           $(function(){
               $(".nav-btn").click(function(){
                  $("ul.nav-menu").slideToggle();

                 });
              $(window).resize(function(){
           if($(window).width()>600){
            //$("ul.nav").removeAttr('style');
                }
              });
           });
  </script>
   </head>
   <body>
        <div id="wrap">
          <div class="header">
           <div class="header-top">
               <div class="logo">
                    <img class="logo-res" src="{{asset('images/icons/mylogo.png')}}">
                    
                </div>
        
           </div>
           <div class="top-nav">
             <div class="top-nav-left " class="clearfix">
                <span class="nav-btn"></span>
                  <ul class='nav-menu'>
                      <li class="active">{{HTML::linkRoute('home','Home')}}</li>
                      <li>{{HTML::linkRoute('m_listings','Property Listings')}}</li>
                      <li>{{HTML::linkRoute('m_agent_find','Find Agent')}}</li>
                  
                  
                  
                  </ul>
         
              </div>
         
           </div>
          </div>
        </div>
        <div id="container" >
            <div id="search">
              @yield('search')
            </div>
            <div id="about">
                <div id="welcome-grid-header">About Us</div>
                <div id="welcome-grid-body">
                    <div id="welcome-grid-about"><p>We Offer Search For On The Market Properties Giving You a Cutting Edge As Soon As They Come.</p>
                    <p>Get Latest on upcoming new hot Properties Across Kenya,by Creating Your Instant Property alert.SignUp now!!!!!! or Join Our Mailing List. </p></div>
                    <div id="welcome-grid-icons">
                       <div id="devs">
                         <div style="padding-top:15%;padding-left:35%"><img src="{{asset('images/icons/icon2.png')}}"></div>
                         <div style="padding-left:10%;font-size:130%">Developments.</div>
                       </div>
                       <div id="valuation">
                         <div style="padding-top:15%;padding-left:35%"><img src="{{asset('images/icons/icon1.png')}}"></div>
                          <div style="padding-left:15%;font-size:130%">Free Expert Valuation.</div>
                       </div>
                    </div>
                </div>
            </div>
            <div id="featured-properties-grid">
              <div id="featured-listings-header">Featured Listings</div>
              <div id="featured-listings-body">
                   @foreach($featured as $property)
                    <div id="property">
                      <div id="pic">
                          <?php
                              $path=$property->imgpath;
                              $images=json_decode($property->imageFiles);
                              $numOfImages=count($images);

                          ?>
                             @for($i=0;$i < $numOfImages;$i++)
             
                            @endfor
<img src="{{asset($property->imgpath).'/'.$images[0]}}" title="property photo"style="width:100%;height:90%"/>
                      </div>
                      <div id="info">
                       <p style="color:#026660">{{$property->location}},
                         {{$property->name}}</p>
                       <p>KSH {{$property->price}}</p>
                      </div>
                    </div>
                   @endforeach
              </div>
             
            </div>
            <div id="paginate">
                  <?php
                        for($number=1;$number<=$total_pages;$number++){
                          echo'<a href="?page='.$number.'">'.$number.'</a> &nbsp &nbsp';

                          }
                  ?>
            </div>
        </div>
        <div id="footer">
         <div class="footer-top-grid">
               <div class="footer-top-grid-header">My<label style="color:#026660;font-size:250%;font-weight:normal">Home</label>.com</div>
               <div class="footer-top-grid-body">
                            Contacts
                              <h4><i class=" fa fa-envelope " >&nbsp;&nbsp;</i>P.O.BOX 88888,Nairobi</h4>
                              <h4> <i class=" fa fa-phone " ></i>&nbsp;&nbsp;Telephone:3456787645</h4>
                              <h4><i class=" fa fa-phone " ></i>&nbsp;&nbsp;Mobile Number:+254727980834</h4>
                              <h4><i class=" fa fa-envelope " ></i>&nbsp;&nbsp;Email Adress:Info@myHome</h4>
                              <h5><i class=" fa fa-home fa-2x " ></i>&nbsp;&nbsp;Find our Offices at myHome,Nairobi.</h5>
               </div>
         </div>
           <div class="footer-bottom-grid">
              <div class="footer-bottom-grid-copywrite">
                &copy;  2016copyright my<label style="color:#026660;font-weight:normal">Home</label>
              </div>
          
           </div>
        </div>
   </body>
</html>