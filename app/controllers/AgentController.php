<?php

 class AgentController extends  BaseController{
      //$numberOfListingsUploads = null;
  public function seeAgent($username){
       //$agent = Agent::where('username','=',$username)->get();
      $agent = DB::table('agent')->where('username','=',$username)->paginate(12);

      foreach ($agent as $agent) {
            $agentId = $agent->id;
            $agentName = $agent->username;
            $agentLogo = $agent->logo_path;
            $agentEmail = $agent->email;
            $agentMobile = $agent->mobile;
            $agentLocation =$agent->location;
       }
      
      // if($agent != null){
          $listings = Listing::where('agent_id','=',$agentId)->paginate(15);
            return View::make('property.view2')
                      ->with('logo',$agentLogo)
                      ->with('username',$agentName)
                      ->with('email',$agentEmail)
                      ->with('mobile',$agentMobile)
                      ->with('location',$agentLocation)
                      ->with('properties',$listings);
       //}
  } 
 	public function create(){
 		return View::make('agents.create');

 	 }
 	 public function addagent(){
         $validation=Agent::validate(Input::all());

         if($validation->fails()){
         	return Redirect::to('agents')->withErrors($validation)->withInput();
         }else{ 
          
               DB::transaction(function(){
                    $file = Input::file('logo');
                      $agent_name=Input::get('username');
                      $agent_firstname=Input::get('firstname');
                      $agent_lastname=Input::get('lastname');
                      $id = Str::random(15);
                      $destinationPath = 'uploads/agentLogo/'.$id.'_'.$agent_name;
                      $filename = $file->getClientOriginalName();
                      $sudo=$id.'_'.$filename;
                      $extension = $file->getClientOriginalExtension();
                      $upload_success = $file->move($destinationPath, $filename);

                      /*image resize function*/
                      //include(app_path().'/includes/img_resize.php');

                        $target='uploads/agentLogo/' .$id.'_'.$agent_name.'/'.$filename;
                        $resized= 'uploads/agentLogo/'.$id.'_'.$agent_name.'/'.$sudo;
                        $max_width=270;
                        $max_height=190;

        img_resize($target,$resized,$max_width,$max_height,$extension);
        unlink('uploads/agentLogo/' .$id.'_'.$agent_name.'/'.$filename);

                       if($upload_success){
                          $newAgent=Agent::create(array(
                             'firstname'=>Input::get('firstname'),
                             'lastname'=>Input::get('lastname'),
                             'username'=>Input::get('username'),
                             'email'=>Input::get('email'),
                             'mobile'=>Input::get('mobile'),
                             'password'=>md5(Input::get('password')),
                             'location'=>Input::get('location'),
                             'logo_path'=>$resized,
                             'logo_ext'=>$extension
                           ));
                            $newSubscription=Subscription::create(array(
                                          'type_id'=>1,
                                          'user_id'=>$newAgent->id,
                                          'start_date'=>date('Y-m-d H:i:s',time()),
                                          'end_date'=>date('Y-m-d H:i:s',time()+ 24*30*60*60)
                                      ));
                              if(!$newAgent){
                                throw new Exception("Agent Not Created");
                                
                              }
                         
                       
                         }
               });
              /*Session::put('agent_id');
              return Redirect::to('agent/account'); */
              Session::flash('agent_add','Agent Account Successfully Created.Login into account with the Registerd Credentials');
              return Redirect::to('agent/login');
            
         }
      }
public function editagent(){
  $agent_id = Input::get('id');
  $validation=Agent::validate(Input::all());

         if($validation->fails()){
          Session::flash('edit_failed','Edit Failed,check for Errors and Try again');
          return Redirect::to('agent/account')->withErrors($validation)->withInput();             
                                               
         }else{ 


        $file = Input::file('logo');
        $agent_name=Input::get('username');
        $agent_firstname=Input::get('firstname');
        $agent_lastname=Input::get('lastname');
        $id = Str::random(15);
        $destinationPath = 'uploads/agentLogo/'.$id.'_'.$agent_name;
        $filename = $file->getClientOriginalName();
        $sudo=$id.'_'.$filename;
        $extension = $file->getClientOriginalExtension();
        $upload_success = $file->move($destinationPath, $filename);

        //include(app_path().'/includes/img_resize.php');

          $target='uploads/agentLogo/' .$id.'_'.$agent_name.'/'.$filename;
          $resized= 'uploads/agentLogo/'.$id.'_'.$agent_name.'/'.$sudo;
          $max_width=270;
          $max_height=190;

 img_resize($target,$resized,$max_width,$max_height,$extension);
 unlink('uploads/agentLogo/' .$id.'_'.$agent_name.'/'.$filename);
          
          
              if($upload_success){
          
               $agent = Agent::find($agent_id);
               $agent->firstname=Input::get('firstname');
               $agent->lastname=Input::get('lastname');
               $agent->username=Input::get('username');
               $agent->email=Input::get('email');
               $agent->mobile=Input::get('mobile');
               $agent->password=md5(Input::get('password'));
               $agent->location=Input::get('location');
               $agent->logo_path=$resized;
               $agent->logo_ext=$extension;

               $agent->save();

            Session::flash('edit_success','Profile Edit successfull');
            return Redirect::to('agent/account');
                   
    }
  }
  
}
 	 public function account(){
 	 	if(Session::has('agent_id')){
 	 		$id=Session::get('agent_id');
      $subscription=DB::table('subscriptions')->where('user_id',$id)->get();
      $agentLogo = DB::select(DB::raw('SELECT logo_path FROM agents WHERE id = '.$id.''));
      $agentname = Agent::find($id);
      $username = $agentname->username;
 	 	   
      foreach ($agentLogo as $logo) {
        $logo  = $logo->logo_path;
      }
      //return View::make('layouts.agent')
     return View::make('layouts.agents_index')
                    ->with('agent_id',$id)
                    ->with('subscription',$subscription)
                    ->with('agentId',$id)
                    ->with('username',$username)
                    ->with('logo',$logo)
                    ->with('agent',Agent::where('id',$id)->get());
                    

 	     }else{
          return Redirect::to('agent/login');
       }
 	 }

 	 public function agentLoginform(){
 	 	return View::make('agents.login');
 	 }


 	 public function login(){
 	 	    $email=Input::get('email');
 	        $password=md5(Input::get('password'));
    $agent=Agent::whereRaw('email=? and password=?',array($email,$password))->firstorfail();
     if($agent){
         Session::put('agent_id',$agent->id);
         return Redirect::to('agent/account');

      }elseif(!Session::has('agent_id')){
        return Redirect::to('agent/login')->with('message','Invalid Name or Password');
      }
  
    }

    public function logout(){
       Session::forget('agent_id');
       return Redirect::to('/');
    }

     public function listing(){
        if(!Session::has('agent_id')){
           return Redirect::to('agent/login');
         }else{ 
             $id=Session::get('agent_id');
             $subscriptionType=DB::table('subscriptions')->where('user_id','=',$id)->first();

             $agentLogo = DB::select(DB::raw('SELECT logo_path FROM agents WHERE id = '.Session::get('agent_id').''));
             foreach ($agentLogo as $logo) {
               $logo  = $logo->logo_path;
              }
             if($subscriptionType->type_id == 1){
                 
                 return View::make('agents.createListing')
                              ->with('logo',$logo)
                              ->with('type',Type::all())
                              ->with('agent',Agent::find($id));
                  //return Redirect::to('bronzecheckout/'.$id);
                
             }elseif($subscriptionType->type_id == 2){
                  $today= date("Y-m-d H:i:s",time());
               $end_date= date('Y-m-d H:i:s',strtotime($today)+ 24*30*60*60);
                
              $start=$subscriptionType->start_date;
              $end=$subscriptionType->end_date;
              $oq="'";
              $cq="'";
      $noOfListings=DB::select(DB::raw('SELECT * FROM buys WHERE agent_id='.$id.' AND 
                          created_at BETWEEN '.$oq.$start.$cq.' AND '.$oq.$end.$cq.''));

                      if(strtotime($today) >= strtotime($subscriptionType->end_date)){
                           Subscription::Where('user_id',$id)->update(array(
                                       'type_id' => 1,
                                       'start_date' => $today,
                                       'end_date' => $end_date
                                   ));
                           Session::flash('expire','Expired Subscription,Returned to default Bronze');
                           return Redirect::to('agent/account');
                      }else{
              $start=$subscriptionType->start_date;
              $end=$subscriptionType->end_date;
              $oq="'";
              $cq="'";
      $noOfListings=DB::select(DB::raw('SELECT * FROM buys WHERE agent_id='.$id.' AND 
                           created_at BETWEEN '.$oq.$start.$cq.' AND '.$oq.$end.$cq.''));
            if(count($noOfListings) >=3){
                 Subscription::Where('user_id',$id)->update(array(
                                       'type_id' => 1,
                                       'start_date' => $today,
                                       'end_date' => $end_date
                                   ));
                           Session::flash('maxUploads','Maximum of 15 uploads Reached,Returned to default Bronze Subscription');
                           return Redirect::to('agent/account');
                   //return'exceeded all uploads'.count($noOfListings);
               }else{
                   return View::make('agents.createListing')
                              ->with('logo',$logo)
                              ->with('type',Type::all())
                              ->with('agent',Agent::find($id));
               }
                  
                      }
   
             }elseif($subscriptionType->type_id ==3){
               //gold
               
               $today= date("Y-m-d H:i:s",time());
               $end_date= date('Y-m-d H:i:s',strtotime($today)+ 24*30*60*60);
                
                      if(strtotime($today) >= strtotime($subscriptionType->end_date)){
                              Subscription::Where('user_id',$id)->update(array(
                                       'type_id' => 1,
                                       'start_date' => $today,
                                       'end_date' => $end_date
                                   ));
                              Session::flash('expire','Expired Subscription,Returned to default Bronze');
                           return Redirect::to('agent/account');
                      }else{
                        return View::make('agents.createListing')
                              ->with('logo',$logo)
                              ->with('type',Type::all())
                              ->with('agent',Agent::find($id));
                      }
             }
         }
     }

     public function createlisting(){
     
          $validation=listing::validate(Input::all());

          if($validation->fails()){
                 return Redirect::to('agent/addlisting')->withErrors($validation)->withInput();                                 
             }else{
                
                 $files=Input::file('photo');
                 $listingName=Input::get('name');
                 $file_count=count($files);
                 $upload_count=0;
                 $listing=$listingName.'-'.Str::random(10).'';
                $listingNameLength=strlen($listing);
                
                foreach($files as $file){
                     $id = Str::random(15);
                     $filename=$file->getClientOriginalName();
                     $extension = $file->getClientOriginalExtension();
                     $destinationPath='uploads/listings/'.$listing;
                     $sudo=$id.'_'.$filename;
                    $upload_success=$file->move($destinationPath,$filename);
                    $upload_count++;
                   

                    $target='uploads/listings/' .$listing.'/'.$filename;
                    $resized= 'uploads/listings/'.$listing.'/'.$sudo;
                    $max_width=370;
                    $max_height=300;

                     img_resize($target,$resized,$max_width,$max_height,$extension);
                      $done[]=substr($resized,$listingNameLength+32);
                     unlink('uploads/listings/' .$listing.'/'.$filename);
                    
                   }
                       if($upload_count==$file_count and $upload_success){
                           Listing::create(array(
                                 
                                  'name'=>Input::get('name'),
                                   'for'=>Input::get('for'),
                                  'agent_id'=>Input::get('id'),
                                   'location'=>Input::get('location'),
                                  'owner'=>Input::get('owner'),
                                  'mobile'=>Input::get('mobile'),
                                  'type_id'=>Input::get('type_id'),
                                  'price'=>Input::get('price'),
                                  'maxprice'=>Input::get('maxprice'),
                                  'minprice'=>Input::get('minprice'),
                                  'description'=>Input::get('description'),
                                  'bedrooms'=>Input::get('bedrooms'),
                                  'outsidespace'=>Input::get('outsidespace'),
                                  'status'=>Input::get('status'),
                                  'photo'=>$destinationPath,
                                  'imgtype'=>$extension,
                                  'imageFiles'=>JSON_encode($done),
                            ));
                           Session::flash('success','Created Listing');
                         
                           return Redirect::to('agent/account');
                            

                       }
      
          }
     }
    /*public function buy(){
      if(!Session::has('agent_id')){
        return Redirect::to('agent/login');
      }else{ 
             $id=Session::get('agent_id');
                return View::make('agents.createbuy')
                ->with('type',Type::all())
                ->with('agent',Agent::find($id));
         }
   
    }

    public function createbuy(){
       $validation=Buy::validate(Input::all());
      if($validation->fails()){
        return Redirect::to('agent/addbuy')->withErrors($validation)->withInput();
      }else{
            $files=Input::file('photo');
             $buyName=Input::get('name');
             $file_count=count($files);
             $upload_count=0;
             $buy=$buyName.'-'.Str::random(10).'';
            $buyNameLength=strlen($buy);
             foreach($files as $file){
                 $id = Str::random(15);
                 $filename=$file->getClientOriginalName();
                 $extension = $file->getClientOriginalExtension();
                 $destinationPath='uploads/buys/'.$buy;
                 $sudo=$id.'_'.$filename;
                $upload_success=$file->move($destinationPath,$filename);
                $upload_count++;
               

          $target='uploads/buys/' .$buy.'/'.$filename;
          $resized= 'uploads/buys/'.$buy.'/'.$sudo;
          $max_width=370;
          $max_height=300;

 img_resize($target,$resized,$max_width,$max_height,$extension);
  $done[]=substr($resized,$buyNameLength+29);
 unlink('uploads/buys/' .$buy.'/'.$filename);
              
             }
            
             if($upload_count==$file_count and $upload_success){
        
                Buy::create(array(
                       'name'=>Input::get('name'),
                       'agent_id'=>Input::get('id'),
                       'location'=>Input::get('location'),
                      'owner'=>Input::get('owner'),
                      'mobile'=>Input::get('mobile'),
                       'type_id'=>Input::get('type_id'),
                     'price'=>Input::get('price'),
                      'maxprice'=>Input::get('maxprice'),
                      'minprice'=>Input::get('minprice'),
                      'description'=>Input::get('description'),
                      'bedrooms'=>Input::get('bedrooms'),
                      'outsidespace'=>Input::get('outsidespace'),
                      'status'=>Input::get('status'),
                       'photo'=>$destinationPath,
                       'imgtype'=>$extension,
                      'imageFiles'=>JSON_encode($done),
                  
               ));
               return Redirect::to('agent/account');
     
         }
       

      }
       
    }*/

    /*public function rent(){
      if(!Session::has('agent_id')){
           return Redirect::to('agent/login');
      }else{
        $id=Session::get('agent_id');
        return View::make('agents.createrent')
                ->with('type',Type::all())
                ->with('agent',Agent::find($id));
      }
     
    }
    public function createrent(){
       $validation=Rent::validate(Input::all());
       if($validation->fails()){
        return Redirect::to('agent/addrent')->withErrors($validation)->withInput();
       }else{
             $files=Input::file('photo');
             $rentName=Input::get('name');
             $file_count=count($files);
             $upload_count=0;
             $rent=$rentName.'-'.Str::random(10).'';
            $rentNameLength=strlen($rent);
             foreach($files as $file){
                 $id = Str::random(15);
                 $filename=$file->getClientOriginalName();
                 $extension = $file->getClientOriginalExtension();
                 $destinationPath='uploads/rents/'.$rent;
                 $sudo=$id.'_'.$filename;
                $upload_success=$file->move($destinationPath,$filename);
                $upload_count++;
               

          $target='uploads/rents/' .$rent.'/'.$filename;
          $resized= 'uploads/rents/'.$rent.'/'.$sudo;
          $max_width=370;
          $max_height=300;

 img_resize($target,$resized,$max_width,$max_height,$extension);
  $done[]=substr($resized,$rentNameLength+22);
 unlink('uploads/rents/' .$rent.'/'.$filename);
              
             }
         
             if($upload_count==$file_count and $upload_success){
          
               Rent::create(array(
                'name'=>Input::get('name'),
                'agent_id'=>Input::get('id'),
                'location'=>Input::get('location'),
                'owner'=>Input::get('owner'),
                'mobile'=>Input::get('mobile'),
                'type_id'=>Input::get('type_id'),
                'price'=>Input::get('price'),
                'maxprice'=>Input::get('maxprice'),
                'minprice'=>Input::get('minprice'),
                'description'=>Input::get('description'),
                'bedrooms'=>Input::get('bedrooms'),
                'outsidespace'=>Input::get('outsidespace'),
                'status'=>Input::get('status'),
                 'photo'=>$destinationPath,
                 'imgtype'=>$extension,
                 'imageFiles'=>JSON_encode($done),
                  
               ));
              //Session::flash('rent_stored','Your Message Has Been Deliverd');
               return Redirect::to('agent/account'); 
         }
      }

    }*/

  public function land(){
     if(!Session::has('agent_id')){
           return Redirect::to('agent/login');
      }else{
        $id=Session::get('agent_id');
        return View::make('agents.createland')
                ->with('size',Size::all())
                ->with('agent',Agent::find($id));
      }
  }
   public function createland(){
      $validation=Land::validate(Input::all());
      if($validation->fails()){
           return Redirect::to('agent/addland')->withErrors($validation)->withInput();
        }else{
             $files=Input::file('photo');
             $landName=Input::get('name');
             $file_count=count($files);
             $upload_count=0;
             $land=$landName.'-'.Str::random(10).'';
            $landNameLength=strlen($land);
             foreach($files as $file){
                 $id = Str::random(15);
                 $filename=$file->getClientOriginalName();
                 $extension = $file->getClientOriginalExtension();
                 $destinationPath='uploads/lands/'.$land;
                 $sudo=$id.'_'.$filename;
                $upload_success=$file->move($destinationPath,$filename);
                $upload_count++;
               

          $target='uploads/lands/' .$land.'/'.$filename;
          $resized= 'uploads/lands/'.$land.'/'.$sudo;
          $max_width=370;
          $max_height=300;

 img_resize($target,$resized,$max_width,$max_height,$extension);
  $done[]=substr($resized,$landNameLength+22);
 unlink('uploads/lands/' .$land.'/'.$filename);
              
             }
         
             if($upload_count==$file_count and $upload_success){
          
               Land::create(array(
                'name'=>Input::get('name'),
                'agent_id'=>Input::get('id'),
                'location'=>Input::get('location'),
                'owner'=>Input::get('owner'),
                'mobile'=>Input::get('mobile'),
                'size'=>Input::get('size'),
                'price'=>Input::get('price'),
                'maxprice'=>Input::get('maxprice'),
                'minprice'=>Input::get('minprice'),
                'description'=>Input::get('description'),
                'photo'=>$destinationPath,
                'imgtype'=>$extension,
                'imageFiles'=>JSON_encode($done),
                  
               ));
              //Session::flash('rent_stored','Your Message Has Been Deliverd');
               return Redirect::to('agent/account'); 
                
         }
        }
   }

    public function search_agent(){

       return View::make('agents.search');
      
    }

 
    public function search(){
       $validation=Agent::validateFindAgent(Input::all());

       if($validation->fails()){
           return Redirect::to('agent/search')->withErrors($validation);
       }else{
       $location=Input::get('location');
       $agent_name=Input::get('agentname');

       $agent=DB::table('agents')->where('location',$location)
                    ->where('username',$agent_name)
                    ->orWhere('location',$location)->paginate(6);
   
       return View::make('agents.agent_results2')
                      ->with('location',$location)
                      ->with('agentname',$agent_name)
                      ->with('agents',$agent);
        }
    
     }
     /*public function seeLogo($id){
          $logo=Agent::where('id',$id)->get();
          foreach($logo as $logo){
              $imgtype=$logo->imgtype;
            }
          $type='image/'.$logo->logo_ext;
          $view=View::make('agents.logo')
                  ->with('logo',Agent::where('id',$id)->get());
          $response=Response::make($view,200);
          $response->header('Content-Type',$type);
          return $response;
       
     }*/

       public function agentRent($id){
         $pageNo=Input::get('page',1);
         $perPage=3;
         $from = $pageNo*$perPage-$perPage;
         $to = $perPage;
  
          $totalData=Agent::find($id)->rlistings->count();
          $total_pages= ceil($totalData/$perPage);

 $rent['data']= DB::table('listings')->where('agent_id','=',$id)->where('for','=','2')->orderBy('id','desc')->skip($from)->take($to)->get();
  $rent['paginator'] = Paginator::make($rent['data'], count($totalData), $perPage);

            
           return View::make('agents.agent_r2')
                          ->with('total_pages',$total_pages)
                         ->with('rents',$rent['paginator']);
                         //return $totalData.'-----'.count($rent['data']);

                        
        }
        public function agentSale($id){
           $pageNo=Input::get('page',1);
           $perPage=4;
           $from = $pageNo*$perPage-$perPage;
           $to = $perPage;
           
            $totalData=Agent::find($id)->blistings->count();
            $total_pages= ceil($totalData/$perPage);

        $buy['data'] = DB::table('listings')->where('for','=','1')->where('agent_id','=',$id)->orderBy('id','desc')->skip($from)->take($to)->get();
         $buy['paginator'] = Paginator::make($buy['data'], count($totalData), $perPage);

         return View::make('agents.agent_s')
                           ->with('total_pages',$total_pages)
                           ->with('buys',$buy['paginator']);
                           
                          
        }
        public function agentland($id){
           $pageNo=Input::get('page',1);
           $perPage=2;
           $from = $pageNo*$perPage-$perPage;
            $to = $perPage;
            $totalData=Agent::find($id)->lands->count();
            $total_pages= ceil($totalData/$perPage);

  $land['data'] = DB::table('lands')->where('agent_id','=',$id)->orderBy('id','desc')->skip($from)->take($to)->get();
  $land['paginator'] = Paginator::make($land['data'], count($totalData), $perPage);

         return View::make('agents.agent_l')
                           ->with('total_pages',$total_pages)
                           ->with('lands',$land['paginator']);
        }
  public function prop_r($id){
     $rent=Listing::where('id',$id)->get();
     $rent_agent=Listing::where('id',$id)->get();
     foreach($rent_agent as $rent_agent){
        $agent_id=$rent_agent->agent_id;
     }
   
     $agent=Agent::where('id',$agent_id)->get();
    //return View::make('agents.test')
    return View::make('agents.view_rent2')
                 ->with('agent',$agent)
                 ->with('rent',$rent);
  }
  public function prop_s($id){
     $buy=Listing::where('id',$id)->get();
     $buy_agent=Listing::where('id',$id)->get();
     foreach($buy_agent as $buy_agent){
        $agent_id=$buy_agent->agent_id;
     }
     $agent=Agent::where('id',$agent_id)->get();

    return View::make('agents.view_sale')
                 ->with('agent',$agent)
                 ->with('buy',$buy);
  }
  public function prop_l($id){
    $land=Land::where('id',$id)->get();
     $land_agent=Land::where('id',$id)->get();
     foreach($land_agent as $land_agent){
        $agent_id=$land_agent->agent_id;
     }
     $agent=Agent::where('id',$agent_id)->get();

    return View::make('agents.view_land')
                 ->with('agent',$agent)
                 ->with('land',$land);
    }
 /*public function b_agentimg($id){
   //$buy=Buy::find($id);
   $buy=Buy::where('id',$id)->get();
          foreach($buy as $buy){
              $imgtype=$buy->imgtype;
            }
        //return $imgtype;
          $type='image/'.$buy->imgtype;
          $view=View::make('agents.img')
                  ->with('buys',Buy::where('id',$id)->get());
          $response=Response::make($view,200);
          $response->header('Content-Type',$type);
          return $response;
     }
   public function r_agentimg($id){
   
   $rent=Rent::where('id',$id)->get();
          foreach($rent as $rent){
              $imgtype=$rent->imgtype;
            }
     
          $type='image/'.$rent->imgtype;
          $view=View::make('agents.img_r')
                  ->with('rents',Rent::where('id',$id)->get());
          $response=Response::make($view,200);
          $response->header('Content-Type',$type);
          return $response;
     }

    public function b_propView($id){
      $buy=Buy::where('agent_id',$id)->get();
     return View::make('agents.b_view')
                  ->with('buy',$buy);
        
    }

    public function r_propView($id){
      $rent=Rent::where('agent_id',$id)->get();
     return View::make('agents.r_view')
                  ->with('rent',$rent);
        
    }*/

  public function contact($id){
    $agent = Agent::where('id','=',$id)->get();
    $agentLogo = DB::select(DB::raw('SELECT logo_path FROM agents WHERE id = '.$id.''));
       
      foreach ($agentLogo as $logo) {
        $logo  = $logo->logo_path;
      }

    return View::make('agents.contact')
                ->with('logo',$logo)
                ->with('agent',$agent)
                ->with('agent_id',$id);
  }
  public function ContactMessage(){
       $agent_id=Input::get('id');
  
 
    $validation=Message::validate(Input::all());
    if($validation->fails()){
      return Redirect::to('agent/contact/'.$agent_id.'')
                       ->withErrors($validation)->withInput();
    }else{ 
          Message::create(array(
          'fullname'=>Input::get('fullname'),
          'email'=>Input::get('email'),
          'subject'=>Input::get('subject'),
          'telephone'=>Input::get('telephone'),
          'message'=>Input::get('message'),
         'agent_id'=>Input::get('id'),
            ));
          Session::flash('agent_message','Your Message Has Been Deliverd');
            return Redirect::to('agent/contact/'.$agent_id.'');
        }

      }

    public function  inbox(){
   
       if(Session::has('agent_id')){
           $id=Session::get('agent_id');

          $pageNo=Input::get('page',1);
          $perPage=10;
          $from = $pageNo*$perPage-$perPage;
          $to = $perPage;
          $totalData=Message::where('agent_id',$id)->count();
          $total_pages= ceil($totalData/$perPage);
$messages['data']=DB::select(DB::raw('SELECT * FROM messages WHERE agent_id='.$id.' ORDER BY id DESC LIMIT '.$from.','.$to));
   $messages['paginator']=Paginator::make($messages['data'],count($totalData),$perPage);

     $agentLogo = DB::select(DB::raw('SELECT logo_path FROM agents WHERE id = '.$id.''));
       
      foreach ($agentLogo as $logo) {
        $logo  = $logo->logo_path;
      }
                  
                   return View::make('agents.inbox')
                                    ->with('logo',$logo)
                                    ->with('messages',$messages['paginator'])
                                    ->with('total_pages',$total_pages);
                                  
             }else{
                return Redirect::to('agent/login');
             }
      }
    public function agent_read($id){
         if(Session::has('agent_id')){
          $agentLogo = DB::select(DB::raw('SELECT logo_path FROM agents WHERE id = '.Session::get('agent_id').''));
          foreach ($agentLogo as $logo) {
            $logo  = $logo->logo_path;
          }
           return View::make('agents.inboxMessage')
                  ->with('logo',$logo)
                  ->with('message',Message::where('id',$id)->get())
                  ->with('agent_id',Session::get('agent_id'));
                 
         }else{
            return Redirect::to('agent/login');
         }
          
    }
 
 public function myrent(){
    
   if(Session::has('agent_id')){
         $id=Session::get('agent_id');
         $pageNo=Input::get('page',1);
         $perPage=2;
         $from = $pageNo*$perPage-$perPage;
         $to = $perPage;
  
          $totalData=Agent::find($id)->rlistings->count();
          $total_pages= ceil($totalData/$perPage);
 $rent['data']= DB::table('listings')->where('agent_id','=',$id)->where('for','=','2')->orderBy('id','desc')->skip($from)->take($to)->get();
   // $data['allData'] = DB::select( DB::raw('SELECT * FROM rents WHERE agent_id=1 LIMIT '.$from.','.$to));
        $rent['paginator'] = Paginator::make($rent['data'], count($totalData), $perPage);

          $agentLogo = DB::select(DB::raw('SELECT logo_path FROM agents WHERE id = '.Session::get('agent_id').''));
             foreach ($agentLogo as $logo) {
               $logo  = $logo->logo_path;
              }
           return View::make('agents.myrent')
                          ->with('logo',$logo)
                          ->with('agent',Agent::where('id',$id)->get())
                          ->with('total_pages',$total_pages)
                          ->with('rents',$rent['paginator']);
                 
               }else{
                   return Redirect::to('agent/login');
              }
       }
 public function mybuy(){
    
   if(Session::has('agent_id')){
         $id=Session::get('agent_id');
         $pageNo=Input::get('page',1);
         $perPage=2;
         $from = $pageNo*$perPage-$perPage;
         $to = $perPage;
  
          $totalData=Agent::find($id)->blistings->count();
          $total_pages= ceil($totalData/$perPage);
 
 $buy['data'] = DB::table('listings')->where('for','=','1')->where('agent_id','=',$id)->orderBy('id','desc')->skip($from)->take($to)->get();
   // $data['allData'] = DB::select( DB::raw('SELECT * FROM rents WHERE agent_id=1 LIMIT '.$from.','.$to));
        $buy['paginator'] = Paginator::make($buy['data'], count($totalData), $perPage);

          
             $agentLogo = DB::select(DB::raw('SELECT logo_path FROM agents WHERE id = '.Session::get('agent_id').''));
             foreach ($agentLogo as $logo) {
               $logo  = $logo->logo_path;
              }
           return View::make('agents.mybuy')
                          ->with('logo',$logo)
                          ->with('agent',Agent::where('id',$id)->get())
                          ->with('total_pages',$total_pages)
                          ->with('buys',$buy['paginator']);
                 
               }else{
                   return Redirect::to('agent/login');
              }
       }
       public function myland(){

      if(Session::has('agent_id')){
         $id=Session::get('agent_id');
         $pageNo=Input::get('page',1);
         $perPage=2;
         $from = $pageNo*$perPage-$perPage;
         $to = $perPage;
  
          $totalData=Agent::find($id)->lands->count();
          $total_pages= ceil($totalData/$perPage);

 $land['data'] = DB::table('lands')->where('agent_id','=',$id)->orderBy('id','desc')->skip($from)->take($to)->get();
   // $data['allData'] = DB::select( DB::raw('SELECT * FROM rents WHERE agent_id=1 LIMIT '.$from.','.$to));
        $land['paginator'] = Paginator::make($land['data'], count($totalData), $perPage);

  $agentLogo = DB::select(DB::raw('SELECT logo_path FROM agents WHERE id = '.Session::get('agent_id').''));
             foreach ($agentLogo as $logo) {
               $logo  = $logo->logo_path;
              }
            
           return View::make('agents.myland')
                          ->with('logo',$logo)
                          //->with('agent',Agent::where('id',$id)->get())
                          ->with('total_pages',$total_pages)
                          ->with('lands',$land['paginator']);

                 
               }else{
                   return Redirect::to('agent/login');
              }
       }
  }
?>