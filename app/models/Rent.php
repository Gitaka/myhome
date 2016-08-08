<?php
 class Rent extends Eloquent{
 	protected $table = 'rents';
 	protected $fillable=array('name','location','owner','mobile','price','type_id','maxprice',
 		                     'minprice','description','bedrooms','outsidespace','status','photo','imgtype','agent_id','admin_id','imageFiles');
 	public function agent(){
 		$this->belongsTo('Agent');
 	}

    	public static $rules=array(
 		  'name'=>'required',
          'location'=>'required',
          'owner'=>'required|min:5',
          'mobile'=>'required',
          'type_id'=>'required',
          'price'=>'required',
          'maxprice'=>'required',
          'minprice'=>'required',
          'description'=>'required',
          'bedrooms'=>'required',
          'outsidespace'=>'required',
          'status'=>'required',
          'photo'=>'required|array|max:5'

 		);
		
 	    public static function validate($data){
            return Validator::make($data,static::$rules);
 	  }


 }
 
?>