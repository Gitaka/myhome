$(function(){
	function getBaseUrl(){
		var protocol = window.location.protocol;
            host =  window.location.host;
		    pathname = window.location.pathname;

		 var BASE_URL = protocol + "//" +host + "/";
		return BASE_URL;
	}


   var BASE_URL = getBaseUrl();
	$('#silver').click(function(){
		$.ajaxSetup({
     	headers:{
     		'X-CSRF-Token':$('meta[name="_token"]').attr('content')
     	}
     });
		
     var now = Date();
	    timeZone = now.toString().split(" ");
        dayOfMonthString = timeZone[0];
        month = timeZone[1];
        day = timeZone[2];
        year = timeZone[3];
        time = timeZone[4];
        tz = timeZone[5];
       monthindig=('0' + (new Date().getMonth()+ 1)).slice(-2);

        id = $("#user_id").text();
		/*$.ajax({
			type:"POST",
			url:BASE_URL+"updateSubcription",
			data:({user_id:id,membership:'2',year:year,month:month,day:day,time:time,monthindig:monthindig}),
			success:function(data){
				alert(data);
			}
		});*/
		alert(time+day+year+monthindig);
	
	});
	$('#gold').click(function(){
		var now = Date();
	    timeZone = now.toString().split(" ");
        dayOfMonthString = timeZone[0];
        month = timeZone[1];
        day = timeZone[2];
        year = timeZone[3];
        time = timeZone[4];
        tz = timeZone[5];
       monthindig=('0' + (new Date().getMonth()+ 1)).slice(-2);

        id = $("#user_id").text();
		/*$.ajax({
			type:"POST",
			url:BASE_URL+"updateSubcription",
			data:({user_id:id,membership:'3',year:year,month:month,day:day,time:time,monthindig:monthindig}),
			success:function(data){
				alert(data);
			}
		});*/
	  alert(time+day+year+monthindig);
	});
});