<!--<link rel="stylesheet" type="text/css" href="{{asset('css/filter.css')}}">-->
    
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
        
          <label style="color:#FFC809">Ksh {{$property->price}}</label>
            <label>{{HTML::linkRoute('viewprop',$property->name,array($property->id))}}</label></br>
          <small style="font-size:60%">Location</small>
         <label style="font-size:90%;font-style:italic;font-weight:normal">{{$property->location}}</label>&nbsp;&nbsp;&nbsp;
        <label style="font-size:60%;float:right;font-style:italic;font-weight:normal">{{HTML::linkRoute('viewprop','View Property',array($property->id))}}</label>
       </div>
       <div id="share">
        <i class="fa fa-upload fa-1x"></i>&nbsp;&nbsp;
          <label style="font-size:90%;color:#0099FF;font-weight:normal">Save</label>
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
         <i class="fa fa-print fa-1x"></i>&nbsp;&nbsp;
          <label style="font-size:70%;color:#0099FF;font-weight:normal">{{HTML::linkRoute('prop_print','Print',array($property->id))}}</label>
       </div>
       </div>
        @endforeach


 

