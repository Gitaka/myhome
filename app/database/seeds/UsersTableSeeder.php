<?php
 class UsersTableSeeder extends Seeder{
 	 public function run(){


           User::create(array(
                'username' =>'scott', 'password' => Hash::make('tiger'),
              'mobile' =>'0712546654','firstname'=>'test','lastname'=>'lasttest','email'=>'me@scot.com')
           );
 	 }
 }
 
?>