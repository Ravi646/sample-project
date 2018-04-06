<?php
	include('header.php');
	include('mainlistc.php');
	$funObj = new dbfunction();
	if(isset($_POST['submit'])){
				$change = $funObj->changePASSWORD();
		if($change){
					echo "password changed successfully";
					header('location:login_mail.php');
					exit();
		}
	}
	?>
<body>
<h2>change the Password</h2>
<form method="post" action=""  id="change" autocomplete="off">
						<div class="container">
						<label>New password :</label>
						<br><input type="password"  class="form-control" name="change_pass" id="c_password_new"><br>
						<label>confirm password:</label>
						<br><input type="password" class="form-control" name="confirm_change_pass" id="cpassword_new" style="margin:5px" ><br>
					    <input type="submit" value="change" name="submit" class="btn btn-success" style="margin:5px" >
						</div>
					</form>
				</body>

