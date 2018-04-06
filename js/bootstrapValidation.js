$(document).ready(function() {
    $('input[type=password]').keyup(function() {
         var pswd = $(this).val();
         if ( pswd.length < 8 ) {
    $('#length').removeClass('valid').addClass('invalid');
} else {
    $('#length').removeClass('invalid').addClass('valid');
}
//validate letter
if ( pswd.match(/[A-z]/) ) {
    $('#letter').removeClass('invalid').addClass('valid');
} else {
    $('#letter').removeClass('valid').addClass('invalid');
}

//validate capital letter
if ( pswd.match(/[A-Z]/) ) {
    $('#capital').removeClass('invalid').addClass('valid');
} else {
    $('#capital').removeClass('valid').addClass('invalid');
}
 if ( pswd.match(/[^a-zA-Z0-9\-\/]/) ) {
$('#space').removeClass('invalid').addClass('valid');
}else{
    $('#space').removeClass('valid').addClass('invalid'); 
}
if ( pswd.match(/\d/) ) {
    $('#number').removeClass('invalid').addClass('valid');
} else {
    $('#number').removeClass('valid').addClass('invalid');
}
     }).focus(function() {
    $('#pswd_info').show();
}).blur(function() {
    $('#pswd_info').hide();
});
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
// $(".date-picker").datepicker({format: 'yyyy-mm-dd'});
//  $(".date-picker").on('changeDate show', function(e) {
//    $('#flex-item').bootstrapValidator('revalidateField', 'year');
//  });
        
    $('#flex-item').bootstrapValidator({
       
      feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            user_id:{
            validators:{
                   notEmpty: {
                 message:'user_id is required'
             }
            
         }
     },
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
    user_password:{
         validators:{ 
         notEmpty: {
                message:'this field cannot be empty'
},
    regexp:{
      regexp:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[$@!%?&]).{8,12}$/,
      message:'password must contain atleast eight characters'
    },
    different:{
      field:'name',
      message:'password and user name cannot be same'
    }

}
},
         confirm_password:{
            validators:{
                notEmpty:'this field cannot be empty',
                identical:{
                field:"user_password",
                message: 'password and confirm password must be same'
            }
        }
    },
        year :{
        validators:{
        notEmpty:{
             message: 'select your birthyear'
        }
    }
},
        security_friend:{
            validators:{
            notEmpty:{
                 message:'security answer is required'
            }
        }
    },
        security_player:{
            validators:{
                notEmpty:{
                message:'security answer is required'
                }
            }
        },
       //  captcha:{
       //      validators:{
       //          notEmpty:{
       //              message:'this field is required'
       //          },
       //           remote: {
       //      type: 'POST',
       //      url: 'captchaValidation.php',
       //      //Send { username: 'its value', email: 'its value' }
       //      data: function(validator) {
       //          return {
       //           'captcha': validator.getFieldElements('captcha').val()
       //          };
       //      },
       //      message: 'invalid'
       //  }
       //          }
       // },     
    image:{
      validators:{
        notEmpty:{
          message:'upload profile pic'
        }
      }
    }
    }
});
    $('#contact_form').on('submit', function(e) {
  e.preventDefault(); 
  var $form = $(e.target);
   $('.overlay').show();
   var value = $('#flex-item')[0];
    var formData = new FormData(value);
   $.ajax({
        type: 'POST',
        url:"/wp-admin/admin-ajax.php",
        enctype: 'multipart/form-data',
        datatype:'JSON',
        data: formData,
        contentType: false,
        processData: false, 
        cache:false,
        success: function(data) {
  setTimeout(function(){ 
          $('.overlay').hide();
             },1500);
$('#success_msg').fadeIn(1500).delay(3000).fadeOut('slow');
       }
});
$form.bootstrapValidator('resetForm',true);
});
});
        
//     .on('success.form.bv', function(e) {
//          e.preventDefault();   
//           $('.overlay').show();  
//            // $("#captcha_code").attr('src','captcha.php');
//             var $form = $(e.target);
//             var value = $('#flex-item')[0];
//             var formData = new FormData(value);
//     $.ajax({
//         type: 'POST',
//         url: 'createpage.php',
//         enctype: 'multipart/form-data',
//         datatype:'JSON',
//         data: formData,
//         contentType: false,
//         processData: false, 
//         cache:false,
//         success: function(data) {
        
//            setTimeout(function(){ 
//           $('.overlay').hide();
//             },1500);
//           $('#success_msg').fadeIn(1500).delay(3000).fadeOut('slow');
//       }
// });  
//     $form.bootstrapValidator('resetForm',true);


// });
         
            
         //     remote:{
            //       type:'POST',
            //       url:'existence.php',
            //       data: function(validator) {
            //     return {
            //      'email': validator.getFieldElements('email').val()
            //     };
            // },
            //     message:'User with this email id already exist'
            //     } 
      
       //  remote:{
            //       type:'POST',
            //       url:'existence.php',
            //       data: function(validator) {
            //     return {
            //      'user_id': validator.getFieldElements('user_id').val()
            //     };
            // },
            //     message:'User_id not available'
            //     }  



            // Get the BootstrapValidator instance

            // Use Ajax to submit form data
       
    
//   $.post($form.attr('action'),formData, function(Response) {

// $('#success_msg').fadeIn(1500).delay(3000).fadeOut('slow');
// }); 
        
//         $.ajax({
//         type: 'POST',
//         url: 'createpage.php',
//         datatype:'JSON',
//         data: formData,
//         success: function(Response) {
//            setTimeout(function(){ 
//           $('.overlay').hide();
//             },1500);
//           $('#success_msg').fadeIn(1500).delay(3000).fadeOut('slow');
//       },
//         cache: false,
//         contentType: false,
//         processData: false 
// });

//     .on('success.form.bv', function(e) {
//     $("#captcha_code").attr('src','captcha.php'); 
//     $(".overlay").show(); 
//     // var $form = e.target()
//      $.ajax({
//         type: 'POST',
//         url: 'createpage.php',
//         datatype:'JSON',
//         data: $("#flex-item").serialize(),
//         success: function(Response) {
//            setTimeout(function(){ 
//           $('.overlay').hide();
//             },1500);
//           $('#success_msg').fadeIn(1500).delay(3000).fadeOut('slow');
//       } 
// });
     
// });
    
         
 
    
            // Get the form instance
            // Get the BootstrapValidator instance
          
            // Use Ajax to submit form data
           
    // var $form = e.target(); 
 // $form.bootstrapValidator('resetForm',true);
             

          
        
    
        
    
  
   
    
   
    
    
               
               




     
   
  
  

          
       
        
        
       

           
               
             


    
                    
                    
    


                    
                







   
    
    
    
       
        
        
        
        
             
               
                       
                        
                        
        