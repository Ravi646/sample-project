<?php
session_start();
include('dbconfig.php');
$dbh=connect_db();
// User session id
$path =  "upload_profile/";
 
$valid_formats = array("jpg", "png", "gif", "bmp","jpeg");
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST")
{
$name = $_FILES['image_upload_files']['name'];
			$target_dir = "upload_profile/";
			$target_file = $target_dir . basename($_FILES["image_upload_files"]["name"]);
			$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
			$extensions_arr = array("jpg","jpeg","png","gif");
			if( in_array($imageFileType,$extensions_arr) ){
			move_uploaded_file($_FILES['image_upload_files']['tmp_name'],$target_dir.$name);

$sql = "UPDATE list SET image=:target_file WHERE user_id='".$_SESSION['user_id']."'";
$result = $dbh->prepare($sql);
$result->bindParam(':target_file',$target_file,PDO::PARAM_STR);
$result->execute();
}
else{
echo "failed";
}
}
?>





