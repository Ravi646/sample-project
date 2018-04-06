$('document').ready(function() {
	$('#submit').click(function() {
		
		$(".overlay").show();
		$.ajax({
			type: "POST",
			url: "Ajaxkeyform.php",
data: $("#login_form").serialize(),
success:function(data){
setTimeout(function(){ 
 $('.overlay').hide();
 $("#success_msg").html('<div>user added successfully!</div>');
 }, 2000) ;
},
		});
	});
});



// $("#btnId").click(function(e){
//  e.preventDefault();
//  $('#img').html('user already exist'); //show loading gif
// $.ajax({
//    type: "POST",
//            url: "Ajaxkeyform.php",
//            data: $("#my_form").serialize(),
//   success:function(data){
//    $('#img').html(data); //remove gif
//   },
//   error:function(){//remove gif}
//  $('#img').hide();
//  }
// });

// });
// $("#my_form").submit(function(event){
//     event.preventDefault(); //prevent default action 
//     var proceed = true;
//     var form = this;

//     //simple validation at client's end
//     //loop through each field and we simply change border color to red for invalid fields       
//     $(form).find(':required').each(function(){
//         $(this).css('border-color',''); 
//         if(!$.trim($(this).val())){ //if this field is empty 
//             $(this).css('border-color','red'); //change border color to red   
//             proceed = false; //set do not proceed flag
//         }.keyup({})