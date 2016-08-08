<?php
 class SearchController extends BaseController {
 public function index(){
  

  $locations['buy']=DB::select(DB::raw('SELECT location FROM buys'));
  $featured =  DB::select(DB::raw('SELECT * FROM listings where isFeatured = true'));
      
         $pageNo=Input::get('page',1);
         $perPage=8;
         $from = $pageNo*$perPage-$perPage;
         $to = $perPage;

          $totalData = count($featured);
          $total_pages= ceil($totalData/$perPage);

 $featured['data'] = DB::table('listings')->where('isFeatured','=',1)->orderBy('id','desc')->skip($from)->take($to)->get();
   // $data['allData'] = DB::select( DB::raw('SELECT * FROM rents WHERE agent_id=1 LIMIT '.$from.','.$to));
        $featured['paginator'] = Paginator::make($featured['data'], count($totalData), $perPage);

            
           return View::make('index')
                         ->with('total_pages',$total_pages)
                         ->with('location',$locations['buy'])
                         ->with('title','the first page')
                         ->with('rtype',Type::all())
                         ->with('btype',Type::all())
                         ->with('featured',$featured['paginator']);

 }
 	public function RShowSearch(){
 		$location=Input::get('location');
 		$type=Input::get('type');
 		$maxprice=Input::get('maxprice');
    $minprice=Input::get('minprice');
 
   
   $rent=DB::table('listings')->where('location','=',$location)
                                ->where('type_id','=',$type)
                                /*->where('maxprice','=',$maxprice)
                               ->where('minprice','=',$minprice)*/
                               ->where('for','=','2')
                               ->orWhere('for','=','2')->get();

    $pageNo=Input::get('page',1);
    $perPage=16;
    $from = $pageNo*$perPage-$perPage;
    $to = $perPage;
    $totalData=count($rent);
    $total_pages= ceil($totalData/$perPage);

   $rent['data'] = DB::table('listings')->where('location','=',$location)
                                  ->where('type_id','=',$type)
                                  /*->where('maxprice','=',$maxprice)
                                  ->where('minprice','=',$minprice)*/
                                    ->where('for','=','2')
                                     ->orWhere('for','=','2')
                                  ->orderBy('id','desc')->skip($from)->take($to)->get();   
       
        $rent['paginator']=Paginator::make($rent['data'],count($totalData),$perPage);
          return View::make('property.Rresult')
                       ->with('location',$location)
                        ->with('type',$type)
                        ->with('maxprice',$maxprice)
                        ->with('minprice',$minprice)
                        ->with('total_pages',$total_pages)
                        ->with('rents',$rent['paginator']);
 		                 
    
 	}

   public function BShowSearch(){
    $location=Input::get('location');
 		$type=Input::get('type');
 		$maxprice=Input::get('maxprice');
    $minprice=Input::get('minprice');

     
 
   $buy=DB::table('listings')->where('location','=',$location)
                                ->where('type_id','=',$type)
                                /*->where('maxprice','=',$maxprice)
                               ->where('minprice','=',$minprice)*/
                                ->where('for','=','1')
                               ->orWhere('for','=','1')->get();

         $pageNo=Input::get('page',1);
         $perPage=16;
         $from = $pageNo*$perPage-$perPage;
         $to = $perPage;
         $totalData=count($buy);
         $total_pages= ceil($totalData/$perPage);

 $buy['data'] = DB::table('listings')->where('location','=',$location)
                                  ->where('type_id','=',$type)
                                  /*->where('maxprice','=',$maxprice)
                                  ->where('minprice','=',$minprice)*/
                                    ->where('for','=','1')
                                   ->orWhere('for','=','1')
                                  ->orderBy('id','desc')->skip($from)->take($to)->get();   
       
        $buy['paginator']=Paginator::make($buy['data'],count($totalData),$perPage);
          return View::make('property.bresult')
                       ->with('location',$location)
                        ->with('type',$type)
                        ->with('maxprice',$maxprice)
                        ->with('minprice',$minprice)
                        ->with('loggedIn','Not LoggedIn')
                        ->with('total_pages',$total_pages)
                        ->with('buys',$buy['paginator']);

   }
   public function LShowSearch(){
      $location=Input::get('location');
      $size=Input::get('size');
      $maxprice=Input::get('maxprice');
      $minprice=Input::get('minprice');
    //return View::make('property.lresult');

   $land=DB::table('lands')->where('location','=',$location)
                                ->where('size','=',$size)
                                ->where('maxprice','=',$maxprice)
                               ->where('minprice','=',$minprice)
                                ->orWhere('location',$location)->get();

         $pageNo=Input::get('page',1);
         $perPage=16;
         $from = $pageNo*$perPage-$perPage;
         $to = $perPage;
         $totalData=count($land);
         $total_pages= ceil($totalData/$perPage);

 $land['data'] = DB::table('lands')->where('location','=',$location)
                                  ->where('size','=',$size)
                                  ->where('maxprice','=',$maxprice)
                                  ->where('minprice','=',$minprice)
                                  ->orWhere('location',$location)
                                  ->orderBy('id','desc')->skip($from)->take($to)->get();   
       
        $land['paginator']=Paginator::make($land['data'],count($totalData),$perPage);
          return View::make('property.lresult')
                       ->with('location',$location)
                        ->with('size',$size)
                        ->with('maxprice',$maxprice)
                        ->with('minprice',$minprice)
                        ->with('total_pages',$total_pages)
                        ->with('lands',$land['paginator']);
   }
   public function bresult($id){
 
     
   }
 	public function SearchData(){
          
         $rents=Session::get($rents);
          return View::make('property.SearchResults')
                     ->with('rents',$rents)
                     ->with('title','prop results');

 	}

 	public function buyimg($id){
       $buy=Buy::find($id);
       $type='image/'.$buy->imgtype;

       $view=View::make('property.bimg')
               ->with('buy',Buy::where('id',$id)->get());
          
           $response=Response::make($view,200);
           $response->header('Content-Type',$type);
       return $response;
 	}
   public function rentimg($id){
       $rent=Rent::find($id);
       $type='image/'.$rent->imgtype;

       $view=View::make('property.rimg')
               ->with('rent',Rent::where('id',$id)->get());
          
           $response=Response::make($view,200);
           $response->header('Content-Type',$type);
       return $response;
 	}


  public function bsearch(){
        $for= Input::get('for');
        $location=Input::get('location');
        $type=Input::get('type');
        $maxprice=Input::get('maxprice');
        $minprice=Input::get('minprice');

     
 
   $listings=DB::table('listings')->where('location','=',$location)
                                ->where('type_id','=',$type)
                                ->where('maxprice','=',$maxprice)
                                  ->where('minprice','=',$minprice)
                                ->Where('for',$for)
                                ->orWhere('for',$for)->get();
         $pageNo=Input::get('page',1);
         $perPage=16;
         $from = $pageNo*$perPage-$perPage;
         $to = $perPage;
         $totalData=count($listings);
         $total_pages= ceil($totalData/$perPage);

      $listing['data'] = DB::table('listings')->where('location','=',$location)
                                  ->where('type_id','=',$type)
                                  ->where('maxprice','=',$maxprice)
                                  ->where('minprice','=',$minprice)
                                  ->where('for',$for)
                                  ->orWhere('for',$for)
                                  ->orderBy('id','desc')->skip($from)->take($to)->get();   
       
        $listing['paginator']=Paginator::make($listing['data'],count($totalData),$perPage);
          return View::make('property.bresult')
                       ->with('location',$location)
                        ->with('type',$type)
                        ->with('maxprice',$maxprice)
                        ->with('minprice',$minprice)
                        ->with('loggedIn','Not LoggedIn')
                        ->with('total_pages',$total_pages)
                        ->with('buys',$listing['paginator']);
                    
  }
  public function rsearch(){
        $for= Input::get('for');
        $location=Input::get('location');
        $type=Input::get('type');
        $maxprice=Input::get('maxprice');
        $minprice=Input::get('minprice');

     
 
   $listings=DB::table('listings')->where('location','=',$location)
                                ->where('type_id','=',$type)
                                ->where('maxprice','=',$maxprice)
                                  ->where('minprice','=',$minprice)
                                ->Where('for',$for)
                                ->orWhere('for',$for)->get();
         $pageNo=Input::get('page',1);
         $perPage=16;
         $from = $pageNo*$perPage-$perPage;
         $to = $perPage;
         $totalData=count($listings);
         $total_pages= ceil($totalData/$perPage);

      $listing['data'] = DB::table('listings')->where('location','=',$location)
                                  ->where('type_id','=',$type)
                                  ->where('maxprice','=',$maxprice)
                                  ->where('minprice','=',$minprice)
                                  ->where('for',$for)
                                  ->orWhere('for',$for)
                                  ->orderBy('id','desc')->skip($from)->take($to)->get();   
       
        $listing['paginator']=Paginator::make($listing['data'],count($totalData),$perPage);
          return View::make('property.rresult')
                       ->with('location',$location)
                        ->with('type',$type)
                        ->with('maxprice',$maxprice)
                        ->with('minprice',$minprice)
                        ->with('loggedIn','Not LoggedIn')
                        ->with('total_pages',$total_pages)
                        ->with('rents',$listing['paginator']);
                    
  }
 }
 
?>