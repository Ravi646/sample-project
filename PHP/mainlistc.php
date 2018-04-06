<?php
	 //include('dbconfig.php');
	class  dbfunction 
	{
		private $dbh;
		public function dbfunction()
	{
		$this->dbh = connect_db();
	}
	function update_list()
	{
			$sql = "UPDATE list SET name=:update_name,gender=:update_gender,email=:update_email,description=:update_details,qualification=:update_qual,DOB=:update_date where  user_id=:user_id"; 
			if($result=$this->dbh->prepare($sql))
			{
			$update_name = $_POST['name'];
			$update_gender = $_POST['gender'];
			$update_email = $_POST['email'];
			$update_details = $_POST['comment'];
			$update_qual = implode("," ,$_POST['qual']);
			$update_year = strtotime($_POST['year']);
			$update_date = date('Y-m-d',$update_year);
			$user_id = $_POST['user_id'];
			$result->bindParam(':user_id',$user_id,PDO::PARAM_STR);
			$result->bindParam(':update_name',$update_name,PDO::PARAM_STR);
			$result->bindParam(':update_gender',$update_gender,PDO::PARAM_STR);
			$result->bindParam(':update_email',$update_email,PDO::PARAM_STR);
			$result->bindParam(':update_details',$update_details,PDO::PARAM_STR);
			$result->bindParam(':update_qual',$update_qual,PDO::PARAM_STR);
			$result->bindParam(':update_date',$update_date,PDO::PARAM_STR);
			
			$result->execute();
			return $result->execute();
			}	
	}
	function userList($user_details)
	{		
			$list  = "select user_id,name,email from list where user_id=:user_details";
		    $details = $this->dbh->prepare($list);
			$details->bindParam(':user_details',$user_details);
			$details->execute();
			$table = "";
			$table .= "<div class='container'>
			<table border='1' class='widefat'>
			<tr>
			<td>user_id</td>
			<td> name</td>
			<td>email</td>
			<td>Delete</td>
			</tr>";
		while($row = $details->fetch(PDO::FETCH_ASSOC))
		{
			$table .= 
		   "<tr>
			<td>{$row['user_id'] }</td>
			<td>{$row['name']}</td>
			<td><a href='adminLink.php?val=".$row['user_id']."' data-toggle=\"tooltip\" title=\"click for details!\">{$row['email']}</a></td>
			<td><a href='delete.php?id=".$row['user_id']."'  onClick=\"return confirm('are you sure you want to delete??');\">Delete</a></td>
			</tr>";
		    
	}
	return $table; 
	exit();
	}
	function userDetails()
	{ //PDO with Parameter
	    $sql="SELECT user_id from list where password =:pass AND email=:login_email";
	    if($result = $this->dbh->prepare($sql)){
		$pass = md5($_POST['user_pass']);
		
		$login_email = $_POST['email'];
		$result-> bindParam(":pass",$pass,PDO::PARAM_STR);    
	    $result-> bindParam(":login_email",$login_email,PDO::PARAM_STR);
	    $result->execute();
	    $return = $result->fetch(PDO::FETCH_NUM);	   
	    return $return;
	}
	} 
	 function userValue() 
	{
	    $details_list = "";
	    
	    $sql="SELECT user_id,name,gender,email,description,qualification,DOB from list where user_id='".$_SESSION['user_id']."'";
	    $value = $this->dbh->prepare($sql);
	    $value->execute();
	    
	      $details_list.=" <div class=\"container\">
							  <div class=\"row\">
							    <div class=\"col-md-9\">
							      <div class=\"panel panel-default\">
							        <div class=\"panel-body\">
							          <div class=\"row\">
							            <div class=\"col-md-12 lead\">User profile<hr></div>
							          </div>";
	 	// for($i=0;$i<$value->columnCount(); $i++) 
	  //   {
		 // 	$field =$value->getColumnMeta($i); 
		 //    $details_list.="<td>{$field['name']}</td>";     
	  //   } 
	    while ($rowcall =$value->fetch(PDO::FETCH_NUM))
	    {    
			$details_list.= "<div class=\"row\">
							<div class=\"col-md-8\">
				            <div class=\"row\">
				            <div class=\"col-md-12\">
							<h1 class=\"only-bottom-margin\">{$rowcall['0']}</h1>
			                </div>
			              	</div>
							<div class=\"row\">
			                <div class=\"col-md-6\">
			                  <span class=\"text-muted\">Name:</span>{$rowcall['1']} <br>
			                  <span class=\"text-muted\">Gender:</span>{$rowcall['2']}<br><br>
			                  <span class=\"text-muted\">Email:</span>{$rowcall['3']}<br>
			                  <span class=\"text-muted\">details:</span>{$rowcall['4']}<br>
			                  <span class=\"text-muted\">qualification:</span>{$rowcall['5']}<br>
			                  <span class=\"text-muted\">Birth date:</span>{$rowcall['6']}<br>
			                </div>
							</div>
							</div>
							</div>
							";
		}
		return $details_list;
	}
	function userProfile(){
		
		$sql = $this->dbh->query("SELECT image from list where user_id='".$_SESSION['user_id']."'");
		$sql->execute();
		return $sql;
	}
	function emptyValidation() 
	{ 
		if(empty($_POST['name']) || empty($_POST['qual'])||empty($_POST['year'])||empty($_POST['gender']) ||  empty($_POST['year']) ||empty($_POST['user_id']))
		{ 
			echo "value are not defined" ;
		} 
		if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) 
		{
			return false;
		} 
	}
	function insertValue()
	{
			
			$name = $_FILES['image']['name'];
			$target_dir = "upload_profile/";
			$target_file = $target_dir . basename($_FILES["image"]["name"]);
			$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
			$extensions_arr = array("jpg","jpeg","png","gif");
			if( in_array($imageFileType,$extensions_arr) ){
			move_uploaded_file($_FILES['image']['tmp_name'],$target_dir.$name);
			 $sql = "INSERT INTO list (user_id,name,gender,email,description,qualification,password,first_q,second_q,DOB,image) VALUES (:user_id,:user_name,:user_gender,:user_email,:user_description,:checkbox,:user_password,:user_secure1,:user_secure2,:mysqldate,:target_file)";
			
			if($result = $this->dbh->prepare($sql))
			{
			$checkbox=implode(",", $_POST['qual']);
			$user_id = $_POST['user_id'];
			$user_name =$_POST['name'];
		    $user_gender=$_POST['gender'];
			$user_email=$_POST['email'];
			// $user_birth=date_create($_POST['year']);
			$user_birth = strtotime($_POST['year']);
			// $mysqldate=date_format($user_birth,"Y-m-d");
			$mysqldate = date( "Y-m-d", $user_birth );
			$user_secure1 = $_POST['security_player'];		
			$user_description = $_POST['comment'];
			$user_secure2 = $_POST['security_friend'];
			$user_password = md5($_POST['user_password']);
			$result->bindParam(":user_id", $user_id, PDO::PARAM_STR);
			$result->bindParam(":user_name", $user_name, PDO::PARAM_STR);
			$result->bindParam(":user_gender",$user_gender,PDO::PARAM_STR);
			$result->bindParam(":user_email", $user_email, PDO::PARAM_STR);
			$result->bindParam(":mysqldate", $mysqldate, PDO::PARAM_STR);
			$result->bindParam(":user_description", $user_description, PDO::PARAM_STR);
			$result->bindParam(":checkbox", $checkbox, PDO::PARAM_STR);
			$result->bindParam(":user_secure1", $user_secure1, PDO::PARAM_STR);
			$result->bindParam(":user_secure2", $user_secure2, PDO::PARAM_STR);
			$result->bindParam(":user_password",$user_password,PDO::PARAM_STR);
			$result->bindParam(":target_file", $target_file, PDO::PARAM_STR);
			$result->execute();
			return $result;
		}
	} 
	}
	function check_email(){
		$query = "SELECT  email FROM list where email = :user_email";
		if($result = $this->dbh->prepare($query)){
			$user_email = $_POST['email'];
			$result->bindParam(":user_email",$user_email,PDO::PARAM_STR);
			$result->execute();
			$stmt = $result->rowCount();
			if($stmt>0)
				{
					echo "user already exist";
					exit();
				}
				else
				{
					return $stmt;
				}
	}	
	}			
	function insertAdminuser($rand) {
		print_r($_POST);
		$query = "INSERT INTO list(user_id,name,gender,email,password) VALUES ( :user_Id,:user_name,:user_gender,:user_email,:password)";
			if($result = $this->dbh->prepare($query)){
			$user_Id = $_POST['user_id'];
			$user_name = $_POST['name'];
		    $user_gender = $_POST['gender'];
			$user_email = $_POST['email'];
			$password = md5($rand);
			$result->bindParam(':user_Id', $user_Id, PDO::PARAM_STR);
			$result->bindParam(':user_name', $user_name, PDO::PARAM_STR);
			$result->bindParam(':user_gender',$user_gender,PDO::PARAM_STR);
			$result->bindParam(':user_email', $user_email, PDO::PARAM_STR);
			$result->bindParam(':password',$password,PDO::PARAM_STR);
			$result->execute();
			return $result;
	}
	}		
	function editValue($user_no)
	{
		$result_set='';
		$sql_query = "SELECT * FROM list  WHERE user_id =:user_no";
		$result_set=$this->dbh->prepare($sql_query);
		$result_set->bindParam(':user_no',$user_no);
		$result_set->execute();
		return $result_set;
	}
	function deleteUser($delete)
	{
		$this->dbh->query("DELETE from list WHERE user_id='$delete' limit 1");
		header('Location:mainlist.php');
		exit();
	}
	function userLogin()
	{
		$list =$this->dbh->query("select user_id from list where user_id='".$_SESSION['user_id']."'");
		$list->execute();
	    return $list;
	}
	function revertUser($user_no)
	{
		$result_set='';
		$sql_query = "SELECT user_id FROM list  WHERE user_id =:user_no";
		$result_set=$this->dbh->prepare($sql_query);
		$result_set->bindParam(':user_no',$user_no);
		$result_set->execute();
		return $result_set;

	}
	function userSecurity()
	{
		$sql="SELECT first_q,second_q FROM list WHERE first_q=:secure1 AND second_q=:secure2"; 
		if($st2 = $this->dbh->prepare($sql)) 
		{
			$secure1=$_POST['security_player'];
			$secure2=$_POST['security_friend'];
			$st2->bindParam (":secure1", $secure1, PDO::PARAM_STR);
	        $st2->bindParam (":secure2", $secure2, PDO::PARAM_STR);
	        $st2->execute();
			return $st2->rowCount();
			
		}
	}
	function emailVerify()
	{
		$sql="SELECT email from list where email=:email_verify";
		if($stmt = $this->dbh->prepare($sql))
		{
			$email_verify=$_POST['email_verify'];
			$stmt->bindParam(":email_verify",$email_verify,PDO::PARAM_STR);
			$stmt->execute();
			return $stmt->rowCount(); 
		}
	}
	function resetPassword()
	{
		$sql="UPDATE list SET password=:newPass,confirmpassword=:confirmPass";
		if($stmt=$this->dbh->prepare($sql))
		{
			$newPass = md5($_POST['new_pass']);
			$confirmPass = md5($_POST['confirm_pass']);
	        $stmt->bindParam (":newPass", $newPass, PDO::PARAM_STR);
	        $stmt->bindParam (":confirmPass", $confirmPass, PDO::PARAM_STR);
			$stmt->execute();
			return $stmt->rowCount();
		}
	}
	function adminLogin()
	{
	 $sql = "select admin_id,admin_password  from list_admin  where admin_id=:adminID and admin_password=:adminPASS";
		if($stmt=$this->dbh->prepare($sql))
		{
		    $adminID = $_POST['admin_id'];
		    $adminPASS =md5( $_POST['admin_pass']);
		    $stmt->bindParam(":adminID",$adminID,PDO::PARAM_STR);
		    $stmt->bindParam(":adminPASS",$adminPASS,PDO::PARAM_STR);
		    $stmt->execute();
		    return  $stmt->rowCount();
		   
		}
	}
	function Resetadmin()
	{
		$sql = "update list_admin  set admin_id=:resetID, admin_password=:resetPASS where admin_password=:oldPASS";
		if(	$stmt=$this->dbh->prepare($sql))
		{

			$resetID = $_POST['reset_id'];
			$oldPASS =md5( $_POST['old_pass']);
			$resetPASS =md5( $_POST['reset_pass']);
			$stmt->bindParam(":resetID",$resetID,PDO::PARAM_STR);
			$stmt->bindParam(":resetPASS",$resetPASS,PDO::PARAM_STR);
			$stmt->bindParam(":oldPASS",$oldPASS,PDO::PARAM_STR);
			$stmt->execute();
			$stmt->rowCount();
			return $stmt;
		}
	}
	function superadminLogin()
	{
		 $sql = "select id,password  from list_superadmin  where id=:super_ID and password=:super_PASS";
			if($stmt=$this->dbh->prepare($sql))
			{
			    $super_ID = $_POST['superadmin_id'];
			    $super_PASS =md5( $_POST['superadmin_pass']);
			    $stmt->bindParam(":super_ID",$super_ID,PDO::PARAM_STR);
			    $stmt->bindParam(":super_PASS",$super_PASS,PDO::PARAM_STR);
			    $stmt->execute();
			     $stmt->rowCount();
	            return $stmt; 
			     
			}  
	}
	function ResetSuperAdmin()
	{
		$sql = "update list_superadmin  set id=:resetID, password=:resetPASS where password=:oldPASS";
			if(	$stmt=$this->dbh->prepare($sql))
			{

				$resetID = $_POST['reset_id'];
				$oldPASS =md5( $_POST['old_pass']);
				$resetPASS =md5( $_POST['reset_pass']);
				$stmt->bindParam(":resetID",$resetID,PDO::PARAM_STR);
				$stmt->bindParam(":resetPASS",$resetPASS,PDO::PARAM_STR);
				$stmt->bindParam(":oldPASS",$oldPASS,PDO::PARAM_STR);
				$stmt->execute();
				  $stmt->rowCount();
				  return $stmt;
			}

	}
	function adminDetails()
	{
		   $list = $this->dbh->query("select name,admin_id,admin_email from list_admin");
			$list->execute();
			$table = "";
			$table .= "<div class='container'>
			<table border='1' class='table'>
			<tr>
			<td>admin_id</td>
			<td> name</td>
			<td>email</td>
			<td>Delete</td>
			</tr>";
			
		while($row = $list->fetch(PDO::FETCH_ASSOC))
		{
			$table .= 
		   "<tr>
			<td>{$row['admin_id'] }</td>
			<td>{$row['name']}</td>
			<td>{$row['admin_email']}</a> </td>
			<td><a href='deleteAdmin.php?id=".$row['admin_id']."' onClick=\"return confirm('are you sure you want to delete??');\">Delete</a></td>
			</tr>";
		    
		}
		return $table; 
	}
	function deleteAdmin($delete)
	{

			$this->dbh->query("DELETE from list_admin WHERE admin_id='$delete' limit 1");
			header('Location:admindetails.php');
			exit;
			
	}
	function insert_admin()
	{
		$sql = "INSERT INTO list_admin(name,admin_id,admin_email,admin_password) VALUES(:name,:admin_ID,:admin_mail,:admin_PASS) ";
	if($result = $this->dbh->prepare($sql))
	{
		$name = $_POST['admin_name'];
		$admin_ID = $_POST['admin_id'];
		$admin_mail = $_POST['admin_email'];
		$admin_PASS = md5($_POST['admin_password']);
		$result->bindParam(":name",$name,PDO::PARAM_STR);
		$result->bindParam(":admin_ID",$admin_ID,PDO::PARAM_STR);	
		$result->bindParam(":admin_mail",$admin_mail,PDO::PARAM_STR);
		$result->bindParam(":admin_PASS",$admin_PASS,PDO::PARAM_STR);
		$result->execute();
		return $result;
	}
	}
	function rand_char($length) 
	{
	  $random = '';
	  for ($i = 0; $i < $length; $i++) {
	    $random .= chr(mt_rand(33, 126));
	  }
	  return $random;
	}
	function changePASSWORD()
	{
	 $sql = "UPDATE list SET password = :change_pass ";
	 if($result = $this->dbh->prepare($sql)){
	 	$new_pass = md5($_POST['change_pass']);
	 	$result->bindParam(":change_pass",$new_pass,PDO::PARAM_STR);
	 	$result->execute();
	 	$value = $result->rowCount();
	 	if($value>0)
	 	{
	 		return $value;
	 	}
	 	else
	 	{
	 		echo "failed to update password";
	 	}
	}
	}
	function SendMail($password)
	{
		$to = $_POST['email'];
		$mail = new PHPMailer();
		$value = $mail->isSMTP();
		$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
		$mail->SMTPAuth = true;                               // Enable SMTP authentication
		$mail->Username = 'ravidubey646@gmail.com';                 // SMTP username
		$mail->Password = '9762924368';                           // SMTP password
		$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
		$mail->Port = 587;                                    // TCP port to connect to
		$mail->setFrom('ravidubey646@gmail.com', 'ravi');
		$mail->addAddress($to);
		$mail->isHTML(true);      
		$mail->Body     = "your account is activated<br>";
		$mail->Body  .=  "your password is\n <u>$password</u><br>";
		$mail->Body .= "click on the link for login http://localhost:8080/manage_list/activate.php";                            
		$val =  $mail->send();
		if($val){
			return $val;
		}else{
			echo "failed";
		}
	}
	function Search_user()
	{
		$search_list="";
   		$sql = "SELECT * FROM list WHERE user_id LIKE :term limit 5";
        $stmt =  $this->dbh->prepare($sql);
        $term = $_REQUEST['term'] . '%';
        // bind parameters to statement
        $stmt->bindParam(':term', $term);
        // execute the prepared statement
        $stmt->execute();
        if($stmt->rowCount() > 0){
            while($row = $stmt->fetch()){
                $search_list .= "<p><a href='mainlist.php?key=".$row['user_id']."'>{$row['user_id']}</a></p>";
            }
        	return $search_list;
        }else{
            echo "<p>No matches found</p>";
		   	unset($stmt);
		   	unset($this->dbh);
        }
    }
    function Upload_profile_pic(){
			$name = $_FILES['file']['name'];
			$target_dir = "D:/upload_images/";
			$target_file = $target_dir . basename($_FILES["file"]["name"]);
			$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
			$extensions_arr = array("jpg","jpeg","png","gif");
			if( in_array($imageFileType,$extensions_arr) ){
			move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$name);
			return true;
	 	}else{
	 		echo "fail to upload";
	 	}
	 }
	function User_image(){
		$upload = "";
	    $upload = $this->dbh->query("SELECT image,name from list where user_id='".$_SESSION['user_id']."'");
		$upload->execute();
		return $upload;
	}
}
?>


		
	
		
		
		
		
		
		
							
							
			
			
			
			  
			
			
			


			
			
							 
			
			
		
		
	   
		
			











						
			
			

    	
	
	   
	
			
 
			  
			  



		

		
			
			

	
     

	
	 		
			
		

	


	
			
			


		
	   

		
	 
	

		








  
   





 
	    
		

    
 



