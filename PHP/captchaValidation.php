<?php 
	session_start(); 
	if(isset($_POST['captcha']))
	{
		if ($_POST["captcha"] != $_SESSION["captcha_code"])
		{ 
		    $valid = false; 
		} else
		{ 
		    $valid = true; 
		}
	echo json_encode(array(
		        'valid' => $valid,
		        ));
	} 
?>
		   