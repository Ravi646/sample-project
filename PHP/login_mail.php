<?php 
	session_start();
	include('header.php');
?>
<div class="Login">
<form method="POST" action="details.php" class="login_user">
Email id:<br>
<input type="email" name="email" id="login_mail" /><br><br>
password:<br>
<input type="password" name="user_pass" id="login_password" style="margin:5px"><br><br>
<input type="submit" name="login" value="Login" style="margin:5px" class="btn btn-success">
<button type="button" value="back" id="login_back" onclick="document.location.href='createpage.php'" class="btn btn-primary">back</button><br><br>
<a href="emailverify.php" >forgot password?</a>
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









			
				





















