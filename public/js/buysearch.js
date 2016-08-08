$(function(){
	function getBaseUrl(){
		var protocol = window.location.protocol;
            host =  window.location.host;
		    pathname = window.location.pathname;

		 var BASE_URL = protocol + "//" +host + "/";
		return BASE_URL;
	}
	var BASE_URL = getBaseUrl();

function getUrlVars(){
	var vars = [], hash;
	var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');

	for(var i = 0; i < hashes.length; i++){
		hash = hashes[i].split('=');
		vars.push(hash[0]);
		vars[hash[0]]=hash[1];
	}
	  return vars;
}
var obj = getUrlVars();

//http://127.0.0.1:8000/index/bsearch?location=githunguri&type=1&maxPrice=1000000&minPrice=1000000

$("#viewall").change(function(){
		if($(this).is(":checked")){
			var url = BASE_URL + "index/bsearch?"+"location"+"="+obj.location+"&"+"type"+"="+obj.type+"&"+"maxPrice"+"="+obj.maxPrice+"&"+"minPrice"+"="+obj.minPrice;
			$.ajax({
				type:"GET",
				url:url,
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
	$("#clear").change(function(){
		if($(this).is(":checked")){
			$("#viewall").attr('checked',false);
			$("#oneweek").attr('checked',false);
			$("#onemonth").attr('checked',false);
			$("#pre").attr('checked',false);
			$("#new").attr('checked',false);
			$("#park").attr('checked',false);
			$("#garden").attr('checked',false);
			$("#drive").attr('checked',false);
			$("#bb1").attr('checked',false);
			$("#bb2").attr('checked',false);
			$("#bb3").attr('checked',false);
			$("#bb4").attr('checked',false);
			$("#bb5").attr('checked',false);
			$("#bb6").attr('checked',false);
        
		}
	});

   $("#oneweek").change(function(){
   	  if($(this).is(":checked")){
          $.ajax({
          	type:'POST',
          	url:BASE_URL + "buy_week",
          	data:({location:obj.location,type:obj.type,maxPrice:obj.maxPrice,minPrice:obj.minPrice}),
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
				type:"POST",
				url:BASE_URL + "buy_month",
				data:({location:obj.location,type:obj.type,maxPrice:obj.maxPrice,minPrice:obj.minPrice}),
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
				url:BASE_URL + "buy_outsidespace",
				data:({location:obj.location,type:obj.type,outsidespace:"driveway"}),
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
				url:BASE_URL + "buy_outsidespace",
				data:({location:obj.location,type:obj.type,outsidespace:"parking"}),
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
				url:BASE_URL + "buy_outsidespace",
				data:({location:obj.location,type:obj.type,outsidespace:"Garden"}),
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
				url:BASE_URL + "buy_status",
				data:({location:obj.location,type:obj.type,state:"new"}),
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
				url:BASE_URL + "buy_status",
				data:({location:obj.location,type:obj.type,state:"preowned"}),
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
$("#bb1").change(function(){
   	  	if($(this).is(":checked")){
	      $.ajax({
				type:"POST",
				url:BASE_URL + "buy_houserooms",
				data:({location:obj.location,type:obj.type,rooms:"1"}),
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
$("#bb2").change(function(){
   	  	if($(this).is(":checked")){
	      $.ajax({
				type:"POST",
				url:BASE_URL + "buy_houserooms",
				data:({location:obj.location,type:obj.type,rooms:"2"}),
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
$("#bb3").change(function(){
   	  	if($(this).is(":checked")){
	      $.ajax({
				type:"POST",
				url:BASE_URL + "buy_houserooms",
				data:({location:obj.location,type:obj.type,rooms:"3"}),
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

$("#bb4").change(function(){
   	  	if($(this).is(":checked")){
	      $.ajax({
				type:"POST",
				url:BASE_URL + "buy_houserooms",
				data:({location:obj.location,type:obj.type,rooms:"4"}),
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

$("#bb5").change(function(){
   	  	if($(this).is(":checked")){
	      $.ajax({
				type:"POST",
				url:BASE_URL + "buy_houserooms",
				data:({location:obj.location,type:obj.type,rooms:"5"}),
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

$("#bb6").change(function(){

   	  	if($(this).is(":checked")){

	      $.ajax({
				type:"POST",
				url:BASE_URL + "buy_houserooms",
				data:({location:obj.location,type:obj.type,rooms:"7"}),
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