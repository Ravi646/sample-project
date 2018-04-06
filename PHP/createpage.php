<?php
 if(isset($_POST['submit'])){
    global $wpdb;
    $table = $wpdb->prefix.'user646';
    $user_check= $_POST['qual'];
    $chk=implode(",", $user_check);
    $user_birth = strtotime($_POST['year']);
    $mysqldate = date( "Y-m-d", $user_birth );
    $name = $_FILES['image']['name'];
    $target_dir="C:/xampp/htdocs/wordpress/wp-content/plugins/manage_list/upload_profile";
    $target_file = $target_dir.basename($_FILES["image"]["name"]);
    $imageFileType =strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $extensions_arr =array("jpg","jpeg","png","gif");
    if( in_array($imageFileType,$extensions_arr) ){
    move_uploaded_file($_FILES['image']['tmp_name'],$target_dir.$name);
    }
    
    $wpdb->insert($table,array('user_id' =>$_POST['user_id'],
    'name'    => $_POST['name'],
    'gender'  => $_POST['gender'],
    'email'   => $_POST['email'],
    'description'=>$_POST['comment'],
    'qualification'=>$chk,
    'password'  =>md5($_POST['user_password']),
    'first_q' =>$_POST['security_player'],
    'second_q'  =>$_POST['security_friend'],
    'DOB'   =>$mysqldate,
    'image'     =>$target_file),array('%s','%s','%s','%s','%s','%s','%s','%s','%s','%s'));
    
    }
?>
<html>
<body>
<table cellspacing="2" cellpadding="5" style="width: 100%;" class="form-table">
    <tbody>
    <tr class="form-field">
        <th valign="top" scope="row">
            <label for="name"><?php _e('Name', 'cltd_example')?></label>
        </th>
        <td>
            <input id="name" name="name" type="text" style="width: 95%" value="<?php echo esc_attr($item['name'])?>"
                   size="50" class="code" placeholder="<?php _e('Your name', 'cltd_example')?>" required>
        </td>
    </tr>
    <tr class="form-field">
        <th valign="top" scope="row">
            <label for="email"><?php _e('E-Mail', 'cltd_example')?></label>
        </th>
        <td>
            <input id="email" name="email" type="email" style="width: 95%" value="<?php echo esc_attr($item['email'])?>"
                   size="50" class="code" placeholder="<?php _e('Your E-Mail', 'cltd_example')?>" required>
        </td>
    </tr>
    <tr class="form-field">
        <th valign="top" scope="row">
            <label for="img"><?php _e('Profile Pic', 'cltd_example')?></label>
        </th>
        <td>
            <input id="img" name="img" type="file" style="width: 95%;color: transparent;" accept="image/x-png,image/gif,image/jpeg" <?php if(!empty($item['image'])){echo "selectedFile";}?> ><span class="filename"><?php echo basename($item['image'])?></span>
         <label for="img"></label>
        </td>
    </tr>
    <tr class="form-field">
        <th valign="top" scope="row">
            <label for="age"><?php _e('Age', 'cltd_example')?></label>
        </th>
        <td>
            <input id="age" name="age" type="number" style="width: 95%" value="<?php echo esc_attr($item['age'])?>"
                   size="50" class="code" placeholder="<?php _e('Your age', 'cltd_example')?>" required>
        </td>
    </tr>
    <tr class="form-field">
        <th valign="top" scope="row">
            <label for="description"><?php _e('Description', 'cltd_example')?></label>
        </th>
        <td>
            <textarea id="description" name="description" type="number" rows="5" cols="40" required><?php echo esc_attr($item['description'])?></textarea>
        </td>
    </tr> 
    <tr class="form-field">
        <th valign="top" scope="row">
            <label for="gender"><?php _e('Gender', 'cltd_example')?></label>
        </th>
        <td>
            <input id="gender" name="gender" type="radio"  value="female" <?php echo esc_attr($item['gender'])=='female'?'checked':''?>
                    required>Female
            <input id="gender" name="gender" type="radio"  value="male" <?php echo esc_attr($item['gender'])=='male'?'checked':''?>
                   required>Male
        </td>
    </tr>
    <tr class="form-field">
        <th valign="top" scope="row">
            <label for="doc"><?php _e('PDF', 'cltd_example')?></label>
        </th>
        <td>
            <input  id="doc" name="doc" type="file" accept="application/pdf" style="width: 95%;color: transparent;"><span class="PdfFile"><?php echo basename($item['data'])?></span> 
        </td>
    </tr>
    <tr class="form-field">
        <th valign="top" scope="row">
            <label for="year"><?php _e('DOB', 'cltd_example')?></label>
        </th>
        <td>
            <input id="year" name="year" type="date" style="width: 95%" value="<?php echo esc_attr($item['DOB'])?>"
                  required>
        </td>
    </tr>
    <tr class="form-field">
        <th valign="top" scope="row">
            <label for="qualification"><?php _e('Qualification', 'cltd_example')?></label>
        </th>
        <td>
            <input type="checkbox" name="qual[]" value="ssc" <?php if($item['qualification']=='ssc'){echo 'checked';}?> id="val_ssc" >SSC
            <input type="checkbox"  name="qual[]" value="hsc" <?php if($item['qualification']=='hsc'){echo 'checked';}?> id="val_ssc" >HSC
            <input type="checkbox" name="qual[]" value="graduate" <?php if($item['qualification']=='graduate'){echo 'checked';}?> id="val_ssc">Graduate
       </td>
    </tr>
    </tbody>
