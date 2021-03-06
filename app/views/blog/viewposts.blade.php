<!DOCTYPE html>
<html>
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
      <title></title>
      <link rel="stylesheet" href="{{asset('bootstrap.min.css')}}">
      <link rel="stylesheet" href="{{asset('css/blog2.css')}}">
       <link rel="stylesheet" href="{{asset('font-awesome/css/font-awesome.min.css')}}">
       <script src="{{asset('js/jquery.js')}}"></script>
  
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
          <div class="container">
                      <div id="head">Blog</div>
      <div id="section">
            @foreach($posts as  $post)
      <div id="post" class="col-md-4">
        <div id="blog_img">
          <img src="{{asset($post->imgpath)}}" title="logo" width="100%" height="100%"/>
          
        </div>
        <div id="posts">
         <label style="font-size:135%;font-weight:normal;color:#0066ff">
          {{HTML::linkRoute('post',$post->title,array($post->id))}}
         </label></br>
          {{substr($post->post,0,150);}}</br>
         <i class=" fa fa-tags " >&nbsp;&nbsp;</i><label style="color:#FFC809;font-weight:normal">Category:</label>{{$post->category}}</br>
         <i class=" fa fa-calendar " >&nbsp;&nbsp;</i><label style="color:#FFC809;font-weight:normal">PostedOn:</label>{{$post->created_at}}</br>
        </div>
        <div id="share">
              <i class=" fa fa-archive " >&nbsp;&nbsp;</i>
              <label style="color:#0099FF;font-weight:normal">Save</label>
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <i class=" fa fa-print" >&nbsp;&nbsp;</i>
              <label style="color:#0099FF;font-weight:normal">Print</label>
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
      <div id="aside">
        <div class="widget_5">
             <div id="widgetHead5">Follow Us</div>
             <div id="widgetBody5">

          <a href="http://www.facebook.com"><img src="{{asset('images/fb.png')}}" title="facebook" alt=""></a>
            <a href="http://www.twitter.com"><img src="{{asset('images/twitter.png')}}" title="twitter" alt=""></a>
            <a href="http://www.googleplus.com"><img src="{{asset('images/gplus.png')}}" title="gplus" alt=""></a>
            <a href="#"><img src="{{asset('images/feed.png')}}" title="feed" alt=""></a>
            <a href="http://www.pinterest.com"><img src="{{asset('images/plus.png')}}" title="pinterest" alt=""></a>
             </div>
           </div>
        <div class="widget_1">
           <div id="widgetHead"> <i class=" fa fa-tags" >&nbsp;&nbsp;</i>Latest Blogs</div>
           <div id="widgetBody">
             @foreach($latest as $latest)
              <i class=" fa fa-bookmark" >&nbsp;&nbsp;</i> <label style="font-size:120%;font-weight:normal">
                {{HTML::linkRoute('post',$latest->title,array($latest->id))}}
              </label></br>
              {{substr($latest->post,0,95);}}</br>
              @endforeach
           </div>

         </div>
         <div class="widget_2">
            <div id="widgetHead2"><i class=" fa fa-rss" >&nbsp;&nbsp;</i>In Press</div>
           <div id="widgetBody2">
              @foreach($press as $press)
              <i class=" fa fa-bookmark" >&nbsp;&nbsp;</i>  <label style="font-size:120%;font-weight:normal">
                {{HTML::linkRoute('post',$press->title,array($press->id))}}
              </label></br>
              {{substr($press->post,0,95);}}</br>
              @endforeach
           </div>
         </div>
          <div class="widget_3">
             <div id="widgetHead3"><i class=" fa fa-envelope" >&nbsp;&nbsp;</i>join Mail List</div>
             <div id="widgetBody4">
                <h4>Your Name</h4><input type="text" class="form-control" placeholder="name">
               <h4>Email</h4><input type="text" class="form-control" placeholder="Email Adress">
               </br><input type="checkbox"> <label style="font-size:50%;">You Agree to Terms Of Use And Privacy</label>
               <input type="submit" class="btn btn-danger" value="Subscribe">
             </div>
          </div>
           <div class="widget_4">
             <div id="widgetHead4"><i class=" fa fa-home" >&nbsp;&nbsp;</i>Contact Us</div>
             <div id="widgetBody4">
                <h4><i class=" fa fa-envelope " >&nbsp;&nbsp;</i>P.O.BOX 88888,Nairobi</h4>
               <h4> <i class=" fa fa-phone " ></i>&nbsp;&nbsp;Telephone:3456787645</h4>
               <h4><i class=" fa fa-phone " ></i>&nbsp;&nbsp;Mobile Number:+254727980834</h4>
               <h4> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:+254727980834</h4>
               <h4><i class=" fa fa-envelope " ></i>&nbsp;&nbsp;Email Adress:Info@myHome</h4>
                <h5><i class=" fa fa-home fa-2x " ></i>&nbsp;&nbsp;Find our Offices at mYhome oppsite sheria,Nairobi.</h5>
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