
<!DOCTYPE html>
<html>
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
      <title></title>
      <link rel="stylesheet" href="{{asset('bootstrap.min.css')}}">
      <link rel="stylesheet" href="{{asset('css/blog.css')}}">
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
                    <li><a href="services.html">Services</a></li>
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
 <div id="section">
 <div id="head">Blog Posts</div>
 <div id="posts">
    @foreach(array_chunk($posts->all(),3) as $row)
 <div class="row">
@foreach($row as $post)

 <article class="col-md-4" >

<div>{{HTML::image('blog/img/'.$post->id)}}</div>
<h4 style='text-decoration:underline;color:#FFC809;'>{{HTML::linkRoute('post',$post->title,array($post->id))}}</h4></br>
<!--<div><?php// echo"<img src=http:/blog/img/".$post->id."width=10% height=10%> ";?></div></br>
<div id="img">{{HTML::image('blog/img/'.$post->id)}}</div>-->

   <p style="color:#585858;font-size:100%;">{{substr($post->post,0,300);}} </p>
   <h4 style="color:#FFC809">Category:{{$post->category}}</h4>
<small style="color:#FFC809">PostedOn:{{$post->created_at}}</small>
</article>

@endforeach

 </div>
 @endforeach

 </div>
 </div>
 <div id="aside">
     <div class='widget_1'>
   <div id="widgetHead">Recent Tweets</div>
   <div id="widgetBody"></div>

  </div>
  <div class='widget_2'>
 <div id="widgetHead2">Blog Categories</div>
 <div id="widgetBody2">
  @foreach($categories as $category)
     {{HTML::linkRoute('category',$category->category,array($category->category))}}
       </br></br>
  @endforeach
 </div>
  </div>
  <div class="widget_3">
      <div id="widgetHead3">In Press</div>
      <div id="widgetBody3">
       @foreach($press as $press)
        {{HTML::linkRoute('post',$press->title,array($press->id))}}</br></br>
       @endforeach
      </div>
  </div>
  <div class="widget_4">
      <div id="widgetHead4">Join Mail list</div>
      <div id="widgetBody4">
         <h4>Your Name</h4><input type="text" class="form-control" placeholder="name">
         <h4>Email</h4><input type="text" class="form-control" placeholder="Email Adress">
         </br><input type="checkbox"> You Agree to Terms Of Use And Privacy </br>
         <input type="submit" class="btn btn-danger" value="Send">
      </div>
  </div>
   <div class="widget_4">
      <div id="widgetHead4">Contacts</div>
      <div id="widgetBody4">
       <h4>P.O.BOX 88888,Nairobi</h4>
       <h5>Telephone:3456787645</h5>
       <h5>Mobile Number:+254727980834</h5>
       <h5> &nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:+254727980834</h5>
       <h5>Email Adress:Info@myHome</h5>
        <h6>Find our Offices at mYhome oppsite sheria,Nairobi </h6>


      </div>
  </div>

 </div>
</div>
<div class="footer"></div>
</div>
</body>
</html>

