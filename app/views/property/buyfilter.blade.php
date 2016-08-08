         @foreach($buys as $buy)
                   <div id="property" class="col-md-4">
                    <div id="pic">  
                          <?php
                               $path=$buy->photo;
                              $images=json_decode($buy->imageFiles);
                              $numOfImages=count($images);

                              ?>
                              @for($i=0;$i < $numOfImages;$i++)
             
                         @endfor
        
                      <img src="{{asset($buy->photo).'/'.$images[0]}}" alt=""style="width:100%;height:90%">
                              </div>
                    <div id="info">
                    
                      <label style="color:#FFC809">Ksh {{$buy->price}}</label></br>
                        <label>{{HTML::linkRoute('prop_s',$buy->name,array($buy->id))}}</label>
                      <small style="font-size:60%">Location</small>
                     <label style="font-size:90%;font-style:italic;font-weight:normal">{{$buy->location}}</label>&nbsp;&nbsp;&nbsp;
                    <label style="font-size:60%;float:right;font-style:italic;font-weight:normal">
                        {{HTML::linkRoute('prop_s','View Property',array($buy->id))}}
                    </label>
                   </div>
                   <div id="share">
                    <i class="fa fa-upload fa-1x"></i>&nbsp;&nbsp;
                      <label style="font-size:90%;color:#0099FF;font-weight:normal">Save</label>
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      &nbsp;&nbsp;&nbsp;&nbsp;
                     <i class="fa fa-print fa-1x"></i>&nbsp;&nbsp;
                      <label style="font-size:90%;color:#0099FF;font-weight:normal">
                         {{HTML::linkRoute('sale_print','Print',array($buy->id))}}

                      </label>
                   </div>
                   </div>
                    @endforeach