<?php 
	session_start();
	include('header.php');
	include('mainlistc.php');
	$funObj = new dbfunction();
	if(isset($_POST['login']))
	{
		$login = $funObj->userDetails();
		if($login)
		{
			header('location:ChangePassword.php');
			exit();
		}
		else
		{
			$_SESSION['errMsg'] = "invalid username or password";
		}
	}
?>
<div class="Login">
<form method="POST" action="" class="login_user">
Email id:<br>
<input type="text" name="email" id="login_mail" ><br><br>
password:<br>
<input type="password" name="user_pass" id="login_password"  style="margin:5px"><br><br>
<input type="submit" name="login" value="Login" style="margin:5px" class="btn btn-success">
<div id="errMsg" class="error">
<?php 
	if(!empty($_SESSION['errMsg']))
	{
	echo  $_SESSION['errMsg'];
	}
?>
</div>
<?php
	unset($_SESSION['errMsg']); 
?> 
</form>
</div>
</body>
</html>



