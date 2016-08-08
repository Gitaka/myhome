<?php
class AjaxSearchFiltersController   extends BaseController{
	
 public function weekly(){
 	        
         $pageNo=Input::get('page',1);
         $perPage=2;
         $from = $pageNo*$perPage-$perPage;
         $to = $perPage;
         $totalData=Listing::where('created_at','>=',date("Y-m-d H:i:s",time()-24*7*60*60))->count();
         $total_pages= ceil($totalData/$perPage);


    
$properties['data'] = DB::table('listings')->where('created_at','>=',date("Y-m-d H-i-s",time()-24*7*60*60))->orderBy('id','desc')->skip($from)->take($to)->get();
     $properties['paginator'] = Paginator::make($properties['data'], count($totalData), $perPage);
          
         return View::make('property.filter')
                      ->with('total_pages',$total_pages)
                      ->with('properties',$properties['paginator']);

   }

   public function monthly(){
   	//time() function returns the current time in the number of seconds since january 1 1970 00:00:00 GMT(unix Epoch)
    //to display formatted time use the date()function,pass it two params,data format and time(),
        
         $pageNo=Input::get('page',1);
         $perPage=2;
         $from = $pageNo*$perPage-$perPage;
         $to = $perPage;
         $totalData=Listing::where('created_at','>=',date("Y-m-d H:i:s",time()-24*30*60*60))->count();
         $total_pages= ceil($totalData/$perPage);


    
$properties['data'] = DB::table('listings')->where('created_at','>=',date("Y-m-d H-i-s",time()-24*30*60*60))->orderBy('id','desc')->skip($from)->take($to)->get();
     $properties['paginator'] = Paginator::make($properties['data'], count($totalData), $perPage);
          
         return View::make('property.filter')
                      ->with('total_pages',$total_pages)
                      ->with('properties',$properties['paginator']);
                      
                      
                      
   }
   public function apartment(){
      $type=Input::get('type');
       
         $pageNo=Input::get('page',1);
         $perPage=16;
         $from = $pageNo*$perPage-$perPage;
         $to = $perPage;
         $totalData=Listing::where('type_id','1')->count();
         $total_pages= ceil($totalData/$perPage);

    
$properties['data'] = DB::table('listings')->where('type_id','=',$type)->orderBy('id','desc')->skip($from)->take($to)->get();
     $properties['paginator'] = Paginator::make($properties['data'], count($totalData), $perPage);
          
          return View::make('property.filter')
                      ->with('total_pages',$total_pages)
                      ->with('properties',$properties['paginator']);
                      
                       
      }
      public function space(){
      $type=Input::get('type');
       
        $pageNo=Input::get('page',1);
         $perPage=16;
         $from = $pageNo*$perPage-$perPage;
         $to = $perPage;
         $totalData=Listing::where('outsidespace',$type)->count();
         $total_pages= ceil($totalData/$perPage);

    
$properties['data'] = DB::table('listings')->where('outsidespace','=',$type)->orderBy('id','desc')->skip($from)->take($to)->get();
     $properties['paginator'] = Paginator::make($properties['data'], count($totalData), $perPage);
          
          return View::make('property.filter')
                      ->with('total_pages',$total_pages)
                      ->with('properties',$properties['paginator']);
                      
                       
      }


       public function state(){
         $state=Input::get('state');
       
        $pageNo=Input::get('page',1);
         $perPage=16;
         $from = $pageNo*$perPage-$perPage;
         $to = $perPage;
         $totalData=Listing::where('status',$state)->count();
         $total_pages= ceil($totalData/$perPage);

    
$properties['data'] = DB::table('listings')->where('status','=',$state)->orderBy('id','desc')->skip($from)->take($to)->get();
     $properties['paginator'] = Paginator::make($properties['data'], count($totalData), $perPage);
          
          return View::make('property.filter')
                      ->with('total_pages',$total_pages)
                      ->with('properties',$properties['paginator']);
                      
                       
      }
      public function frooms(){
         $rooms=Input::get('rooms');
         $pageNo=Input::get('page',1);
         $perPage=16;
         $from = $pageNo*$perPage-$perPage;
         $to = $perPage;
       
         $totalData=DB::table('listings')->where('bedrooms','=',$rooms)
                                           ->where('type_id','=','1')->count();
         $total_pages= ceil($totalData/$perPage);


$properties['data'] = DB::table('listings')->where('type_id','1')->where('bedrooms','=',$rooms)->orderBy('id','desc')->skip($from)->take($to)->get();
     $properties['paginator'] = Paginator::make($properties['data'], count($totalData), $perPage);
          
          return View::make('property.filter')
                      ->with('total_pages',$total_pages)
                      ->with('properties',$properties['paginator']);
                      
                       
      }
      public function hrooms(){
         $rooms=Input::get('rooms');
         $pageNo=Input::get('page',1);
         $perPage=16;
         $from = $pageNo*$perPage-$perPage;
         $to = $perPage;
       
         $totalData=DB::table('listings')->where('bedrooms','=',$rooms)
                                           ->where('type_id','=','5')->count();
         $total_pages= ceil($totalData/$perPage);


$properties['data'] = DB::table('listings')->where('type_id','5')->where('bedrooms','=',$rooms)->orderBy('id','desc')->skip($from)->take($to)->get();
     $properties['paginator'] = Paginator::make($properties['data'], count($totalData), $perPage);
          
          return View::make('property.filter')
                      ->with('total_pages',$total_pages)
                      ->with('properties',$properties['paginator']);
                      
                       
      }



///////////////////////////////////////////////////////////////////////////////////////////////////////////
//
///////////////////////////////////////////////////////////////////////////////////////////////////////////

public function buyweekly(){
 	        
         $pageNo=Input::get('page',1);
         $perPage=2;
         $from = $pageNo*$perPage-$perPage;
         $to = $perPage;
         $totalData=Buy::where('created_at','>=',date("Y-m-d H:i:s",time()-24*7*60*60))->count();
         $total_pages= ceil($totalData/$perPage);


    
/*$buy['data'] = DB::table('buys')->where('created_at','>=',date("Y-m-d H-i-s",time()-24*7*60*60))->orderBy('id','desc')->skip($from)->take($to)->get();
     $buy['paginator'] = Paginator::make($buy['data'], count($totalData), $perPage);
          
         return View::make('property.buyfilter')
                      ->with('total_pages',$total_pages)
                      ->with('buys',$buy['paginator']);*/
                      return $totalData;

   }






}

?>