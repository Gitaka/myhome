    
               /*$today= date("Y-m-d H:i:s",time());
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
                              ->with('type',Type::all())
                              ->with('agent',Agent::find($id));
                      }*/





                                 $start=$subscriptionType->start_date;
              $end=$subscriptionType->end_date;
              $oq="'";
              $cq="'";
      $noOfListings=DB::select(DB::raw('SELECT * FROM buys WHERE agent_id='.$id.' AND created_at BETWEEN '.$oq.$start.$cq.' AND '.$oq.$end.$cq.''));
 /*$noOfListings=DB::select(DB::raw('SELECT * FROM buys WHERE agent_id='.$id.' AND
                                 created_at >='.strtotime($subscriptionType->start_date).' 
                                 AND created_at <= '.strtotime($subscriptionType->end_date).' '));*/
                if(count($noOfListings) <= 3){
                     return'continue uploading';
                }else{
                   return'no uploading';
                }
            

               //return count($noOfListings);