<?php 
    include "inc/inc.header.php";
    $counter = 0;
    $sql_testifiers = "SELECT * FROM tbl_testifiers";
    $query_testifiers = mysqli_query($connected,$sql_testifiers);

    while($row = mysqli_fetch_assoc($query_testifiers)) {
        $testifier_id_array[$counter] = $row['id'];
        $client_image_array[$counter] = $row['client_image'];
        $client_name_array[$counter] = $row['client_name'];
        $client_position_array[$counter] = $row['client_position'];
        $client_testimony_array[$counter] = $row['client_testimony'];

        $counter++;
    }
    $c = 0;

$s = "SELECT * FROM user_cryptobinge";
$q_s = mysqli_query($connected,$s);
While($r = mysqli_fetch_assoc($q_s)){
  $c++;
}


    $sql_counter = "SELECT * FROM tbl_counter";
    $query_counter = mysqli_query($connected,$sql_counter);

    while($row = mysqli_fetch_assoc($query_counter)) {
        $total_clients = $row['total_clients'];
        $available_options = $row['available_options'];
        $completed_trades = $row['completed_trades'];
        $activity = $row['activity'];
    }

    if(isset($_POST['contact_form'])){
        $contact_success = "Message has been sent successfully";
        // header("Location: index.php#contact?contact_success".$contact);
        // exit();
    }
?>
<div class="intro-banner">
    <div class="container">
        <!--<div class="row">-->
        <h2 class="text-uppercase mb-5 pc-view">Zenithtradermarkets Help Your Profit Grow Stable</h2>
        <h3 class="text-uppercase mb-5 mobile-view">Zenithtradermarkets Help Your Profit Grow Stable</h3>
        <p class="lead mb-5">
            All you need to do is Enjoy the your Investment Grow hourly. <br>You don’t
            require any skill,our team have strong strategic trading ability to help your
            investment grow fast than bank.<br>Your choice is your furture, start to earn
            1.2% hourly and your princple will return at the end of term. 
        </p>
        <a href="signup.php"  class="btn btn-md btn-black mb-5">GET STARTED TODAY</a>
        <!--</div>-->
    </div>
</div>
<div class="container">
    <div class="reg-call pull-right">
        <a href="signup.php" class="btn btn-md reg-call-color text-uppercase mr-1 mb-2">Create An account today</a>
        <a href="signin.php" class="btn btn-md reg-call-color text-uppercase mr-1 mb-2">Login Now</a>
    </div>
</div>
<div class="about" id="about">
    <h3 class=" pb-3 text-center text-uppercase">About Zenithtradermarkets</h3>
    <!-- <p class="text-center">Multiply your capital with leaders in the field of cryptocurrency!</p> -->
    <div class="container">
                <!-- <h5 class="text-center">Maximum financial freedom with minimum risk!</h5> -->
                <div class="icon-box wow fadeInUp">
                    <div class="icon"><i class="fa fa-shopping-bag icc"></i></div>
                    <p class="description lead">
                        Zenith-trader.markets provides customers with portfolio investment strategy products. 
                        You do not need any trading experience to participate in Zenith-trader.market's plans. 
                        Experienced a bear market of bitcoin in 2013 and a bull market of bitcoin in 2017, 
                        our experts sum up a variety of extreme and simple trading strategies and effectively
                         earned hundreds of millions of dollars. Since the average user does not know how to operate 
                         the financial market, many investors like to buy when stock market soars. In fact, the best 
                         investment opportunities have often been missed. 
                        Many investments do not know when to sell, resulting in the profits returned to the pocket of the makers.
                    </p>
                </div>
                <div class="icon-box wow fadeInUp" data-wow-delay="0.2s">
                    <div class="icon"><i class="fas fa-camera icc"></i></div>
                    <p class="description lead"> 
                        Our experts have designed a set of artificial intelligence analysis software, 
                        which can analyze the abnormal funds of the banker's entry and exit in detail.
                        We will enter when the dealer's abnormal warning signal appears and raise the price together 
                        with banker as well as sell at the right height, buy the board as the fall continues or short 
                        selling and so it goes back and forth. 
                        It can earn several times or even tens of times the profits at the same time.
                    </p>
                </div>
                <div class="icon-box wow fadeInUp" data-wow-delay="0.4s">
                    <div class="icon"><i class="fas fa-chart-bar icc"></i></div>
                    <p class="description lead">
                        You only need to provide a minimum of $100 to participate in our Zenith-trader.markets expert profit plan. 
                        All you have to do is to invest in existing plans. You can earn a minimum of 1.2% profit 
                        hourly and get your principal back at the end of the plan. If you want to earn more, you can
                         make duplicate investments.Our experts will put your money in the appropriate strategy for 
                         implementation according to your financial situation because the Bitcoin market is an open market. 
                        Without limiting the ups and downs, it is more appropriate for us to carry out our strategy, 
                        which can short or long any coin according to specific circumstances.
                    </p>
                </div>
                <div class="icon-box wow fadeInUp" data-wow-delay="0.6s">
                    <div class="icon"><i class="fas fa-chart-bar icc"></i></div>
                    <p class="description lead">
                        You will earn more steady profits than ever before and we offer commission awards. 
                        If you invite a downline investment, you can get 3% to 10% commission reward. 
                        We accept Bitcoin,Litecoin,Ethereum,Perfect Money,Payeer,Bitcoins Cash, 
                        and you will receive a profit every hour and be paid Instantly.
                    </p>
                </div>
    </div>
