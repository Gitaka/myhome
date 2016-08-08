<?php
 class Type extends Eloquent {

 	protected $table='types';
    protected $fillable=array('type');
 	public $timestamps=false;

 	public function buy(){
 		$this->hasMany('Buy');
 	}

 	public function rent(){
 		$this->hasMany('Rent');
 	}
 }
?>