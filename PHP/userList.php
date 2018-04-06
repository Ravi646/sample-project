 <?php
 include ('mainlistc.php');
	include('header.php');
	$funObj = new dbfunction();
	
	$user_details = $_GET['key'];
	
	if(isset($user_details)){
	$list_manage = $funObj->userList($user_details);
	 echo $list_manage;
		
	}
	?>