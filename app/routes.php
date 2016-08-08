<?php


Route::get('/', array('as'=>'home','uses'=>function()
{
	return Redirect::to('index');
}));

Route::get('index','SearchController@index');
Route::get('contact',array('as'=>'contact','uses'=>'ContactController@contact_form'));
Route::post('contact','ContactController@contact');

/*Route::get('index/rsearch','SearchController@RShowSearch');
Route::get('index/bsearch','SearchController@BShowSearch');*/
Route::get('index/lsearch','SearchController@LShowSearch');

Route::get('buylistings','SearchController@bsearch');
Route::get('rentlistings','SearchController@rsearch');

Route::get('buyimg/{id}',array('as'=>'buyimg','uses'=>'SearchController@buyimg'));
Route::get('rentimg/{id}',array('as'=>'rentimg','uses'=>'SearchController@rentimg'));
Route::get('bsearch/result/{id}',array('as'=>'bresult','uses'=>'SearchController@bresult'));
Route::get('results',array('as'=>'rsort','uses'=>'SearchController@SearchData'));

Route::get('admin',array('as'=>'adminlogin','uses'=>'AdminController@adminform'));
Route::post('admin/signin','AdminController@login');
Route::get('admin/index',array('as'=>'admin_index','uses'=>'AdminController@index'));
Route::get('admin/addprop',array('as'=>'addprop','uses'=>'PropertiesController@addPropform'));
Route::post('admin/addprop','PropertiesController@addprop');
Route::get('admin/logout',array('as'=>'adminlogout','uses'=>'AdminController@adminlogout'));
Route::post('proptype','AdminController@proptype');
Route::get('admin/buy',array('as'=>'addbuy','uses'=>'AdminController@buy'));
Route::post('admin/addbuy',array('as'=>'buy','uses'=>'AdminController@postbuy'));
Route::get('admin/rent',array('as'=>'addrent','uses'=>'AdminController@rent'));
Route::post('admin/addrent',array('as'=>'rent','uses'=>'AdminController@postrent'));
Route::get('admin/inbox',array('as'=>'message_inbox','uses'=>'AdminController@inbox'));
Route::get('admin/read/{id}',array('as'=>'read_inbox','uses'=>'AdminController@read'));
Route::get('admin/mail',array('as'=>'sendmail','uses'=>'AdminController@mail'));

//Route::get('user/{id}/edit',array('as'=>'EditUser','uses'=>'RegisterdUsersController@edit'));
Route::get('register',array('as'=>'register','uses'=>'UserLoginController@ShowRegisterForm'));
Route::post('user/register','UserLoginController@register');
Route::get('login',array('as'=>'login','uses'=>'UserLoginController@ShowLoginForm'));
Route::post('user/login','UserLoginController@login');
Route::get('default',function(){return View::make('.users.user_layout');});
Route::get('logout',array('as'=>'user_logout','uses'=>function(){
     Auth::logout();
     return Redirect::to('/')
     ->with('message', 'You are now logged out');
}));
Route::get('user','UserLoginController@user');
Route::get('user/rsearch','UserLoginController@rsearch');
Route::get('user/bsearch','UserLoginController@bsearch');
Route::get('user/lsearch','UserLoginController@lsearch');
Route::put('user/edit',array('as'=>'edituser','uses'=>'UserLoginController@edit'));
Route::post('user/savedProperties',array('as'=>'saved_props','uses'=>'UserLoginController@saved'));
Route::get('user/savedListings',array('as'=>'savedListings','uses'=>'UserLoginController@listings'));

Route::get('viewproperty',array('as'=>'property','uses'=>'PropertiesController@view'));
Route::get('viewproperty/{id}',array('as'=>'viewlisting','uses'=>'PropertiesController@viewlist'));
Route::get('propertyimg/{id}',array('as'=>'propimg','uses'=>'PropertiesController@viewimg'));



Route::get('blog',array('as'=>'addpost','uses'=>'BlogPostController@index'));
Route::post('blog','BlogPostController@addpost');
Route::get('blog/post',array('as'=>'viewpost','uses'=>'BlogPostController@viewpost'));
Route::get('blog/post/{id}',array('as'=>'post','uses'=>'BlogPostController@post'));
Route::get('blog/img/{id}',array('as'=>'blogimg','uses'=>'BlogPostController@img'));
Route::get('blog/category/{id}',array('as'=>'category','uses'=>'BlogPostController@category'));

Route::get('agents',array('as'=>'agentsCreate','uses'=>'AgentController@create'));
Route::post('agents',array('agents','uses'=>'AgentController@addagent'));
Route::put('agentEdit',array('agentEdit','uses'=>'AgentController@editagent'));
Route::get('agent/account',array('as'=>'agentaccount','uses'=>'AgentController@account'));
Route::get('agent/login',array('as'=>'agentlogin','uses'=>'AgentController@agentloginform'));
Route::post('agent/login','AgentController@login');
Route::get('agent/logout',array('as'=>'agent_go_logout','uses'=>'AgentController@logout'));

