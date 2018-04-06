$('document').ready(function()
{         

	if($("#successMessage").html()){
					setTimeout(function() 
                     {
                     $('#successMessage').hide();
                      }, 2000);
	}
 $(".date-picker").datepicker({
    format: 'yyyy-mm-dd'
  });	
 
$('.date-picker').on('changeDate show', function(e) {
   $('#val_item').bootstrapValidator('revalidateField', 'year');
 });
 
	$('#val_item').bootstrapValidator({ 
	 feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
           
            name:{
                validators:{
                   notEmpty: {
                    message:'name is required'
            }
        }
    },
            email:{
                validators:{
                       emailAddress:{
                        message: 'The email address is not valid'

                },
                 notEmpty:{
                    message:'The email address is required and cannot be empty'
                }
               
            }
        },
        comment:{
             validators: {
            notEmpty: {
             message:'description of user cannot be empty'
        }
    }
},
        'qual[]':{
            validators: {
             notEmpty: {
                message:'please specify the qualification'
        }
    }
},
        gender:{
            validators:{
                notEmpty: {
                    message:' please specify your gender'
            }
        }
    },
    	year :{
        validators:{
        notEmpty:{
             message: 'select your birthyear'
        }
    }
}
}   
});
    $('#Reset').click(function()
   {          
        $("#val_item").validate().resetForm();
   });
});

 
                  
	  		   

         
    























// var userid = $("#identity").val;
// var username = document.getElementById("txt").value;
// var useremail = document.getElementById("txtemail").value;

// var comment = document.getElementById("comm").value;
// if(userid == "") {
// 	document.getElementById('err_identity').style.display = "block"; 
// 	document.getElementById("err_identity").innerHTML= "user number is required";
// 	setTimeout(function(){ 
// 		document.getElementById('err_identity').style.display = "none"; 
// 	},2000); 
// 	// return false;
// }

// 	if(username == "") {
// 	document.getElementById('err_name').style.display = "block"; //
// 	document.getElementById("err_name").innerHTML= "name is required";
// 	setTimeout(function(){ 
// 		document.getElementById('err_name').style.display = "none"; //
// 	},2000); 
// 	// return false;
// }
//  // var val = document.getElementById('your_input_control_id').value;

//     if (!username.match(/^[a-zA-Z]+$/)) 
//     {
//        document.getElementById('err_name').style.display = "block"; 
// 	document.getElementById("err_name").innerHTML= "only letters and whitespace are allowed";
// 	setTimeout(function(){ 
// 		document.getElementById('err_name').style.display = "none"; 
// 	},2000); 
        
//     }

//   	if(useremail == "") {
// 	document.getElementById('err_mail').style.display = "block"; //
// 	document.getElementById("err_mail").innerHTML= "email is required";
// 	setTimeout(function(){ 
// 		document.getElementById('err_mail').style.display = "none"; //
// 	},2000); 
// 	// return false;
// }

//  var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

// if (!filter.test(useremail)) {
// 	document.getElementById('err_mail').style.display = "block"; 
// 	document.getElementById("err_mail").innerHTML= "please provide a valid email address";
//   setTimeout(function(){ 
// 		document.getElementById('err_mail').style.display = "none"; //
// 	},2000); 
// // return false;
// }         
// if(comment == "") {
// 	document.getElementById('err_comment').style.display = "block"; //
// 	document.getElementById("err_comment").innerHTML= "comment is required";
// 	setTimeout(function(){ 
// 		document.getElementById('err_comment').style.display = "none"; //
// 	},2000); 
// 	// return false;
// }
// if(document.getElementById('male').checked == false && document.getElementById('female').checked == false) 
// {
// 	document.getElementById('err_gender').style.display = "block"; //

//  document.getElementById('err_gender').innerHTML="please specify gender";
//  		setTimeout(function(){ 
// 		document.getElementById('err_gender').style.display = "none"; //
// 	},2000); 

