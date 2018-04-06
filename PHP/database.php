<?php

$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$con = mysql_connect("localhost","root","");
mysql_set_charset('utf8');
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("registeration", $con);

 ?>