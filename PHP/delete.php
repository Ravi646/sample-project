<?php
	print_r($_GET);
	$delete=$_GET['id'];
	include('mainlistc.php');
	$funObj = new dbfunction();
	$funObj->deleteUser($delete);
?>