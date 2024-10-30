<!DOCTYPE html>
<html lang="en" class="js">
<head>
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login | GanarGlobal</title>
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="stylesheet" href="assetss/css/apps.css">
	<!-- System Build v20210628110 @iO -->
</head>
<body class="nk-body npc-cryptlite pg-auth is-dark">
<div class="nk-app-root">
    <div class="nk-wrap">
        <div class="nk-block nk-block-middle nk-auth-body wide-xs">

            <div class="brand-logo text-center mb-2 pb-4"><img class="logo-img" src="ganarglobal.png" alt="GanarGlobal">

            </div>
            <div class="card card-bordered">
    <div class="card-inner card-inner-lg">
        <div class="nk-block-head">
            <div class="nk-block-head-content">
                <h4 class="nk-block-title">Login into Account</h4>
                <div class="nk-block-des mt-2">
                    <p>Sign in into your account using your email and passcode.</p>
                </div>
            </div>
        </div>

        <!-- Login area -->
        <?php if(isset($_SESSION['formError'])){?>
                            <?php foreach($_SESSION['formError'] as $k => $eachErrorArray){?>
                                <?php foreach($eachErrorArray as $k => $eachError){?>
                                    <p class="alert alert-danger"><?php echo $eachError ?></p>
                                <?php } ?>
                            <?php } ?>
                            <?php unset($_SESSION['formError']); ?>
                        <?php } ?>
                        <?php if(isset($_GET['success'])){?>
                            <p class="alert alert-success"><?php echo trim($_GET['success']); ?></p>
                        <?php } ?>
                        
                <form action="action/main_work.php?option=login" autocomplete="off" method="POST" id="loginForm" class="form-validate is-alter">
            <input type="hidden" name="_token" value="0kDwNzItmulsW2Wj3lfTmmoIeoRtO0Yjyqt07GZa">            <div class="form-group">
                <div class="form-label-group">
                    <label class="form-label" for="username">Email Address <span class="text-danger">*</span></label>
                </div>
                <div class="form-control-wrap">
                    <input name="email" type="email" autocomplete="new-email" class="form-control form-control-lg" id="username" placeholder="Enter your email address" autocomplete="off" data-msg-email="Enter a valid email." data-msg-required="Required." required>
                </div>
            </div>
            <div class="form-group">
                <div class="form-label-group">
                    <label class="form-label" for="passcode">Password <span class="text-danger">*</span></label>
                </div>
                <div class="form-control-wrap">
                    <a tabindex="-1" href="#" class="form-icon form-icon-right passcode-switch" data-target="passcode">
                        <em class="passcode-icon icon-show icon ni ni-eye-off"></em>
                        <em class="passcode-icon icon-hide icon ni ni-eye"></em>
                    </a>
                    <input name="password" autocomplete="new-password" type="password" class="form-control form-control-lg" id="passcode" placeholder="Enter your passcode" minlength="6" data-msg-required="Required." data-msg-minlength="At least 6 chars." required>
                </div>
                <div class="form-control-group d-flex justify-between mt-2 mb-gs">
                    <div class="form-control-wrap">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" name="remember" id="remember-me">
                            <label class="custom-control-label text-soft" for="remember-me">Remember Me</label>
                        </div>
                    </div>
                    <!-- <div class="form-control-link">
                        <a tabindex="5" class="link link-primary" href="https://investment.chainexa.co/password/forget">Forgot Code?</a>
                    </div> -->
                </div>
            </div>
                        <div class="form-group">
                                <button class="btn btn-lg btn-primary btn-block">Login</button>
            </div>
        </form>
                    <div class="form-note-s2 text-center pt-4"> New on our platform? <a href="register.php"><strong>Create an account</strong></a>
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
			<a class="nav-link" href="https://ganarglobal.com" target="_blank">home</a>
		</li>
								<!-- <li class="nav-item">
			<a class="nav-link" href="https://investment.chainexa.co/page/faqs">FAQs</a>
		</li>
								<li class="nav-item">
			<a class="nav-link" href="https://investment.chainexa.co/page/terms-and-condition">Terms and Condition</a>
		</li>
								<li class="nav-item">
			<a class="nav-link" href="https://investment.chainexa.co/page/privacy-policy">Privacy Policy</a>
		</li> -->
				
		

		</ul>
		
	

            </div>
            <div class="col-lg-6">
                <div class="nk-block-content text-center text-lg-left">
                    <p class="text-soft">GanarGlobal &copy; 2022. All Rights Reserved.</p>
                </div>
            </div>
        </div>
            </div>
</div>
    </div>
</div>
<script src="https://investment.chainexa.co/assets/js/bundle.js"></script>
<script src="https://investment.chainexa.co/assets/js/app.js"></script>
</body>
</html>