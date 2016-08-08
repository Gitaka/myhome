<!DOCTYPE HTML>
<html>
<head>
<style type="text/css">
 #logo{
 	width:250px;
 	height:100px;
 	margin-left:480px;
 }
 #title{
 	font-size:180%;
    color:#0099ff;
 }
 #image{
 	width:500px;
 	height:250px;
 	margin-top:30px;
 }
 .res{
 	width:95%;
 	height:90%;
 }
 #agent{
 	width:90%;
 	height:30%;

 }
</style>
</head>
<body>

<div id="logo"><?php echo'<img src="'.$image.'"/>';?></div>
<div id="title">Property Name: <?php echo$param?></div>
<div id="image"><?php echo'<img src="'.$image1.'" class="res"/>';?></div>
<div id="Features">
<label style="color:#0099ff;font-size:160%">Property Features</label>
<p style="color:#202020;font-size:110%;font-family:helvetica">
<?php echo$body?>
</p>
</div>
@foreach($prop as $prop)
{{$prop->name}}
@endforeach
<div id="agent">
 <label style="color:#0099ff;font-size:160%;margin-bottom:10px;">Agent Details</label>
 <div>
<div style="margin-left:20px;margin-top:5px;"><?php echo'<img src="'.$agents_logo.'"/>';?></div>
<div style="float:right">
	<h3>Name:<?php echo$agents_name?></h3>
	<h3>Email:<?php echo$agents_email?></h3>
	<h3>Mobile Number:<?php echo$agents_mobile?></h3>
</div>
</div>
</div>
</body>
</html>
