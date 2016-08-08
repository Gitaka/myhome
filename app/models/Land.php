<?php
 class Land extends Eloquent{
 	public $fillable=array('name','location','owner','mobile','price','size','maxprice',
 		                'minprice','description','photo','imageFiles','imgtype','agent_id');
 	public $table="lands";

 	public static $rules=array(
          'name'=>'required',
          'location'=>'required',
          'owner'=>'required|min:5',
          'mobile'=>'required',
          'price'=>'required',
          'size'=>'required',
          'maxprice'=>'required',
          'minprice'=>'required',
          'description'=>'required',
          'photo'=>'required|array|max:5'

 		);
    public function agent(){
          $this->belongsTo('Agent');
 	    }
 	public static function validate($data){
         return Validator::make($data,static::$rules);
 	}
 }
?>