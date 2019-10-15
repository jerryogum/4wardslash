<?php 
include "dbconnection.php";
    if(isset($_GET['resetvkey'])){
        $resetvkey = $_GET['resetvkey'];
      
      $sql = "SELECT * FROM user_cryptobinge WHERE resetpass='1' AND resetvkey='$resetvkey'";
      $query_sql = mysqli_query($connected,$sql);
      if(mysqli_num_rows($query_sql) > 0 ){
          while($roww = mysqli_fetch_assoc($query_sql)){
            $uid = $roww['id'];
            $email = $roww['email'];
            header("Location: set-password.php?uid=".$uid."&email=".$email);
            exit();
          }
        }
    }
    else{
        die("Something went wrong"); 
    }

?>