</div>
<div class="investors">
    <div class="container" style="text-align:center">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <div class="text-primary">
                    <h3>90,000+</h3>
                </div>
                <div class="pull-right text-white">
                    <p class="">Traders have chosen zenithtradermarkets as their broker</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <div class="text-primary">
                    <h3>15</h3>
                </div>
                <div class="pull-right text-white">
                    <p class="">Years of experience in the forex industry</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <div class="text-primary">
                    <h3>8</h3>
                </div>
                <div class="pull-right text-white">
                    <p class="">global locations across three continents</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <div class="text-primary">
                    <h3>250+</h3>
                </div>
                <div class="pull-right text-white">
                    <p class="">Trading instruments</p>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="why-us" class="wow fadeIn">
    <div class="container">
        <!-- <header class="section-header"> -->
            <h3 class="text-center text-uppercase mb-5">Why choose us</h3>
            <!-- <p class="text-center mb-2">Below is a summary of why our clients choose us </p> -->
        <!-- </header> -->
        <div class="row row-eq-height justify-content-center">
            <div class="col-lg-3 mb-4">
                <div class="card wow bounceInUp">
                    <center><img src="assets/img/t1.png" class="img-siz" alt=""></center>
                    <div class="card-body">
                        <h5 class="card-title">PROMISING INVESTMENT</h5>
                        <p class="card-text">
                            Currently, the currency exchange market is on its rise and in the process of inevitable 
                            development of society and technologies, 
                            which will continue scaling up in time and providing new opportunities for profit.
                        </p>
                        <a href="#about" class="readmore">Read more </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 mb-4">
                    <div class="card wow bounceInUp">
                        <!-- <i class="fas fa-lock fa-2x why-i m-auto"></i> -->
                        <center><img src="assets/img/t2.png" class="img-siz" alt=""></center>
                        <div class="card-body">
                            <h5 class="card-title">BEST MANAGEMENT TEAM</h5>
                            <p class="card-text">
                                The staff of zenithtradermarkets is a team of professionals 
                                who invest and allocate your funds in ways that create the greatest long-term returns for you.
                            </p>
                            <a href="#about" class="readmore">Read more </a>
                        </div>
                    </div>
            </div>
            <div class="col-lg-3 mb-4">
                    <div class="card wow bounceInUp">
                        <!-- <i class="fas fa-folder-open fa-2x why-i m-auto"></i> -->
                        <center><img src="assets/img/t3.png"  class="img-siz" alt=""></center>
                        <div class="card-body">
                            <h5 class="card-title">PROFITABLE INVESTMENT PACKAGES</h5>
                            <p class="card-text">
                                Our investment platform provides you with the most favorable conditions for cooperation, 
                                including short term investment plans and progressive scale of profitability.
                            </p>
                            <a href="#about" class="readmore">Read more </a>
                        </div>
                    </div>
            </div>
            <div class="col-lg-3 mb-4">
                    <div class="card wow bounceInUp">
                        <!-- <i class="fas fa-folder-open fa-2x why-i m-auto"></i> -->
                        <center><img src="assets/img/t4.png" class="img-siz" alt=""></center>
                        <div class="card-body">
                            <h5 class="card-title">COOPERATION OPPORTUNITIES</h5>
                            <p class="card-text">
                                We have established a firm foundation for mutually advantageous customer relationship, 
                                which can be fully experienced by using our investment offer.
                            </p>
                            <a href="#about" class="readmore">Read more </a>
                        </div>
                    </div>
            </div>
        </div>
        <div class="row counters">
            <div class="col-lg-3 col-6 text-center">
                <span data-toggle="counter-up"><?php echo $total_clients + $c; ?></span>
                <p>Total Clients</p>
            </div>
            <div class="col-lg-3 col-6 text-center">
                <span data-toggle="counter-up"><?php echo $available_options ; ?></span>
                <p>Available options</p>
            </div>
            <div class="col-lg-3 col-6 text-center">
                <span data-toggle="counter-up"><?php echo $completed_trades; ?></span>
                    <p>Completed trades</p>
            </div>
            <div class="col-lg-3 col-6 text-center">
                <span data-toggle="counter-up"><?php echo $activity; ?></span>
                <p>Activity</p>
            </div>
        </div>
    </div>
</div>
<div class="call-to-action">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <h4>Welcome to Zenithtradermarkets</h4>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 text-right">
                <a href="signup.php" class="btn btn-md btn-da">Get Started Today</a>
            </div>
        </div>
    </div>
</div>
<?php include "inc/inc.testimonial.php"; ?>
<div class="howto" id="howto">
    <div class="container">
        <h3 class=" pb-3 text-center text-uppercase">How it Works</h3>
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                 <h5 class="text-center"><i class="fas fa-money-check-alt"></i> &nbsp;&nbsp; Deposit</h5>
                <p class="lead text-center">
                    Create an account and add funds. We accept payment on cryptocurrencies.
                </p>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <h5 class="text-center"><i class="fas fa-chart-line"></i> &nbsp;&nbsp; Trade</h5>
                <p class="lead text-center">
                    Minimum deposit is $100. Our team of expert help you trade and make profit for you with our trusted system.
                </p>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <h5 class="text-center"><i class="fas fa-coins"></i> &nbsp;&nbsp; Withdraw</h5>
                <p class="lead text-center">
                    Withdraw money easily to any cryptocurrency wallet or local bank. Commission may be applied.
                </p>
            </div>
        </div>
    </div>
</div>
<?php include "inc/inc.footer.php";?>    