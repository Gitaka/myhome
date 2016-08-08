$(function(){
	function getBaseUrl(){
		var protocol = window.location.protocol;
            host =  window.location.host;
		    pathname = window.location.pathname;

		 var BASE_URL = protocol + "//" +host + "/";
		return BASE_URL;
	}
	function getAgentId(){
		var pathname = window.location.pathname.split('/');
		    AgentId = pathname.pop();
		return AgentId;
	}
   
  var BASE_URL = getBaseUrl();
      AgentId = getAgentId();

$("#viewall").change(function(){
		if($(this).is(":checked")){
			$.ajax({
				type:"GET",
				url:BASE_URL + window.location.pathname,
				success:function(data){
					 $("#body").empty();
                    $("#body").append(data);
				}
			});
		
       }
	});

$("#clearall").change(function(){
	if($(this).is(":checked")){
	    	$("#viewall").attr('checked',false);
			$("#oneweek").attr('checked',false);
			$("#onemonth").attr('checked',false);
		
	}
   });

   $("#oneweek").change(function(){
   	  if($(this).is(":checked")){
          $.ajax({
          	type:"POST",
          	url:BASE_URL + "agent_land_week",
          	data:({agentId:AgentId}),
          	success:function(data){
          		$(".sidebar-content-body-section").empty();
			    $(".sidebar-content-body-section").append(data);
			    

          	}
          });

		}
   });
    $("#onemonth").change(function(){
   	  if($(this).is(":checked")){
			$.ajax({
				type:"POST",
				url:BASE_URL + "agent_land_month",
				data:({agentId:AgentId}),
				success:function(data){
					 $(".sidebar-content-body-section").empty();
					 $(".sidebar-content-body-section").append(data);
					 
				}
			});

		}
   });
});