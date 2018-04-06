<?php
include("header.php");
require_once("dbconn.php");
$db_handle = new DBController();
if(!empty($_POST["title"])) {
	$faq_id = $db_handle->executeInsert($_POST);
	
	if(!empty($faq_id)) {
    $sql = "SELECT * from value WHERE id ='$faq_id' ";
    $value =$db_handle->executeQuery($sql);
    }
   $row = $value->fetch(PDO::FETCH_ASSOC);
   ?> 
<tr class="table-row" id="table-row-<?php echo $row['id']; ?>">
		<td contenteditable="true" onBlur="saveToDatabase(this,'post_title','<?php echo $row['id']; ?>')" onClick="editRow(this);"><?php echo $row['post_title']; ?></td>
		<td contenteditable="true" onBlur="saveToDatabase(this,'description','<?php echo $row['id']; ?>')" onClick="editRow(this);"><?php echo $row['description']; ?></td>
		<td><a class="ajax-action-links" onclick="deleteRecord(<?php echo $row['id']; ?>);">Delete</a></td>
	  </tr>
<?
}
 ?>
 