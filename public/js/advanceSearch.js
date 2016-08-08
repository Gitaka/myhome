$(function(){
	$("#viewall").change(function(){
		if($(this).is(":checked")){
			$.ajax({
				type:"GET",
				url:"viewproperty",
				success:function(data){
					 $("#body").empty();
                    $("#body").append(data);
				}
			});
       }
	});
	$("#clear").change(function(){
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
				type:"GET",
				url:"property_week",
				//data:({duration:"1"}),
				success:function(data){
					
				 $(".sidebar-content-body-section").empty();
				 $(".sidebar-content-body-section").append(data);

				}
			});
		}else if($(this).is(":not(:checked)")){
			$.ajax({
				type:"GET",
				url:"viewproperty",
                success:function(data){
                    $("#body").empty();
                    $("#body").append(data);
                }
			});
		}
   });
   $("#onemonth").change(function(){
   	  if($(this).is(":checked")){
			$.ajax({
				type:"GET",
				url:"property_month",
				success:function(data){
					 $(".sidebar-content-body-section").empty();
					 $(".sidebar-content-body-section").append(data);
				}
			});
		}
   });
	$("#apartment").change(function(){
		if($(this).is(":checked")){
			$.ajax({
				type:"POST",
				url:"flat",
				data:({type:"1"}),
				success:function(data){
					 $(".sidebar-content-body-section").empty();
					 $(".sidebar-content-body-section").append(data);

					  
				}
			});
		
		}else if($(this).is(":not(:checked)")){
			$.ajax({
               type:"GET",
               url:"viewproperty",
              success:function(data){
                  $("#body").empty();
                  $("#body").append(data);
              }
			});
		}
	});
    $("#ab1").change(function(){
   	  	if($(this).is(":checked")){
	      $.ajax({
				type:"POST",
				url:"apartmentrooms",
				data:({rooms:"1"}),
				success:function(data){
					$(".sidebar-content-body-section").empty();
					$(".sidebar-content-body-section").append(data);
				}
			});

		}
   });
    $("#ab2").change(function(){
   	  if($(this).is(":checked")){
			$.ajax({
				type:"POST",
				url:"apartmentrooms",
				data:({rooms:"2"}),
				success:function(data){
					$(".sidebar-content-body-section").empty();
					$(".sidebar-content-body-section").append(data);
				}
			});
		}
   });
    $("#ab3").change(function(){
   	  if($(this).is(":checked")){
			$.ajax({
				type:"POST",
				url:"apartmentrooms",
				data:({rooms:"3"}),
				success:function(data){
					$(".sidebar-content-body-section").empty();
					$(".sidebar-content-body-section").append(data);
					
				}
			});
		}
   });
    $("#ab4").change(function(){
   	  if($(this).is(":checked")){
			$.ajax({
				type:"POST",
				url:"apartmentrooms",
				data:({rooms:"4"}),
				success:function(data){
					$(".sidebar-content-body-section").empty();
					$(".sidebar-content-body-section").append(data);
					
				}
			});
		}
   });
     $("#ab5").change(function(){
   	  if($(this).is(":checked")){
			$.ajax({
				type:"POST",
				url:"apartmentrooms",
				data:({rooms:"5"}),
				success:function(data){
					$(".sidebar-content-body-section").empty();
					$(".sidebar-content-body-section").append(data);
					
				}
			});
		}
   });
    $("#ab6").change(function(){
   	  if($(this).is(":checked")){
			$.ajax({
				type:"POST",
				url:"apartmentrooms",
				data:({rooms:"6"}),
				success:function(data){
					$(".sidebar-content-body-section").empty();
					$(".sidebar-content-body-section").append(data);
					
				}
			});
		}
   });


    
	$("#land").change(function(){
		if($(this).is(":checked")){
			$.ajax({
				type:"POST",
				url:"flat",
				data:({type:"3"}),
				success:function(data){
					 $(".sidebar-content-body-section").empty();
					 $(".sidebar-content-body-section").append(data);

				}
			});
	      
		}else if($(this).is(":not(:checked)")){
			$.ajax({
				type:"GET",
				url:"viewproperty",
                success:function(data){
                    $("#body").empty();
                    $("#body").append(data);
                }
			});
		}
	});
	$("#house").change(function(){
	    	if($(this).is(":checked")){
			$.ajax({
				type:"POST",
				url:"flat",
				data:({type:"5"}),
				success:function(data){
					 $(".sidebar-content-body-section").empty();
					 $(".sidebar-content-body-section").append(data);

				}
			});
	      
		}else if($(this).is(":not(:checked)")){
			$.ajax({
				type:"GET",
				url:"viewproperty",
                success:function(data){
                    $("#body").empty();
                    $("#body").append(data);
                }
			});
		}
	});
	 $("#hb1").change(function(){
   	  if($(this).is(":checked")){
			$.ajax({
				type:"POST",
				url:"houserooms",
				data:({rooms:"1"}),
				success:function(data){
					$(".sidebar-content-body-section").empty();
					$(".sidebar-content-body-section").append(data);
					
				}
			});
		}
   });
    $("#hb2").change(function(){
   	  if($(this).is(":checked")){
			$.ajax({
				type:"POST",
				url:"houserooms",
				data:({rooms:"2"}),
				success:function(data){
					$(".sidebar-content-body-section").empty();
					$(".sidebar-content-body-section").append(data);
					
				}
			});
		}
   });
   $("#hb3").change(function(){
   	  if($(this).is(":checked")){
			$.ajax({
				type:"POST",
				url:"houserooms",
				data:({rooms:"3"}),
				success:function(data){
					$(".sidebar-content-body-section").empty();
					$(".sidebar-content-body-section").append(data);
					
				}
			});
		}
   });
  $("#hb4").change(function(){
   	  if($(this).is(":checked")){
			$.ajax({
				type:"POST",
				url:"houserooms",
				data:({rooms:"4"}),
				success:function(data){
					$(".sidebar-content-body-section").empty();
					$(".sidebar-content-body-section").append(data);
					
				}
			});
		}
   });
   $("#hb5").change(function(){
   	  if($(this).is(":checked")){
			$.ajax({
				type:"POST",
				url:"houserooms",
				data:({rooms:"5"}),
				success:function(data){
					$(".sidebar-content-body-section").empty();
					$(".sidebar-content-body-section").append(data);
					
				}
			});
		}
   });
    $("#hb6").change(function(){
   	  if($(this).is(":checked")){
			$.ajax({
				type:"POST",
				url:"houserooms",
				data:({rooms:"6"}),
				success:function(data){
					$(".sidebar-content-body-section").empty();
					$(".sidebar-content-body-section").append(data);
					
				}
			});
		}
   });

     $("#drive").change(function(){
   	  	if($(this).is(":checked")){
			$.ajax({
				type:"POST",
				url:"outsidespace",
				data:({type:"driveway"}),
				success:function(data){
					 $(".sidebar-content-body-section").empty();
					 $(".sidebar-content-body-section").append(data);
					 

				}
			});
	      
		}else if($(this).is(":not(:checked)")){
			$.ajax({
				type:"GET",
				url:"viewproperty",
                success:function(data){
                    $("#body").empty();
                    $("#body").append(data);
                }
			});
		}
   });
      $("#park").change(function(){
   	    	  	if($(this).is(":checked")){
			$.ajax({
				type:"POST",
				url:"outsidespace",
				data:({type:"parking"}),
				success:function(data){
					 $(".sidebar-content-body-section").empty();
					 $(".sidebar-content-body-section").append(data);
					 

				}
			});
	      
		}else if($(this).is(":not(:checked)")){
			$.ajax({
				type:"GET",
				url:"viewproperty",
                success:function(data){
                    $("#body").empty();
                    $("#body").append(data);
                }
			});
		}
   });
      $("#garden").change(function(){
   	   	  	if($(this).is(":checked")){
			$.ajax({
				type:"POST",
				url:"outsidespace",
				data:({type:"garden"}),
				success:function(data){
					 $(".sidebar-content-body-section").empty();
					 $(".sidebar-content-body-section").append(data);
					 

				}
			});
	      
		}else if($(this).is(":not(:checked)")){
			$.ajax({
				type:"GET",
				url:"viewproperty",
                success:function(data){
                    $("#body").empty();
                    $("#body").append(data);
                }
			});
		}
   });
     $("#pre").change(function(){
   	   	  	if($(this).is(":checked")){
			$.ajax({
				type:"POST",
				url:"status",
				data:({state:"preowned"}),
				success:function(data){
					 $(".sidebar-content-body-section").empty();
					 $(".sidebar-content-body-section").append(data);
					 

				}
			});
	      
		}else if($(this).is(":not(:checked)")){
			$.ajax({
				type:"GET",
				url:"viewproperty",
                success:function(data){
                    $("#body").empty();
                    $("#body").append(data);
                }
			});
		}
   });
     $("#new").change(function(){
   	   	  	if($(this).is(":checked")){
			$.ajax({
				type:"POST",
				url:"status",
				data:({state:"new"}),
				success:function(data){
					 $(".sidebar-content-body-section").empty();
					 $(".sidebar-content-body-section").append(data);
					 

				}
			});
	      
		}else if($(this).is(":not(:checked)")){
			$.ajax({
				type:"GET",
				url:"viewproperty",
                success:function(data){
                    $("#body").empty();
                    $("#body").append(data);
                }
			});
		}
   });

});