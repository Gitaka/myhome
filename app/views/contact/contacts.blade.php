<!DOCTYPE html>
<html>
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
      <title></title>
      <link rel="stylesheet" href="{{asset('bootstrap.min.css')}}">
  
      <link rel="stylesheet" href="{{asset('font-awesome/css/font-awesome.min.css')}}">

      <style type="text/css">
body{
  width:100%;
    height:1000px;
}

.wrapper{
  width:100%;
  height:100%;
  background-color:#f1f0ee;
  margin:auto;
  position:relative;
}
#top{
  width:100%;
  height:10%;
  background-color:#336666;
  border-bottom:2px solid #026660;
}
.header{
  background:#222222;
}
.wrap{
  width:100%;
    height:100%;
  /*margin:0 auto;*/
}
.logo{
  width:15%;
  height:100%;
  float: left;
  /*margin-top:0.5em;*/
}
.top-nav{
  width:85%;
  height:100%;
  float:right;
}
.top-nav ul li{
  display:inline-block;
  float:left;
}
.top-nav ul li a{
  color:#fff;
  font-family: 'Open Sans', sans-serif;
  font-size:130%;
  /*padding:85px 25px 10px 10px;*/
  padding:20px 0px 0px 20px;
  display: block;
  text-decoration:none;
  /*text-transform: uppercase;*/
}
 .top-nav li> a:hover {
  color:#fff;
  /*background: url(../images/marker.png) 50% 100%no-repeat;*/
}
/* end header */
.container{
  width:90%;
  height:80%;
  background-color:#fff;
  margin-top:2%;
}
#section{
  width:60%;
  height:90%;
  float:left;
}
#head{
  height:15%;
  width:100%;

   padding-top:2%;
     padding-left:5%;
   font-size:250%;
   color:#505050;
}
#info{
  width:100%;
  height:40%;
  padding-top:2%;
  padding-left:15%;
  padding-right:14%;
  font-size:120%;
  font-family: "Lato",sans-serif;
  color: #026660;;
  font-weight:normal;
}
#icons{
width:100%;
height:40%;
padding-top:2%;  
padding-left:5%;
font-size:150%;
color: #026660;;
font-weight:normal;
}
#aside{
  width:40%;
  height:90%;
  float:right;
}
#contact{
  width:75%;
  height:75%;
  background-color:#336666;
  margin-top:7%;
  margin-left:10%;
  padding-top:5%;
  padding-right:10%;
  padding-left:5%;

}
i.pin{
  height: 50px;
  width: 40px;
  float: left;
  background: url(../images/img-sprite.png)no-repeat -11px -122px;
  margin-right: 2%;
}
i.mobile{
  height: 50px;
  width: 40px;
  float: left;
  background: url(../images/img-sprite.png)no-repeat -60px -123px;
  margin-right: 2%;
}
i.message{
  height: 34px;
  width: 40px;
  float: left;
  background: url(../images/img-sprite.png)no-repeat -111px -123px;
  margin-right: 2%;
}
ul.contact_info {
  padding: 0;
  list-style: none;
  margin: 0;
}
ul.contact_info li{
  margin-bottom:2em;
}

      </style>
   </head>
   <body>
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
 <div id="section">
<div id="head">
 <p>We would like to hear from You</p>
</div>
<div id="info">
<p>Contact Us by Visiting  Our Offices At Kimathi streat,Norwich House Opposite Abrahims Electronics,5th floor,room 512. </p>
<p>Or Message Us by posting Us a Message With Your Fullnames,Email Address and a Short Message,and We Will get Back at You,Shortly.</p>
</div>
<div id="icons">
    <ul class="contact_info">
          <li><i class="pin"> </i><span>Kimathi Street,norwich Building</span></li>
          <li><i class="mobile"> </i><span>Tell: +254 900-235-2456<br>Fax: +254-900-235-2456</span></li>
          <li><i class="message"> </i><span class="msg">info(at)myHome.com</span></li>
        </ul>

</div>
 </div>
 <div id="aside">
 <div id="contact">
  
 {{Form::open(array('url'=>'contact','method'=>'POST'))}}

       {{Form::label('fullname','FullName')}}
       {{Form::text('fullname',null,array('class'=>'form-control'))}}
  @if($errors->has('fullname'))<p style="color:red">{{$errors->first('fullname')}}</p>@endif

       {{Form::label('email','Email')}}
       {{Form::text('email',null,array('class'=>'form-control'))}}
  @if($errors->has('email'))<p style="color:red">{{$errors->first('email')}}</p>@endif

 
       {{Form::label('message','message')}}
       {{Form::textarea('message',null,array('class'=>'form-control'))}}</br>
  @if($errors->has('message'))<p style="color:red">{{$errors->first('message')}}</p>@endif


       {{Form::submit('submit',array('class'=>'btn btn-primary'))}}
       {{Form::close()}}

 </div>
 </div>
     </div>
      </div>
      



 <script src="{{asset('js/bootstrap.min.js')}}"></script>
   </body>
  
</html>