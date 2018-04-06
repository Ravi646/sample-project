// $(document).ready(function(){
// $('#txtemail').keyup(function() {
//     var usercheck = $(this).val();
            
//               var UrlToPass = 'email'+usercheck;
//              UsernameAvailResult = $("#usercheck");
//          $.ajax({ // Send the username val to another checker.php using Ajax in POST menthod
//         type : 'POST',
//         data : UrlToPass,
//         cache: false,
//         url  : 'createpage.php',
//         success: function(data){ // Get the result and asign to each cases
//             if(data== 0){
//                 UsernameAvailResult.html('<span class="success">Number available</span>');
//             }
//             else if(data > 0){
//                 UsernameAvailResult.html('<span class="error">Number already taken</span>');
//             }
//             else{
//                 alert('Problem with sql query');
//             }
//         }
//         });
//     }
// }); 
