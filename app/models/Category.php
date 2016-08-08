<?php
 class Category extends Eloquent{
 	public $fillable=array('category');
 	protected $table='categories';
 	public $timestamps=false;
 }
 
?>