</table>
</body>
</html>	
	
	<!-- <div id="success_msg">User Added succesfully!</div> -->
	<!-- <div class="container">
		<div class="row main">
			<div class="main-login main-center">
				<h2>Registeration Form </h2>
				<form id="flex-item" method="POST" action="" enctype="multipart/form-data">
					
					
					<div class="form-group">
						<label for="user_id" class="cols-sm-2 control-label">User Id</label>
						<div class="cols-sm-10">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
								<input type="text" class="form-control" name="user_id" id="user_id"  placeholder="Enter your Name"/>
							</div>
						</div>
					</div>
					
					<div class="form-group">
						<div class="col-md-9 col-md-offset-3">
							<div id="messages"></div>
						</div>
					</div>
					<div class="form-group">
						<label for="name" class="cols-sm-2 control-label">Your Name</label>
						<div class="cols-sm-10">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
								<input type="text" class="form-control" name="name" id="name"  placeholder="Enter your Name"/>
							</div>
						</div>
					</div>     
					<div class="form-group">
						<div class="col-md-9 col-md-offset-3">
							<div id="messages"></div>
						</div>
					</div>
					<div class="form-group">
						<label for="email" class="cols-sm-2 control-label">Your Email</label>
						<div class="cols-sm-10">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
								<input type="text" class="form-control" name="email" id="email"  placeholder="Enter your Email"/>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-9 col-md-offset-3">
							<div id="messages"></div>
						</div>
					</div>
					<div class="form-group">
					<label for="password" class="cols-sm-2 control-label">Password</label>
					<div class="cols-sm-10">
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
							<input type="password" class="form-control" name="user_password" id="password"  placeholder="Enter your Password"/>
						</div>
					</div>
					</div>				
					<div class="form-group">
						<div class="col-md-9 col-md-offset-3">
							<div id="messages"></div>
						</div>
					</div>
					<div class="form-group">
						<label for="confirm" class="cols-sm-2 control-label">Confirm Password</label>
						<div class="cols-sm-10">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
								<input type="password" class="form-control" name="confirm_password" id="confirm"  placeholder="Confirm your Password"/>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-9 col-md-offset-3">
							<div id="messages"></div>
						</div>
					</div>
					<div class="form-group">
						<label for="comm" class="cols-sm-2 control-label">Description:</label>
						<div class="cols-sm-10">
							<div class="input-group">
								
								<textarea name="comment" rows="5" cols="40" id ="comm" class="form-control" ></textarea>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-9 col-md-offset-3">
							<div id="messages"></div>
						</div>
					</div>
					<div class="form-group">
						<label  class="cols-sm-2 control-label">Gender</label>
							<div class="cols-sm-10">
							<div class="input-group">
								<label class = "label_checkbox" for="male"><input type="radio" name="gender" value="male" id = "male" >Male </label>
								<label class = "label_checkbox" for="female"><input type="radio" name="gender" value="female" id = "female" >Female</label> 
							</div>
						</div>
					</div>	
					<div class="form-group">
						<div class="col-md-9 col-md-offset-3">
							<div id="messages"></div>
						</div>
					</div>		
					<div class="form-group">
						<label  class="cols-sm-2 control-label">Qualification</label>
						<div class="cols-sm-10">
							<div class="input-group">
								<label class = "label_checkbox "><input type="checkbox" name="qual[]" value="ssc" id="val_ssc" class = "one_required">SSC<br></label> 
								<label class = "label_checkbox"><input type="checkbox" name="qual[]" value="hsc" id="val_hsc" class = "one_required">HSC<br></label>
								<label class = "label_checkbox"><input type="checkbox" name="qual[]" value="graduate" id="val_grad" class = "one_required " >GRADUATE</label> 
							</div>
						</div> 
					</div> 
					<div class="form-group"> 
						<div class="col-md-9 col-md-offset-3">  
							<div id="messages"></div>
						</div>  
					</div>  
					<label class="cols-sm-2 control-label"><h3>Security Questions:</h3></label>  
					<div class="form-group">    
						<label  for="first_q" class="cols-sm-2 control-label" id="first_q">who is your favourite sports player?</label>         
						<div class="cols-sm-10">      
							<div class="input-group">
								<input type="text" class="form-control" name="security_player" id="first_q" />
							</div>
						</div>
					</div> 
					<div class="form-group">
						<div class="col-md-9 col-md-offset-3">  
							<div id="messages"></div>
						</div>  
					</div>   
					<div class="form-group"> 
						<label for="second_q" class="cols-sm-2 control-label">what is your best friendname?</label> 
						<div class="cols-sm-10"> 
							<div class="input-group">
								<input type="text" class="form-control" name="security_friend" id="second_q" />
							</div>
						</div>  
					</div>
					<div class="form-group">     
						<div class="col-md-9 col-md-offset-3">
							<div id="messages">
							</div>        
						</div>   
					</div>
					<div class="form-group">  
						<label for="dob" class="cols-sm-2 control-label">BirthDate:</label> 
						<div class="cols-sm-10">
							<div class="input-group date" >
			                    <input type='date' class="form-control date-picker" name="year"/>
                				<span class="input-group-addon">
			                	</span>
                			</div>
						</div>
					</div>
			        <div class="form-group">
			        <label for="dob" class="cols-sm-2 control-label">upload profile pic:</label>
			        <div class="cols-sm-10">
							<div class="input-group">
			        <input type="file" name="image">
					</div>
				</div>
					</div>
					<div class="form-group">  
						<div class="col-md-9 col-md-offset-3">
						<div id="messages"></div>
						</div>
					</div>
					<div class="form-group">
						<div class="cols-sm-10">
							<label><input type="submit" value="submit" name="submit" id="contact_form" class="btn btn-success"></label>
							<label><button id="Reset" type="reset" value="RESET" onclick="alert('values has been reset')" id="set" class="btn btn-primary">Reset</button></label>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>	 
