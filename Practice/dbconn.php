<?php
class DBController {
    function __construct() {
        $conn = $this->connectDB();
        if(!empty($conn)) {
            $this->conn = $conn;            
        }
    }
    function connectDB() {
    $servername = "localhost";
    $username = "root";
    $password = "";
    try
    {
        $conn =new PDO("mysql:host=$servername;dbname=user;charset=utf8", $username, $password,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    }
    catch(PDOException $e)
    {
        echo "Connection failed: " . $e->getMessage();
    }
    }

    function runSelectQuery($faq_id) {
        $sql = "SELECT * from value WHERE id =:faq_id ";
       
        if($result = $this->conn->prepare($sql))
        {
            $result->bindParam(':faq_id',$faq_id,PDO::PARAM_STR);   
            $term = $result->execute();
            return $term;
        }
    }
    
    function executeInsert() {
        $sql = "INSERT INTO value (post_title,description) VALUES (:title ,:description)";
        if($result = $this->conn->prepare($sql))
        {
            $title = $_POST["title"];
            $description = $_POST["description"];
            $result->bindParam(':title',$title,PDO::PARAM_STR);
            $result->bindParam(':description',$description,PDO::PARAM_STR);
            $result->execute();
            $insert = $this->conn->lastInsertId();
            return $insert;
             
        }
    }
    function executeUpdate($query) {
        $result = $this->conn->prepare($query);
        $result->execute();
        return $result;
        
    }
    function executeQuery($sql) {
        $result = $this->conn->prepare($sql);
        $result->execute();
        return $result;
    }
    function numRows($query) {
        $result  =$this->conn->prepare($query);
        $rowcount = $result->fetch(PDO::FETCH_NUM);
        return $rowcount;
    }
    
}
?>