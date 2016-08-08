@foreach($lands as $land)
                   <div id="property" class="col-md-4">
                    <div id="pic">  
                          <?php
                               $path=$land->photo;
                              $images=json_decode($land->imageFiles);
                              $numOfImages=count($images);

                              ?>
                              @for($i=0;$i < $numOfImages;$i++)
             
                         @endfor
        
                      <img src="{{asset($land->photo).'/'.$images[0]}}" alt=""style="width:100%;height:90%">
                              </div>
                    <div id="info">
                    
                      <label style="color:#FFC809">Ksh {{$land->price}}</label></br>
                        <label>{{HTML::linkRoute('prop_l',$land->name,array($land->id))}}</label>
                      <small style="font-size:60%">Location</small>
                     <label style="font-size:90%;font-style:italic;font-weight:normal">{{$land->location}}</label>&nbsp;&nbsp;&nbsp;
                    <label style="font-size:60%;float:right;font-style:italic;font-weight:normal">
                        {{HTML::linkRoute('prop_l','View Property',array($land->id))}}
                    </label>
                   </div>
                   <div id="share">
                    <i class="fa fa-upload fa-1x"></i>&nbsp;&nbsp;
                      <label style="font-size:90%;color:#0099FF;font-weight:normal">Save</label>
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      &nbsp;&nbsp;&nbsp;&nbsp;
                     <i class="fa fa-print fa-1x"></i>&nbsp;&nbsp;
                      <label style="font-size:90%;color:#0099FF;font-weight:normal">
                         {{HTML::linkRoute('land_print','Print',array($land->id))}}

                      </label>
                   </div>
                   </div>
                    @endforeach