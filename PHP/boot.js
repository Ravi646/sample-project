$(document).ready(function() {
    $('#contactForm').bootstrapValidator({
        container: '#messages',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
       
        fields: {
            fullName: {
                validators: {
                    notEmpty: {
                        message: 'The full name is required and cannot be empty'
                    }
                }
            },
            email: {
                validators: {
                    notEmpty: {
                        message: 'The email address is required and cannot be empty'
                    },
                    emailAddress: {
                        message: 'The email address is not valid'
                    }
                }
            },
            title: {
                validators: {
                    notEmpty: {
                        message: 'The title is required and cannot be empty'
                    },
                    stringLength: {
                        max: 100,
                        message: 'The title must be less than 100 characters long'
                    }
                }
            },
            content: {
                validators: {
                    notEmpty: {
                        message: 'The content is required and cannot be empty'
                    },
                    stringLength: {
                        max: 500,
                        message: 'The content must be less than 500 characters long'
                    }
                }
            }
        },
    }).on('success.form.bv', function(e) {
        e.preventDefault();
        var $form     = $(e.target);
        $(".overlay").show();
        $.ajax({
          type: 'POST',
          url: 'validation_boot.php',
          data: $("#contactform").serialize(),
          success: function(result) {
           setTimeout(function(){ 
                     $('.overlay').hide();
                     }, 1500) ;
         $('#success_msg').fadeIn(1500).delay(3000).fadeOut('slow');   
             
    
          }
      });
     $form.bootstrapValidator('disableSubmitButtons', false);
     $form.bootstrapValidator('resetForm', true); 
  });
    
});
  //   live: 'enabled',
  //   submitButton: '$contactForm button[type="submit"]',
  //     submitHandler: function(validator, form, submitButton) {
  //      $(".overlay").show();
  //     $.ajax({
  //         type: 'POST',
  //         url: 'validation_boot.php',
  //         data: $(form).serialize(),
  //         success: function(result) {
  //          setTimeout(function(){ 
  //                    $('.overlay').hide();
  //                    }, 1500) ;
  //        $('#success_msg').fadeIn(1500).delay(3000).fadeOut('slow');   
  //             // $("#user_fact_form").data('bootstrapValidator').resetForm();
  //         }
  //     });
  //     return false;
  // }