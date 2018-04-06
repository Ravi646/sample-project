$('document').ready(function()
{  
   $('input[type=submit]' ).click(function(){
	var trid = $(this).closest('tr').attr('id');
	var filename = $('#imgupload')[0].files[0].name;
	$.ajax({
		type:'POST',
		url:'/ImageUpdate.php',
		data: {'id':id,'image':filename},
        success: function(data) {
        	alert(data);
		}	
	});
});
});
	// var file_data = $('#imgupload').prop('files')[0];   
 //    var form_data = new FormData();                  
 //    form_data.append('file', file_data);
 //    alert(form_data);