<!DOCTYPE html>
<html>
	<head>
		<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
		<script type="text/javascript" src="js/ajax.js"></script>
		<script>
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
	</script>
	</head>
	<body>
		<form id="form1">
			<input type='file' id="imgInp" onchange="readURL(this)"/>
			<img id="blah" src="#" alt="your image" />
		</form>

	</body>
</html>