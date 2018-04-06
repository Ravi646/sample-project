<?php

include('UserClass.php');
$funObj = new dbfunction();
?>
<html>
<body>
<?php
$value = $funObj->Masterfetch();
$data  =$value->fetchALL(PDO::FETCH_ASSOC);
?>
<h2>User List</h2>
<table >
<tr>
    <th>id</th>
    <th>Name</th> 
    <th>Hobbies</th>
  	<th>Add</th>
</tr>
<?php
foreach ($data as $row) {
?>
<tr>
<td><?php echo $row['id']?></td>
<td><?php echo $row['Name']?></td>
<td><?php echo $row['hobby_master']?></td>
<td>
<form method="post" action="UserEdit.php">
<input type="submit" name="ADD" value="ADD"/>
<input type="hidden" name="id" value="<?php echo $row['id'];?>"/>
</form>
</td>
</tr>
<?php
 } 
 ?>
</table>
</body>
</html>