<?php
include('dbconfig.php');
class  dbfunction 
	{
		private $dbh;
		public function dbfunction()
	{
		$this->dbh = connect_db();
	}
	function Adduser(){
		$name = $_POST['name'];
	    $sql = "INSERT INTO users (name) VALUES(:name)";
	    if($result = $this->dbh->prepare($sql)){
	    	$name = $_POST['name'];
	    	$result->bindParam(":name", $name, PDO::PARAM_STR);
	    	$result->execute();
	    	return $result;
		}
	}
	function UserMaster(){
		$sql = "INSERT INTO master (hobby_master,name) VALUES(:hobbies,:name)";
	    if($result = $this->dbh->prepare($sql)){
	    	$name = $_POST['name'];
	    	
	    	$hobbies = implode("," ,$_POST['hobby']);
	    	$result->bindParam(":name", $name, PDO::PARAM_STR);
	    	$result->bindParam(":hobbies", $hobbies, PDO::PARAM_STR);
	    	$result->execute();
	    	$id = $this->dbh->lastInsertId();
	    	return $id;
		}
	}
	function Masterfetch(){
		$sql = "SELECT * FROM master";
	    $result = $this->dbh->prepare($sql);
	    $result->execute();
    	return $result;
		}
	function Userfetch(){
		$sql = "SELECT id,hobby_master,Name FROM master WHERE id='".$_SESSION['id']."'";
	    $result = $this->dbh->prepare($sql);
	    $result->execute();
    	return $result;
		}
	function UserUpdate(){
		$sql = "UPDATE master SET hobby_master=:User_hobbies WHERE id='".$_SESSION['id']."'";
		if($result = $this->dbh->prepare($sql)){
		$User_hobbies = implode(",",$_POST['hobby']);
		$result->bindParam(":User_hobbies", $User_hobbies, PDO::PARAM_STR);
	    $result->execute();
	    return $result;
		}
	}
	function Userhobby(){
		$sql = "DELETE FROM user_hobby WHERE id='".$_SESSION['id']."'";
	    $result = $this->dbh->prepare($sql);
		$result->execute();
		$popimp = implode(',', $_POST['hobby']);
	    $pops = explode(',', $popimp);
	    
	    
	    foreach ($pops as $pop )
	{
		$sql =  "INSERT INTO user_hobby (id, hobby) 
		VALUES ('".$_SESSION['id']."','$pop')";
		$result = $this->dbh->prepare($sql);
		$result->execute();
		
	}
	    return $result;
	}
	function UserHobbies(){
		$popimp = implode(',', $_POST['hobby']);
	    $pops = explode(',', $popimp);
	     foreach ($pops as $pop )
	{
		$sql = "INSERT INTO user_hobby (id, hobby) 
		VALUES ('".$_SESSION['variable']."','$pop')";
		$result = $this->dbh->prepare($sql);
		$result->execute();

	}
	return $result;
}
	function UserImage(){
		$fname = $_POST['name'];
		$name = $_FILES['image']['name'];
		$target_dir = "upload/";
		$target_file = $target_dir . basename($_FILES["image"]["name"]);
		$value = basename($_FILES["image"]["name"]); 
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		$extensions_arr = array("jpg","jpeg","png","gif");
		if( in_array($imageFileType,$extensions_arr) ){
		move_uploaded_file($_FILES['image']['tmp_name'],$target_dir.$fname);
		}	
		$sql = "INSERT INTO tbl_img (name, image) 
		VALUES (:fname,:value)";
		if($result = $this->dbh->prepare($sql)){
			$result->bindParam(":fname", $fname, PDO::PARAM_STR);
			$result->bindParam(":value", $value, PDO::PARAM_STR);
			$result->execute();
			return $result;
		}
}
	function Imagefetch(){
		$sql = "SELECT id,name,image FROM tbl_img";
		$result = $this->dbh->prepare($sql);
		$result->execute();
		return $result;
	}
}
?>