<html>
<style type="text/css">
/* #img{
 	width:70%;
 	height:10%;
 	background-color:#f8f8f8;
 	padding:2%;
 	margin:auto;
 }*/
 .img_res{
 	width:90%;
 	height:95%;
 }
 #post{
 	width:170%;
 	font-family:sans-serif;
 	color:#505050;
 	background-color:white;
 	padding-left:5%;
 }
</style>

</html>
@extends('blog.default')
@section('header')
<h3>Blog Post</h3>
@stop
@section('post')
@foreach($post as $post)
<h2>{{$post->title}}</h2>


<div id='img'><?php echo"<img src=http:/blog/img/".$post->id."width=10% height=10%> ";?></div></br>

<!--{{HTML::image('blog/img/'.$post->id)}}-->	
 </br>{{nl2br($post->post);}}
  <h4>BlogCategory::{{$post->category}}</h4>
<small>Posted_At{{$post->created_at}}</small>
@endforeach
@stop
