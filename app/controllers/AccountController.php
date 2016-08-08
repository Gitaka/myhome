<?php
  class AccountController extends BaseController{
  	 public function paging(){
  	 	$users=User::paginate(2);
         return View::make('paging',compact('users'));
  	 }
  }
 
 ?>