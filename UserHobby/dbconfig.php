<?php
function connect_db()
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    try
    {
        $conn =new PDO("mysql:host=$servername;dbname=test;charset=utf8", $username, $password,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    }
    catch(PDOException $e)
    {
        echo "Connection failed: " . $e->getMessage();
    }
}
?>