// // return false;
// }
// if(document.getElementById('val_ssc').checked==false &&document.getElementById('val_hsc').checked==false && document.getElementById('val_grad').checked==false)

// {
// 	document.getElementById('err_qual').style.display = "block"; //
// document.getElementById('err_qual').innerHTML="please specify the qualification";
//  		setTimeout(function(){ 
// 		document.getElementById('err_qual').style.display = "none"; //
// 	},2000); 

// // return false;
// }

// var e = document.getElementById("dob");
//     var optionSelIndex = e.options[e.selectedIndex].value;

//     if (optionSelIndex == 0) {
// 	document.getElementById('err_year').style.display = "block"; //
// 	document.getElementById('err_year').innerHTML = "select a year"; //
   
//             setTimeout(function(){  //
// document.getElementById('err_year').style.display = "none";},2000);

//  return false;
	
// 	}
// 	return true;


// }











// function editvalidate() {
// var username = document.getElementById("txt").value;
// var useremail = document.getElementById("txtemail").value;
// var comment = document.getElementById("comm").value;
// if(username == "") { 
//         document.getElementById('err_name').style.display= "block";     
//         document.getElementById("err_name").innerHTML= "name isrequired";    
//         setTimeout(function(){document.getElementById('err_name').style.display = "none";      
//       },2000);
//      return false;
// } 
//  if (!username.match(/^[a-zA-Z]+$/))     
//   {
// document.getElementById('err_name').style.display = "block";
// document.getElementById("err_name").innerHTML= "only letters and whitespace allowed";     
// setTimeout(function(){
// document.getElementById('err_name').style.display = "none";      
// },2000);
// return false;   
// }

//   	if(useremail == "") {
// 	document.getElementById('err_mail').style.display = "block"; 
// 	document.getElementById("err_mail").innerHTML= "email is required";
// 	setTimeout(function(){ 
// 		document.getElementById('err_mail').style.display = "none"; 
// 	},2000); 
// 	return false;
// }

//  var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

// if (!filter.test(useremail)) {
// 	document.getElementById('err_mail').style.display = "block"; 
// 	document.getElementById("err_mail").innerHTML= "please provide a valid email address";
//   setTimeout(function(){ 
// 		document.getElementById('err_mail').style.display = "none"; 
// 	},2000); 
// return false;
// }         
// if(comment == "") {
// 	document.getElementById('err_comment').style.display = "block"; 
// 	document.getElementById("err_comment").innerHTML= "comment is required";
// 	setTimeout(function(){ 
// 		document.getElementById('err_comment').style.display = "none"; 
// 	},2000); 
// 	return false;
// }
// if(document.getElementById('male').checked == false && document.getElementById('female').checked == false) 
// {
// 	document.getElementById('err_gender').style.display = "block"; //

//  document.getElementById('err_gender').innerHTML="please specify gender";
//  		setTimeout(function(){ 
// 		document.getElementById('err_gender').style.display = "none"; //
// 	},2000); 

// return false;
// }
// if(document.getElementById('val_ssc').checked==false &&document.getElementById('val_hsc').checked==false && document.getElementById('val_grad').checked==false)

// {
// 	document.getElementById('err_qual').style.display = "block"; //
// document.getElementById('err_qual').innerHTML="please specify the qualification";
//  		setTimeout(function(){ 
// 		document.getElementById('err_qual').style.display = "none"; //
// 	},2000); 

// return false;
// }

// var e = document.getElementById("dob");
//     var optionSelIndex = e.options[e.selectedIndex].value;

//     if (optionSelIndex == 0) {
// 	document.getElementById('err_year').style.display = "block"; //
// 	document.getElementById('err_year').innerHTML = "select a year"; //
   
//             setTimeout(function(){  //
// document.getElementById('err_year').style.display = "none";},2000);

//  return false;
	
// 	}
// 	return true;


// }


