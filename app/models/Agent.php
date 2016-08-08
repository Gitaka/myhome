<?php
 class Agent extends Eloquent{
 	protected $fillable=array('firstname','lastname','username','email','mobile',
 		                      'password','location','logo_path','logo_ext');
 	protected $table='agents';

  protected $hidden = array('password');

  public function blistings(){
     return $this->hasMany('Listing')->where('for','=','1');
  }
  public function rlistings(){
     return $this->hasMany('Listing')->where('for','=','2');
  }

 	public function buys(){
 		 return $this->hasMany('Buy');
 	}
  public function lands(){
     return $this->hasMany('Land');
  }
 	public function rents(){
 		return $this->hasMany('Rent');
 	}
    public function messages(){
    	return $this->hasMany('Message');
    }
 	public static $rules=array(
           'firstname'=>'required',
           'lastname'=>'required',
           'username'=>'required',
           'mobile'=>'required',
           'email'=>'required|email',
           'password'=>'required|min:4|max:12',
           'location'=>'required',
           'logo'=>'required'
          

 		);
 

 	 public static function validate($data){
            return Validator::make($data,static::$rules);
 	  }
    public static $findAgentRules=array(
           'location'=>'required'

       );
    public static function validateFindAgent($data){
      return Validator::make($data,static::$findAgentRules);
    }
 }
 
?>

