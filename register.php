<?php
 
 require_once('action/main_work.php');

$CompanyName = $for->displayCompanydetailsPicSiteName();

$CompanyLogo = $for->displayCompanydetailsPic();

//$CompanyPic = $for->displayCompanydetailsPicSiteName();

//print_r($CompanyPic); die();
// $a = 2;
// print_r($a); die();

?>

<?php //session_start() ?>

<?php ini_set('display_errors', 'off'); ?>


<?php if(isset($_GET['Ref'])){ ?>
<?php $referral = $_GET['Ref'];};?>

<!DOCTYPE html>
<html lang="en" class="js">
<head>
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Register</title>
    <link rel="shortcut icon" href="/favicon.ico">
    <link rel="stylesheet" href="assetss/css/apps.css">
	<!-- System Build v20210628110 @iO -->
    <link rel="stylesheet" href="greg.css">

</head>
<body class="nk-body npc-cryptlite pg-auth is-dark">
<div class="nk-app-root">
    <div class="nk-wrap">
        <div class="nk-block nk-block-middle nk-auth-body wide-xs">
        <div><img style="padding-left: 160px; height: 80px;" src="images/<?php echo $CompanyLogo ?>" alt="<?php echo $CompanyName ?>">


            <div class="card card-bordered">
    <div class="card-inner card-inner-lg">
        <div class="nk-block-head">
            <div class="nk-block-head-content">
                <h4 class="nk-block-title">Create an Account</h4>
                <div class="nk-block-des mt-2">
                                        <p>Sign up with your email and get started with your free account.</p>
                                     </div>
                            </div>
        </div>
        <?php if(isset($_SESSION['formError'])){?>
            <?php foreach($_SESSION['formError'] as $k => $eachErrorArray){?>
                <?php foreach($eachErrorArray as $k => $eachError){?>
                    <p class="alert alert-warning"><?php echo $eachError ?></p>
                <?php } ?>

            <?php } ?>
            <?php unset($_SESSION['formError']); ?>
        <?php } ?>

        <?php if(isset($_GET['success'])){?>
            <p class="alert alert-success"><?php echo trim($_GET['success']); ?></p>
        <?php } ?>
                <form action="action/main_work.php?option=register" autocomplete="off" method="POST" id="registerForm" class="form-validate is-alter" autocomplete="off">
            <div class="form-group">
                <label class="form-label" for="full-name">Full Name<span class="text-danger"> &nbsp;*</span></label>
                <div class="form-control-wrap">
                    <input type="text" id="full-name" name="fullname" value="" class="form-control form-control-lg" minlength="3" data-msg-required="Required." data-msg-minlength="At least 3 chars." required>
                </div>
            </div>

            <input type="hidden" name="Ref" value="<?php echo $referral; ?>" >
            
            <!-- See -->
            <div class="form-group">
                <label class="form-label" for="full-name">User Name<span class="text-danger"> &nbsp;*</span></label>
                <div class="form-control-wrap">
                    <input type="text" id="full-name" name="username" value="" class="form-control form-control-lg" minlength="3" data-msg-required="Required." data-msg-minlength="At least 3 chars." required>
                </div>
            </div>
           
            <div class="form-group">
                <label class="form-label" for="email-address">Email Address<span class="text-danger"> &nbsp;*</span></label>
                <div class="form-control-wrap">
                    <input type="email" id="email-address" name="email" value="" class="form-control form-control-lg" autocomplete="off" data-msg-email="Enter a valid email." data-msg-required="Required." required>
                </div>
            </div>
            
            <div class="form-group">
                <label class="form-label" for="full-name">Number<span class="text-danger"> &nbsp;*</span></label>
                <div class="form-control-wrap">
                    <input type="text" id="full-name" name="number" value="" class="form-control form-control-lg" minlength="3" data-msg-required="Required." data-msg-minlength="At least 3 chars." required>
                </div>
            </div>
           
            
            <!-- <div class="form-group">
                <label class="form-label" for="passcode">Password<span class="text-danger"> &nbsp;*</span></label>
                <div class="form-control-wrap">
                    <a tabindex="-1" href="#" class="form-icon form-icon-right passcode-switch" data-target="passcode">
                        <em class="passcode-icon icon-show icon ni ni-eye-off"></em>
                        <em class="passcode-icon icon-hide icon ni ni-eye"></em>
                    </a>
                    <input name="password" id="passcode" type="password" autocomplete="new-password" class="form-control form-control-lg" minlength="6" data-msg-required="Required." data-msg-minlength="At least 6 chars." required>
                </div>
            </div> -->

            <div class="form-group" id="psw">
                <label class="form-label" for="passcode">Password<span class="text-danger"> &nbsp;*</span></label>
                <div class="form-control-wrap">
                    <a tabindex="-1" href="#" class="form-icon form-icon-right passcode-switch" data-target="passcode">
                        <em class="passcode-icon icon-show icon ni ni-eye-off"></em>
                        <em class="passcode-icon icon-hide icon ni ni-eye"></em>
                    </a>
                    <input name="password" id="passcode" type="password" class="form-control form-control-lg">
                </div>
            </div>

            <div class="form-group">
                <label class="form-label" for="passcode">Confirm Password<span class="text-danger"> &nbsp;*</span></label>
                <div class="form-control-wrap">
                    <a tabindex="-1" href="#" class="form-icon form-icon-right passcode-switch" data-target="passcode">
                        <em class="passcode-icon icon-show icon ni ni-eye-off"></em>
                        <em class="passcode-icon icon-hide icon ni ni-eye"></em>
                    </a>
                    <input name="con_password" id="cpasscode" type="password" class="form-control form-control-lg">
                </div>
            </div>

            <div class="form-group">
                <div class="custom-control custom-control-xs custom-checkbox">
                    <input type="checkbox" name="confirmation" class="custom-control-input" id="checkbox" data-msg-required=" You should accept our terms." required>
                    <label class="custom-control-label" for="checkbox">I have agree to the <a href="https://investment.chainexa.co/page/terms-and-condition" target="_blank">Terms & Condition</a></label>
                </div>
            </div>
            
            
            <div class="form-group">
                <input type="hidden" name="_token" value="0kDwNzItmulsW2Wj3lfTmmoIeoRtO0Yjyqt07GZa">                                                <button class="btn btn-lg btn-primary btn-block">Register</button>
            </div>
        </form>

        <div id="errormessage">

        <h3 id="pmust">Password must contain the following:</h3>
        <!-- Here is d error msg fr d password strength field -->
        <p id="lowercase" class="invalid">A lowercase letter</p>
        <p id="capital" class="invalid">A capital (uppercase) letter</p>
        <p id="number" class="invalid">A number</p>
        <p id="minimum" class="invalid">A minimum 8 letters</p>
        
        </div>

                <div class="form-note-s2 text-center pt-4">
            Already have an account? <a href="login"><strong>Sign in instead</strong></a>
        </div>
                    </div>
