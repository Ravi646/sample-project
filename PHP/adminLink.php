<?php
include('header.php');
include('dbconfig.php');
$dbh = connect_db();
if(isset($_GET['val'])){
	$user_key = $_GET['val'];
	$details_list = "";
	 $upload = $dbh->query("SELECT image from list where user_id='$user_key'");
		$upload->execute();
		while($image= $upload->fetch(PDO::FETCH_ASSOC))
			{
				
				$details_list .=  "<div class=\"profile-header-container\">   
	    								<div class=\"profile-header-img\">
											<img class=\"img-circle\" src='".$image['image']."'><br><br>
											 </div>
									</div>";
			}
	    $sql="SELECT user_id,name,gender,email,description,qualification,DOB from list where user_id='$user_key'";
	    $value = $dbh->prepare($sql);
	    $value->execute();
	    $details_list .= "<div class=\"container\">
							  <div class=\"row\">
							    <div class=\"col-md-9\">
							      <div class=\"panel panel-default\">
							        <div class=\"panel-body\">
							          <div class=\"row\">
							            <div class=\"col-md-12 lead\">User profile<hr></div>
							          </div>";
	                      
	 	
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
							</div>";
							 
		}
		echo $details_list;
 }
 ?>
<body>
	<button type="button" class="btn btn-warning custom-button-width .navbar-top" onclick="document.location.href='mainlist.php';">Back</button>
</body>
</html>