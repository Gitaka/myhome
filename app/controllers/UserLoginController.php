<?php
class UserLoginController extends BaseController{

	public function ShowLoginForm(){

		return View::make('users.login')->with('title','UserLogin');
	}
    
    public function login(){
         if(Auth::attempt(Input::only('username','password'))) {
           return Redirect::intended('user');
             } else 
                 {
                 return Redirect::back()
                      ->withInput()
                      ->with('error', "Invalid credentials");
                    }
    	//return Redirect::to('user');
    }

    public function ShowRegisterForm(){
       return View::make('users.Register')->with('title','UserREgister');
    }
    
    
    public function register(){
    
         $email=Input::get('email');
         $username=Input::get('username');
         $password=Hash::make(Input::get('password'));

      $user=new UserDetail;
      $user->username=$username;
      $user->email=$email;
      $user->password=$password;

      $user->save();
    	return Redirect::to('user');
    }
 public function user(){
  if(!Auth::check()){
        return Redirect::to('login');
    }else{
      Session::put('user_id',Auth::user()->id);
       return View::make('users.search')
                ->with('sessid',Session::get('user_id'))
                 ->with('user',User::where('id',Session::get('user_id'))->get())
                 ->with('rtype',Type::all())
                ->with('btype',Type::all());
    }
 }
 public function rsearch(){
   if(!Session::has('user_id')){
      return Redirect::to('login');
   }else{
       $location=Input::get('location');
    $type=Input::get('type');
    $maxprice=Input::get('maxprice');
    $minprice=Input::get('minprice');

     
 
   $buy=DB::table('listings')->where('location','=',$location)
                                ->where('type_id','=',$type)
                                ->where('maxprice','=',$maxprice)
                                ->where('minprice','=',$minprice)
                                ->where('for','=','2')
                                ->orWhere('for','=','2')->get();

         $pageNo=Input::get('page',1);
         $perPage=16;
         $from = $pageNo*$perPage-$perPage;
         $to = $perPage;
         $totalData=count($buy);
         $total_pages= ceil($totalData/$perPage);

 $buy['data'] = DB::table('listings')->where('location','=',$location)
                                  ->where('type_id','=',$type)
                                  ->where('maxprice','=',$maxprice)
                                  ->where('minprice','=',$minprice)
                                  ->where('for','=','2')
                                  ->orWhere('for','=','2')
                                  ->orderBy('id','desc')->skip($from)->take($to)->get();   
       
        $buy['paginator']=Paginator::make($buy['data'],count($totalData),$perPage);
        $savedlistings= count(DB::table('savedlistings')->where('userId','=',Session::get('user_id'))->get());
        
        return View::make('users.buySearchResults')
                       ->with('location',$location)
                        ->with('type',$type)
                        ->with('maxprice',$maxprice)
                        ->with('minprice',$minprice)
                        ->with('total_pages',$total_pages)
                        ->with('loggedIn','LoggedIn')
                        ->with('userId',Session::get('user_id'))
                        ->with('buys',$buy['paginator'])
                        ->with('count',$savedlistings);
   }
 }

  public function bsearch(){
   if(!Session::has('user_id')){
      return Redirect::to('login');
     }else{

    $location=Input::get('location');
    $type=Input::get('type');
    $maxprice=Input::get('maxprice');
    $minprice=Input::get('minprice');

     
 
   $buy=DB::table('listings')->where('location','=',$location)
                                ->where('type_id','=',$type)
                                ->where('maxprice','=',$maxprice)
                                ->where('minprice','=',$minprice)
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
                                  ->where('maxprice','=',$maxprice)
                                  ->where('minprice','=',$minprice)
                                  ->where('for','=','1')
                                  ->orWhere('for','=','1')
                                  ->orderBy('id','desc')->skip($from)->take($to)->get();   
       
        $buy['paginator']=Paginator::make($buy['data'],count($totalData),$perPage);
        $savedlistings= count(DB::table('savedlistings')->where('userId','=',Session::get('user_id'))->get());
        
        return View::make('users.buySearchResults')
                       ->with('location',$location)
                        ->with('type',$type)
                        ->with('maxprice',$maxprice)
                        ->with('minprice',$minprice)
                        ->with('total_pages',$total_pages)
                        ->with('loggedIn','LoggedIn')
                        ->with('userId',Session::get('user_id'))
                        ->with('buys',$buy['paginator'])
                        ->with('count',$savedlistings);

   
   }
 }
   public function lsearch(){
       if(!Session::has('user_id')){
          return Redirect::to('login');
         }else{
     
             return 'hi land';
       }
 }
 
 public function edit(){
  if(!Session::has('user_id')){
    return Redirect::to('login');
  }else{

           /*$id=Session::get('user_id');
           return View::make('users.edit')
                        ->with('user',UserDetail::where('id',$id)->get());*/
        $username = Input::get('username');
        $pass = Hash::make(Input::get('password'));
        $email = Input::get('email');
        $userId= Input::get('id');

       // return $username.$pass.$email.$userId;
        $user = User::find($userId);
        $user->username = $username;
        $user->password = $pass;
        $user->email = $email;
        $user->save();
     
        Session::flash('updateProfile','Profile has been updated');
        return Redirect::to('user');
       }
   }

public function saved(){
    
    $listingId = Input::get('id');
    $userId = Input::get('userId');
    
    //return 'returnedfrom php'.$propertyId.$userId;
    Savedlisting::create(array(
           'userId'=>$userId,
           'listingId'=>$listingId
      ));
    

     return 'item saved';
}
public function listings(){
   if(!Session::has('user_id')){
      return Redirect::to('login');
     }else{
         $pageNo=Input::get('page',1);
         $perPage=8;
         $from = $pageNo*$perPage-$perPage;
         $to = $perPage;
         
         $noSavedListings= DB::table('savedlistings')->where('userId','=',Session::get('user_id'))->get();
        
         $totalData = count($noSavedListings);
         $total_pages= ceil($totalData/$perPage);
         //$savedlistings= DB::table('savedlistings')->where('userId','=',Session::get('user_id'))->get();
       
         $savedlistings['data']=DB::select(DB::raw('SELECT * FROM savedlistings INNER JOIN listings
                                            ON savedlistings.listingId=listings.id
                                           LIMIT '.$from.','.$to.' '));
         $savedlistings['paginator'] = Paginator::make($savedlistings['data'], count($totalData), $perPage);

         return View::make('users.savedListings')
                          ->with('count',$totalData)
                          ->with('total_pages',$total_pages)
                          ->with('savedlistings',$savedlistings['paginator']);
   }
}

public function testImage(){
  return View::make('users.image');
}
public function image(){
     $file = Input::file('logo');
     $filename = $file->getClientOriginalName();
     $destinationPath = 'uploads/Logo/'.$filename;
     $extension = $file->getClientOriginalExtension();
     $upload_success = $file->move($destinationPath, $filename);
       if($upload_success){
                          /*Image::create(array(
                      
                             'path'=>$destinationPath,
                             'ext'=>$extension
                           ));*/

                        }
                        return 'uploaded-------'.$destinationPath;
}

}
?>