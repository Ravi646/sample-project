<?php
	session_start();
	include('mainlistc.php');
	include('header.php');
	$funObj= new dbfunction();
	if(isset($_POST['submit']))
	
	{
		print_r($_POST);
		$_SESSION['id'] = $_POST['admin_id'];
	    $admin_check = $funObj->adminLogin($_POST);
	    if($admin_check)
	    {
	 		header('location:mainlist.php');    	    
			unset($_SESSION['id']);
			
		}
		else
		{
			$_SESSION['errMsg'] = "Invalid ID or password";
			header('location:admin.php');
			exit;
		}
	}
?>

				<div class="Login">
					<form method="post" action="admin.php" id="login_user_form" class="login_user" autocomplete="off">
						ID:<br>
						<input type="text" name="admin_id" id="login_mail"><br><br>
						password:<br>
						<input type="password" name="admin_pass" id="login_password" style="margin:5px"><br><br>
					    <input type="submit" value="Login" name="submit" style="margin:5px" class="btn btn-success">
					    <button type="button" name="back" value="back"  onclick="document.location.href='createpage.php';" class="btn btn_primary">Back</button><br>
	    			   	<a href="adminReset.php">Reset ID and password </a>
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



					








	












