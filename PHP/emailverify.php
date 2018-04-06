<?php
	
	include('mainlistc.php');
	include('header.php');
	$funObj = new dbfunction();
	if(isset($_POST['submit']))
	{
		$verification = $funObj->emailVerify();
		if($verification)
	    	header("Refresh:0; url=security.php");
		    exit;
		
		}
	

	
?>
		

        <?php
        if(isset($verification) && $verification == 0) { ?>
				<div id="Error_email" class="error"> user does not exist </div>
				<?php } ?>  

        <div class="Login">        
            <form method="POST" action="emailverify.php" class="login_user" id="verify_email" >Registered email id:<br>
	            <input type="text" name="email_verify" id="verify_mail"><br>
	            <input type="submit" name="submit" class="btn btn-success">           
	        	<button type="button"  name="back" onclick="document.location.href='login_mail.php';" class="btn btn-primary">Back</button>
        	</form>        
    	</div>
	</body>
</html>










