<?php
	include('header.php');
	include('mainlistc.php');
	$funObj = new dbfunction();
	if (isset($_POST['submit']))
	{
		$secure = $funObj->userSecurity($_POST);

		if($secure > 0)
		{
			header('location:forgot.php');
            exit;
		}
	
	}
?>

	<body>
        <?php
        if(isset($secure) && $secure == 0) {?>
				<div id="ErrorMessage" class="error"> Not a valid user </div>
				<?php } ?>  
				<div class="security">
					<form  method="post" action="security.php" class="secure_user" id="security_form" autocomplete="off">
						<div class="form-group">
						<label for="secure_box1">who is your favourite sports player</label>
						<input type="text" name="security_player" id="secure_box1" class="form-control">
					</div>
						 <label for="secure_box2">what is your best friend name?</label>
						<input type="text" name="security_friend" id="secure_box2" style="margin:5px" ><br>
					   
					    <input type="submit" value="Submit" name="submit" style="margin:5px" class="btn btn-success">
					    <button type="button" name="reset" onclick="document.location.href='login_mail.php';"  class="btn btn-primary">Back</button>
					</form>
				<div>
	</body>
</html>













	    			    
		 
		