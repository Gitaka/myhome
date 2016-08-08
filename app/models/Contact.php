<?php
 Class Contact extends Eloquent{
 	public $fillable=array('fullname','email','message');
 	public $table='contacts';

 	public static $rules=array(
       'fullname'=>'required',
       'email'=>'required|email',
       'message'=>'required'
 		);
 	public static function validate($data){
 		return Validator::make($data,static::$rules);
 	}
 }
?>