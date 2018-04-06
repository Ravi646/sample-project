<?php
session_start();
include('UserClass.php');
if(isset($_POST['Submit'])){
	$funObj = new dbfunction();
	$success = $funObj->Adduser($_POST);
    if($success){
    	echo "user added successfully";
    }
    $valid = $funObj->UserMaster($_POST);
    $_SESSION['variable'] = $valid;
    $funObj->UserHobbies($_POST,$valid);
    unset($_SESSION['variable']);
}   
?>
<html>
<body>
<form method="post" action="AddUser.php">  
Name: <input type="text" name="name">
 <br><br>
hobbies:<br>
<input type="checkbox" name="hobby[]" value="1">Cricket<br>
<input type="checkbox" name="hobby[]" value="2">football<br>
<input type="checkbox" name="hobby[]" value="3">Music Listening<br>
<input type="checkbox" name="hobby[]" value="4">FM Listening<br>
<input type="checkbox" name="hobby[]" value="5">Dancing<br>
<input type="submit" name="Submit"><br>
</form>
</body>
</html>