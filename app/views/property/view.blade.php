<!DOCTYPE html>
<html>
   <head>
    <meta name="description" content="View all Property listings from kenya for sale and rent">
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
      <title>View Properties</title>
      <link rel="stylesheet" href="{{asset('bootstrap.min.css')}}">
      <link rel="stylesheet" href="{{asset('css/test2.css')}}">
       <link rel="stylesheet" href="{{asset('font-awesome/css/font-awesome.min.css')}}">
       <script src="{{asset('js/jquery.js')}}"></script>
       <script src="{{asset('js/advanceSearch.js')}}"></script>
   </head>
   <body>
   </body>
         <div class="wrapper">
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
          <div id="sidebar">
       <div class="sidebar-filter">
                 <div class="filter-head">
                     Advanced Search
                </div>
      <form>
         <div class="filter-all">
          <input type="checkbox" id="viewall" name="viewall"><label class="label-style">View all</label>
          <input type="checkbox" id="clear"><label class="label-style">Clear All Filters</label></br>
         </div>
        <div class="filter-recent">
               <label class="label-style">Recently Added</label></br>
             <div class="recent-indent">
               <input type="checkbox" id="onemonth">One Month</br>
               <input type="checkbox" id="oneweek">One Week
             </div>
        </div>
        <div class="filter-apartment">
         
      <input type="checkbox" id="apartment" name="apartment"><label class="label-style">Apartment</label></br>
             <div class="apartment-indent"><label class="label-style">No of Bedrooms</label></br>
                <input id="ab1" name="ab1"type="checkbox">1</br>
                <input id="ab2" type="checkbox">2</br>
                <input id="ab3" type="checkbox">3</br>
                <input id="ab4" type="checkbox">4</br>
                <input id="ab5" type="checkbox">5</br>
                <input id="ab6" type="checkbox">6</br></div>
        </div>
    
        <div class="filter-house">
         <input type="checkbox" id="house" name="house"><label class="label-style">House</label></br>
               <div class="house-indent"><label class="label-style">No of Bedrooms</label></br>
                <input id="hb1"type="checkbox">1</br>
                <input id="hb2"type="checkbox">2</br>
                <input id="hb3"type="checkbox">3</br>
                <input id="hb4"type="checkbox">4</br>
                <input id="hb5"type="checkbox">5</br>
                <input id="hb6"type="checkbox">6</br></div>
          </div>
          <div class="filter-outsideSpace">
            <label class="label-style">Outside Space</label></br>
                <div class="space-indent"><input id="drive" type="checkbox">DriveWay</br>
                <input type="checkbox" id="park">Parking</br>
                <input type="checkbox" id="garden">Garden</br></div>
          </div>
          <div class="filter-ownership">
          <label class="label-style">Pre-Owned/New Home</label></br>
                <div class="owner-indent"><input id="pre"type="checkbox">Pre-Owned</br>
                <input id="new"type="checkbox">New Home</div>
          </div>
      </form>
        </div>
       <div class="sidebar-content">
           <div class="sidebar-content-head-section"></div>
      
           <div class="sidebar-content-body-section">
                  @foreach($properties as $property)
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
                        <label>{{HTML::linkRoute('viewlisting',$property->name,array($property->id))}}</label>
                      <small style="font-size:60%">Location</small>
                     <label style="font-size:90%;font-style:italic;font-weight:normal">{{$property->location}}</label>&nbsp;&nbsp;&nbsp;
                    <label style="font-size:60%;float:right;font-style:italic;font-weight:normal">{{HTML::linkRoute('viewlisting','View Property',array($property->id))}}</label>
                   </div>
                   <div id="share">
                    <i class="fa fa-upload fa-1x"></i>&nbsp;&nbsp;
                      <label data-toggle="modal" data-target="#edit-modal"style="font-size:70%;color:#0099FF;font-weight:normal">Save</label>
                      &nbsp;&nbsp;&nbsp;
                  <!--<input type="button" class="btn btn-info"data-toggle="modal" data-target="#edit-modal" value="Save">-->
                     <i class="fa fa-print fa-1x"></i>&nbsp;&nbsp;
                      <label style="font-size:70%;color:#0099FF;font-weight:normal">{{HTML::linkRoute('prop_print','Print',array($property->id))}}</label>
                   <div id="edit-modal" class="modal fade" role="dialog">
                       <div class="modal-dialog">
                         <div class="modal-content">
                             <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                
                                <h4 class="modal-title">
                                   <label id="log"style="margin-right:10%;">Log In</label>
                                   <label id="reg">Register</label>
                                </h4>
                             </div>
                             <div class="modal-body">
                                <div id="modal-login">
                                      {{Form::open(array('url'=>'user/login','method'=>'post'))}}
                                       {{Form::label('username','Username')}}</br>
                                       {{Form::text('username',null,array('class'=>'form-control'))}}</br>
                                       {{Form::label('password','Password')}}</br>
                                       {{Form::password('password',array('class'=>'form-control'))}}</br>
                                       {{Form::submit('LogIn',array('class'=>"btn btn-primary"))}}
                                       {{Form::close()}}
                                </div>
                                <div id="modal-register" style="display:none;">
                                        {{Form::open(array('url'=>'user/register','method'=>'POST'))}}

                                        {{Form::label('username','Username')}}</br>
                                        {{Form::text('username',null,array('class'=>'form-control'))}}</br>
                                        @if($errors->has('username'))<p style='color:red'>{{$errors->first('username')}}</p>@endif

                                        {{Form::label('email','email')}}</br>
                                        {{Form::text('email',null,array('class'=>'form-control'))}}</br>
                                        @if($errors->has('email'))<p style='color:red'>{{$errors->first('email')}}</p>@endif

                                        {{Form::label('password','Password')}}</br>
                                        {{Form::password('password',array('class'=>'form-control'))}}</br>
                                        @if($errors->has('password'))<p style='color:red'>{{$errors->first('password')}}</p>@endif

                                         {{Form::submit('Register',array('class'=>"btn btn-primary"))}}
                                         {{Form::close()}}
                                </div>
                             </div>
                          </div>
                       </div>
                     </div>
                   </div>
                   </div>
                    @endforeach


           </div>
           <div class="sidebar-content-pagination-section">
                  <?php
                  for($number=1;$number<=$total_pages;$number++){
                    echo'<a href="?page='.$number.'">'.$number.'</a> &nbsp &nbsp';

                    }
                  ?>
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
<script type="text/javascript">
   $(document).ready(function(){
      $("#reg").click(function(){
         $("#modal-login").hide();
         $("#modal-register").show();
         $('#reg').css({"border-bottom":"2px solid #0066FF"});
         $('#log').css({"border-bottom":"2px solid #fff"});
      });
      $("#log").click(function(){
         $("#modal-register").hide();
         $("#modal-login").show();
         $('#log').css({"border-bottom":"2px solid #0066FF"});
         $('#reg').css({"border-bottom":"2px solid #fff"});
      });
   });
</script>
     <script src="{{asset('js/jquery.js')}}"></script>  
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    </body>
</html>