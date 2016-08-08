<?php
class SubscriptionsController extends BaseController{
	public function bronzecheckout($id){
        $pricing = Pricing::all();
        $bronzePricing = $pricing->bronze;
		$agentDetails = DB::select('SELECT firstname,lastname,username,email,mobile FROM agents WHERE id = ?', array($id));
        foreach($agentDetails as $detail){
           $firstname=$detail->firstname;
           $lastname=$detail->lastname;
           $username=$detail->username;
           $cus_email=$detail->email;
           $mobile='0'.$detail->mobile;
        }
        $live=0;
        $mm=1;
        $mb=1;
        $dc=1;
        $cc=1;
        $merchantName=$firstname.$lastname;
        $orderId=$id;
        $invoiceNumber=$orderId;
        $totalAmount=$bronzePricing;
        $tel=$mobile;
        $email=$cus_email;
        $vendorId='myhome';
        $currency='KES';
        $p1='agentId'.'_'.$id;
        $p2='Membership'.'_'.'1';
        $p3='';
        $p4='';
        $crl=0;
        $cst=1;
        $callBackUrl='http://localhost/bronzeMembership';
        $customerEmailNotification=1;

    

        $dataString=$live.$mm.$mb.$dc.$cc.$merchantName.$orderId.$invoiceNumber.$totalAmount.
                       $tel.$email.$vendorId.$currency.$p1.$p2.$p3.$p4.$callBackUrl.$cst.$crl;
        $hashkey='BITc2016myHomesolution';
        $hashId= hash_hmac('sha1',$dataString,$hashkey);
        
        $hsh=$hashId;
      
	



return'<iframe src="https://www.ipayafrica.com/payments/?live=0&mm=1&mb=1&dc=1&cc=1&mer='.$merchantName.'&oid='.$orderId.'&inv='.$orderId.'&ttl='.$totalAmount.'&
tel='.$mobile.'&eml='.$email.'&vid='.$vendorId.'&p1='.$p1.'&p2='.$p2.'&p3='.$p3.'&p4='.$p4.'&crl='.$crl.'&cbk
=http://localhost/bronzeMembership&cst='.$cst.'&cur='.$currency.'&hsh='.$hsh.'"width="1330"height="700"/></frame>';

/*$string='01111'.$merchantName.''.$orderId.''.$invoiceNumber.''.$totalAmount.''.$tel.''.$email.''.$vendorId.''.$currency.''
             .$p1.''.$p2.''.$p3.''.$p4.''.$crl.''.$cst.''.$callBackUrl.'';*/
/*$string='01111'.$merchantName.''.$orderId.''.$invoiceNumber.''.$totalAmount.''.$tel.''.$email.''.$vendorId.''.$currency.''
             .$p1.''.$p2.''.$p3.''.$p4.''.$crl.''.$cst.''.$callBackUrl.'';
$hash=hash_hmac('sha1',$string,'BITc2016myHomesolution');
//$string2 = '01111gitakamuchai1414350715529565gitakamuchai@gmail.commyhomeKESagentId_14Membership_1http://localhost/bronzeMembership10';
$string2 = '01111gitakamuchai1414350715529565gitakamuchai@gmail.commyhomeKESagentId_14Membership_1http://localhost/bronzeMembership10';
$has2 = hash_hmac('sha1',$string2,$hashkey);
return $hsh.'</br></br></br></br></br>'.$hash.'</br></br></br></br></br>'.$has2;*/





	}
	public function silvercheckout($id){
		 $agentDetails = DB::select('SELECT firstname,lastname,username,email,mobile FROM agents WHERE id = ?', array($id));
        foreach($agentDetails as $detail){
           $firstname=$detail->firstname;
           $lastname=$detail->lastname;
           $username=$detail->username;
           $cus_email=$detail->email;
           $mobile='0'.$detail->mobile;
        }
        $live=0;
        $mm=1;
        $mb=1;
        $dc=1;
        $cc=1;
        $merchantName=$firstname.$lastname;
        $orderId=$id;
        $invoiceNumber=$orderId;
        $totalAmount=3500;
        $tel=$mobile;
        $email=$cus_email;
        $vendorId='myhome';
        $currency='KES';
        $p1='agentId'.'_'.$id;
        $p2='Membership'.'_'.'2';
        $p3='';
        $p4='';
        $crl=0;
        $cst=1;
        $callBackUrl='http://localhost/bronzeMembership';
        $customerEmailNotification=1;

    

        $dataString=$live.$mm.$mb.$dc.$cc.$merchantName.$orderId.$invoiceNumber.$totalAmount.
                       $tel.$email.$vendorId.$currency.$p1.$p2.$p3.$p4.$callBackUrl.$cst.$crl;
        $hashkey='BITc2016myHomesolution';
        $hashId= hash_hmac('sha1',$dataString,$hashkey);
        
        $hsh=$hashId;
      
  



return'<iframe src="https://www.ipayafrica.com/payments/?live=0&mm=1&mb=1&dc=1&cc=1&mer='.$merchantName.'&oid='.$orderId.'&inv='.$orderId.'&ttl='.$totalAmount.'&
tel='.$mobile.'&eml='.$email.'&vid='.$vendorId.'&p1='.$p1.'&p2='.$p2.'&p3='.$p3.'&p4='.$p4.'&crl='.$crl.'&cbk
=http://localhost/bronzeMembership&cst='.$cst.'&cur='.$currency.'&hsh='.$hsh.'"width="1330"height="700"/></frame>';

	}
	public function goldcheckout($id){

        $agentDetails = DB::select('SELECT firstname,lastname,username,email,mobile FROM agents WHERE id = ?', array($id));
                foreach($agentDetails as $detail){
           $firstname=$detail->firstname;
           $lastname=$detail->lastname;
           $username=$detail->username;
           $cus_email=$detail->email;
           $mobile='0'.$detail->mobile;
        }
        $live=0;
        $mm=1;
        $mb=1;
        $dc=1;
        $cc=1;
        $merchantName=$firstname.$lastname;
        $orderId=$id;
        $invoiceNumber=$orderId;
        $totalAmount=7500;
        $tel=$mobile;
        $email=$cus_email;
        $vendorId='myhome';
        $currency='KES';
        $p1='agentId'.'_'.$id;
        $p2='Membership'.'_'.'3';
        $p3='';
        $p4='';
        $crl=0;
        $cst=1;
        $callBackUrl='http://localhost/bronzeMembership';
        $customerEmailNotification=1;

    

        $dataString=$live.$mm.$mb.$dc.$cc.$merchantName.$orderId.$invoiceNumber.$totalAmount.
                       $tel.$email.$vendorId.$currency.$p1.$p2.$p3.$p4.$callBackUrl.$cst.$crl;
        $hashkey='BITc2016myHomesolution';
        $hashId= hash_hmac('sha1',$dataString,$hashkey);
        
        $hsh=$hashId;
      
  



return'<iframe src="https://www.ipayafrica.com/payments/?live=0&mm=1&mb=1&dc=1&cc=1&mer='.$merchantName.'&oid='.$orderId.'&inv='.$orderId.'&ttl='.$totalAmount.'&
tel='.$mobile.'&eml='.$email.'&vid='.$vendorId.'&p1='.$p1.'&p2='.$p2.'&p3='.$p3.'&p4='.$p4.'&crl='.$crl.'&cbk
=http://localhost/bronzeMembership&cst='.$cst.'&cur='.$currency.'&hsh='.$hsh.'"width="1330"height="700"/></frame>';
	}


