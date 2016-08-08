<!DOCTYPE html>
<html>
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
      <title></title>

       <link rel="stylesheet" href="{{asset('bootstrap.min.css')}}">
       <link rel="stylesheet" href="{{asset('css/mobile/property.css')}}">
       <link rel="stylesheet" href="{{asset('font-awesome/css/font-awesome.min.css')}}">
       <script src="{{asset('js/jquery.js')}}"></script>
         <script type="text/javascript">
           $(function(){
               $(".nav-btn").click(function(){
                  $("ul.nav-menu").slideToggle();

                 });
              $(window).resize(function(){
           if($(window).width()>600){
        
                }
              });
            var contact = $('#agent-contacts').html();
             $("#contacts").append(contact);
            //alert(contact);
           });
  </script>
   </head>
   <body>
        <div id="wrap">
          <div class="header">
           <div class="header-top">
               <div class="logo">
                    <img class="logo-res" src="{{asset('images/icons/mylogo.png')}}">
                    
                </div>
        
           </div>
           <div class="top-nav">
             <div class="top-nav-left " class="clearfix">
                <span class="nav-btn"></span>
                  <ul class='nav-menu'>
                      <li class="active">{{HTML::linkRoute('home','Home')}}</li>
                      <li>{{HTML::linkRoute('m_listings','Property Listings')}}</li>
                      <li>{{HTML::linkRoute('m_agent_find','Find Agent')}}</li>
                    
                  </ul>
         
              </div>
         
           </div>
          </div>
        </div>
        <div id="container"> 
          @foreach($property as $property)
          <div id="property">
            
            <div id="pic">
                  <?php
                    $path=$property->photo;
                    $images=json_decode($property->imageFiles);
                    $numOfImages=count($images);

                  ?>
                  
                  @for($i=0;$i < $numOfImages;$i++)
                  @endfor
        <img id="img-res"src="{{asset($property->photo).'/'.$images[0]}}" alt="property Image" >
            </div>
            <div id="property-info">
              
              <div id="info">
                <p>{{$property->name}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                Location:{{$property->location}}</p>
                <label style="color:red;font-weight:normal;">KSH {{$property->price}}</label>
              </div>
              <div id="contacts"></div>
            </div>
            @if($type == 'land')
              <script type="text/javascript">
                $(document).ready(function(){
                     $('#property-details').hide();
                });
                
              </script>
            @endif
            <div id="property-details">
               <label style="font-weight:normal;color:#026660;font-size:130%">PROPERTY DETAILS</label></br>
                 <label id="lble">Bedrooms</label><label id="lble2">{{$property->bedrooms}}</label></br>
                 <label id="lble">Spaces</label><label id="lble2">{{$property->outsidespace}}</label></br>
                 <label id="lble">Status</label><label id="lble2">{{$property->status}}</label></br>
            </div>
            <div id="property-desc">
              <label style="font-weight:normal;font-size:130%;color:#026660">PROPERTY DESCRIPTION</label>
                <?php  echo nl2br($property->description)?>
            </div>
            <div id="property-contact">
              <div id="contact-header">Contact Seller</div>
             @foreach($agent as $agent)
              <div id="contact-body">
                   {{Form::open(array('url'=>'agent/contact','method'=>'POST'))}}

                   {{Form::label('fullname','Full Names')}}</br>
                   {{Form::text('fullname',null,array('class'=>'form-control'))}}</br>
              @if($errors->has('fullname'))<p style="color:red">{{$errors->first('fullname')}}</p>@endif

              {{Form::label('subject','Subject')}}</br>
                   {{Form::text('subject',null,array('class'=>'form-control','placeholder'=>'Enter the Name of Property '))}}</br>
              @if($errors->has('subject'))<p style="color:red">{{$errors->first('subject')}}</p>@endif

                   {{Form::label('email','Email')}}</br>
                   {{Form::text('email',null,array('class'=>'form-control'))}}</br>
              @if($errors->has('email'))<p style="color:red">{{$errors->first('email')}}</p>@endif

                   {{Form::label('telephone','Telephone/Mobile')}}</br>
                   {{Form::text('telephone',null,array('class'=>'form-control'))}}</br>
              @if($errors->has('telephone'))<p style="color:red">{{$errors->first('telephone')}}</p>@endif</br>

                   {{Form::label('message','message')}}</br>
                   {{Form::textarea('message',null,array('class'=>'form-control'))}}</br>
              @if($errors->has('message'))<p style="color:red">{{$errors->first('message')}}</p>@endif


                  {{Form::hidden('id',$agent->id)}}

                   {{Form::submit('submit',array('class'=>'btn btn-success'))}}
                   {{Form::close()}} 
              </div>
              <div id="agent-details">
                <div id="agent-details-header">Agent Details</div>
                <div id="agent-details-body">
                    <div id="agent-logo">
                       <img id="img-res"src="{{asset($agent->logo_path)}}" title="logo" alt="agent-logo"/>
                    </div>
                    <div id="agent-info">
                       <p>Name:{{$agent->firstname}} {{$agent->lastname}}&nbsp;&nbsp;Location:{{$agent->location}}</p>
                    <p id="agent-contacts"><i class="fa fa-envelope"></i>&nbsp;&nbsp;Email:{{$agent->email}} </br> <i class="fa fa-phone"></i>&nbsp;&nbsp;Mobile:0{{$agent->mobile}}</p>
                    </div>
                </div>
              </div>
            @endforeach
            </div>
          </div>
          @endforeach
        </div>
        <div id="footer">
         <div class="footer-top-grid">
               <div class="footer-top-grid-header">My<label style="color:#026660;font-size:250%;font-weight:normal">Home</label>.com</div>
               <div class="footer-top-grid-body">
                            Contacts
                              <h4><i class=" fa fa-envelope " >&nbsp;&nbsp;</i>P.O.BOX 88888,Nairobi</h4>
                              <h4> <i class=" fa fa-phone " ></i>&nbsp;&nbsp;Telephone:3456787645</h4>
                              <h4><i class=" fa fa-phone " ></i>&nbsp;&nbsp;Mobile Number:+254727980834</h4>
                              <h4><i class=" fa fa-envelope " ></i>&nbsp;&nbsp;Email Adress:Info@myHome</h4>
                              <h5><i class=" fa fa-home fa-2x " ></i>&nbsp;&nbsp;Find our Offices at myHome,Nairobi.</h5>
               </div>
         </div>
           <div class="footer-bottom-grid">
              <div class="footer-bottom-grid-copywrite">
                &copy;  2016copyright my<label style="color:#026660;font-weight:normal">Home</label>
              </div>
          
           </div>
        </div>
      </body>
    </html>