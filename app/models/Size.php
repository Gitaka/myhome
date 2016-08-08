<?php
class size extends Eloquent{
      public $table="sizes";

    protected $fillable=array('size');
 	public $timestamps=false;

 

 	  public function land(){
 		$this->hasMany('Land');
 	  }
   }
?>