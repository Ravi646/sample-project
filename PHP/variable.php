<?php
include('dbconfig.php');
        $res=mysql_query("select * from list");
		$fields_num = mysql_num_fields($res);

	$html_table = '<table border="1" cellspacing="0" cellpadding="2"><tr>'; 
	foreach($fields_num as $header){
	$html_table .= "<td>". $header."</td>";                           
    } 
     $html_table .= '</tr>';
	 echo $html_table;    
		?>