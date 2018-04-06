<?php
include('mainlistc.php');
$funObj = new dbfunction();
if($_SERVER["REQUEST_METHOD"] == "POST")
{
         $user_check= $_POST['qual'];
		$chk=implode(",", $user_check);
		$result=$funObj->emptyValidation($_POST);
		$funObj->insertValue($_POST);
		header('location:mainlist.php');    
		 
}
?>
