<?php
include('header.php');
include('UserClass.php');
$funObj = new dbfunction();
?>
<html>
<body>
<?php
$value = $funObj->Imagefetch();
$data  =$value->fetchALL(PDO::FETCH_ASSOC);
?>
<h2>User List</h2>
<table id="imageTable" >
<tr>
    <th>id</th>
    <th>Name</th> 
    <th>image</th>
</tr>
<?php
foreach ($data as $row) {
?>
<tr id="<?php echo $row['id']?>">
<td><?php echo $row['id']?></td>
<td><?php echo $row['name']?></td>
<td><?php echo $row['image']?></td>
<td>
<form method="POST" action="" enctype="multipart/form-data">
 &nbsp &nbsp<label class="glyphicon glyphicon-camera"><input type="file" style="display:none;" name="EditImage" id="imgupload" ></label>
<input type="submit" name="Submit" value="Submit">
</form>
</td>
</tr>		
<?php
} 
?>
</table>
</body>
</html>