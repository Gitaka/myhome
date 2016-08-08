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
			$("#apartment").attr('checked',false);
			$("#land").attr('checked',false);
			$("#house").attr('checked',false);
			$("#pre").attr('checked',false);
			$("#new").attr('checked',false);
			$("#park").attr('checked',false);
			$("#garden").attr('checked',false);
			$("#drive").attr('checked',false);
			$("#ab1").attr('checked',false);
            $("#ab2").attr('checked',false);
            $("#ab3").attr('checked',false);
            $("#ab4").attr('checked',false);
            $("#ab5").attr('checked',false);
            $("#ab6").attr('checked',false);
            $("#hb1").attr('checked',false);
            $("#hb2").attr('checked',false);
            $("#hb3").attr('checked',false);
            $("#hb4").attr('checked',false);
            $("#hb5").attr('checked',false);
            $("#hb6").attr('checked',false);
	}
   });

   $("#oneweek").change(function(){
   	  if($(this).is(":checked")){
          $.ajax({
          	type:"POST",
          	url:BASE_URL + "agent_buy_week",
          	data:({agentId:AgentId}),
          	success:function(data){
          		 if($.isEmptyObject(data)){
					 	  $(".sidebar-content-body-section").empty();
					       $(".sidebar-content-body-section").append('<h2>No Results Found</h2>');
					 }else{
					 		$(".sidebar-content-body-section").empty();
					       $(".sidebar-content-body-section").append(data);
					 }

          	}
          });

		}
   });
    $("#onemonth").change(function(){
   	  if($(this).is(":checked")){
			$.ajax({
				type:"POST",
				url:BASE_URL + "agent_buy_month",
				data:({agentId:AgentId}),
				success:function(data){
					  if($.isEmptyObject(data)){
					 	  $(".sidebar-content-body-section").empty();
					       $(".sidebar-content-body-section").append('<h2>No Results Found</h2>');
					 }else{
					 		$(".sidebar-content-body-section").empty();
					       $(".sidebar-content-body-section").append(data);
					 }
					
					 
				}
			});

		}
   });
	$("#apartment").change(function(){
		if($(this).is(":checked")){
			$.ajax({
				type:"POST",
				url:BASE_URL + "agent_buy_flat",
				data:({agentId:AgentId,type:"1"}),
				success:function(data){
					  if($.isEmptyObject(data)){
					 	  $(".sidebar-content-body-section").empty();
					       $(".sidebar-content-body-section").append('<h2>No Results Found</h2>');
					 }else{
					 		$(".sidebar-content-body-section").empty();
					       $(".sidebar-content-body-section").append(data);
					 }
					 
				}
			});
		
		}
	});
$("#ab1").change(function(){
   	  	if($(this).is(":checked")){
	      $.ajax({
				type:"POST",
				url:BASE_URL+"agent_buy_apartmentrooms",
				data:({rooms:"1",agentId:AgentId,type:"1"}),
				success:function(data){
					 if($.isEmptyObject(data)){
					 	  $(".sidebar-content-body-section").empty();
					       $(".sidebar-content-body-section").append('<h2>No Results Found</h2>');
					 }else{
					 		$(".sidebar-content-body-section").empty();
					       $(".sidebar-content-body-section").append(data);
					 }
				}
			});
		}
   });

   $("#ab2").change(function(){
   	  	if($(this).is(":checked")){
	      $.ajax({
				type:"POST",
				url:BASE_URL+"agent_buy_apartmentrooms",
				data:({rooms:"2",agentId:AgentId,type:"1"}),
				success:function(data){
					 if($.isEmptyObject(data)){
					 	  $(".sidebar-content-body-section").empty();
					       $(".sidebar-content-body-section").append('<h2>No Results Found</h2>');
					 }else{
					 		$(".sidebar-content-body-section").empty();
					       $(".sidebar-content-body-section").append(data);
					 }
				}
			});
		}
   });
      $("#ab3").change(function(){
   	  	if($(this).is(":checked")){
	      $.ajax({
				type:"POST",
				url:BASE_URL+"agent_buy_apartmentrooms",
				data:({rooms:"3",agentId:AgentId,type:"1"}),
				success:function(data){
					 if($.isEmptyObject(data)){
					 	  $(".sidebar-content-body-section").empty();
					       $(".sidebar-content-body-section").append('<h2>No Results Found</h2>');
					 }else{
					 		$(".sidebar-content-body-section").empty();
					       $(".sidebar-content-body-section").append(data);
					 }
				}
			});
		}
   });
   $("#ab4").change(function(){
   	  	if($(this).is(":checked")){
	      $.ajax({
				type:"POST",
				url:BASE_URL+"agent_buy_apartmentrooms",
				data:({rooms:"4",agentId:AgentId,type:"1"}),
				success:function(data){
					 if($.isEmptyObject(data)){
					 	  $(".sidebar-content-body-section").empty();
					       $(".sidebar-content-body-section").append('<h2>No Results Found</h2>');
					 }else{
					 		$(".sidebar-content-body-section").empty();
					       $(".sidebar-content-body-section").append(data);
					 }
				}
			});
		}
   });
      $("#ab5").change(function(){
   	  	if($(this).is(":checked")){
	      $.ajax({
				type:"POST",
				url:BASE_URL+"agent_buy_apartmentrooms",
				data:({rooms:"5",agentId:AgentId,type:"1"}),
				success:function(data){
					 if($.isEmptyObject(data)){
					 	  $(".sidebar-content-body-section").empty();
					       $(".sidebar-content-body-section").append('<h2>No Results Found</h2>');
					 }else{
					 		$(".sidebar-content-body-section").empty();
					       $(".sidebar-content-body-section").append(data);
					 }
				}
			});
		}
   });
      $("#ab6").change(function(){
   	  	if($(this).is(":checked")){
	      $.ajax({
				type:"POST",
				url:BASE_URL+"agent_buy_apartmentrooms",
				data:({rooms:"6",agentId:AgentId,type:"1"}),
				success:function(data){
					 if($.isEmptyObject(data)){
					 	  $(".sidebar-content-body-section").empty();
					       $(".sidebar-content-body-section").append('<h2>No Results Found</h2>');
					 }else{
					 		$(".sidebar-content-body-section").empty();
					       $(".sidebar-content-body-section").append(data);
					 }
				}
			});
		}
   });

