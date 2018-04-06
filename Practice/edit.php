<?php
include("header.php");
require_once("dbconn.php");
$db_handle = new DBController();
$sql = "UPDATE value set " . $_POST["column"] . " = '".$_POST["editval"]."' WHERE  id=".$_POST["id"];
$result = $db_handle->executeUpdate($sql);
?>
