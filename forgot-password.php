<?php 
include "dbconnection.php";

    if(isset($_POST['forgotpassword_submit'])){

        $secret_question = mysqli_real_escape_string($connected,$_POST['secret_question']);
        $secret_answer = mysqli_real_escape_string($connected,$_POST['secret_answer']);
        $email = mysqli_real_escape_string($connected,$_POST['email']);
        

        if(empty($secret_question) || empty($secret_answer) || empty($email)){
            header("Location: forgot-password.php?error=empty fields");
            exit();
        }
        else{
            $check_email = "SELECT email FROM user_cryptobinge WHERE email='$email'";
            $query_check_email = mysqli_query($connected,$check_email);
            if(mysqli_num_rows($query_check_email) > 0){
                $sql = "SELECT secret_question,secret_answer FROM user_cryptobinge WHERE email='$email'";
                $query_sql = mysqli_query($connected,$sql);
                while($rw = mysqli_fetch_assoc($query_sql)){
                    $secret_ques = $rw['secret_question'];
                    $secret_ans = $rw['secret_answer'];
                }
                if(($secret_question) != ($secret_ques)){
                    header("Location: forgot-password.php?error= Secret question provided is incorrect");
                    exit();
                }
                if(($secret_answer) != ($secret_ans)){
                    header("Location: forgot-password.php?error= Secret answer provided is incorrect");
                    exit();
                }
                if((($secret_answer) == ($secret_ans)) && (($secret_answer) == ($secret_ans))){
                    
                     $keyLenght = 8;
                    $str = "1234567890abcdefghijklmnopqrstuvwxyz()$";
                    $resetvk = substr(str_shuffle($str),0,$keyLenght);
                    
                    
                    $updateUser = "UPDATE user_cryptobinge SET resetpass='1', resetvkey='$resetvk' WHERE email='$email'";
                    $queryUpdateUser = mysqli_query($connected, $updateUser);
                    if($queryUpdateUser){
                        //Email messaging sent here
                    // require 'phpmailer/PHPMailerAutoload.php';
                    //         $mail = new PHPMailer;
                            
                    //         // $mail->isSMTP();
                    //         $mail->Host = 'smtp.gmail.com';
                    //         $mail->Port = 587;
                    //         $mail->SMTPAuth = true;
                    //         $mail->SMTPSecure = 'tls';
                            
                    //         $mail->Username = 'support@zenithtradermarkets.com';
                    //         $mail->Password = 'ziC2J*m6yj){';
                            
                    //         $mail->setFrom('support@zenithtradermarkets.com','Zenithtradermarkets');
                    //         $mail->addAddress($email);
                    //         $mail->addReplyTo('support@zenithtradermarkets.com');
                            
                    //         $mail->isHTML(true);
                    //         $mail->Subject = 'Password Reset';
                    //         $mail->Body = "<h1 align=center>Reset Password</h1><br><h4 align=center><br>Please click <a href='https://www.zenithtradermarkets.com/reset-password.php?resetvkey=$resetvk&email=$email'>here</a> to reset your account password</h4>";
                            
                            
                                   $to = "$email";
                                    $subject = "Reset Password";
                                    
                                    $message = "
                                        <html>
                                            <head>
                                                <title>Password Reset</title>
                                            </head>
                                            <body style='background:#ececec; color:black; padding:0 10px;'>
                                                <h1 style='text-align:center;background:blue; margin-top:0;margin-bottom:10px;'>Password Reset</h1>
                                                <p>Hello, Dear<p>
                                                <p>Your request to reset your was received, please click on the button below to reset your password<p>
                                                <p style='margin-bottom:10px;'>Thanks ..<p>
                                                <a href='https://www.zenithtradermarkets.com/reset-password.php?resetvkey=$resetvk&email=$email' style='background:black;color:white;border-radius:5px; padding:10px; width:70%;margin:auto;'>RESET PASSWORD</a>
                                                <p>Regards, Zenithtradermarkets.com</p>
                                            </body>
                                        </html>
                                    ";
                                    
                                    // Always set content-type when sending HTML email
                                    $headers = "MIME-Version: 1.0" . "\r\n";
                                    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                                    
                                    // More headers
                                    $headers .= 'From: <support@zenithtradermarkets.com>' . "\r\n";
                                    $headers .= 'Cc: jerry.ogum@gmail.com' . "\r\n";
                                    
                                    mail($to,$subject,$message,$headers);
                                    
                            // if(!$mail->send()){
                            //     $_SESSION['regSuccess'] = "Problem encountered while trying to send mail.";
                            // }
                            if(!mail){
                                $_SESSION['regSuccess'] = "Problem encountered while trying to send mail.";
                            }
                            else{
                                 header("Location: forgot-password.php?success= A password reset link has been sent to your mail.");
                                exit();
                            }
                    }
                }
            }
            else {
                header("Location: forgot-password.php?error=Email do not exist please enter the email address used during registration");
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
                            <h2 class="text-white text-uppercase">Password Reset </h2>
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
                        <label for="secret_question">Secret Question</label>
                        <input type="text" class="form-control" name="secret_question" id="secret_question" placeholder="Enter secret question" required>
                    </div>
                    <div class="form-group">
                        <label for="secret_answer">Secret Answer</label>
                        <input type="text" class="form-control" name="secret_answer" id="secret_answer" placeholder="Enter secret answer" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Enter email" required>
                    </div>
                    <button type="submit" name="forgotpassword_submit" class="btn btn-primary">Proceed</button>
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