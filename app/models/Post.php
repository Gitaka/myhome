<?php
 class Post extends Eloquent{
 	protected $table='posts';
 	protected $fillable=array('post','title','category','imgpath','imgtype');

 	public static $rules=array(
            'title'=>'required',
            'post'=>'required',
            'category'=>'required',
            'photo'=>'required'
 		 );
 	public static function validate($data){
 		return Validator::make($data,static::$rules);

 	}
 	public function scopeId($query){
 		return $query->orderBy('id','desc');
 	}
   public function scopePaginate($query){
   	return $query->paginate(9);
   }
 }
 
?>