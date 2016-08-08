<!DOCTYPE html>
<html>
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
      <title></title>
       <link rel="stylesheet" href="{{asset('css/inbox.css')}}">
      <link rel="stylesheet" href="{{asset('bootstrap.min.css')}}">
      <link rel="stylesheet" href="{{asset('font-awesome/css/font-awesome.min.css')}}">
       <script src="{{asset('js/jquery.js')}}"></script>
       <script src="{{asset('js/subscription.js')}}"></script>
   </head>
   <body>
       <div id="container"class="container-fluid">
           <header class="conrainer-fluid">
             <div class="row">
                <div id="menu-header" class="col-sm-2">
                  
                  <label id="page-title">Agent</label><label style="color:#fff;font-weight:normal;">Dashboard</label>
                </div>
                <nav class="col-sm-10">
                   <div id="nav"style="padding-left:40%;">
                          <ul id="nav-style"class="nav navbar-nav">
                               <li>{{HTML::linkRoute('home','Home')}}</li>
                               <li class="active">{{HTML::linkRoute('agentInbox','Inbox')}}</li>
                               <li>{{HTML::linkRoute('searchAgent','Tasks')}}</li>
                                <li>{{HTML::linkRoute('viewpost','Blog')}}</li>
                               <li>{{HTML::linkRoute('contact','Notifications')}}</li>
                               <li>{{HTML::linkRoute('agent_go_logout','LogOut')}}</li>
                          </ul>
                    </div>
                 </nav>
                </div>
           </header>
           <section class="container-fluid">
             <div id="wrapper" class="row">
                   <div id="vertical-nav" class="col-sm-2">
                      <div id="profile-pic">
                         <img src="{{asset($logo)}}" class="img-rounded" alt="Cinque Terre" width="200" height="150">
                         
                      </div>
                      <div id="menu">
                          <ul> 
                               <li><i class=" fa fa-user" >&nbsp;&nbsp;</i>{{HTML::linkRoute('agentaccount','My Profile')}}</li>
                               <li>{{HTML::linkRoute('agentlisting','AddListing')}}</li>
                               <li>{{HTML::linkRoute('myrent','View Rent')}}</li>
                               <li>{{HTML::linkRoute('myland','View Land')}}</li>
                               <li>{{HTML::linkRoute('mybuy','View Buy')}}</li>
                              <li><i class=" fa fa-bar-chart-o" >&nbsp;&nbsp;</i>{{HTML::linkRoute('agentInbox','Analysis')}}</li>
                          </ul>
                      </div>
                   </div>
                   <div id="content" class="col-sm-10">
                       <div class="container-fluid">
                           <div id="profile-info" class="row">
                              <div id="inbox">
                                  <div id="inbox-header">
                                      <h3>Inbox Messages</h3>
                                  </div>
                                  <div id="inbox-container">
                                  @foreach($messages as $message) 
                                  <div id="messages" class="contatiner-fluid">
                                       <div id="message-body" class="row">
                                           <div id="action-tags" class="col-sm-3">
                                            
                                           <input type="button" class="btn btn-danger" value="Delete">
                                                 &nbsp;&nbsp;&nbsp;&nbsp;
                                                 <label id="inbox-sender">{{$message->fullname}}</label>
                                        
                                           </div>
                                           <div id="inbox-message" class="col-sm-7">
                                              <label id="inbox-subject">{{$message->subject}}</label>
                                              <label id="inbox-text">-
                                  {{HTML::linkRoute('agentReadInbox',substr($message->message,0,60),array($message->id))}}
                                              </label>
                                           </div>
                                           <div id="inbox-delivery-date" class="col-sm-2">
                                              <label id="inbox-date">{{$message->created_at}}</label>                                        
                                               </div>
                                       </div>
                                       
                                  </div>
                                  @endforeach
                                  </div>
                                  <div id="pagination">
                                          <?php
                                              for($number=1;$number<=$total_pages;$number++){
                                                echo'<a href="?page='.$number.'">'.$number.'</a> &nbsp &nbsp';

                                                            }
                                           ?>
                                       </div>
                              </div>
                           </div>
                       </div>
                   </div>
             </div>
           </section>
       </div>
  <script src="{{asset('js/jquery.js')}}"></script>
 <script src="{{asset('js/bootstrap.min.js')}}"></script>
   </body>
</html>