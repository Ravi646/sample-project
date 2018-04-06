$('document').ready(function()
{         
 $('.search-box input[type="text"]').on("keyup input", function(){
        /* Get input value on change */
        var inputVal = $(this).val();
        var resultDropdown = $(this).siblings(".result");
        if(inputVal.length){
            $.get("mainlist.php", {term: inputVal}).done(function(data){
                // Display the returned data in browser
                resultDropdown.html(data);
            });
        } else{
            resultDropdown.empty();
        }
    });
    $(document).on("click", ".result p", function(){
        $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
        $(this).parent(".result").empty();
    });
    $("#refresh").click(function() {
        $("#captcha_code").attr('src','captcha.php');
    });
$(".date-picker").datepicker({format: 'yyyy-mm-dd'});
 $(".date-picker").on('changeDate show', function(e) {s
   $('#flex-item').bootstrapValidator('revalidateField', 'year');
 });

  $('#foo').change(function()
        {
               var option = $(this).find('option:selected');
               window.location.href = option.data("url");
               
    });
     $("#super_admin").validate({
        rules:
        {
            superadmin_id:"required",
            superadmin_pass:"required"
        }
     });
    $("#change").validate({
        rules:{
            change_pass:
            {
                required:true,
                pwcheck:true,
                minlength:8
            },
            confirm_change_pass:
            {
                equalTo:"#c_password_new"
            }
        },

        messages:
         {
                new_pass:
                {
                    required:"this field is required",
                    pwcheck:"must contain atleast one digit and one lowrcase character",
                    minlength:"lenght must be equal to or greater than eight"


                }
            }      
    });



    $("#admin-item").validate({
        rules:
        {
            admin_id:"required",
            admin_name:"required",
            admin_email:
            {
                required: true,
                email: true
            },
            admin_password:
            {
                required:true,
                pwcheck:true,
                minlenght:8
            },
              confirm_password:
            {
                equalTo: "#pwd"
            }
        },
        messages:
        {
            admin_password:
            {
               pwcheck:"must contain atleast one digit and one lowrcase character",
                minlength:"lenght must be equal to or greater than eight"

            }
        }
    }); 
     // $('#flex-item').click(function(){
    $("#flex-item").validate({
    
        rules:
        {
            user_id:
            {
                required:true
            },
             name:
            {
                required: true,
                alphanumeric: true
            },
            email:
            {
                required: true,
                email: true
               
                },
             
            

              
            security_player:"required",
            security_friend:"required",
            user_password:
            {
                required:true,
                pwcheck:true,
                minlength:8
            }, 
            // confirm_password:
            // {
            //     equalTo: "#pwd"
            // },

            comment:"required",
            'qual[]':
            {
                required: true
            },
            year:
            {
                required: true
            },
            'gender':
            {
                required:true
            },
            image:{
                required:true
            }

        },  
        messages:
        {
            user_id:
            {
                required:"enter the user id",       
            },         
            name:
            {
                required: "Please enter your name"
               
            }, 
            user_password:
            {
                required:"this field is required",
                pwcheck:"must contain atleast one digit and one lowrcase character",
                minlength:"lenght must be equal to or greater than eight"

            },

            email:
            {
                required: "email id is reqired",
                email:"Please enter a valid email address"
             
               
            },
            comment: "comment is required" , 
            'qual[]':"please specify the qualification",
            year : "choose atleast one option",
           
        image:{
            required:"this field is required"
        }
        },
       
        errorElement: "em",
        errorPlacement: function ( error, element ) 
        {
            error.addClass( "help-block" );
            if(element.attr("type") == "radio")
            {
                error.insertBefore(element.parent("label").parent());
            } 
            else 
            {
                error.insertAfter(element.parent("label").parent());
            }
            if( element.prop( "type" ) === "checkbox" ) 
            {
                error.insertAfter( element.parent( "label" ).parent());
            } 
            else 
            {
                error.insertAfter( element );
            }
        },
        highlight: function ( element, errorClass, validClass )
        {
            $( element ).parents( ".colsx_bottom" ).addClass( "has-error" ).removeClass( "has-success" );
        },
        unhighlight: function (element, errorClass, validClass)
        {
            $( element ).parents( ".colsx_bottom" ).addClass( "has-success" ).removeClass( "has-error" );
        },
     submitHandler:function(form){
            var formData = new FormData($('form')[0]);
            $(".overlay").show();
             $.ajax({
                type: "POST",
                enctype: 'multipart/form-data',
                url: "createpage.php",
                data: formData,
                processData: false,
                contentType: false,
                
                timeout: 600000,
                success: function (data){
                setTimeout(function(){ 
                     $('.overlay').hide();
                     }, 1500) ;
         $('#success_msg').fadeIn(1500).delay(3000).fadeOut('slow')
             }
             });
         }
     });

            
 
           
                  
      
     



                  
                        
                   
     
 

if($("#admin_error_message").html())
   {
        setTimeout(function() 
        {
         $('#admin_error_message').hide();
        }, 2000);
    }

if($("#addMessage").html())
   {
        setTimeout(function() 
        {
         $('#addMessage').hide();
        }, 2000);
    }
if($("#ErrorMessage").html())
   {
        setTimeout(function() 
        {
         $('#ErrorMessage').hide();
        }, 2000);
    }
    if($("#Error_email").html())
    {
        setTimeout(function() 
        {
         $('#Error_email').hide();
        }, 2000);
    }
   
    if($("#resetMessage").html())
    {
        setTimeout(function() 
        {
         $('#resetMessage').hide();
        }, 2000);
    }

$.validator.addMethod("pwcheck", function(value)
{
    return /^[A-Za-z0-9\d=!\-@._*]*$/.test(value) // consists of only these
       && /[a-z]/.test(value) // has a lowercase letter
       && /\d/.test(value) // has a digit
});


   jQuery.validator.addMethod("alphanumeric", function(value, element)
    {
        return this.optional(element) || /^\w+$/i.test(value);
    }, "Letters, numbers, and underscores only please");
    $("#reset_pass").validate({
        rules:
        {
            new_pass:
            {
                required:true,
                pwcheck:true,
                minlength:8
            },
            confirm_pass:
            {
                equalTo:"#password_new"
            }
        },
        messages:
        {
            new_pass:
            {
                required:"this field is required",
                pwcheck:"must contain atleast one digit and one lowrcase character",
                minlength:"lenght must be equal to or greater than eight"


            }
        }   
    

    });

    $("#security_form").validate({
        rules:
        {
            security_player:"required",
            security_friend:"required"

        }
        });
    $("#verify_email").validate({
        rules:
        {
            email_verify:"required"
        }

    });
    $("#login_user_form").validate({
        rules:
        {
            email:"required",
            user_pass:"required"
        }
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


