<?php
class Message extends Eloquent{
	public $fillable=array('fullname','subject','email','telephone','message','agent_id');
	public $table="messages";
    
    public function agent(){
    	$this->belongsTo('Agent');
    }
	public static $rules=array(
         'fullname'=>'required',
         'subject'=>'required',
         'email'=>'required|email',
         'telephone'=>'required',
         'message'=>'required'
		);
	public static function validate($data){
		return Validator::make($data,static::$rules);
	}
}
?>