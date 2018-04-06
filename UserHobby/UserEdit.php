<?php
    session_start();
    include('header.php');
    include('UserClass.php');
    $funObj = new dbfunction();
	if(isset($_POST['ADD'])){
   $_SESSION['id'] = $_POST['id'];
}
	if(isset($_POST['Submit'])){
	$update = $funObj->UserUpdate($_POST);
	$funObj->Userhobby($_POST);
	}
	if(isset($_SESSION['id'])){
	$value = $funObj->Userfetch();
	$data  =$value->fetchALL(PDO::FETCH_ASSOC);

	
?>
<html>
<body>
<?php foreach($data as $row){
$hobby = explode(",",$row['hobby_master']);	?>
<h4><?php echo $row['id']?></h4>
<h4><?php echo $row['Name']?></h4>
<h4><?php echo $row['hobby_master']?></h4>
<?php } 
}
?>
<form method="POST" action="UserEdit.php">
<input type="checkbox" name="hobby[]" value="1" <?php echo in_array('1',$hobby) ? 'checked' : ''; ?>>Cricket<br>
<input type="checkbox" name="hobby[]" value="2" <?php echo in_array('2',$hobby) ? 'checked' : ''; ?>>football<br>
<input type="checkbox" name="hobby[]" value="3" <?php echo in_array('3',$hobby) ? 'checked' : ''; ?>>Music Listening<br>
<input type="checkbox" name="hobby[]" value="4" <?php echo in_array('4',$hobby) ? 'checked' : ''; ?>>FM Listening<br>
<input type="checkbox" name="hobby[]" value="5" <?php echo in_array('5',$hobby) ? 'checked' : ''; ?> >Dancing<br>
<input type="submit" name="Submit"><br>
</form>
</body>
</html>
