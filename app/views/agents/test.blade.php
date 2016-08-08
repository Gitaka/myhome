<html>
<head>
<link rel="stylesheet" href="{{asset('css/portfolio.css')}}">
<script type="text/javascript" src="{{asset('js/jquery.js')}}"></script>
<script type="text/javascript" src="{{asset('js/test.js')}}"></script>
</head>
<body>
@foreach($rent as $rent)

<?php
$path=$rent->photo;
$images=json_decode($rent->imageFiles);
$numOfImages=count($images);

?>
<div id="overlay"></div>
<div id="frame">
	<table id="frame-table">
       <tr>
            <td id="left"><img src="{{asset('images/left.png')}}"/></td>
            <td id="right"><img src="{{asset('images/right.png')}}"/></td>
       </tr>
	</table>
  <img id="main" src="" alt="">
</div>
<div id="pics">
	<div id="mainImage">
        <img id="mainimg" src="{{asset($rent->photo).'/'.$images[0]}}" alt="">
	</div>
  <div id="thumbImage">
  
<ul id="propertyImages">
@for($i=0;$i < $numOfImages;$i++)

  <li id="image_{{$i}}"><img  src="{{asset($rent->photo).'/'.$images[$i]}}" ></li>

@endfor
</ul>
</div>

</div>
@endforeach

  
</body>
</html>


