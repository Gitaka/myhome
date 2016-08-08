<?php
 class PropertiesController extends BaseController {
   //include(app_path().'/includes/img_resize.php');
 	public function addPropform(){

 		if(Session::has('admin_id')){
           return View::make('admin.addproperty')
                  ->with('admin_id',Session::get('admin_id'))
                  ->with('admin',Admin::find(Session::get('admin_id')))
                  ->with('type',Type::all());
                }else{
                  return Redirect::to('admin');
                }
 	}

 	public function addprop(){

    
      $validation=Property::validate(Input::all());
      if($validation->fails()){
        return Redirect::to('admin/addprop')->withErrors($validation)->withInput();
      }else{
            $files=Input::file('photo');
             $propertyName=Input::get('name');
             $file_count=count($files);
             $upload_count=0;
             $property=$propertyName.'-'.Str::random(10).'';
            $propertyNameLength=strlen($property);
             foreach($files as $file){
                 $id = Str::random(15);
                 $filename=$file->getClientOriginalName();
                 $extension = $file->getClientOriginalExtension();
                 $destinationPath='public/uploads/propertyfeatures/'.$property;
                 $sudo=$id.'_'.$filename;
                $upload_success=$file->move($destinationPath,$filename);
                $upload_count++;
               

          $target='public/uploads/propertyfeatures/' .$property.'/'.$filename;
          $resized= 'public/uploads/propertyfeatures/'.$property.'/'.$sudo;
          $max_width=270;
          $max_height=200;
   // $resized= 'public/uploads/buys/'.$buy.'/'.$sudo;
 img_resize($target,$resized,$max_width,$max_height,$extension);
  $done[]=substr($resized,$propertyNameLength+32);
 unlink('public/uploads/propertyfeatures/' .$property.'/'.$filename);
              
             }

             if($upload_count==$file_count and $upload_success){
        
                Property::create(array(
                       
                      'name'=>Input::get('name'),
                      'location'=>Input::get('location'),
                      'owner'=>Input::get('owner'),
                      'email'=>Input::get('email'),
                      'mobile'=>Input::get('mobile'),
                      'type_id'=>Input::get('type_id'),
                      'price'=>Input::get('price'),
                      'maxprice'=>Input::get('maxprice'),
                      'minprice'=>Input::get('minprice'),
                      'description'=>Input::get('description'),
                      'Bedrooms'=>Input::get('bedrooms'),
                      'outsidespace'=>Input::get('outsidespace'),
                      'status'=>Input::get('status'),
                       'imgpath'=>substr($destinationPath,7),
                       'imgtype'=>$extension,
                      'imageFiles'=>JSON_encode($done),
                  
               ));
              
              return Redirect::to('admin/index'); 
               
     
         }
 	}
}
 
   public function view(){
         $pageNo=Input::get('page',1);
         $perPage=16;
         $from = $pageNo*$perPage-$perPage;
         $to = $perPage;
        
         $totalData=Listing::all()->count();
         $total_pages= ceil($totalData/$perPage);

   
        $properties['data'] = DB::table('listings')->orderBy('id','DESC')->skip($from)->take($to)->get();
        $properties['paginator']=Paginator::make($properties['data'],count($totalData),$perPage);
   	     return View::make('property.view')
                      ->with('total_pages',$total_pages)
                      ->with('properties',$properties['paginator']);
   }
   public function viewimg($id){

       $property=Property::find($id);
      
      $type='image/'.$property->imgtype;

       $view=View::make('property.PropImg')
              ->with('property',Property::where('id',$id)->get());
   	    $response=Response::make($view,200);
        $response->header('Content-Type',$type);
         return $response;
   }

   public function viewlist($id){
     
      
        $property=Listing::where('id',$id)->get();
        foreach($property as $property){
           $agentId = $property->agent_id;
           $location = $property->location;

        }
        $agent = Agent::where('id',$agentId)->get();
        $prop=Listing::where('id',$id)->get();
        $coords = Location::where('city',$location)->get();
        foreach($coords as $coord){
           $latitude = $coord->latitude;
           $longitude = $coord->longitude;
        }
          return View::make('property.propertyview')
               ->with('agent',$agent)
               ->with('property',$prop)
               ->with('latitude',$latitude)
               ->with('longitude',$longitude);
              
              
   }

   public function post_ajax(){
      $type=Input::get('type');
      
    
         $pageNo=Input::get('page',1);
         $perPage=2;
         $from = $pageNo*$perPage-$perPage;
         $to = $perPage;
         $totalData=Property::where('type_id',$type)->count();
         $total_pages= ceil($totalData/$perPage);

    
$properties['data'] = DB::table('properties')->where('type_id','=',$type)->orderBy('id','desc')->skip($from)->take($to)->get();
     $properties['paginator'] = Paginator::make($properties['data'], count($totalData), $perPage);
          
       
         return $type;
      }

   }


 
?>