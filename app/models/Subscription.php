<?php
class Subscription extends Eloquent{
	public $table='subscriptions';
	public $fillable=array('type_id','user_id','start_date','end_date');
}


?>