	public function update(){
		$status=Input::get('status');
		$id=Input::get('id');
		$ivm=Input::get('ivm');
		$txncd=Input::get('txncd');
		$qwh=Input::get('qwh');
		$afd=Input::get('afd');
		$poi=Input::get('poi');
		$uyt=Input::get('uyt');
		$ifd=Input::get('ifd');
		$agt=Input::get('agt');
		$mc=Input::get('mc');
		$p1=Input::get('p1');
		$p2=Input::get('p2');
		$msisdn_id=Input::get('msisdn_id');
		$msisdn_idnum=Input::get('msisdn_idnum');
         
        $p= split('_',$p1);
        $agentId=$p[1];

        $p_m=split('_',$p2);
        $membership=$p_m[1];

         $start_date = date("Y-m-d H:i:s",time());
		 $end_date= date('Y-m-d H:i:s',strtotime($start_date)+ 24*30*60*60);
	
	    switch ($status) {
	    	case 'fe2707etr5s4wq':
	    		# failed
	    		break;
	    	case 'aei7p7yrx4ae34':
	    		
		
                   Subscription::Where('user_id',$agentId)->update(array(
                                       'type_id' => $membership,
                                       'start_date' => $start_date,
                                       'end_date' => $end_date
                                   ));
                 Session::flash('success','Success');
                 return Redirect::to('agent/account');
	    		break;
	    	case 'dtfi4p7yty45wq':
	    	    //less cash
	    	    break;
	    	case 'bdi6p2yy76etrs':
	    	     //pending,try in 5min
	    	     break;
	    	case 'cr5i3pgy9867e1':
	    	      //used
	    	     break;

	    	default:
	    		 //no transaction
	    		break;
	    }
	}

    public function bronzeMembership(){

   /*$status=Input::get('status');
        $id=Input::get('id');
        $ivm=Input::get('ivm');
        $txncd=Input::get('txncd');
        $qwh=Input::get('qwh');
        $afd=Input::get('afd');
        $poi=Input::get('poi');
        $uyt=Input::get('uyt');
        $ifd=Input::get('ifd');
        $agt=Input::get('agt');
        $mc=Input::get('mc');
        $p1=Input::get('p1');
        $p2=Input::get('p2');
        $msisdn_id=Input::get('msisdn_id');
        $msisdn_idnum=Input::get('msisdn_idnum');

        $p= split('_',$p1);
        $agentId=$p[1];

        $p_m=split('_',$p2);
        $membership=$p_m[1];

        switch ($status) {
            case 'fe2707etr5s4wq':
                # failed
                break;
            case 'aei7p7yrx4ae34':
                  return View::make('agents.createListing')
                              ->with('type',Type::all())
                              ->with('agent',Agent::find($agentId));
                break;
            case 'dtfi4p7yty45wq':
                //less cash
                break;
            case 'bdi6p2yy76etrs':
                 //pending,try in 5min
                 break;
            case 'cr5i3pgy9867e1':
                  //used
                 break;

            default:
                 //no transaction
                break;
        }*/
    }
   
}

?>