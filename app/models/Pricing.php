<?php
class Pricing extends Eloquent{
	protected $table = 'pricings';
	protected $fillable = ['bronze','silver','gold'];
}
?>