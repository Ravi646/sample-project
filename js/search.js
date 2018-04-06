$(document).ready(function() {
     $('#foo').change(function()
        {
               var option = $(this).find('option:selected');
               window.location.href = option.data("url");
               
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
    
    // Set search input value on click of result item
    $(document).on("click", ".result p", function(){
        $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
        $(this).parent(".result").empty();
    });

});
                 // function search(){
 
                 //      var title=$("#search").val();
 
                 //      if(title!=""){
                 //        $("#result").html("<img  alt='ajax search'  src='ajax-loader.gif'>");
                 //         $.ajax({
                 //            async: true,
                 //            type:"post",
                 //            url:"mainlist.php",
                 //            data:"title="+title,
                 //            success:function(data){
                 //                $("#result").html(data);
                 //                $("#search").val("");
                 //             }
                 //          });
                 //      }
                       
 
                      
                 // }
 
                 //  $("#button").click(function(){
                 //     search();
                 //  });
 
                 //  $('#search').keyup(function(e) {
                 //     if(e.keyCode == 13) {
                 //        search();
                 //      }
                 //  });
    // function load_data(query)
    // {
    // load_data();
    //     $.ajax({
    //     url:"mainlist.php",
    //     method:"POST",
    //     data:{query:query},
    //     success:function(data)
    //     {
    //     $('#result').html(data);
    //     }
    //     });
    // }
    // $('#search_text').keyup(function(){
    // var search = $(this).val();
    // if(search != '')
    // {
    // load_data(search);
    // }
    // else
    // {
    // load_data();
    // }
    // });