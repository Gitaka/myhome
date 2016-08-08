<?php
class AgentLandSearchController extends BaseController{
		public function weekly(){
	    $agentId = Input::get('agentId');
   
                              
         $pageNo=Input::get('page',1);
         $perPage=2;
         $from = $pageNo*$perPage-$perPage;
         $to = $perPage;
     
         $fromThesWeek = date("Y-m-d H:i:s",time()-24*7*60*60);
         $land=DB::table('lands')->where('agent_id','=',$agentId)
                                ->where('created_at','>=',$fromThesWeek)
                                ->get();
         $totalData = count($land);
         $total_pages= ceil($totalData/$perPage);

        $land['data'] = DB::table('lands')->where('agent_id','=',$agentId)
                                         ->where('created_at','>=',$fromThesWeek)
                                         ->orderBy('id','desc')->skip($from)->take($to)->get(); 
         $land['paginator']=Paginator::make($land['data'],count($totalData),$perPage);
          
          return View::make('property.landfilter')
                        ->with('total_pages',$total_pages)
                        ->with('lands',$land['paginator']);

}
   public function monthly(){
   	     $agentId = Input::get('agentId');

         $pageNo=Input::get('page',1);
         $perPage=2;
         $from = $pageNo*$perPage-$perPage;
         $to = $perPage;
     
         $fromTheseMonth = date("Y-m-d H:i:s",time()-24*30*60*60);
         $land=DB::table('lands')->where('agent_id','=',$agentId)
                                ->where('created_at','>=',date("Y-m-d H:i:s",time()-24*30*60*60))
                                ->get();
         $totalData = count($land);
         $total_pages= ceil($totalData/$perPage);

         $land['data'] = DB::table('lands')->where('agent_id','=',$agentId)
                                         ->where('created_at','>=',$fromTheseMonth)
                                         ->orderBy('id','desc')->skip($from)->take($to)->get(); 
         $land['paginator']=Paginator::make($land['data'],count($totalData),$perPage);
          
          return View::make('property.landfilter')
                        ->with('total_pages',$total_pages)
                        ->with('lands',$land['paginator']);

       
   }
}
?>