<html>
<body>

<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  Title :<br>
  <input type="text" name="title"  >
  <br>
<!DOCTYPE html>
  Decription:<br>
    <textarea name="comment" rows="5" cols="40" ></textarea>
  <br><br>
  <input type="submit" name="submit" value="Submit">
  <input type="number" name="id" min="1" max="5">
</form>
<?php
require('connection.php');
if(isset($_POST['submit']))
{
$user_title=$_POST['title'];
$user_description=$_POST['comment'];
$user_id=$_POST['id'];
$sql="UPDATE manage_list SET title='$user_title' ,description='$user_description' WHERE id='$user_id'";
 
$conn->prepare($sql);
$stmt=$conn->exec($sql);
if($stmt)
{
	echo "list created succesfully";
}
else
{
	echo "error";
}
}
?>

</body>
</html>

