<?php
 class BlogPostController extends BaseController{
 	public function index(){
 		if(Session::has('admin_id')){
             $id=Session::get('admin_id');
 			return View::make('blog.addposts')
              ->with('admin',Admin::where('id',$id)->get())
             ->with('categories',Category::all());
 		}else{
 			return Redirect::to('admin');
 		}
 	}

 	public function addpost(){
          $validation=Post::validate(Input::all());

          if($validation->fails()){
          	return Redirect::to('blog')->withErrors($validation)->withInput();
          }else{
            
        $file = Input::file('photo');
        $title=Input::get('title');
        $category=Input::get('category');
        $id = Str::random(15);
        $destinationPath = 'public/uploads/blog/'.$category.'/'.$id.'_'.$title;
    
        $filename = $file->getClientOriginalName();
        $sudo=$id.'_'.$filename;
        $extension = $file->getClientOriginalExtension();
        $upload_success = $file->move($destinationPath, $filename);

        /*image resize function*/
        include(app_path().'/includes/img_resize.php');

          $target='public/uploads/blog/'.$category.'/'.$id.'_'.$title.'/'.$filename;
          $resized= 'public/uploads/blog/'.$category.'/'.$id.'_'.$title.'/'.$sudo;
          $max_width=270;
          $max_height=190;

 img_resize($target,$resized,$max_width,$max_height,$extension);

 unlink('public/uploads/blog/'.$category.'/'.$id.'_'.$title.'/'.$filename);

      if($upload_success){
                  Post::create(array(
                   'title'=>Input::get('title'),
                   'post'=>Input::get('post'),
                   'category'=>Input::get('category'),
                   'imgpath'=>substr($resized,7),
                    'imgtype'=>$extension,
                  
               ));
                return Redirect::to('admin/index');          
          }
          	
          }
 	}

 	public function viewpost(){
           $pageNo=Input::get('page',1);
           $perPage=9;
           $from = $pageNo*$perPage-$perPage;
          $to = $perPage;
          $totalData=Post::all()->count();
          $total_pages= ceil($totalData/$perPage);

         $posts['data']=DB::table('posts')->orderBy('id','DESC')->skip($from)->take($to)->get();
         //$posts['data']=DB::select(DB::raw('SELECT * FROM post ORDER BY id DESC LIMIT '.$from.','.$to));
         $posts['paginator']=Paginator::make($posts['data'],count($totalData),$perPage);
       return View::make('blog.viewposts',[
            'latest'=>DB::table('posts')->limit(3)->orderBy('id','desc')->get(),
           'categories'=>Category::all(),
           'total_pages'=>$total_pages,
           'press'=>Post::where('category','realestate')->limit(2)->orderBy('id','desc')->get(),
           'posts'=>$posts['paginator'],
        ]);
 	
 	}
  public function category($id){
      $categories=Category::all();
      $press=Post::where('category','realestate')->limit(5)->orderBy('id','desc')->get();
     $post=Post::where('category',$id)->get();
    return View::make('blog.testposts')->with('posts',$post)
                                        ->with('categories',$categories)
                                        ->with('press',$press);
    
  }
 	public function post($id){
 		
 		 $post=Post::where('id',$id)->get();
          return View::make('blog.default')
                ->with('latest',DB::table('posts')->limit(3)->orderBy('id','desc')->get())
                ->with('press',Post::where('category','realestate')->limit(2)->orderBy('id','desc')->get())
               ->with('post',$post); 
    
 	}
 	public function img($id){
 		  $property=Post::find($id);
      
      $type='image/'.$property->imgtype;
       //$type='image/jpg';
 	    $post=Post::where('id',$id)->get();
 	    $view= View::make('pic')
 		      ->with('post',$post);
 		      // return $view;
 		        $response = Response::make($view,200);
               $response->header('Content-Type', $type);
               return $response;
 	      
 	}
 }
?>
