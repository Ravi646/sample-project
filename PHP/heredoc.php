<?php
$name = 5;
$msg = <<<END 
<table> 
<tr> 
<td>Blah Blah Blah</td> 
<td>$name</dt> 
</tr> 
</table> 
END;
echo $msg;
?>



















<!-- <?php
$fields_num = mysql_num_fields($res);
$msg = <<< END
 <table border='1'><tr>
        $res=mysql_query(select * from list)
		<tr>
		<td> .$fields_num['1'] .</td>
		 <td>.$fields_num['2']. </td>
		 <td>. $fields_num['4'].  </td>
		 <td>. Action. </td>
		 <td >.Action.</td>
		</tr>
END;
echo $msg;
?> -->






<!-- ?php
$msg = '
<html>
<body>
<table>
<tr> 
<td>Blah Blah Blah</td> 
<td>frjefk</dt> 
</tr> 
</table> 
</body> 
</html>'; 
echo $msg;
?> -->