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
         #header{
            width:550px;
            height:50px;
            background-color:red;
            font-size:130%;

         }
         #photo{
            width:550px;
            height:250px;
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
       </style>
   </head>
<body>
    <div id="logo"><img src="images/icons/mylogo.png" title="logo" /></div>
@foreach($prop as $prop)
  <div id="header">
      {{$prop->name}}
  </div>
  <div id="images">
       
  </div>
@endforeach
</body>
</html>