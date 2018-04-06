<?php
	include('mainlistc.php');
	$funObj = new dbfunction();

	if(isset($_POST['submit']))
	{
		$reset = $funObj->resetPassword();
	    echo "password updated successfully";
	    header('location:login_mail.php');
	   
	}
?>
<html>
	<body>
		<head>
			<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
			<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script> 
			<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script> 
			<script type="text/javascript" src="validation.js"></script>
			<link rel="stylesheet" type="text/css" href="present.css">  

		</head>
			<body>  
			 <?php
       			if(isset($reset) && $reset == 1) {?>
				<div id="resetMessage" class="error"> password updated successfully </div>
				<?php } ?>  	
				<div class="Reset">
					<form method="post" action="" class="login_reset" id="reset_pass" autocomplete="off">
						New password :
						<br><input type="password" name="new_pass" id="password_new"><br>
						confirm password:
						<br><input type="password" name="confirm_pass" id="cpassword_new" style="margin:5px" ><br>
					    <input type="submit" value="Submit" name="submit" style="margin:5px" onsubmit="document.location.href='login_mail.php';">
	    			    
					</form>
			</div>
	</body>
</html>



	

c


  	
		