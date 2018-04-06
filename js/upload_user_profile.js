$(document).ready(function (e) {
	function readURL(input) {
	if (input.files && input.files[0]) {
	    var reader = new FileReader();
	    
	    reader.onload = function (e) {
	        $('#blah').attr('src', e.target.result);
	    }
	    
	    reader.readAsDataURL(input.files[0]);
	}
	}

	$("#imgInp").change(function(){
	readURL(this);
	});
	$("#image_upload").click(function(e) {
		e.preventDefault();
		var value = $('#upload_form')[0];
        var formData = new FormData(value);
		$.ajax({
        	url: $('#upload_form').attr('action'),
			type: "POST",
			enctype: 'multipart/form-data',
        	datatype:'JSON',
			data:  formData,
			contentType: false,
    	    cache: false,
			processData:false,
			success: function(data)
		    {
			alert('profile pic has been updated!');
		    },
		  	error: function() 
	    	{
	    	} 	        
	   });
	});
});


	// function readURL(input) {
 



 //  $("#imgInp").on("change", function(){
 //   var files = !!this.files ? this.files : [];
 //   if (!files.length || !window.FileReader) return; // Check if File is selected, or no FileReader support
 //   if (/^image/.test( files[0].type)){ //  Allow only image upload
 //    var ReaderObj = new FileReader(); // Create instance of the FileReader
 //    ReaderObj.readAsDataURL(files[0]); // read the file uploaded
 //    ReaderObj.onloadend = function(){ // set uploaded image data as background of div
 //    $("#PreviewPicture").css("background-image", "url("+this.result+")");
 //   }
 //  }else{
 //    alert("Upload an image");
 //  }
 // });
// function readURL(input) {

//   if (input.files && input.files[0]) {
//     var reader = new FileReader();

//     reader.onload = function(e) {
//       $('#blah').attr('src', e.target.result);
//     }

//     reader.readAsDataURL(input.files[0]);
//   }
// }

// $("#imgInp").change(function() {
//   readURL(this);
// });


