$(document).ready(function() {
$('.btn').click(function(e){
   var element = $(this);
   var del_id = element.attr('id');
   $.ajax({
   	type: "POST",
  	url: ajaxurl,
  	data: {"action":"your_delete_action","info":del_id},
	success: function(html){
   }
});
});
});
   
		
  
   
            