Route::get('agent/addlisting',array('as'=>'agentlisting','uses'=>'AgentController@listing'));
Route::post('agent/addlisting','AgentController@createlisting');

Route::get('agent/addbuy',array('as'=>'agentbuy','uses'=>'AgentController@buy'));
Route::post('agent/addbuy','AgentController@createbuy');
Route::get('agent/addrent',array('as'=>'agentrent','uses'=>'AgentController@rent'));
Route::post('agent/addrent','AgentController@createrent');
Route::get('agent/addland',array('as'=>'agentland','uses'=>'AgentController@land'));
Route::post('agent/addland','AgentController@createland');

Route::get('/{agentUsername}',array('as'=>'viewAgent','uses'=>'AgentController@seeAgent'));
Route::get('agent/search',array('as'=>'searchAgent','uses'=>'AgentController@search_agent'));
Route::get('agent/search/results','AgentController@search');
Route::get('agent/logo/{id}','AgentController@seeLogo');
Route::get('agent/b_img/{id}',array('as'=>'b_agentimg','uses'=>'AgentController@b_agentimg'));
Route::get('agent/r_img/{id}',array('as'=>'r_agentimg','uses'=>'AgentController@r_agentimg'));
Route::get('agent/search/bview/{id}',array('as'=>'agentBview','uses'=>'AgentController@b_propView'));
Route::get('agent/search/rview/{id}',array('as'=>'agentRview','uses'=>'AgentController@r_propView'));

Route::get('agent/view/rent/{id}',array('as'=>'agentRent','uses'=>'AgentController@agentrent'));
Route::get('agent/view/sale/{id}',array('as'=>'agentSale','uses'=>'AgentController@agentsale'));
Route::get('agent/view/land/{id}',array('as'=>'agentLand','uses'=>'AgentController@agentland'));
Route::get('agent/view/property/rent/{id}',array('as'=>'prop_r','uses'=>'AgentController@prop_r'));
Route::get('agent/view/property/sale/{id}',array('as'=>'prop_s','uses'=>'AgentController@prop_s'));
Route::get('agent/view/property/land/{id}',array('as'=>'prop_l','uses'=>'AgentController@prop_l'));
Route::get('agent/contact/{id}',array('as'=>'contactagent','uses'=>'AgentController@contact'));
Route::post('agent/contact','AgentController@ContactMessage');
Route::get('agent/view/inbox',array('as'=>'agentInbox','uses'=>'AgentController@inbox'));
Route::get('agent/read/inbox/{id}',array('as'=>'agentReadInbox','uses'=>'AgentController@agent_read'));
Route::get('agent/view/myrent',array('as'=>'myrent','uses'=>'AgentController@myrent'));
Route::get('agent/view/mybuy',array('as'=>'mybuy','uses'=>'AgentController@mybuy'));
Route::get('agent/view/myland',array('as'=>'myland','uses'=>'AgentController@myland'));

Route::get('prop/print/{id}',array('as'=>'prop_print','uses'=>'PrintController@property_flayer'));
Route::get('sale/print/{id}',array('as'=>'sale_print','uses'=>'PrintController@sale_flayer'));
Route::get('rent/print/{id}',array('as'=>'rent_print','uses'=>'PrintController@rent_flayer'));
Route::get('land/print/{id}',array('as'=>'land_print','uses'=>'PrintController@land_flayer'));


Route::get('property_week','AjaxSearchFiltersController@weekly');
Route::get('property_month','AjaxSearchFiltersController@monthly');
Route::post('flat','AjaxSearchFiltersController@apartment');
Route::post('outsidespace','AjaxSearchFiltersController@space');
Route::post('status','AjaxSearchFiltersController@state');
Route::post('apartmentrooms','AjaxSearchFiltersController@frooms');
Route::post('houserooms','AjaxSearchFiltersController@hrooms');

Route::post('buy_week','BuyAjaxFilterController@weekly');
Route::post('buy_month','BuyAjaxFilterController@bmonthly');
Route::post('buy_outsidespace','BuyAjaxFilterController@space');
Route::post('buy_status','BuyAjaxFilterController@state');
Route::post('buy_houserooms','BuyAjaxFilterController@hrooms');

Route::post('rent_week','RentAjaxController@weekly');
Route::post('rent_month','RentAjaxController@bmonthly');
Route::post('rent_outsidespace','RentAjaxController@space');
Route::post('rent_status','RentAjaxController@state');
Route::post('rent_houserooms','RentAjaxController@hrooms');

