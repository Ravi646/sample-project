<html>
<body class="detail">
	<nav class="navbar navbar-inverse">
		<div class="container-fluid">
			<div class="navbar-header">
				<p class="navbar-brand" >Welcome</p>
			</div>
			<ul class="nav navbar-right">
				<li class="active">
					<a  href="user_logout.php"  >Logout </a>
				</li>	
			</ul>
		</div>
	</nav>	 
<?php 
	session_start();
	include ('mainlistc.php');
	include('header.php');
	$funObj = new dbfunction();
	$dbh=connect_db();
	$user_list="";
	if(isset($_POST['login']))
	{
       ['user_mail']=$_POST['email'];
		$user_details =  $funObj->userDetails($_POST);
		$_SESSION['user_id']  = $user_details[0];
	}
	if(isset($_SESSION['user_id']) || isset($_GET['key']))
	{
		$img_progile = $funObj->User_image();
		 for($i=0;$row=$img_progile ->fetch();$i++)
        {
        	$profile_pic = $row['image'];
        }
		$user_list = $funObj->userValue();
		echo $user_list;
		$value=$funObj->userLogin($_POST);
		
		while($row= $value->fetch(PDO::FETCH_ASSOC))
		{  
			echo "<button class=\"btn btn-default pull-left\" onclick= \"location.href='edit.php?id=".	$row['user_id']."'\" ><i class=\"glyphicon glyphicon-pencil\"></i>Edit</button><br><br>";
		}	
		
	}
	else 
	{
		$_SESSION['errMsg'] = "Invalid username or password";
		header('location:login_mail.php');
		exit();
	}
?>
<form id="upload_form" action="upload_profile.php" method="POST" enctype="multipart/form-data"> 
	<div class="profile-header-container">   
	    <div class="profile-header-img">
        <img class="img-circle"  id="blah"  src="<?php echo $profile_pic;?>" />
		<label class="glyphicon glyphicon-camera"><input type="file" style="display:none;" name="image_upload_files" id="imgInp" ></label><br>
		<button type="submit" id="image_upload" class="btn btn-success btn-sm">Save</button>
	    </div>
	</div>
</form>
</body>
</html>		



	

			 

	 

	
			
							
                    

				


                        

					
	
	




	<!-- btn btn-primary custom-button-width .navbar-right
	 -->



















					
				 
	   







	





