<?php
 class ContactController extends BaseController{
 	public function contact_form(){
 		return View::make('contact.contacts');
 	}
 	public function contact(){

 	  //$validation=Agent::validate(Input::all());
      $validation=Contact::Validate(Input::all());
      if($validation->fails()){
         return Redirect::to('contact')->withErrors($validation)->withInput();
      }else{
      	Contact::create(array(
       'fullname'=>Input::get('fullname'),
       'email'=>Input::get('email'),
       'message'=>Input::get('message')
      
       	));
 		return Redirect::to('contact');
      }
   
 	}
 }
 
?>