</body>
</html>	 -->

				


					  
					
					         
					
						
				                    
					
                			
							
						
							
					<!--  <div class="form-group">
							
						<img id="captcha_code" src="php/captcha.php" />
						<button type="button" class="glyphicon glyphicon-refresh" style="color: red;" id="refresh" "></button>
					</div>
					<div class="form-group">
						<label for="captcha" class="cols-sm-2 control-label">enter the same value:</label>
						<div class="cols-sm-10">
							<div class="input-group">    	
								<div class="captch_img">
									<input type="text" name="captcha" class="form-control" id="captcha"/>
								</div>
							</div>
						</div>
					</div> . -->
	<!-- <div class="aro-pswd_info">
		<div id="pswd_info">
			<h4>Password must be requirements</h4>
			<ul>
				<li id="letter" class="invalid">At least <strong>one letter</strong></li>
				<li id="capital" class="invalid">At least <strong>one capital letter</strong></li>
				<li id="number" class="invalid">At least <strong>one number</strong></li>
				<li id="length" class="invalid">Be at least <strong>8 characters</strong></li>
				<li id="space" class="invalid">be<strong> use [~,!,@,#,$,%,^,&,*,-,=,.,;,']</strong></li>
			</ul>
		</div>
	</div> -->

					
							
	
							
						
								


		


	
		
		
	
	
		
		
		
	
	