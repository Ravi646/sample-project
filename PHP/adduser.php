<?php
	use PHPMailer\PHPMailer\PHPMailer;
	require('PHPMailer.php');
	require('POP3.php');
	require('SMTP.php');
	require('Exception.php');
	include('mainlistc.php');
	include('header.php');
	
	$funObj = new dbfunction();
	if(isset($_POST['submit']))
	{
		$password =$funObj->rand_char(7);
		$count = $funObj->check_email($_POST);
		if($count==0)
		{
			
			
				$to = $_POST['email'];
				$mail = new PHPMailer();
				$value = $mail->isSMTP();
				$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
				$mail->SMTPAuth = true;                               // Enable SMTP authentication
				$mail->Username = 'ravidubey646@gmail.com';                 // SMTP username
				$mail->Password = '9762924368';                           // SMTP password
				$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
				$mail->Port = 587;                                    // TCP port to connect to
				$mail->setFrom('ravidubey646@gmail.com', 'ravi');
				$mail->addAddress($to);
				$mail->isHTML(true);      
				$mail->Body     = "your account is activated<br>";
				$mail->Body  .=  "your password is\n <u>$password</u><br>";
				$mail->Body .= "click on the link for login http://localhost:8080/manage_list/activate.php";                            
				$val =  $mail->send();
				if($val){
					
					echo "mail has been sent successfully";
					$insert = $funObj->insertAdminuser($password);
				}
				else{
					echo "failed";
				}
			
			}
			else
			{
				echo "mail can't send";
			}
		}
		else
		{
			echo "user already exists";
		}
	      
?>
  <html> 
   <body> 
		<p><span class="error">*requiredfield.</span></p>
        <?php if(isset($insert)) {?>
        <div id="addMessage" class="error">User added in the list</div>
		<?php }?>
		<div id ="valid" class="flex"> 
			<form id="flex-item" method="POST" action="adduser.php">
				<h2>Registeration Form </h2>
				</select><br>
				<span class="error">*</span>User id:</br><input type "text" name="user_id"  id="identity" />
				<span id = "err_identity"></span> <br>
				<span class="error">* </span>Name: </br>
				<input type="text" name="name" id="txt"/><br>
				<span class="error">* </span>Email :<br> <input type="text" name="email" id="txtemail"> <br>
				<span class="error">* </span>Gender:<br>
				<div class="clsx_bottom">
					<label class = "label_checkbox" for="female"><input type="radio" name="gender" value="female" id = "female" >Female</label> 
					<label for="gender" class="error" style="display:none;">* Please pick an option above</label>
					<label class = "label_checkbox" for="male"><input type="radio" name="gender" value="male" id = "male" >Male </label><br><br>
				</div>
            	<input type="submit" value="submit" name ="submit"class="btn btn-success">  
				<button id="Reset" type="reset" value="RESET" onclick="alert('values has been reset')" id="set" class="btn btn-primary">Reset</button>
			<button type="button" onclick="document.location.href='mainlist.php';" class="btn btn-primary">Back</button>
			</form>
		</div>
		</body>
		</html>	
	
	
		
	
	



	 




				
	
			<!-- $returnMail = $funObj->SendMail($password);
				if($returnMail) -->
				
                
				
				
				
	

				

	
	
			
		
	
			
		
	      
			
		