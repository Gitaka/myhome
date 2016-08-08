<?php
class BuyAjaxFilterController extends BaseController{
	public function weekly(){
		 $location = Input::get('location');
         $type = Input::get('type');
         $minPrice =Input::get('minPrice');
         $maxPrice  = Input::get('maxPrice');

 	     $pageNo=Input::get('page',1);
         $perPage=2;
         $from = $pageNo*$perPage-$perPage;
         $to = $perPage;
     
         $fromThesWeek = date("Y-m-d H:i:s",time()-24*7*60*60);
         $buy=DB::table('listings')->where('location','=',$location)
                                ->where('created_at','>=',date("Y-m-d H:i:s",time()-24*7*60*60))
                                ->where('type_id','=',$type)
                                ->where('for','=','1')
                                //->orWhere('location',$location)
                                //->orWhere('created_at',$fromThesWeek)
                                ->get();
         $totalData = count($buy);
         $total_pages= ceil($totalData/$perPage);

         $buy['data'] = DB::table('listings')->where('location','=',$location)
                                         ->where('type_id','=',$type)
                                         ->where('created_at','>=',$fromThesWeek)
                                         ->where('for','=','1')
                                         ->orderBy('id','desc')->skip($from)->take($to)->get(); 
         $buy['paginator']=Paginator::make($buy['data'],count($totalData),$perPage);
          
          return View::make('property.buyfilter')
                        ->with('total_pages',$total_pages)
                        ->with('buys',$buy['paginator']);
                        


   }

   public function bmonthly(){
   	  $location = Input::get('location');
         $type = Input::get('type');
         $minPrice =Input::get('minPrice');
         $maxPrice  = Input::get('maxPrice');

         $pageNo=Input::get('page',1);
         $perPage=2;
         $from = $pageNo*$perPage-$perPage;
         $to = $perPage;
     
         $fromThesWeek = date("Y-m-d H:i:s",time()-24*30*60*60);
         $buy=DB::table('listings')->where('location','=',$location)
                                ->where('created_at','>=',date("Y-m-d H:i:s",time()-24*30*60*60))
                                ->where('type_id','=',$type)
                                ->where('for','=','1')
                                ->get();
         $totalData = count($buy);
         $total_pages= ceil($totalData/$perPage);

         $buy['data'] = DB::table('listings')->where('location','=',$location)
                                         ->where('type_id','=',$type)
                                         ->where('created_at','>=',$fromThesWeek)
                                         ->where('for','=','1')
                                         ->orderBy('id','desc')->skip($from)->take($to)->get(); 
         $buy['paginator']=Paginator::make($buy['data'],count($totalData),$perPage);
          
          return View::make('property.buyfilter')
                        ->with('total_pages',$total_pages)
                        ->with('buys',$buy['paginator']);
  
   }



     public function space(){
      $type=Input::get('type');
      $location = Input::get('location');
      $outsidespace = Input::get('outsidespace');
       
         $pageNo=Input::get('page',1);
         $perPage=16;
         $from = $pageNo*$perPage-$perPage;
         $to = $perPage;
         $buy=DB::table('listings')->where('location','=',$location)
                                ->where('type_id','=',$type)
                                ->where('outsidespace','=',$outsidespace)
                                ->where('for','=','1')
                                ->get();
         $totalData = count($buy);
         $total_pages= ceil($totalData/$perPage);

      $buy['data'] = DB::table('listings')->where('location','=',$location)
                                         ->where('type_id','=',$type)
                                         ->where('outsidespace','=',$outsidespace)
                                         ->where('for','=','1')
                                         ->orderBy('id','desc')->skip($from)->take($to)->get(); 
         $buy['paginator']=Paginator::make($buy['data'],count($totalData),$perPage);
          
          return View::make('property.buyfilter')
                        ->with('total_pages',$total_pages)
                        ->with('buys',$buy['paginator']);
                     
            
                        

                       
      }

     public function state(){
      $type=Input::get('type');
      $location = Input::get('location');
      $state = Input::get('state');
       
         $pageNo=Input::get('page',1);
         $perPage=16;
         $from = $pageNo*$perPage-$perPage;
         $to = $perPage;
         $buy=DB::table('listings')->where('location','=',$location)
                                ->where('type_id','=',$type)
                                ->where('status','=',$state)
                                ->where('for','=','1')
                                ->get();
         $totalData = count($buy);
         $total_pages= ceil($totalData/$perPage);

      $buy['data'] = DB::table('listings')->where('location','=',$location)
                                         ->where('type_id','=',$type)
                                         ->where('status','=',$state)
                                         ->where('for','=','1')
                                         ->orderBy('id','desc')->skip($from)->take($to)->get(); 
         $buy['paginator']=Paginator::make($buy['data'],count($totalData),$perPage);
          
          return View::make('property.buyfilter')
                        ->with('total_pages',$total_pages)
                        ->with('buys',$buy['paginator']);


                       
      }


    public function hrooms(){
      $type=Input::get('type');
      $location = Input::get('location');
      $rooms = Input::get('rooms');
       
         $pageNo=Input::get('page',1);
         $perPage=16;
         $from = $pageNo*$perPage-$perPage;
         $to = $perPage;
         $buy=DB::table('listings')->where('location','=',$location)
                                ->where('type_id','=',$type)
                                ->where('bedrooms','=',$rooms)
                                ->where('for','=','1')
                                ->get();
         $totalData = count($buy);
         $total_pages= ceil($totalData/$perPage);

      $buy['data'] = DB::table('listings')->where('location','=',$location)
                                         ->where('type_id','=',$type)
                                         ->where('bedrooms','=',$rooms)
                                         ->where('for','=','1')
                                         ->orderBy('id','desc')->skip($from)->take($to)->get(); 
         $buy['paginator']=Paginator::make($buy['data'],count($totalData),$perPage);
          
          return View::make('property.buyfilter')
                        ->with('total_pages',$total_pages)
                        ->with('buys',$buy['paginator']);


                       
      }
}
?>