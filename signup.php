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

    if(isset($_POST['register_submit'])){

        $firstname = mysqli_real_escape_string($connected,$_POST['firstname']);
        $lastname = mysqli_real_escape_string($connected,$_POST['lastname']);
        $sex = mysqli_real_escape_string($connected,$_POST['sex']);
        $email = mysqli_real_escape_string($connected,$_POST['email']);
        $country = mysqli_real_escape_string($connected,$_POST['country']);
        
        $password = mysqli_real_escape_string($connected,$_POST['password']);
        $confirm_password = mysqli_real_escape_string($connected,$_POST['confirm_password']);
        $secret_question = mysqli_real_escape_string($connected,$_POST['secret_question']);
        $secret_answer = mysqli_real_escape_string($connected,$_POST['secret_answer']);
        $phone = mysqli_real_escape_string($connected,$_POST['phone']);
        
        $keyLenght = 6;
        $str = "1234567890";
        $pin = substr(str_shuffle($str),0,$keyLenght);
        

        if(empty($firstname) || empty($lastname) || empty($sex) || empty($country) || empty($secret_question)  || empty($secret_answer) || empty($phone)  || empty($email) || empty($password) || empty($confirm_password)){
            header("Location: signup.php?error=empty fields&username=".$username."&email=".$email."&firstname=".$lastname."&firstname=".$lasttname);
            exit();
        }
        else if(!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/",$username)){
            header("Location: signup.php?error=Invalid email and username");
            exit();
        }
        else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            header("Location: signup.php?error=Invalid email &username=".$username);
            exit();
        }
        else if(!preg_match("/^[a-zA-Z0-9]*$/",$username)){
            header("Location: signup.php?error=Invalid Username &email=".$email);
            exit();
        }
        else if($password !== $confirm_password){
            header("Location: signup.php?error=Password do not match&email=".$email."&username=".$username);
            exit();
        }
        else{
                $queryCheckUser = "SELECT * FROM user_cryptobinge WHERE email='$email'";
                $resultCheckUser = mysqli_query($connected, $queryCheckUser);
                if(mysqli_num_rows($resultCheckUser) > 0){
                    header("Location: signup.php?error=Email already taken &username=".$username);
                    exit();
                }
                else{
                    // $target = "images/".basename($_FILES['image']['name']);   
                    // $image = $_FILES['image']['name'];
                    $sql2 = "INSERT INTO user_cryptobinge (firstname,lastname,sex,email,country,pass,secret_question,secret_answer,phone,pin) VALUES ('$firstname','$lastname','$sex','$email','$country','$password','$secret_question','$secret_answer','$phone','$pin')";
                    // $query = "INSERT INTO user_cryptobinge (gender,username,email,phone,pass,country,valid_id) VALUES('$gender','$username','$email','$phone','$password','$country','$image')";

                    // move_uploaded_file($_FILES['image']['tmp_name'],$target);
                    $result = mysqli_query($connected,$sql2);
                    if($result){
                        // require 'phpmailer/PHPMailerAutoload.php';
                        //     $mail = new PHPMailer;
                            
                        //     // $mail->isSMTP();
                        //     $mail->Host = 'smtp.gmail.com';
                        //     $mail->Port = 587;
                        //     $mail->SMTPAuth = true;
                        //     $mail->SMTPSecure = 'tls';
                            
                        //     $mail->Username = 'support@zenithtradermarkets.com';
                        //     $mail->Password = 'ziC2J*m6yj){';
                            
                        //     $mail->setFrom('support@zenithtradermarkets.com','Zenithtradermarkets');
                        //     $mail->addAddress($email);
                        //     $mail->addReplyTo('support@zenithtradermarkets.com');
                            
                        //     $mail->isHTML(true);
                        //     $mail->Subject = 'Email Verification';
                        //     $mail->Body = "<h1 align=center>Account Activation</h1><br><h4 align=center>Copy this PIN: <br>$pin <br>Please click <a href='https://www.zenithtradermarkets.com/activate-account.php?pin=$pin&email=$email'>here</a> to activate your account</h4>";
                                
                                // $to = "$email";
                                // $subject = "Account Activation";
                                // $txt = "verify";
                                // $headers = "From: zenithtradermarkets.com" . "\r\n" .
                                // "CC: zenithtradermarkets";
                                
                                // mail($to,$subject,$txt,$headers);
                                // if(mail){
                                //     header("Location: signup.php?success=Registration was successfully. Please copy the 6-DIGIT-PIN sent to your mail and click the ACTIVATE link to complete registration");
                                //  exit();
                                // }
                               
                            // if(!$mail->send()){
                            //     $_SESSION['regSuccess'] = "Problem encountered while trying to send mail.";
                            // }
                            // if(!$mail->send()){
                            //     $_SESSION['regSuccess'] = "Problem encountered while trying to send mail.";
                            // }
                            // else{
                                // header("Location: signup.php?success=Registration was successfully. Please copy the 6-DIGIT-PIN sent to your mail and click the ACTIVATE link to complete registration");
                                // exit();
                                header("Location: signup.php?success=Registration was successfully. Please proceed to login");
                                exit();
                            // }
                    }
                    if(!$result){
                        header("Location: signup.php?error=Registration was unsuccessful");
                        exit();
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
                            <h2 class="text-white text-uppercase">Registration</h2>
                            <small>Please fill in correctly your details below</small>
                        </span>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-3 col-xs-3">
                        <span class="" style="float:right">
                            <a href="index.php" class="text-white"><i class="fas fa-home fa-1x"></i>&nbsp; Home</a><br>
                            <a href="signin.php" class="text-white"><i class="fas fa-sign-in-alt fa-1x"></i>&nbsp; Login</a>
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
                        <label for="firstname">Firstname</label>
                        <input type="text" class="form-control" name="firstname" id="firstname" placeholder="Enter firstname" required>
                    </div>
                    <div class="form-group">
                        <label for="lastname">Lastname</label>
                        <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Enter lastname" required>
                    </div>
                    <div class="form-group">
                        <label for="sex">Sex</label>
                        <select class="form-control" name="sex" id="sex">
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Enter email" required>
                    </div>
                    <div class="form-group">
                        <label for="country">Country</label>
                        <select class="form-control" name="country" required >
                            <option value="">-- Please select Country --</option>
                            <option value="Afghanistan">Afghanistan</option>
                            <option value="Aland Islands (Finland)">Aland Islands (Finland)</option>
                            <option value="Albania">Albania</option>
                            <option value="Algeria">Algeria</option>
                            <option value="American Samoa (USA)">American Samoa (USA)</option>
                            <option value="Andorra">Andorra</option>
                            <option value="Angola">Angola</option>
                            <option value="Anguilla (UK)">Anguilla (UK)</option>
                            <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                            <option value="Argentina">Argentina</option>
                            <option value="Armenia">Armenia</option>
                            <option value="Aruba (Netherlands)">Aruba (Netherlands)</option>
                            <option value="Australia">Australia</option>
                            <option value="Austria">Austria</option>
                            <option value="Azerbaijan">Azerbaijan</option>
                            <option value="Bahamas">Bahamas</option>
                            <option value="Bahrain">Bahrain</option>
                            <option value="Bangladesh">Bangladesh</option>
                            <option value="Barbados">Barbados</option>
                            <option value="Belarus">Belarus</option>
                            <option value="Belgium">Belgium</option>
                            <option value="Belize">Belize</option>
                            <option value="Benin">Benin</option>
                            <option value="Bermuda (UK)">Bermuda (UK)</option>
                            <option value="Bhutan">Bhutan</option>
                            <option value="Bolivia">Bolivia</option>
                            <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                            <option value="Botswana">Botswana</option>
                            <option value="Brazil">Brazil</option>
                            <option value="British Virgin Islands (UK)">British Virgin Islands (UK)</option>
                            <option value="Brunei">Brunei</option>
                            <option value="Bulgaria">Bulgaria</option>
                            <option value="Burkina Faso">Burkina Faso</option>
                            <option value="Burma">Burma</option>
                            <option value="Burundi">Burundi</option>
                            <option value="Cambodia">Cambodia</option>
                            <option value="Cameroon">Cameroon</option>
                            <option value="Canada">Canada</option>
                            <option value="Cape Verde">Cape Verde</option>
                            <option value="Caribbean Netherlands (Netherlands)">Caribbean Netherlands (Netherlands)</option>
                            <option value="Cayman Islands (UK)">Cayman Islands (UK)</option>
                            <option value="Central African Republic">Central African Republic</option>
                            <option value="Chad">Chad</option>
                            <option value="Chile">Chile</option>
                            <option value="China">China</option>
                            <option value="Christmas Island (Australia)">Christmas Island (Australia)</option>
                            <option value="Cocos (Keeling) Islands (Australia)">Cocos (Keeling) Islands (Australia)</option>
                            <option value="Colombia">Colombia</option>
                            <option value="Comoros">Comoros</option>
                            <option value="Cook Islands (NZ)">Cook Islands (NZ)</option>
                            <option value="Costa Rica">Costa Rica</option>
                            <option value="Croatia">Croatia</option>
                            <option value="Cuba">Cuba</option>
                            <option value="Curacao (Netherlands)">Curacao (Netherlands)</option>
                            <option value="Cyprus">Cyprus</option>
                            <option value="Czech Republic">Czech Republic</option>
                            <option value="Democratic Republic of the Congo">Democratic Republic of the Congo</option>
                            <option value="Denmark">Denmark</option>
                            <option value="Djibouti">Djibouti</option>
                            <option value="Dominica">Dominica</option>
                            <option value="Dominican Republic">Dominican Republic</option>
                            <option value="Ecuador">Ecuador</option>
                            <option value="Egypt">Egypt</option>
                            <option value="El Salvador">El Salvador</option>
                            <option value="Equatorial Guinea">Equatorial Guinea</option>
                            <option value="Eritrea">Eritrea</option>
                            <option value="Estonia">Estonia</option>
                            <option value="Ethiopia">Ethiopia</option>
                            <option value="Falkland Islands (UK)">Falkland Islands (UK)</option>
                            <option value="Faroe Islands (Denmark)">Faroe Islands (Denmark)</option>
                            <option value="Federated States of Micronesia">Federated States of Micronesia</option>
                            <option value="Fiji">Fiji</option>
                            <option value="Finland">Finland</option>
                            <option value="France">France</option>
                            <option value="French Guiana (France)">French Guiana (France)</option>
                            <option value="French Polynesia (France)">French Polynesia (France)</option>
                            <option value="Gabon">Gabon</option>
                            <option value="Gambia">Gambia</option>
                            <option value="Georgia">Georgia</option>
                            <option value="Germany">Germany</option>
                            <option value="Ghana">Ghana</option>
                            <option value="Gibraltar (UK)">Gibraltar (UK)</option>
                            <option value="Greece">Greece</option>
                            <option value="Greenland (Denmark)">Greenland (Denmark)</option>
                            <option value="Grenada">Grenada</option>
                            <option value="Guadeloupe (France)">Guadeloupe (France)</option>
                            <option value="Guam (USA)">Guam (USA)</option>
                            <option value="Guatemala">Guatemala</option>
                            <option value="Guernsey (UK)">Guernsey (UK)</option>
                            <option value="Guinea">Guinea</option>
                            <option value="Guinea-Bissau">Guinea-Bissau</option>
                            <option value="Guyana">Guyana</option>
                            <option value="Haiti">Haiti</option>
                            <option value="Honduras">Honduras</option>
                            <option value="Hong Kong (China)">Hong Kong (China)</option>
                            <option value="Hungary">Hungary</option>
                            <option value="Iceland">Iceland</option>
                            <option value="India">India</option>
                            <option value="Indonesia">Indonesia</option>
                            <option value="Iran">Iran</option>
                            <option value="Iraq">Iraq</option>
                            <option value="Ireland">Ireland</option>
                            <option value="Isle of Man (UK)">Isle of Man (UK)</option>
                            <option value="Israel">Israel</option>
                            <option value="Italy">Italy</option>
                            <option value="Ivory Coast">Ivory Coast</option>
                            <option value="Jamaica">Jamaica</option>
                            <option value="Japan">Japan</option>
                            <option value="Jersey (UK)">Jersey (UK)</option>
                            <option value="Jordan">Jordan</option>
                            <option value="Kazakhstan">Kazakhstan</option>
                            <option value="Kenya">Kenya</option>
                            <option value="Kiribati">Kiribati</option>
                            <option value="Kosovo">Kosovo</option>
                            <option value="Kuwait">Kuwait</option>
                            <option value="Kyrgyzstan">Kyrgyzstan</option>
                            <option value="Laos">Laos</option>
                            <option value="Latvia">Latvia</option>
                            <option value="Lebanon">Lebanon</option>
                            <option value="Lesotho">Lesotho</option>
                            <option value="Liberia">Liberia</option>
                            <option value="Libya">Libya</option>
                            <option value="Liechtenstein">Liechtenstein</option>
                            <option value="Lithuania">Lithuania</option>
                            <option value="Luxembourg">Luxembourg</option>
                            <option value="Macau (China)">Macau (China)</option>
                            <option value="Macedonia">Macedonia</option>
                            <option value="Madagascar">Madagascar</option>
                            <option value="Malawi">Malawi</option>
                            <option value="Malaysia">Malaysia</option>
                            <option value="Maldives">Maldives</option>
                            <option value="Mali">Mali</option>
                            <option value="Malta">Malta</option>
                            <option value="Marshall Islands">Marshall Islands</option>
                            <option value="Martinique (France)">Martinique (France)</option>
                            <option value="Mauritania">Mauritania</option>
                            <option value="Mauritius">Mauritius</option>
                            <option value="Mayotte (France)">Mayotte (France)</option>
                            <option value="Mexico">Mexico</option>
                            <option value="Moldov">Moldov</option>
                            <option value="Monaco">Monaco</option>
                            <option value="Mongolia">Mongolia</option>
                            <option value="Montenegro">Montenegro</option>
                            <option value="Montserrat (UK)">Montserrat (UK)</option>
                            <option value="Morocco">Morocco</option>
                            <option value="Mozambique">Mozambique</option>
                            <option value="Namibia">Namibia</option>
                            <option value="Nauru">Nauru</option>
                            <option value="Nepal">Nepal</option>
                            <option value="Netherlands">Netherlands</option>
                            <option value="New Caledonia (France)">New Caledonia (France)</option>
                            <option value="New Zealand">New Zealand</option>
                            <option value="Nicaragua">Nicaragua</option>
                            <option value="Niger">Niger</option>
                            <option value="Nigeria">Nigeria</option>
                            <option value="Niue (NZ)">Niue (NZ)</option>
                            <option value="Norfolk Island (Australia)">Norfolk Island (Australia)</option>
                            <option value="North Korea">North Korea</option>
                            <option value="Northern Mariana Islands (USA)">Northern Mariana Islands (USA)</option>
                            <option value="Norway">Norway</option>
                            <option value="Oman">Oman</option>
                            <option value="Pakistan">Pakistan</option>
                            <option value="Palau">Palau</option>
                            <option value="Palestine">Palestine</option>
                            <option value="Panama">Panama</option>
                            <option value="Papua New Guinea">Papua New Guinea</option>
                            <option value="Paraguay">Paraguay</option>
                            <option value="Peru">Peru</option>
                            <option value="Philippines">Philippines</option>
                            <option value="Pitcairn Islands (UK)">Pitcairn Islands (UK)</option>
                            <option value="Poland">Poland</option>
                            <option value="Portugal">Portugal</option>
                            <option value="Puerto Rico">Puerto Rico</option>
                            <option value="Qatar">Qatar</option>
                            <option value="Republic of the Congo">Republic of the Congo</option>
                            <option value="Reunion (France)">Reunion (France)</option>
                            <option value="Romania">Romania</option>
                            <option value="Russia">Russia</option>
                            <option value="Rwanda">Rwanda</option>
                            <option value="Saint Barthelemy (France)">Saint Barthelemy (France)</option>
                            <option value="Saint Helena, Ascension and Tristan da Cunha (UK)">Saint Helena, Ascension and Tristan da Cunha (UK)</option>
                            <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                            <option value="Saint Lucia">Saint Lucia</option>
                            <option value="Saint Martin (France)">Saint Martin (France)</option>
                            <option value="Saint Pierre and Miquelon (France)">Saint Pierre and Miquelon (France)</option>
                            <option value="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option>
                            <option value="Samoa">Samoa</option>
                            <option value="San Marino">San Marino</option>
                            <option value="Sao Tom and Principe">Sao Tom and Principe</option>
                            <option value="Saudi Arabia">Saudi Arabia</option>
                            <option value="Senegal">Senegal</option>
                            <option value="Serbia">Serbia</option>
                            <option value="Seychelles">Seychelles</option>
                            <option value="Sierra Leone">Sierra Leone</option>
                            <option value="Singapore">Singapore</option>
                            <option value="Sint Maarten (Netherlands)">Sint Maarten (Netherlands)</option>
                            <option value="Slovakia">Slovakia</option>
                            <option value="Slovenia">Slovenia</option>
                            <option value="Solomon Islands">Solomon Islands</option>
                            <option value="Somalia">Somalia</option>
                            <option value="South Africa">South Africa</option>
                            <option value="South Korea">South Korea</option>
                            <option value="South Sudan">South Sudan</option>
                            <option value="Spain">Spain</option>
                            <option value="Sri Lanka">Sri Lanka</option>
                            <option value="Sudan">Sudan</option>
                            <option value="Suriname">Suriname</option>
                            <option value="Svalbard and Jan Mayen (Norway)">Svalbard and Jan Mayen (Norway)</option>
                            <option value="Swaziland">Swaziland</option>
                            <option value="Sweden">Sweden</option>
                            <option value="Switzerland">Switzerland</option>
                            <option value="Syria">Syria</option>
                            <option value="Taiwan">Taiwan</option>
                            <option value="Tajikistan">Tajikistan</option>
                            <option value="Tanzania">Tanzania</option>
                            <option value="Thailand">Thailand</option>
                            <option value="Timor-Leste">Timor-Leste</option>
                            <option value="Togo">Togo</option>
                            <option value="Tokelau (NZ)">Tokelau (NZ)</option>
                            <option value="Tonga">Tonga</option>
                            <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                            <option value="Tunisia">Tunisia</option>
                            <option value="Turkey">Turkey</option>
                            <option value="Turkmenistan">Turkmenistan</option>
                            <option value="Turks and Caicos Islands (UK)">Turks and Caicos Islands (UK)</option>
                            <option value="Tuvalu">Tuvalu</option>
                            <option value="Uganda">Uganda</option>
                            <option value="Ukraine">Ukraine</option>
                            <option value="United Arab Emirates">United Arab Emirates</option>
                            <option value="United Kingdom">United Kingdom</option>
                            <option value="United States">United States</option>
                            <option value="United States Virgin Islands (USA)">United States Virgin Islands (USA)</option>
                            <option value="Uruguay">Uruguay</option>
                            <option value="Uzbekistan">Uzbekistan</option>
                            <option value="Vanuatu">Vanuatu</option>
                            <option value="Vatican City">Vatican City</option>
                            <option value="Venezuela">Venezuela</option>
                            <option value="Vietnam">Vietnam</option>
                            <option value="Wallis and Futuna (France)">Wallis and Futuna (France)</option>
                            <option value="Western Sahara">Western Sahara</option>
                            <option value="Yemen">Yemen</option>
                            <option value="Zambia">Zambia</option>
                            <option value="Zimbabwe">Zimbabwe</option>
                        </select>
                        <div class="invalid-feedback">
                            Please provide a valid country.
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" id="password"  required>
                    </div>
                    <div class="form-group">
                        <label for="confirm_password">Confirm Password</label>
                        <input type="password" class="form-control" name="confirm_password" id="confirm_password"  required>
                    </div>
                    <div class="form-group">
                        <label for="secret_question">Secret question</label>
                        <input type="text" class="form-control" name="secret_question" id="secret_question"  placeholder="Please enter a secret question" required>
                    </div>
                    <div class="form-group">
                        <label for="secret_answer">Secret answer</label>
                        <input type="text" class="form-control" name="secret_answer" id="secret_answer"  placeholder="Please enter a secret answer" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="tel" class="form-control" name="phone" id="phone"  placeholder="Phone number" required>
                    </div>
                    <button type="submit" name="register_submit" class="btn btn-primary">Submit</button>
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
    <script>
        var scroll = new SmoothScroll('a[href*="#"]');
    </script>
</body>
</html>