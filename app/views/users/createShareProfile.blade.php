<!DOCTYPE html>
<html>
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
      <title></title>

       <link rel="stylesheet" href="{{asset('bootstrap.min.css')}}">
      <link rel="stylesheet" href="{{asset('css/share.css')}}">
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
      <div id="createShareProfile">
         <div id="profileHead">Create Profile</div>
         <div id="addProfile">
            {{Form::open(array('url'=>'createShareProfile','method'=>'post','multi-part'=>'true'))}}
            {{Form::label('firstname','Firstname')}}</br>
            {{Form::text('firstname',null,array('class'=>'form-control','placeholder'=>'firstname'))}}</br>
            {{Form::label('sirname','Sirname')}}</br>
            {{Form::text('sirname',null,array('class'=>'form-control','placeholder'=>'Sirname'))}}</br>
            {{Form::label('username','Username')}}</br>
            {{Form::text('username',null,array('class'=>'form-control','placeholder'=>'Username'))}}</br>
            {{Form::label('mobile','Mobile')}}</br>
            {{Form::text('mobile',null,array('class'=>'form-control','placeholder'=>'Mobile Contact'))}}</br>
            {{Form::label('dob','D.O.B')}}</br>
            {{Form::text('dob',null,array('class'=>'form-control','placeholder'=>'Date Of Birth'))}}</br>
            {{Form::label('gender','Gender')}}</br>
            {{Form::radio('female','female')}}Female</br>
            {{Form::radio('male','male')}}Male</br>
            {{Form::label('profile pic','Upload ShareProfilePic')}}</br>
            {{Form::file('photo')}}</br>
            {{Form::hidden('id',$id)}}
            {{Form::submit('CreateProfile',array('class'=>'btn btn-primary'))}}
            {{Form::close()}}
         </div>
      </div>
      <div id="showShareProfile"></div>
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