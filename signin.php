<?php 
session_start(); 
error_reporting(E_ALL^E_NOTICE);
    $db['db_host'] = "localhost";
    $db['db_user'] = "voeooraa_vckjdvnwjpdbh";
    $db['db_pass'] = "t}3zx(I6U8#g";
    $db['db_name'] = "voeooraa_gbsewfveggs";

    //The loop below makes the array elements contants
    foreach($db as $key => $value){
        define(strtoupper($key), $value);
    }
    $connected = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME); 
    if(!$connected){
        die("Connection to Database Failled ".mysqli_error($connected));
    }
            if(isset($_POST['login_submit'])){
                $email = mysqli_real_escape_string($connected,$_POST['email']);
                $password = mysqli_real_escape_string($connected,$_POST['password']);
        
                if($email == "" || $password == ""){
                    header("Location: signin.php?error=Please fill all fields correctly");
                    exit();
                }
                else{
                    $query = "SELECT * FROM user_cryptobinge WHERE email='$email' AND pass='$password'";
                    $result = mysqli_query($connected,$query);
                        if(mysqli_num_rows($result) > 0){
                            while($rw = mysqli_fetch_assoc($result)){
                                $verified = $rw['verified'];
                                $blocked = $rw['blocked'];
                                $deleted = $rw['deleted'];
                            }  
                            // if($verified == '0'){
                            //     header("Location: signin.php?error=Account is yet to be activated Please visit your mail to activate account");
                            //     exit();
                            // }
                            // else{
                                if(($blocked == '1') && ($deleted == '0')){
                                    header("Location: signin.php?error=Account has been suspended temporarily, please contact account manager");
                                    exit();
                                }
                                elseif(($blocked == '1') && ($deleted == '1')){
                                    header("Location: signin.php?error=Account do not exist");
                                    exit();
                                }
                                else {
                                    $_SESSION['user_email'] = $email;
                                    $_SESSION['user_password'] = $password;
                                    
                                     $upUser = "UPDATE user_cryptobinge SET online='1' WHERE email='$email' AND pass='$password'";
                                        $queryUpUser = mysqli_query($connected, $upUser);
                                        if($queryUpUser){
                                            header("Location: user/trading-account.php");
                                            exit();
                                        }
                                }
                            // }
                        }
                        else{
                            header("Location: signin.php?error=Record Do not exist Please enter correct credential");
                            exit();
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
                            <h2 class="text-white text-uppercase">Login </h2>
                            <small>Please fill in correctly your details below</small>
                        </span>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-3 col-xs-3">
                        <span class="" style="float:right">
                            <a href="index.php" class="text-white"><i class="fas fa-home fa-1x"></i>&nbsp; Home</a><br>
                            <a href="signup.php" class="text-white"><i class="fas fa-user-plus fa-1x"></i>&nbsp; Create an account</a>
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
                <form action="" method="post">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Enter email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="Enter password" required>
                    </div>
                    <button type="submit" name="login_submit" class="btn btn-sm btn-primary">Login</button>
                    <a href="signup.php" class="text-center ml-3 mr-3 mt-2">Create account</a>
                    <a href="forgot-password.php" class="text-center ml-3 mt-2">Forgot Password ?</a>
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