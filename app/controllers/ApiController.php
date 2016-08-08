<?php
class ApiController extends BaseController{
	public function getPropertyListings(){
		$listings = Listing::all();
		return $listings->toJson();
	}

	public function getBuyListings(){
		//$buys =DB::table('listings')->where('for','=','1')->get();
      $buys = Listing::where('for','=','1')->get();
		return (string)$buys;
	}
	public function getRentListings(){
		//$rents = DB::table('listings')->where('for','=','2')->get();
         $rents = Listing::where('for','=','2')->get();
		return $rents->toJson();
	}
	public function getLandListings(){
		$lands = Land::all();
		return $lands->toJson();
	}
	public function getAgent(){
			$location = Input::get('location');
         	$name = Input::get('name');
         if(empty($location) && empty($name)){
            return'<h1>No data Provided</h1>';
         }else{
         	$location = Input::get('location');
         	$name = Input::get('name');
         	
         	$agent=DB::table('agents')->where('location',$location)
                    ->where('username',$name)
                    ->orWhere('location',$location)->get();
           
            if($agent == null){
            	return '<h1>Not Found</h1>';
            }else{
            	return $agent;
            }
         }
	}
	public function getAgentBuys(){
		    $agentId = Input::get('id');
			$location = Input::get('location');
         	$name = Input::get('name');
         if(empty($location) && empty($name) && empty($agentId)){
            return'<h1>Not Found</h1>';
         }else{
               $buys= DB::table('listings')->where('for','=','1')->where('agent_id','=',$agentId)->orderBy('id','desc')->get();
               if($buys != null){
               	 return $buys;
               }else{
               	return '<h1>Not Found</h1>';
               }
         }
	}
	public function getAgentRents(){
		    $agentId = Input::get('id');
			$location = Input::get('location');
         	$name = Input::get('name');
         if(empty($location) && empty($name) && empty($agentId)){
            return'<h1>Not Found</h1>';
         }else{
               $rents= DB::table('listings')->where('for','=','2')->where('agent_id','=',$agentId)->orderBy('id','desc')->get();
               if($rents != null){
               	 return $rents;
               }else{
               	return '<h1>Not Found</h1>';
               }
         }
	}
	public function getAgentLands(){
		    $agentId = Input::get('id');
			$location = Input::get('location');
         	$name = Input::get('name');
         if(empty($location) && empty($name) && empty($agentId)){
            return'<h1>Not Found</h1>';
         }else{
               $lands= DB::table('lands')->where('agent_id','=',$agentId)->orderBy('id','desc')->get();
               if($lands != null){
               	 return $lands;
               }else{
               	return '<h1>Not Found</h1>';
               }
         }
	}



}

?>