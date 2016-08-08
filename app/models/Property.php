<?php
 class Property extends Eloquent{
 	public $table='properties';
 	public $fillable=array('name','location','owner','email','mobile','type_id','price',
 		'maxprice','minprice','description','bedrooms','outsidespace','status','imgpath','imgtype','imageFiles');

 	public static $rules=array(
 		'name'=>'required',
          'location'=>'required',
          'owner'=>'required|min:5',
          'email'=>'required|email',
          'mobile'=>'required',
          'type_id'=>'required',
          'price'=>'required',
          'maxprice'=>'required',
          'minprice'=>'required',
          'description'=>'required',
          'photo'=>'required|array|max:5',
          'bedrooms'=>'required',
          'outsidespace'=>'required',
          'status'=>'required'
           

 
 		);
		
 	public static function validate($data){
        return Validator::make($data,static::$rules);
 	}

 }
?>