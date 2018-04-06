<?php
	include('mainlistc.php');
	$funObj = new dbfunction();
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		$user_check= $_POST['qual'];
		$chk=implode(",", $user_check);
		$result=$funObj->emptyValidation($_POST);
		$insert = $funObj->insertValue();
		if($insert){
			$response = true;
		}else
		{
			$response - false;
		}
		echo json_encode(array('Response'=>$response));
	}
?>
	
