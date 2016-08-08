<!DOCTYPE html>
<html>
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
      <title></title>

       <link rel="stylesheet" href="{{asset('bootstrap.min.css')}}">
       <link rel="stylesheet" href="{{asset('css/mobile/find.css')}}">
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
          <div id="section">
                 @yield('section');
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