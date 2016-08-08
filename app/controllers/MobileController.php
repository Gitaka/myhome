<?php
class MobileController extends BaseController{
  public function m_index{
    return'hey';
  }
	public function index(){

         $featured =  DB::select(DB::raw('SELECT * FROM listings where isFeatured = true'));
      
          $pageNo=Input::get('page',1);
          $perPage=7;
          $from = $pageNo*$perPage-$perPage;
          $to = $perPage;

          $totalData = count($featured);
          $total_pages= ceil($totalData/$perPage);

 $featured['data'] = DB::table('listings')->where('isFeatured','=',1)->orderBy('id','desc')->skip($from)->take($to)->get();
        $featured['paginator'] = Paginator::make($featured['data'], count($totalData), $perPage);

                      
		return View::make('mobile.search')
		                   ->with('total_pages',$total_pages)
		                   ->with('featured',$featured['paginator']);
	}
	public function search(){
		$type = Input::get('type');
		$location = Input::get('location');
		$maxPrice = Input::get('maxPrice');
	
		if($type == 1){
			   $buy=DB::table('listings')->where('location','=',$location)
                                     ->where('maxprice','=',$maxPrice)
                                     ->where('for','=','1')
                                     ->orWhere('for','=','1')->get();

		         $pageNo=Input::get('page',1);
		         $perPage=10;
		         $from = $pageNo*$perPage-$perPage;
		         $to = $perPage;
		         $totalData=count($buy);
		         $total_pages= ceil($totalData/$perPage);

               $buy['data'] = DB::table('listings')->where('location','=',$location)
                                  ->where('maxprice','=',$maxPrice)
                                  ->where('for','=','1')
                                  ->orWhere('for','=','1')
                                  ->orderBy('id','desc')->skip($from)->take($to)->get();   
       
              $buy['paginator']=Paginator::make($buy['data'],count($totalData),$perPage);
          return View::make('mobile.buys')
                       ->with('type','Sale')
                       ->with('location',$location)
                        ->with('maxprice',$maxPrice)
                        ->with('total_pages',$total_pages)
                        ->with('buys',$buy['paginator']);


		}else if($type == 2){

			 $rent=DB::table('listings')->where('location','=',$location)
                                     ->where('maxprice','=',$maxPrice)
                                      ->where('for','=','2')
                                      ->orWhere('for','=','2')->get();
          $pageNo=Input::get('page',1);
			    $perPage=10;
			    $from = $pageNo*$perPage-$perPage;
			    $to = $perPage;
			    $totalData=count($rent);
			    $total_pages= ceil($totalData/$perPage);

			 $rent['data'] = DB::table('listings')->where('location','=',$location)
                                  ->where('maxprice','=',$maxPrice)
                                   ->where('for','=','2')
                                  ->orWhere('for','=','2')
                                  ->orderBy('id','desc')->skip($from)->take($to)->get();   
       
        $rent['paginator']=Paginator::make($rent['data'],count($totalData),$perPage);
             return View::make('mobile.rent')
                        ->with('type','Rent')
                       ->with('location',$location)
                        ->with('maxprice',$maxPrice)
                        ->with('total_pages',$total_pages)
                        ->with('rents',$rent['paginator']);
      
		}else if($type == 3){

       $land=DB::table('lands')->where('location','=',$location)
                                     ->where('maxprice','=',$maxPrice)
                                     ->orWhere('location',$location)->get();
          $pageNo=Input::get('page',1);
          $perPage=10;
          $from = $pageNo*$perPage-$perPage;
          $to = $perPage;
          $totalData=count($land);
          $total_pages= ceil($totalData/$perPage);

       $land['data'] = DB::table('lands')->where('location','=',$location)
                                  ->where('maxprice','=',$maxPrice)
                                  ->orWhere('location',$location)
                                  ->orderBy('id','desc')->skip($from)->take($to)->get();   
       
        $land['paginator']=Paginator::make($land['data'],count($totalData),$perPage);
             return View::make('mobile.land')
                        ->with('type','Land')
                       ->with('location',$location)
                        ->with('maxprice',$maxPrice)
                        ->with('total_pages',$total_pages)
                        ->with('lands',$land['paginator']);
      
    }


	}


  public function listings(){
         $pageNo=Input::get('page',1);
         $perPage=16;
         $from = $pageNo*$perPage-$perPage;
         $to = $perPage;
         $totalData=Listing::all()->count();
         $total_pages= ceil($totalData/$perPage);

         $properties['data'] = DB::table('listings')->orderBy('id','DESC')->skip($from)->take($to)->get();
         $properties['paginator']=Paginator::make($properties['data'],count($totalData),$perPage);
          
          return View::make('mobile.listings')
                      ->with('total_pages',$total_pages)
                      ->with('featured',$properties['paginator']);
  }