Route::post('agent_rent_week','AgentRentSearchController@weekly');
Route::post('agent_rent_month','AgentRentSearchController@monthly');
Route::post('agent_rent_flat','AgentRentSearchController@apartment');
Route::post('agent_rent_outsidespace','AgentRentSearchController@space');
Route::post('agent_rent_status','AgentRentSearchController@state');
Route::post('agent_rent_apartmentrooms','AgentRentSearchController@frooms');
Route::post('agent_rent_houserooms','AgentRentSearchController@hrooms');

Route::post('agent_buy_week','AgentBuySearchController@weekly');
Route::post('agent_buy_month','AgentBuySearchController@monthly');
Route::post('agent_buy_flat','AgentBuySearchController@apartment');
Route::post('agent_buy_outsidespace','AgentBuySearchController@space');
Route::post('agent_buy_status','AgentBuySearchController@state');
Route::post('agent_buy_apartmentrooms','AgentBuySearchController@frooms');
Route::post('agent_buy_houserooms','AgentBuySearchController@hrooms');

Route::post('agent_land_week','AgentLandSearchController@weekly');
Route::post('agent_land_month','AgentLandSearchController@monthly');

Route::group(array(
'domain'=>'mobile.'.Config::get('app.domain')),function(){
  Route::get('/',function(){
  	return'Hello from mysubdomain';
  });
});

Route::get('mobile',array('as'=>'mobile_index','uses'=>'MobileController@index'));
Route::get('m',array('as'=>'m_index','uses'=>'MobileController@m_index'));

Route::post('m/index/search','MobileController@search');
Route::get('m/propertyListings',array('as'=>'m_listings','uses'=>'MobileController@listings'));
Route::get('m/agentfind',array('as'=>'m_agent_find','uses'=>'MobileController@search_agent'));
Route::get('m/agentsfind','MobileController@agent');
Route::get('m/agent/rent/{id}',array('as'=>'m_agentRent','uses'=>'MobileController@agentrent'));
Route::get('m/agent/sale/{id}',array('as'=>'m_agentSale','uses'=>'MobileController@agentsale'));
Route::get('m/agent/land/{id}',array('as'=>'m_agentLand','uses'=>'MobileController@agentland'));

Route::get('m/listing/{id}',array('as'=>'viewprop','uses'=>'MobileController@viewprop'));
Route::get('m/buy/{id}',array('as'=>'viewbuy','uses'=>'MobileController@viewbuy'));
Route::get('m/rent/{id}',array('as'=>'viewrent','uses'=>'MobileController@viewrent'));
Route::get('m/land/{id}',array('as'=>'viewland','uses'=>'MobileController@viewland'));

Route::get('propertylistingsapi',array('as'=>'listingsApi','uses'=>'ApiController@getPropertyListings'));
Route::get('buylistingsapi',array('as'=>'buyApi','uses'=>'ApiController@getBuyListings'));
Route::get('rentlistingsapi',array('as'=>'rentApi','uses'=>'ApiController@getRentListings'));
Route::get('landlistingsapi',array('as'=>'landApi','uses'=>'ApiController@getLandListings'));
Route::get('agentapi',array('as'=>'agentApi','uses'=>'ApiController@getAgent'));
//agentapi?location=$location&name=$name
Route::get('agentbuysapi',array('as'=>'a_buysapi','uses'=>'ApiController@getAgentBuys'));
//agentbuysapi?location=$location&name=$name&id=$id
Route::get('agentrentsapi',array('as'=>'a_rentsapi','uses'=>'ApiController@getAgentRents'));
//agentrentsapi?location=$location&name=$name&id=$id
Route::get('agentlandsapi',array('as'=>'a_landsapi','uses'=>'ApiController@getAgentlands'));
//agentlandsapi?location=$location&name=$name&id=$id

Route::get('bronzecheckout/{id}',array('as'=>'bronzecheckout','uses'=>'SubscriptionsController@bronzecheckout'));
Route::get('goldcheckout/{id}',array('as'=>'goldcheckout','uses'=>'SubscriptionsController@goldcheckout'));
Route::get('silvercheckout/{id}',array('as'=>'silvercheckout','uses'=>'SubscriptionsController@silvercheckout'));
Route::get('account/updateSub/','SubscriptionsController@update');
Route::get('account/bronzeMembership',array('as'=>'bMembership','uses'=>'SubscriptionsController@bronzeMembership'));



/*Route::any('migrate-db',function(){
	   echo '<br>init with Migrate tables ...';
         Artisan::call('migrate', ['--quiet' => true, '--force' => true]);
        echo '<br>done with Migrate tables';
});*/

Route::get('testImage','UserLoginController@testImage');
Route::post('testimage','UserLoginController@image');