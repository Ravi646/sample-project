<?php
include('header.php');
include('mainlistc.php');
$funObj = new dbfunction();
if($_SERVER["REQUEST_METHOD"] == "POST")
{

	$insert = $funObj->insert_admin($_POST);
    header('location:admindetails.php');
    exit;
	
	
	

}
?>

       <body> 
		<p><span class="error">*requiredfield.</span></p>
        <?php if(isset($insert)) {?>
        <div id="addMessage" class="error">Admin added successfully </div>
		<?php }?>
				
		<div id ="valid" class="flex"> 
			<form id="admin-item" method="POST" action="Register_admin.php">
				<h2>Registeration Form </h2>
				</select><br>
				<span class="error">*</span>ID:</br><input type "text" name="admin_id"  id="identity" />
				<span id = "err_identity"></span> <br>
				<span class="error">* </span>Name: </br>
				<input type="text" name="admin_name" id="txt"/><br>
				<span class="error">* </span>Email :<br> <input type="text" name="admin_email" id="txtemail"> <br>
				<span class="error">* </span>password :<br><input type="password" name="admin_password" id="pwd"><br>
				<span class="error">* </span>confirm password:<br><input type="password" name="confirm_password" id="cpwd"><br>
            <input type="submit" value="Submit" class="btn btn-success">  
				<button id="Reset" type="reset" value="RESET" onclick="alert('values has been reset')" id="set" class="btn btn-primary">Reset</button>
			</form>
		</div>
		</body>
		</html>	
	
	


				
			