   public function search_agent(){

       return View::make('mobile.agentfind');
      
    }

    public function agent(){
      $validation=Agent::validateFindAgent(Input::all());

       if($validation->fails()){
           return Redirect::to('agent/search')->withErrors($validation);
       }else{
       $location=Input::get('location');
       $agent_name=Input::get('agentname');

       $agent=DB::table('agents')->where('location',$location)
                    ->where('username',$agent_name)
                    ->orWhere('location',$location)->paginate(7);
   
       return View::make('mobile.showAgent')
                      ->with('location',$location)
                      ->with('agentname',$agent_name)
                      ->with('agents',$agent);
                  
        }
    }


    public function agentrent($id){
        $pageNo=Input::get('page',1);
         $perPage=10;
         $from = $pageNo*$perPage-$perPage;
         $to = $perPage;
  
          $totalData=Agent::find($id)->rlistings->count();
          $total_pages= ceil($totalData/$perPage);

 $rent['data']= DB::table('listings')->where('agent_id','=',$id)->where('for','=','2')->orderBy('id','desc')->skip($from)->take($to)->get();
  $rent['paginator'] = Paginator::make($rent['data'], count($totalData), $perPage);

            
           return View::make('mobile.rent')
                          ->with('total_pages',$total_pages)
                          ->with('type','Rent')
                         ->with('rents',$rent['paginator']);
    }
        public function agentSale($id){
           $pageNo=Input::get('page',1);
           $perPage=10;
           $from = $pageNo*$perPage-$perPage;
            $to = $perPage;
            $totalData=Agent::find($id)->blistings->count();
            $total_pages= ceil($totalData/$perPage);

      $buy['data'] = DB::table('listings')->where('for','=','1')->where('agent_id','=',$id)->orderBy('id','desc')->skip($from)->take($to)->get();
         $buy['paginator'] = Paginator::make($buy['data'], count($totalData), $perPage);

         return View::make('mobile.buys')
                           ->with('total_pages',$total_pages)
                            ->with('type','Buy')
                           ->with('buys',$buy['paginator']);
        }

          public function agentland($id){
           $pageNo=Input::get('page',1);
           $perPage=10;
           $from = $pageNo*$perPage-$perPage;
            $to = $perPage;
            $totalData=Agent::find($id)->lands->count();
            $total_pages= ceil($totalData/$perPage);

  $land['data'] = DB::table('lands')->where('agent_id','=',$id)->orderBy('id','desc')->skip($from)->take($to)->get();
  $land['paginator'] = Paginator::make($land['data'], count($totalData), $perPage);


       
         return View::make('mobile.land')
                           ->with('total_pages',$total_pages)
                           ->with('type','Land')
                           ->with('view','prop_r')
                           ->with('lands',$land['paginator']);
        }
    public function viewprop($id){
              $buy=Listing::where('id',$id)->get();
              $buy_agent=Listing::where('id',$id)->get();
               foreach($buy_agent as $buy_agent){
                 $agent_id=$buy_agent->agent_id;
                   }
               $agent=Agent::where('id',$agent_id)->get();

             
                            return View::make('mobile.property')
                                           ->with('agent',$agent)
                                            ->with('type','buy')
                                           ->with('property',$buy);
    }

     public function viewbuy($id){
              $buy=Listing::where('id',$id)->get();
              $buy_agent=Listing::where('id',$id)->get();
               foreach($buy_agent as $buy_agent){
                 $agent_id=$buy_agent->agent_id;
                   }
               $agent=Agent::where('id',$agent_id)->get();

             
                            return View::make('mobile.property')
                                           ->with('agent',$agent)
                                            ->with('type','buy')
                                           ->with('property',$buy);
     }

     public function viewrent($id){
             $rent=Listing::where('id',$id)->get();
             $rent_agent=Listing::where('id',$id)->get();
             foreach($rent_agent as $rent_agent){
                   $agent_id=$rent_agent->agent_id;
               }
           
             $agent=Agent::where('id',$agent_id)->get();
           
                  return View::make('mobile.property')
                                ->with('agent',$agent)
                                 ->with('type','rent')
                               ->with('property',$rent);
     }
     public function viewland($id){
                $land=Land::where('id',$id)->get();
               $land_agent=Land::where('id',$id)->get();
               foreach($land_agent as $land_agent){
                  $agent_id=$land_agent->agent_id;
               }
               $agent=Agent::where('id',$agent_id)->get();

            
              return View::make('mobile.property')
                            ->with('agent',$agent)
                            ->with('type','land')
                            ->with('property',$land);
               }
}

?>