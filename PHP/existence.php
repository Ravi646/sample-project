<?php
    include('mainlistc.php');
    $dbh = connect_db();
    if(isset($_POST['email'])) 
    {
        $email = $_POST['email'];
        $query = $dbh->prepare("SELECT email FROM list WHERE email =:email ");
        $query->bindParam (":email", $email, PDO::PARAM_STR);
        $query->execute();
        $total_rows = $query->rowCount();
        if( $total_rows > 0){
            $response = false;
        }else{
            $response = true;
        } 
         echo json_encode(array('valid' => $response));
    }
     if(isset($_POST['user_id'])) 
    {
        $user_id = $_POST['user_id'];
        $query = $dbh->prepare("SELECT user_id FROM list WHERE user_id =:user_id ");
        $query->bindParam (":user_id", $user_id, PDO::PARAM_STR);
        $query->execute();
        $total_rows = $query->rowCount();
        if( $total_rows > 0){
            $response = false;
        }else{
            $response = true;
        } 
         echo json_encode(array('valid' => $response));
    }
?>






            
           
        
       
        
    
       
      
  