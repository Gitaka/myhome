<?php
class AdminController extends BaseController{
  public function adminform(){
    return View::make('admin.login');
  }
  
  public function login(){
    
     $email=Input::get('email');
      $password=md5(Input::get('password'));

      $admin=Admin::whereRaw('email=? and password=?',array($email,$password))->firstorfail();
 
      Session::put('admin_id',$admin->id);
      $admin_id=Session::get('admin_id');
         return Redirect::to('admin/index');

    
  }
  public function adminlogout(){
     
     Session::forget('admin_id');
       return Redirect::to('admin');   
       
  }
  public function index(){
   
    if(!Session::has('admin_id')){
          return Redirect::to('admin');
         
      }else{
          $id=Session::get('admin_id');
          return View::make('admin.index')
                   ->with('admin',Admin::where('id',$id)->get());
                   //return View::make('layouts.inserts');
      }
  }
  public function proptype(){
    if(Session::has('admin_id')){
          Type::create(array(
               'type'=>Input::get('type')
            ));
        return Redirect::to('admin/index');//->with('message','property type added successfully');
      }else{
        return Redirect::to('admin');
      }
  }
  public function buy(){
     if(Session::has('admin_id')){
          return View::make('admin.buy')
                  ->with('id',Session::get('admin_id'))
                  ->with('type',Type::all());
     }else{
        return Redirect::to('admin');
     }
 
  }
 public function postbuy(){
    $validation=Buy::validate(Input::all());
    if($validation->fails()){
      return Redirect::to('admin/buy')->withErrors($validation)->withInput();
    }else{
   
         $file = Input::file('photo');
        $buyName=Input::get('name');
        $id = Str::random(15);
        $destinationPath = 'public/uploads/buys/'.$id.'_'.$buyName;
        $filename = $file->getClientOriginalName();
        $sudo=$id.'_'.$filename;
        $extension = $file->getClientOriginalExtension();
        $upload_success = $file->move($destinationPath, $filename);

        /*image resize function*/
        include(app_path().'/includes/img_resize.php');

          $target='public/uploads/buys/' .$id.'_'.$buyName.'/'.$filename;
          $resized= 'public/uploads/buys/'.$id.'_'.$buyName.'/'.$sudo;
          $max_width=270;
          $max_height=190;

 img_resize($target,$resized,$max_width,$max_height,$extension);
 unlink('public/uploads/buys/'.$id.'_'.$buyName.'/'.$filename);

      if($upload_success){
                Buy::create(array(
                       'name'=>Input::get('name'),
                       'admin_id'=>Input::get('id'),
                       'location'=>Input::get('location'),
                       'owner'=>Input::get('owner'),
                       'mobile'=>Input::get('mobile'),
                       'type_id'=>Input::get('type_id'),
                       'price'=>Input::get('price'),
                       'maxprice'=>Input::get('maxprice'),
                       'minprice'=>Input::get('minprice'),
                       'description'=>Input::get('description'),
                       'photo'=> substr($resized,7),
                       'imgtype'=>$extension,
                  
               ));
               return Redirect::to('admin/index');  
                     
        }
    }
 }
    public function rent(){
       if(Session::has('admin_id')){
           return View::make('admin.rent')
                  ->with('id',Session::get('admin_id'))
                  ->with('type',Type::all());
         }else{
            return Redirect::to('admin');
         }
    }

    public function postrent(){
        $validation=Rent::validate(Input::all());
        if($validation->fails()){
       return Redirect::to('admin/rent')->withErrors($validation)->withInput();
      }else{
        $file = Input::file('photo');
        $rentName=Input::get('name');
        $id = Str::random(15);
        $destinationPath = 'public/uploads/rents/'.$id.'_'.$rentName;
        $filename = $file->getClientOriginalName();
        $sudo=$id.'_'.$filename;
        $extension = $file->getClientOriginalExtension();
        $upload_success = $file->move($destinationPath, $filename);

        /*image resize function*/
        include(app_path().'/includes/img_resize.php');

          $target='public/uploads/rents/' .$id.'_'.$rentName.'/'.$filename;
          $resized= 'public/uploads/rents/'.$id.'_'.$rentName.'/'.$sudo;
          $max_width=270;
          $max_height=190;

 img_resize($target,$resized,$max_width,$max_height,$extension);
 unlink('public/uploads/rents/'.$id.'_'.$rentName.'/'.$filename);
    if($upload_success){
               Rent::create(array(
                'name'=>Input::get('name'),
                'admin_id'=>Input::get('id'),
                'location'=>Input::get('location'),
                'owner'=>Input::get('owner'),
                'mobile'=>Input::get('mobile'),
                'type_id'=>Input::get('type_id'),
                'price'=>Input::get('price'),
                'maxprice'=>Input::get('maxprice'),
                'minprice'=>Input::get('minprice'),
                'description'=>Input::get('description'),
                'photo'=>substr($resized,7),
                'imgtype'=>$extension,
                  
               ));
               return Redirect::to('admin/index');
              
          }

      }
    }

 public function inbox(){
    if(Session::has('admin_id')){
          $pageNo=Input::get('page',1);
          $perPage=2;
          $from = $pageNo*$perPage-$perPage;
          $to = $perPage;
          $totalData=Contact::all()->count();
          $total_pages= ceil($totalData/$perPage);
     
       $messages['data']=DB::table('contacts')->orderBy('id','DESC')->skip($from)->take($to)->get();
       $messages['paginator']=Paginator::make($messages['data'],count($totalData),$perPage);
      return View::make('admin.inbox')
                 ->with('admin',Admin::where('id',Session::get('admin_id'))->get())
                    ->with('total_pages',$total_pages)
                    ->with('messages',$messages['paginator'])
                    ->with('id',Session::get('admin_id'));
                    
         }else{
            return Redirect::to('admin');
         }
    
 }
public function read($id){
       if(Session::has('admin_id')){
           return View::make('admin.read_inbox')
                  ->with('message',Contact::where('id',$id)->get())
                  ->with('admin_id',Session::get('admin_id'));
                 
         }else{
            return Redirect::to('admin');
         }

    }

}
?>