<?php 
include 'dbconnection.php';
if(isset($_POST['pin_submit'])){


        $e_pin = mysqli_real_escape_string($connected,$_POST['e_pin']);
   
        
        if(isset($_SESSION['vemail'])){
            
            $email = $_SESSION['vemail'];
            
            $query_pin = "SELECT pin FROM user_cryptobinge WHERE email='$email'";
            $execute_query = mysqli_query($connected,$query_pin);
        
            while($row = mysqli_fetch_assoc($execute_query)){
                $confirmed_pin = $row['pin'];
            }
        
            if($confirmed_pin == $e_pin){
            $verified = 1;
            $updateUser = "UPDATE user_cryptobinge SET verified='$verified' WHERE email='$email' AND pin='$e_pin'";
            $queryUpdateUser = mysqli_query($connected, $updateUser);
                if($queryUpdateUser){
                    header("Location: activate-account.php?success= Account activation was successful, please proceed to Login");
                    exit();
                }
            }else{
                header("Location: activate-account.php?error= Pin incorrect");
                exit();
            }   
        }
    }