$("#house").change(function(){
	    	if($(this).is(":checked")){
			$.ajax({
				type:"POST",
				url:BASE_URL + "agent_buy_flat",
				data:({agentId:AgentId,type:"5"}),
				success:function(data){
					  if($.isEmptyObject(data)){
					 	  $(".sidebar-content-body-section").empty();
					       $(".sidebar-content-body-section").append('<h2>No Results Found</h2>');
					 }else{
					 		$(".sidebar-content-body-section").empty();
					       $(".sidebar-content-body-section").append(data);
					 }
				}
			});
	      
		}
	});
$("#hb1").change(function(){
   	  if($(this).is(":checked")){
			$.ajax({
				type:"POST",
				url:BASE_URL + "agent_buy_houserooms",
				data:({rooms:"1",agentId:AgentId,type:"5"}),
				success:function(data){
					 if($.isEmptyObject(data)){
					 	  $(".sidebar-content-body-section").empty();
					       $(".sidebar-content-body-section").append('<h2>No Results Found</h2>');
					 }else{
					 		$(".sidebar-content-body-section").empty();
					       $(".sidebar-content-body-section").append(data);
					 }
					
					
				}
			});
		}
   });
 $("#hb2").change(function(){
   	  if($(this).is(":checked")){
			$.ajax({
				type:"POST",
				url:BASE_URL + "agent_buy_houserooms",
				data:({rooms:"2",agentId:AgentId,type:"5"}),
				success:function(data){
					 if($.isEmptyObject(data)){
					 	  $(".sidebar-content-body-section").empty();
					       $(".sidebar-content-body-section").append('<h2>No Results Found</h2>');
					 }else{
					 		$(".sidebar-content-body-section").empty();
					       $(".sidebar-content-body-section").append(data);
					 }
					
					
				}
			});
		}
   });
 $("#hb3").change(function(){
   	  if($(this).is(":checked")){
			$.ajax({
				type:"POST",
				url:BASE_URL + "agent_buy_houserooms",
				data:({rooms:"3",agentId:AgentId,type:"5"}),
				success:function(data){
					 if($.isEmptyObject(data)){
					 	  $(".sidebar-content-body-section").empty();
					       $(".sidebar-content-body-section").append('<h2>No Results Found</h2>');
					 }else{
					 		$(".sidebar-content-body-section").empty();
					       $(".sidebar-content-body-section").append(data);
					 }
					
					
				}
			});
		}
   });

 $("#hb4").change(function(){
   	  if($(this).is(":checked")){
			$.ajax({
				type:"POST",
				url:BASE_URL + "agent_buy_houserooms",
				data:({rooms:"4",agentId:AgentId,type:"5"}),
				success:function(data){
					 if($.isEmptyObject(data)){
					 	  $(".sidebar-content-body-section").empty();
					       $(".sidebar-content-body-section").append('<h2>No Results Found</h2>');
					 }else{
					 		$(".sidebar-content-body-section").empty();
					       $(".sidebar-content-body-section").append(data);
					 }
					
					
				}
			});
		}
   });
  $("#hb5").change(function(){
   	  if($(this).is(":checked")){
			$.ajax({
				type:"POST",
				url:BASE_URL + "agent_buy_houserooms",
				data:({rooms:"5",agentId:AgentId,type:"5"}),
				success:function(data){
					 if($.isEmptyObject(data)){
					 	  $(".sidebar-content-body-section").empty();
					       $(".sidebar-content-body-section").append('<h2>No Results Found</h2>');
					 }else{
					 		$(".sidebar-content-body-section").empty();
					       $(".sidebar-content-body-section").append(data);
					 }
					
					
				}
			});
		}
   });
   $("#hb6").change(function(){
   	  if($(this).is(":checked")){
			$.ajax({
				type:"POST",
				url:BASE_URL + "agent_buy_houserooms",
				data:({rooms:"6",agentId:AgentId,type:"5"}),
				success:function(data){
					 if($.isEmptyObject(data)){
					 	  $(".sidebar-content-body-section").empty();
					       $(".sidebar-content-body-section").append('<h2>No Results Found</h2>');
					 }else{
					 		$(".sidebar-content-body-section").empty();
					       $(".sidebar-content-body-section").append(data);
					 }
					
					
				}
			});
		}
   });
   $("#drive").change(function(){
   	  	if($(this).is(":checked")){
			$.ajax({
				type:"POST",
				url:BASE_URL + "agent_buy_outsidespace",
				data:({outsidespace:"driveway",agentId:AgentId}),
				success:function(data){
					 if($.isEmptyObject(data)){
					 	  $(".sidebar-content-body-section").empty();
					       $(".sidebar-content-body-section").append('<h2>No Results Found</h2>');
					 }else{
					 		$(".sidebar-content-body-section").empty();
					       $(".sidebar-content-body-section").append(data);
					 }
					 

				}
			});
	      
		}
   });
      $("#park").change(function(){
   	    	  	if($(this).is(":checked")){
			$.ajax({
				type:"POST",
				url:BASE_URL + "agent_buy_outsidespace",
				data:({outsidespace:"parking",agentId:AgentId}),
				success:function(data){
					 if($.isEmptyObject(data)){
					 	  $(".sidebar-content-body-section").empty();
					       $(".sidebar-content-body-section").append('<h2>No Results Found</h2>');
					 }else{
					 		$(".sidebar-content-body-section").empty();
					       $(".sidebar-content-body-section").append(data);
					 }
					 

				}
			});
	      
		}
   });
      $("#garden").change(function(){
   	   	  	if($(this).is(":checked")){
			$.ajax({
				type:"POST",
				url:BASE_URL + "agent_buy_outsidespace",
				data:({outsidespace:"garden",agentId:AgentId}),
				success:function(data){
					  if($.isEmptyObject(data)){
					 	  $(".sidebar-content-body-section").empty();
					       $(".sidebar-content-body-section").append('<h2>No Results Found</h2>');
					 }else{
					 		$(".sidebar-content-body-section").empty();
					       $(".sidebar-content-body-section").append(data);
					 }
					 

				}
			});
	      
		}
   });
     $("#pre").change(function(){
   	   	  	if($(this).is(":checked")){
			$.ajax({
				type:"POST",
				url:BASE_URL + "agent_buy_status",
				data:({state:"preowned",agentId:AgentId}),
				success:function(data){
					 if($.isEmptyObject(data)){
					 	  $(".sidebar-content-body-section").empty();
					       $(".sidebar-content-body-section").append('<h2>No Results Found</h2>');
					 }else{
					 		$(".sidebar-content-body-section").empty();
					       $(".sidebar-content-body-section").append(data);
					 }
					 

				}
			});
	      
		}
   });
     $("#new").change(function(){
   	   	  	if($(this).is(":checked")){
			$.ajax({
				type:"POST",
				url:BASE_URL + "agent_buy_status",
				data:({state:"new",agentId:AgentId}),
				success:function(data){
					  if($.isEmptyObject(data)){
					 	  $(".sidebar-content-body-section").empty();
					       $(".sidebar-content-body-section").append('<h2>No Results Found</h2>');
					 }else{
					 		$(".sidebar-content-body-section").empty();
					       $(".sidebar-content-body-section").append(data);
					 }
					 

				}
			});
	      
		}
   });





});
