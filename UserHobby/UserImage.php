<?php
include('UserClass.php');
$funObj = new dbfunction();
if(isset($_POST['Submit'])){
	$funObj->UserImage($_POST);
}
?>
<html>
<body>
<form method="post" action="UserImage.php" enctype="multipart/form-data">  
Name: <input type="text" name="name">
<br><br>
Image:<input type="file" name="image">
<br><br>
<input type="submit" name="Submit">
</form>
</body>
</html>