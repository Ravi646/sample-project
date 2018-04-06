<?php
	include ('mainlistc.php');
	$funObj = new dbfunction();
	$dbh = connect_db();
	if(isset($_GET['key']))
	{
		$user_details = $_GET['key'];
		$list_table = $funObj->userList($user_details);
		echo $list_table;	
	}
 	if(isset($_REQUEST['term']))
 	{
 		$result = $funObj->Search_user($_REQUEST);
 		echo $result;
 		exit();
 }
?>
<html>
	<head>
		<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
		<script type="text/javascript" src="js/jquery.validate.min.js"></script>
		<script  type="text/javascript" src="bootstrapValidation.js"></script>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	<body>
		<div class="container">

			<div class="search-box">
				<input type="text" autocomplete="off" placeholder="Search user by id" />
				<div class="result"></div>
			</div>
			<button type="button" class="btn btn-warning custom-button-width .navbar-right" onclick="document.location.href='admin.php';">Logout</button>
			<button type="button" class="btn btn-warning custom-button-width .navbar-right" onclick="document.location.href='superadminlogin.php';">Superdamin Login</button>
			<button type="button" onclick="document.location.href='adduser.php';" class="btn btn-danger custom-button-width .navbar-right">Add User</button>
		</div>
	</body>
</html>	
			









		
	
	

	
	
	
	
	<!-- <label><button  type="button" onclick="document.location.href='admin.php';" name="back" class="btn-block">Back</button></label>
	 -->
	
	
    
	
  

	<!-- <div class="container">
    <input type="text" id="search" placeholder="Search Tutorials Here... Ex: Java, Php, Jquery..."/>
 	<input type="button" id="button" value="Search" />
 	<ul id="result"></ul> -->
 	
            
            

   