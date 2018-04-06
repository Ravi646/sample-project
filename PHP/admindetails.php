<?php
include('mainlistc.php');
include('header.php');
$funObj = new dbfunction();
$admin_list = $funObj->adminDetails();
echo $admin_list;
?>
<div class="container">
    <div class="row">
	<form method="POST">
	<div class="col-xs-3">
	<label><button  type="button" onclick="document.location.href='superadminlogin.php';" name="back" class="btn-block">Back</button></label>
	
	</div>
	<div class="form-group">
	
	<button type="button" id="read-more" class="btn btn-default pull-right" onclick="document.location.href='Register_admin.php';">Add admin</button>
	</div>
	</form>
	</div>
	</div>
	</body>
	</html>