</div>

            

        </div>

        <div class="nk-footer nk-auth-footer-full">
    <div class="container wide-lg">
                <div class="row g-3">
            <div class="col-lg-6 order-lg-last">
                <ul class="nav nav-sm justify-content-center justify-content-lg-end">
	
						<li class="nav-item">
			<a class="nav-link" href="index" target="_blank">home</a>
		</li>
								<!-- <li class="nav-item">
			<a class="nav-link" href="https://investment.chainexa.co/page/faqs">FAQs</a>
		</li> -->
								<!-- <li class="nav-item">
			<a class="nav-link" href="https://investment.chainexa.co/page/terms-and-condition">Terms and Condition</a>
		</li> -->
								<!-- <li class="nav-item">
			<a class="nav-link" href="https://investment.chainexa.co/page/privacy-policy">Privacy Policy</a>
		</li> -->
				
		

		</ul>
		
	

            </div>
            <div class="col-lg-6">
                <div class="nk-block-content text-center text-lg-left">
                    <p class="text-soft"><?php echo $CompanyName ?> &copy; 2023. All Rights Reserved.</p>
                </div>
            </div>
        </div>
            </div>
</div>
    </div>
</div>
<script src="greg.js"></script>
<script src="https://investment.chainexa.co/assets/js/bundle.js"></script>
<script src="https://investment.chainexa.co/assets/js/app.js"></script>
</body>
</html>