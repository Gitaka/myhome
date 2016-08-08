<!DOCTYPE html>
<html>
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
      <title>MyHome.co.ke</title>
      <link rel="stylesheet" href="{{asset('bootstrap.min.css')}}">
      <link rel="stylesheet" href="{{asset('css/main.css')}}">
       <script src="{{asset('js/jquery.js')}}"></script>
   </head>
   <body>
     <div class="wrapper">
     <div class="header" id="top">
            <div class="wrap">
                <!---start-logo-->
             <div class="logo">
                  <a href="/"><img src="{{asset('images/logo2.png')}}" title="logo" /></a>
             </div>
                <!---End-logo-->
              
                <!---start-top-nav-->
                <div class="top-nav">
                  <ul>
                    <li class="active"><a href="index.html">Home</a></li>
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
           <label style='color:white;font-size:200%; font-family:Open Sans;'>Your One Stop Property Center</label>
          <label style='color:white;font-family:Open Sans;font-size:550%'>MyHOME</label>
          
         </div>
        <div class='b'>
           <h1 style='color:white'>Search For Property</h1>
           <button type="button" id='buy' class="btn btn-default btn-lg">Buy</button>
           </br></br>
           <button type="button" id='rent' class="btn btn-default btn-lg">Rent</button>  

        </div>
       </div>
       <div id="s2">@yield('s2')</div>
       <div id="s3">@yield('s3')</div>
     </div>
     
  
     


     </div>
     <div class="footer"></div>
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

   </body>
  
</html>