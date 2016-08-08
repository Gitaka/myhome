<?php
 class Listing extends Eloquent{
    protected $table = 'listings';
 	protected $fillable=array('name','for','location','owner','mobile','price','type_id','maxprice',
 		                     'minprice','description','bedrooms','outsidespace','status','photo','imgtype','agent_id','isFeatured','imageFiles');
 	public function agent(){
       $this->belongsTo('Agent');
 	}
 	 	public static $rules=array(
 		      'name'=>'required',
          'for'=>'required',
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
          'photo'=>'required|array|max:15'

 
 		);
		
 	    public static function validate($data){
            return Validator::make($data,static::$rules);
 	  }
      
 

 }
 
?>