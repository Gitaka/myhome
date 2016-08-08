<!DOCTYPE html>
<html>
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
      <title></title>
      <link rel="stylesheet" href="{{asset('bootstrap.min.css')}}">
      <link rel="stylesheet" href="{{asset('css/results2.css')}}">
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
          <div class="search-agent-results-head">
               <h4>Agents Location:&nbsp;<label id="style-label">{{$location}}</label></h4>
          </div>
          <div class="search-agent-results-body">
                        @foreach($agents as $agent)
               <div id="agent">
                 <div id="logo">
                   <img src="{{asset($agent->logo_path)}}" title="logo" style="width:90%;height:85%"/>
                 </div>
                 <div id="info">
                   <div id="name">
                      <label id="style-label">{{$agent->username}}</label></br>
                       {{$agent->location}}</br></br></br></br></br>
             <i class="fa fa-envelope "></i>&nbsp;&nbsp;
              {{HTML::linkRoute('contactagent','Email Agent')}}
                   </div>
              <div id="mobile">
            <label style="float:right;padding-right:5%;"><i class="fa fa-phone fa-2x"></i>&nbsp;&nbsp;mobile:0{{$agent->mobile}}</label></br></br></br></br></br>
              </br></br>
          <i class="fa fa-home"></i>
              {{HTML::linkRoute('agentRent','View Rent',array($agent->id))}}

             &nbsp;  <i class="fa fa-home"></i>
              {{HTML::linkRoute('agentSale','View Sale',array($agent->id))}}
               &nbsp;  <i class="fa fa-home"></i>
              {{HTML::linkRoute('agentLand','View Land',array($agent->id))}}
               </div>
            

                 </div>
               </div>
             @endforeach
             <div style="padding-left:10%;">{{$agents->appends(array('location'=>$location,'agentname'=>$agentname))->links()}}</div>

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