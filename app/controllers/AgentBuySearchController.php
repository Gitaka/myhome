<?php
class AgentBuySearchController extends BaseController{
	public function weekly(){
	    $agentId = Input::get('agentId');
   
                              
         $pageNo=Input::get('page',1);
         $perPage=2;
         $from = $pageNo*$perPage-$perPage;
         $to = $perPage;
     
         $fromThesWeek = date("Y-m-d H:i:s",time()-24*7*60*60);
         $buy=DB::table('listings')->where('agent_id','=',$agentId)
                                ->where('created_at','>=',$fromThesWeek)
                                ->where('for','=','1')
                                ->get();
         $totalData = count($buy);
         $total_pages= ceil($totalData/$perPage);

        $buy['data'] = DB::table('listings')->where('agent_id','=',$agentId)
                                           ->where('created_at','>=',$fromThesWeek)
                                            ->where('for','=','1')
                                         ->orderBy('id','desc')->skip($from)->take($to)->get(); 
         $buy['paginator']=Paginator::make($buy['data'],count($totalData),$perPage);
          
          return View::make('property.buyfilter')
                        ->with('total_pages',$total_pages)
                        ->with('buys',$buy['paginator']);

}
   public function monthly(){
   	     $agentId = Input::get('agentId');

         $pageNo=Input::get('page',1);
         $perPage=2;
         $from = $pageNo*$perPage-$perPage;
         $to = $perPage;
     
         $fromTheseMonth = date("Y-m-d H:i:s",time()-24*30*60*60);
         $buy=DB::table('listings')->where('agent_id','=',$agentId)
                                ->where('created_at','>=',date("Y-m-d H:i:s",time()-24*30*60*60))
                                   ->where('for','=','1')
                                ->get();
         $totalData = count($buy);
         $total_pages= ceil($totalData/$perPage);

         $buy['data'] = DB::table('listings')->where('agent_id','=',$agentId)
                                         ->where('created_at','>=',$fromTheseMonth)
                                            ->where('for','=','1')
                                         ->orderBy('id','desc')->skip($from)->take($to)->get(); 
         $buy['paginator']=Paginator::make($buy['data'],count($totalData),$perPage);
          
          return View::make('property.buyfilter')
                        ->with('total_pages',$total_pages)
                        ->with('buys',$buy['paginator']);
       
   }

  public function apartment(){
  	 $agentId = Input::get('agentId');
  	 $type = Input::get('type');

         $pageNo=Input::get('page',1);
         $perPage=2;
         $from = $pageNo*$perPage-$perPage;
         $to = $perPage;
     
         $buy=DB::table('listings')->where('agent_id','=',$agentId)
                                ->where('type_id','=',$type)
                                   ->where('for','=','1')
                                ->get();
         $totalData = count($buy);
         $total_pages= ceil($totalData/$perPage);

         $buy['data'] = DB::table('listings')->where('agent_id','=',$agentId)
                                         ->where('type_id','=',$type)
                                            ->where('for','=','1')
                                         ->orderBy('id','desc')->skip($from)->take($to)->get(); 
         $buy['paginator']=Paginator::make($buy['data'],count($totalData),$perPage);
          
          return View::make('property.buyfilter')
                        ->with('total_pages',$total_pages)
                        ->with('buys',$buy['paginator']);
  }
  public function frooms(){
  		 $agentId = Input::get('agentId');
  		 $type = Input::get('type');
  	     $rooms = Input::get('rooms');

         $pageNo=Input::get('page',1);
         $perPage=2;
         $from = $pageNo*$perPage-$perPage;
         $to = $perPage;
     
         $buy=DB::table('listings')->where('agent_id','=',$agentId)
                                ->where('type_id','=',$type)
                                ->where('bedrooms','=',$rooms)
                                   ->where('for','=','1')
                                ->get();
         $totalData = count($buy);
         $total_pages= ceil($totalData/$perPage);

         $buy['data'] = DB::table('listings')->where('agent_id','=',$agentId)
                                           ->where('type_id','=',$type)
                                         ->where('bedrooms','=',$rooms)
                                            ->where('for','=','1')
                                         ->orderBy('id','desc')->skip($from)->take($to)->get(); 
         $buy['paginator']=Paginator::make($buy['data'],count($totalData),$perPage);
          
          return View::make('property.buyfilter')
                        ->with('total_pages',$total_pages)
                        ->with('buys',$buy['paginator']);
  }
  public function hrooms(){
  		 $agentId = Input::get('agentId');
  	     $rooms = Input::get('rooms');
         $type = Input::get('type'); 

         $pageNo=Input::get('page',1);
         $perPage=2;
         $from = $pageNo*$perPage-$perPage;
         $to = $perPage;
     
         $buy=DB::table('listings')->where('agent_id','=',$agentId)
                                ->where('type_id','=',$type)
                                ->where('bedrooms','=',$rooms)
                                   ->where('for','=','1')
                                ->get();
         $totalData = count($buy);
         $total_pages= ceil($totalData/$perPage);

         $buy['data'] = DB::table('listings')->where('agent_id','=',$agentId)
                                         ->where('type_id','=',$type)
                                         ->where('bedrooms','=',$rooms)
                                            ->where('for','=','1')
                                         ->orderBy('id','desc')->skip($from)->take($to)->get(); 
         $buy['paginator']=Paginator::make($buy['data'],count($totalData),$perPage);
          
          return View::make('property.buyfilter')
                        ->with('total_pages',$total_pages)
                        ->with('buys',$buy['paginator']);
                       
  }

public function space(){
      $agentId = Input::get('agentId');
      $outsidespace = Input::get('outsidespace');
       
         $pageNo=Input::get('page',1);
         $perPage=16;
         $from = $pageNo*$perPage-$perPage;
         $to = $perPage;
         $buy=DB::table('listings')->where('agent_id','=',$agentId)
                                ->where('outsidespace','=',$outsidespace)
                                   ->where('for','=','1')
                                ->get();
         $totalData = count($buy);
         $total_pages= ceil($totalData/$perPage);

      $buy['data'] = DB::table('listings')->where('agent_id','=',$agentId)
                                            ->where('for','=','1')
                                         ->where('outsidespace','=',$outsidespace)
                                         ->orderBy('id','desc')->skip($from)->take($to)->get(); 
         $buy['paginator']=Paginator::make($buy['data'],count($totalData),$perPage);
          
          return View::make('property.buyfilter')
                        ->with('total_pages',$total_pages)
                        ->with('buys',$buy['paginator']);

}

public function state(){
      $agentId = Input::get('agentId');
      $state = Input::get('state');
       
         $pageNo=Input::get('page',1);
         $perPage=16;
         $from = $pageNo*$perPage-$perPage;
         $to = $perPage;
         $buy=DB::table('listings')->where('agent_id','=',$agentId)
                                ->where('status','=',$state)
                                   ->where('for','=','1')
                                ->get();
         $totalData = count($buy);
         $total_pages= ceil($totalData/$perPage);

      $buy['data'] = DB::table('listings')->where('agent_id','=',$agentId)
                                         ->where('status','=',$state)
                                            ->where('for','=','1')
                                         ->orderBy('id','desc')->skip($from)->take($to)->get(); 
         $buy['paginator']=Paginator::make($buy['data'],count($totalData),$perPage);
          
          return View::make('property.buyfilter')
                        ->with('total_pages',$total_pages)
                        ->with('buys',$buy['paginator']);


                       
      }
}

?>