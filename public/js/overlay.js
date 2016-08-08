
$(function(){
  var current_li;
    $("#photos img").click(function(){
         
         var src=$(this).attr("src");
             current_li=$(this).parent();

       $("#mainPic").attr('src',src);
       $("#frame").fadeIn();
       $("#overlay").fadeIn();
  });

  $("#overlay").click(function(){
     $("#frame").fadeOut();
     $(this).fadeOut();
  });

  $("#right").click(function(){
      if(current_li.is(":last-child")){
          next_li=$("#photos li").first();
      }else{
         next_li=current_li.next();
      }

       var next_src=next_li.children("img").attr('src');
           $("#mainPic").attr('src',next_src);
           current_li=next_li;
   
   });
$("#left").click(function(){
      if(current_li.is(":first-child")){
        prev_li=$("#photos li").last();
      }else{
        prev_li=current_li.prev();
      }
      var prev_src=prev_li.children("img").attr("src");
          $("#mainPic").attr('src',prev_src);
          current_li=prev_li;
   });

$("#right,#left").mouseover(function(){
      $(this).css("opacity","90.75");
   });
$("#right,#left").mouseleave(function(){
      $(this).css("opacity","0.5");
   });
$("#right,#left").css("opacity","0.5");

});

