<?php

  class PrintController extends BaseController{
	 public function property_flayer($id)
    {  
       //$data=array();
       //$data['prop']=DB::select(DB::raw('SELECT * FROM listings  WHERE id='.$id.''));
            $data=array();
            $data['prop']=Listing::where('id',$id)->get();
            $buy_agent=Listing::where('id',$id)->get();
               foreach($buy_agent as $buy_agent){
                 $agent_id=$buy_agent->agent_id;
                    }
           $data['agent']=Agent::where('id',$agent_id)->get();
        //$pdf=PDF::loadView('print.sale',$data);
        //return $pdf->stream();

        $pdf = PDF::loadView('print.sale',$data);
        return $pdf->stream();
      

        
    }

    public function sale_flayer($id){
     
           $data=array();
            $data['prop']=Listing::where('id',$id)->get();
            $buy_agent=Listing::where('id',$id)->get();
               foreach($buy_agent as $buy_agent){
                 $agent_id=$buy_agent->agent_id;
                    }
           $data['agent']=Agent::where('id',$agent_id)->get();
        $pdf=PDF::loadView('print.sale',$data);
        return $pdf->stream();
    }
        public function rent_flayer($id){
           $data=array();
            $data['prop']=Listing::where('id',$id)->get();
            $rent_agent=Listing::where('id',$id)->get();
               foreach($rent_agent as $rent_agent){
                 $agent_id=$rent_agent->agent_id;
                    }
           $data['agent']=Agent::where('id',$agent_id)->get();
        $pdf=PDF::loadView('print.sale',$data);
        return $pdf->stream();
    }
      public function land_flayer($id){
           $data=array();
            $data['prop']=Land::where('id',$id)->get();
            $land_agent=Land::where('id',$id)->get();
               foreach($land_agent as $land_agent){
                 $agent_id=$land_agent->agent_id;
                    }
           $data['agent']=Agent::where('id',$agent_id)->get();
        $pdf=PDF::loadView('print.sale',$data);
        return $pdf->stream();
    }
 }
?>