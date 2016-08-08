<?php
 class UserDetail extends Eloquent{
 	
 	public $table='users';
 	protected $fillable=array('username','email','password');
 	
 	public static $rules=array(
          'username'=>'required',
          'email'=>'required|email',
          'password'=>'required|min:4'
 		);

 	public function validate(){
 		return Validate::make($data,static::$rules);
 	}
 }
 
?>