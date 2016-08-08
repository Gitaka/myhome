<!DOCTYPE HTML>
<html>
    <head>
	   <meta charset="UTF-8">
       <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
       <title>printflayer</title>
       <style type="text/css">
        #logo{
        	margin-left:400px;
        }
         #name{
         	width:300px;
         	height:22px;
         	font-size:130%;
         	font-family:helvetica;
         	font-variant:normal;
         	font-weight:normal;
         	color:#000;
         	border-bottom:1px solid #d8d8d8;

         }
         #photo{
         	width:550px;
         	height:400px;
         	margin-top:10px;
         	padding-left:15px;
         	padding-top:10px;
         }
         .res{
         	width:90%;
         	height:90%;
         }
         #desc{
         	width:650px;
         	height:250px;
         	padding-left:10px;
         	padding-top:5px;
         	color:#202020;
         	font-size:100%;

         }
         #agent{
         	width:700px;
         	height:300px;
         
         }
         #agent_logo{
         	width:500px;
         	height:150px;
         	margin-left:130px;
         	
         }
        #agent_info{
        	width:100%;
        	height:50%;
        	margin-top:10px;
            padding-left:20px;
            padding-top:10px;
            font-weight:normal;
            font-size:100%;
            font-family:helvetica;
        }
        .logo_res{
        	width:50%;
        	height:100%;
        }
        #images {
            margin-right:2px;
            margin-bottom:2px;
          
        }
       </style>
   </head>
<body>
	<div id="logo"><img src="images/icons/mylogo.png" title="logo" /></div>
@foreach($prop as $prop)
<div id="name">{{$prop->name}}</div>
<div id="photo">
   
            <?php
            $path=$prop->photo;
            $images=json_decode($prop->imageFiles);
            $numOfImages=count($images);

            ?>
            @for($i=0;$i < $numOfImages;$i++)
              <?php echo'<img id="images" src="'.$path.'/'.$images[$i].'" "width=150px height=100px"/>';?>
            @endfor
          
        
</div>
<div id="desc">
 <label style="color:#0099ff;font-size:130%;font-weight:normal;text-decoration:underline">
 	Property Features</label>
 	<div style="margin-top:10px">{{$prop->description}}</div>
</div>
@endforeach
@foreach($agent as $agent)
<div id="agent">
<div id="agent_logo">
 <label style="margin-right:140px;color:#0099ff;font-size:130%;text-decoration:underline">
 	Agents Details
 </label><img src="{{$agent->logo_path}}" class="logo_res"/>
</div>
<div id="agent_info">
 <div>Agent Name:<label style="color:#0099ff;font-size:130%">{{$agent->firstname}}</label></div>
 <div>Mobile No:<label style="color:#0099ff;font-size:130%">{{$agent->mobile}}</label></div></br>
 <div>Email:<label style="color:#0099ff;font-size:130%">{{$agent->email}}</label></div></br>
 <div>Location:<label style="color:#0099ff;font-size:130%">{{$agent->location}}</label></div></br>
</div>
</div>
@endforeach
</body>
</html>