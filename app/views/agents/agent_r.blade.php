<!DOCTYPE html>
<html>
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
      <title></title>
      <link rel="stylesheet" href="{{asset('bootstrap.min.css')}}">
      <link rel="stylesheet" href="{{asset('css/agent_property.css')}}">
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
      <div id="head"><label>Properties for Rent</label></div>
    @foreach(array_chunk($rents->all(),3) as $row)
      <div class="section">
     @foreach($row as $rent)
       <div id="property" class="col-md-4">
        <div id="pic">
    
            <?php
             $path=$rent->photo;
            $images=json_decode($rent->imageFiles);
            $numOfImages=count($images);

            ?>
            @for($i=0;$i < $numOfImages;$i++)
             
            @endfor
        
          <img src="{{asset($rent->photo).'/'.$images[0]}}" alt="">
           
        </div>
        <div id="info">
        
          <label style="color:#FFC809">Ksh {{$rent->price}}</label></br></br>
            <label>{{HTML::linkRoute('prop_r',$rent->name,array($rent->id))}}</label></br>
          <small style="font-size:60%">Location</small>
         <label style="font-size:90%;font-style:italic;font-weight:normal">{{$rent->location}}</label>
        <label style="float:right;font-style:italic;font-weight:normal">{{HTML::linkRoute('prop_r','View Property',array($rent->id))}}</label>
       </div>
       <div id="share">
          <i class="fa fa-upload fa-2x"></i>&nbsp;&nbsp;
          <label style="font-size:90%;color:#0099FF;font-weight:normal">Save</label>
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp;&nbsp;
         <i class="fa fa-print fa-2x"></i>&nbsp;&nbsp;
          <label style="font-size:90%;color:#0099FF;font-weight:normal">
          {{HTML::linkRoute('rent_print','Print',array($rent->id))}}
          </label>  

       </div>
       </div>
        @endforeach
     <div id="paginate">
    <?php
    for($number=1;$number<=$total_pages;$number++){
      echo'<a href="?page='.$number.'">'.$number.'</a> &nbsp &nbsp';

      }
    ?>
     </div>
      </div>
     @endforeach
    
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