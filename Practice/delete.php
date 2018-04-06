<?php
include("header.php");
require_once("dbconn.php");
$db_handle = new DBController();

if(!empty($_POST['id'])) {
	$id = $_POST['id'];
	$sql = "DELETE FROM  value WHERE id = '$id' ";
	$db_handle->executeQuery($sql);
}
?>