<?php /* Smarty version 2.6.20, created on 2015-07-21 00:21:49
         compiled from registration/complete/default.tpl */ ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Imibutho Forum</title>
<meta name="description" content="Imibutho...">          
<meta name="robots" content="index, follow">
<meta name="revisit-after" content="21 days">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta property="og:title" content="Imibutho"> 
<meta property="og:image" content="http://www.imibutho.co.za/images/logo.gif"> 
<meta property="og:url" content="http://www.imibutho.co.za">
<meta property="og:site_name" content="Imibutho">
<meta property="og:type" content="website">
<meta property="og:description" content="Imibutho...">
<link rel="icon" type="image/x-icon" href="favicon.ico?sjkdn" />
<link rel="stylesheet" type="text/css" href="/css/normalize.css">
<link rel="stylesheet" type="text/css" href="/css/intro.css">
<link rel="stylesheet" href="/library/javascript/jquery-ui.css">
<link href='http://fonts.googleapis.com/css?family=Questrial' rel='stylesheet' type='text/css'>
<!--[if lt IE 9]>
<script src="/library/javascript/html5shiv.js"></script>
<script src="/library/javascript/respond.min.js"></script>
<![endif]-->
</head>
<body>
<section class="container">
    <div class="shieldbox">
        <div class="space cf">
            <div class="leftbox">
                <h1 class="blue-txt">About Us</h1>
            <p>Imibutho is a platform for expression of that innate need by one to be of service to others.
    It seeks to be a common connection point for all parties who aspire to empower the youth in all ways possible.
    When efforts can be concerted and coordinated in the quest to better the lives of young people and unlock their potential, the impact factor is sure to grow exponentially.</p>
            <p>Imibutho exists to play the role of enabler and a hub from where parties with a common goal can radiate activities individually and collaboratively.
    We move from the premise that an innumerable number of people and organisations already engage in youth empowerment, so instead of simply adding to those numbers, rather concentration be on ways in which to maximise resources and optimise processes already in existence through a network approach.</p>
				<br><br><br><br><br><br><br>
            </div>
            <div class="rightbox">
                    <h1>Pre-Registration</h1> <!--<h1>Thank you for Register</h1> /// after submiting the form-->
                    <p>You have joined the informative team that will help you grow as an individual as well as a business.</p>
                    <!--<p>You will be the first in line to recieve information and resources that will help your business grow.</p> /// after submiting the form-->
					<p>Thank you, <b style="color: #cd682b; font-weight: bold;"><?php echo $this->_tpl_vars['accountData']['account_name']; ?>
</b> for registering with the Imibutho Forum website.</p>
					<p>We have sent you an email to confirm your registration. The email will contain a link that will verify your email address and activate your account.</p>		

            </div>
        </div>
        <p class="counttxt">Launching in</p>
        <div class="countbox cf" id="edate"></div>
    </div>
</section>
<div class="space">&nbsp;</div>
<footer>
    <div class="footbox">
        <div class="copytxt">
            All rights reserved. &copy; 2015. www.imibutho.co.za, its sponsors, contributors and advertisers disclaim all liability for any loss, damage, injury or expense that might arise from the use of, or reliance upon, the services contained herein.
        </div>
        <div class="soclinks">
            <a href="https://www.facebook.com/imibutho" target="_blank"><img src="/images/fb_icon.png" width="27" height="29" alt="" /></a>
            <a href="https://twitter.com/imibutho" target="_blank"><img src="/images/tw_icon.png" width="27" height="29" alt="" /></a>
        </div>
    </div>
</footer>
<script type="text/javascript" src="/library/javascript/jquery-1.10.1.min.js"></script>
<script type="text/javascript" src="/library/javascript/jquery.validate.js"></script>
<script src="/library/javascript/countdown.min.js"></script>
<?php echo '
<script>
    $(window).load(function() {
        $(\'#edate\').countdown(\'2015/08/18\', function(event) {
	       $(this).html(event.strftime(\'\'
            + \'<div>%w<span>week(s)</span></div>\'
            + \'<div>%d<span>day(s)</span></div>\'
            + \'<div>%H<span>hour(s)</span></div> \'
            + \'<div>%M<span>minute(s)</span></div> \'
            /*+ \'<div>%S<span>seconds</span></div>\'*/));
        });
    });
</script>
'; ?>

</body>
</html>