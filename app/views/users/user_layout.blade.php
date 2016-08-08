<!DOCTYPE html>
<html>
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
      <title></title>

       <link rel="stylesheet" href="{{asset('bootstrap.min.css')}}">
      <link rel="stylesheet" href="{{asset('css/user.css')}}">
      <link rel="stylesheet" href="{{asset('font-awesome/css/font-awesome.min.css')}}">

       <script src="{{asset('js/jquery.js')}}"></script>
       <script type="text/javascript">
         $(document).ready(function(){
           var userName = $('#username').text();
               userEmail = $('#useremail').text();

            var userDetail = userName+"</br>"+userEmail;
            $('#userdetail').append(userDetail);

         });
       </script>
   </head>
   <body>
     <div class="wrapper">

        <div class="header" id="top">
            <div class="wrap">
                <!---start-logo-->
             <div class="logo">
                  <a href="/"><img src="{{asset('images/icons/myh4.png')}}" title="logo" /></a>
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
                       <li style="float:right;padding-right:2%">{{HTML::linkRoute('user_logout','LogOut')}}</li>
                     
                    <div class="clear"> </div>
                  </ul>
                </div>
                <div class="clear"> </div>
              
            </div>
          </div>

     <div class="container">
      <div id="content">
         <div id="content-header">
            <ul class="mini-nav">
                 <li><a href="#">Edit Profile</a></li>
                 <li>{{HTML::linkRoute('savedListings','SavedProperties')}}</li>
                 <li><a href="#">Advice</a></li>
                    <li id="userdetail" style="float:right;padding-right:10%;"></li>
            </ul>

         </div>
         @if(Session::has('updateProfile'))
             <p class="alert alert-info">{{Session::get('updateProfile')}}</p>
         @endif
         <div id="content-body">
           <div id="search">
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
           <div id="profile">
             <div id="profile-header">User Profile</div>
             <div id="profile-information">@yield('user')</div>
           </div>
         </div>
      </div>

     </div>
  </div>
     <div class="footer">

              <div class="footer-top-grid">
               <div class="footer-top-grid-header">My<label style="color:#026660;font-size:250%;font-weight:normal">Home</label>.com</div>
               <div class="footer-top-grid-body">
                     <div class="footer-top-grid-body-1">
                          <div class="footer-top-grid-body-1-left">
                             About Us</br></br>
                             {{HTML::linkRoute('agentlogin','Agent Member Area')}}</br></br>
                             {{HTML::linkRoute('viewpost','Blog')}}</br></br>
                             {{HTML::linkRoute('contact','Contact')}}</br></br>
                        

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
<!--<script type="text/javascript">
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
</script>-->
 <script src="{{asset('js/jquery.js')}}"></script>
 <script src="{{asset('js/bootstrap.min.js')}}"></script>
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