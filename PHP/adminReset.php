<?php 
	include("mainlistc.php");
	include('header.php');
	$funObj = new dbfunction();
	if(isset($_POST['submit']))
	{
		$value =$funObj->Resetadmin($_POST);
		if($value)
		{
			echo "succes";
		   header('location:admin.php');
		   exit;
		}
	}
?>

<?php if(isset($value) && $value == 0) {?>
<div id="admin_error_message" class="error">invalid password </div>
<?php }?>
<div class="Login">
<form method="post" action="adminReset.php" id="login_user_form" class="login_user">
new ID:<br>
<input type="text" name="reset_id" id="login_mail"><br><br>
old password:<br>
<input type="password" name="old_pass" id="old_admin"><br>
new password:<br>
<input type="password" name="reset_pass" id="login_password" style="margin:5px"><br><br>
<input type="submit" value="Submit" name="submit" style="margin:5px" class="btn btn-success">
</form>
</div>
</body>
</html>




	
	
