<?php
    require('mainlistc.php');
    include('editheader.php');
    $funObj = new dbfunction();
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $UpdatedStatus =  $funObj->update_list($_POST);
    }
    $user_no = isset($_GET['id']) ? $_GET['id'] : '';
    $_SESSION['user_id'] =  $user_no;
    if(isset($user_no))  
    {
        $value = $funObj->editValue($user_no);
        for($i=0;$row =$value->fetch();$i++)
        {
          $qualification =$row['qualification'];
          $list_lang=explode(",", $qualification);
          $user_edit = array($row['user_id'],$row['name'],$row['gender'],$row['email'],$row['description'],$row['DOB'],$row['image'],$list_lang);
        }
    }
    ?>
    <body>
        <p><span class="error">* required field.</span></p>
        <?php if (isset($UpdatedStatus) && $UpdatedStatus == 1) { ?>            
        <div id="successMessage" class="error"> value updated successfully! </div>
        <?php } ?>
      
    
        <div class="container">
            <div class="row main">
                <div class="main-login main-center">
                    <form  id="val_item" action="" name="form1" method="POST">
                   <div class="profile-header-container">   
                        <div class="profile-header-img">
                            <img class="img-circle" src="<?php echo $user_edit['6'];?>" />
                            <div class="rank-label-container">
                                <span class="label label-default rank-label"><?php echo $user_edit[1]?></span>
                            </div>
                        </div>
                    </div>             
                    <input type="hidden"  name="user_id" value="<?php echo $user_edit[0];  ?>" ">
                    <div class="form-group">
                        <label for="name" class="cols-sm-2 control-label">Your Name</label>
                        <div class="cols-sm-10">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                <input type="text" name="name" class="form-control" value="<?php echo $user_edit[1]; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-9 col-md-offset-3">
                            <div id="messages"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="cols-sm-2 control-label">Email:</label>
                        <div class="cols-sm-10">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                <input type="text" name="email" class="form-control" value="<?php echo $user_edit[3] ;?>">
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
                                <textarea name="comment" rows="5" cols="40" class="form-control" ><?php echo $user_edit[4];?></textarea>
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
                                    <label><input type="radio" name="gender" value="female" id = "female" <?php echo  $user_edit[2]=='female'?'checked':''; ?>>female</label>
                                    <label><input type="radio" name="gender" value="male" id = "male" <?php echo  $user_edit[2]=='male'?'checked':''; ?>>Male</label>
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
                                <label class="label_checkbox"><input type="checkbox" name="qual[]" value="ssc" id="val_ssc" 
                                <?php echo in_array('ssc',$user_edit[7]) ? 'checked' : ''; ?>>SSC</label><br>
                                <label class="label_checkbox"><input type="checkbox" name="qual[]" value="hsc" id="val_hsc" 
                                <?php echo in_array('hsc',$user_edit[7]) ? 'checked' : ''; ?>>HSC</label><br>
                                <label class="label_checkbox"><input type="checkbox" name="qual[]" value="graduate" id="val_grad" <?php echo in_array('graduate',$user_edit[7]) ? 'checked' : ''; ?>>GRADUATE</label><br>
                            </div>
                        </div>
                    </div>        
                    <div class="form-group">
                        <div class="col-md-9 col-md-offset-3">
                            <div id="messages"></div>
                        </div>
                    </div>
                    <div class="form-group">  
                        <label for="year" class="cols-sm-2 control-label">BirthDate:</label> 
                        <div class="cols-sm-10">
                            <div class="input-group date" >
                                <input type='text' class="form-control date-picker" name="year" value="<?php echo $user_edit[5] ;?>" />
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar">
                                    </span>
                                </span>
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
                            <button type="reset"   value="RESET" onclick="alert('values has been reset')" class="btn btn-primary">Reset</button>
                            <input type="submit"  name="submit" value="Submit" class="btn btn-success" > 
                            <?php
                            echo "<button type=\"button\" name=\"back\" value=\"back\"  onclick=\"location.href='details.php?key=".$_SESSION['user_id']."';\" class=\"btn btn-primary\">Back</button>";
                            ?>
                        </div>
                    </div>
            </form>
        </div>
    </div>
</div>    
    </body>
</html>
                    
                            
                   
                           
                       
                    
   
                    

             


                    
                   
 