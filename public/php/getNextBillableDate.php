<?php
/*
function to calculate the same day one month in the future
some months don't have 29,30,31 days, if the next month doesn't have as many days as this month
,the same day next month(anniversary) will be moved up to the last day of the next month

*/
function calculateNextMonth($start_date = FALSE){
  if($start_date){
  	 $now = $start_date; // use the suppliedstart date

  }else{
  	$now = time(); //use the current time
  }

//get the current month (as an integer)
$currentMonth = date('n',$now);

//if the we're in Dec(12),set current month to jan(1),add 1 to year.otherwise add a month to the next month and calculate the date

if($currentMonth == 12){
	$nextMonth = 1;
	$plusOneMonth = mktime(0,0,0,1,date('d',$now),date('Y', $now)+1);

} else{
    $nextMonth = $currentMonth + 1;
    $plusOneMonth = mktime(0,0,0,date('m',$now) + 1,date('d',$now),date('Y'));
}
$i = 1;
//go back a day at a time until we get the last day next month.
while(date('n',$plusOneMonth) != $nextMonth){
	$plusOneMonth = mktime(0,0,0,date('m',$now) +1,date('d',$now)-$i,date('Y',$now));
	//mktime() returns a unix timestamp for a date;
	$i++;  
  }
return $plusOneMonth;

}


function calculateNextYear($startDate = FALSE){
	if($startDate){
		$now = $startDate;

	}else{
		$now = time();
	}

	$month = date('m',$now);
	$day = date('d',$now);
	$year = date('Y',$now);
	$plusOneYear = strtotime("$year-$month-$day");
	return $plusOneYear;
}

function getNextBillableDate($startDate){
	$date_array = explode("-", $startDate);

	$year = $date_array[0];
	$month = $date_array[1];
	$day = $date_array[2];

	if(date('d') <= $day){
		$billableMonth = (int) date('m');
	}else{
		$billableMonth = date('m') + 1;
	}

	$billableMonthDays = cal_days_in_month(CAL_GREGORIAN,$billableMonth, date('Y'));
	//cal_days_in_month() returns the number ofdays in a month.
	if($billableMonthDays > $day){
		$billableDay = $day;
	}else{
		$billableDay = $billableMonthDays;
	}

 $nextBillableDate = $billableMonth."/".$billableDay."/".date('Y');

return $nextBillableDate;
}
?>