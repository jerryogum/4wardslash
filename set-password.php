<?php 
include "dbconnection.php";
    if(isset($_GET['uid']) && isset($_GET['email'])){
        $uid = $_GET['uid'];
        $_SESSION['uid_reset'] = $uid;
        $email = $_GET['email'];
        $_SESSION['email_reset'] = $email;
        
    }
    // else{
    //     die("Something went wrong"); 
    // }
    
    if(isset($_POST['newpassword_submit'])){

        $user_idn = $_SESSION['uid_reset'];
        $user_ema = $_SESSION['email_reset'];

        $new_password = mysqli_real_escape_string($connected,$_POST['new_password']);
        $confirm_new_password = mysqli_real_escape_string($connected,$_POST['confirm_new_password']);
        
        if(empty($new_password) || empty($confirm_new_password)){
            header("Location: set-password.php?error=Please ensure all fields are filled");
            exit();
        }
        else{
            if($new_password != $confirm_new_password){
                header("Location: set-password.php?error=Password do not match");
                exit();
            }
            else{
                $updateUser = "UPDATE user_cryptobinge SET pass='$new_password' WHERE id='$user_idn' AND email='$user_ema'";
                $queryUpdateUser = mysqli_query($connected, $updateUser);
                if($queryUpdateUser){
                    $updUser = "UPDATE user_cryptobinge SET resetpass='0' WHERE email='$email'";
                    $queryUpdUser = mysqli_query($connected, $updUser);
                    if($queryUpdUser){
                        header("Location: set-password.php?success= Password reset was successful. Please return to login");
                        exit();
                    }
                }
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Zenith-Trader.Markets.com</title>
    <!-- stylesheets -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> -->
    <!-- <link rel="stylesheet" href="assets/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link rel="stylesheet" href="assets/css/all.min.css">
    <link rel="stylesheet" href="assets/css/ionicons.min.css">
    <!-- <link rel="stylesheet" href="assets/css/owl-carousel.min.css"> -->
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="assets/css/roundslider.min.css">
    <link rel="stylesheet" href="assets/css/owl-transitions.min.css">
    <link rel="stylesheet" href="assets/css/owl-lightbox.min.css">
    <link rel="stylesheet" href="assets/css/style-new.css">
    <link href="assets/css/style.css" rel="stylesheet" type="text/css" media="screen"/>
    <!-- <link href="assets/css/custom.css" rel="stylesheet" type="text/css" media="screen"/> -->
    <link href="https://fonts.googleapis.com/css?family=Dancing+Script:400,700|Pacifico|Righteous|Satisfy&display=swap" rel="stylesheet">  
    <link href="https://fonts.googleapis.com/css?family=Crimson+Pro|Libre+Baskerville&display=swap" rel="stylesheet">
</head>
<body>
<div class="form-holder pt-5">
    <div class="container">
        <div class="form-container">
            <div class="form-container-header p-3">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-9 col-xs-9">
                        <span class="" style="float:left">
                            <h2 class="text-white text-uppercase">Set Password</h2>
                            <small>Please fill in correctly your details below</small>
                        </span>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-3 col-xs-3">
                        <span class="" style="float:right">
                            <a href="index.php" class="text-white"><i class="fas fa-home fa-1x"></i>&nbsp; Home</a><br>
                            <a href="signin.php" class="text-white"><i class="fas fa-sign-in-alt fa-1x"></i>&nbsp; Return to Login</a>
                        </span>
                    </div>
                </div>
            </div>
            <div class="form-carrier">
                <?php if(isset($_GET['error'])) : ?>
                    <div class="form-message p-2 bg-danger text-white text-center mb-2" style="border-radius:5px">
                        <?php echo $_GET['error']; ?>
                    </div>
                <?php endif;?>
                <?php if(isset($_GET['success'])) : ?>
                    <div class="form-message p-2 bg-success text-white text-center mb-2" style="border-radius:5px">
                        <?php echo $_GET['success']; ?>
                    </div>
                <?php endif;?>
                <form action="" method="post">
                    <div class="form-group">
                        <label for="new_password">New password</label>
                        <input type="password" class="form-control" name="new_password" id="new_password" placeholder="Enter new password" required>
                    </div>
                    <div class="form-group">
                        <label for="confirm_new_password">Confirm new password</label>
                        <input type="password" class="form-control" name="confirm_new_password" id="confirm_new_password" placeholder="Enter new password" required>
                    </div>
                    <button type="submit" name="newpassword_submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>
<a href="#" class="back-to-top"><i class="fa fa-chevron-up iii"></i></a>
  
    <!-- <div id="preloader"></div> -->

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/all.min.js"></script>
    <script src="assets/js/jquery-migrate.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/easing.min.js"></script>
    <script src="assets/js/mobile-nav.js"></script>
    <script src="assets/js/wow.min.js"></script>
    <script src="assets/js/waypoints.min.js"></script>
    <script src="assets/js/counterup.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/isotope.pkgd.min.js"></script>
    <script src="assets/js/lightbox.min.js"></script>
    <script src="assets/js/smooth-scroll.js"></script>
    <!-- Template Main Javascript File -->
    <script src="assets/js/main.js"></script>
    <?php include "inc/inc.modal.php";?>
    <script>
        var scroll = new SmoothScroll('a[href*="#"]');
    </script>
</body>
</html>