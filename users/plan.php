<?php require_once ('../action/main_work.php')?>
<?php
if (isset($_GET['come']))
    $userId = $_GET['come'];
$userDetails = $for->selectsingleuser($userId);
$userDetail = $for->counrff($userId);
$userDetailss = $for->sumbalances($userId);

//here is d company logo
$allCompanyDetPic = $for->displayCompanydetailsPic();


$userDetailsss = $for ->sumreff($userId);
$userDetailsssamo = $for ->meanamount($userId);
$userDetailssswithd = $for ->meanwithdrwa($userId);
$userDetailsssinves = $for ->meanwithinvest($userId);
$plandetails = $for ->viewallplans();

//print_r($plandetails); die();

?>

<?php require_once "head.php"?>

<?php require_once ('herder.php')?>


<!-- start page container -->

<?php require_once ('sidebar.php')?>
<div class="main-content">

    <section class="section">
        <div class="row" >
			<?php 
							if (is_array($plandetails)) {
								# code...
								foreach ($plandetails as $key => $value) { ?>
								
								<?php $no = 1; ?>
								<div class="col-lg-4 col-md-4 col-12 text-center mb-lg-0 mb-md-0 mb-5">
									<div class="single-buy-box">
									<div class="single-buy-box-header">
										<h5><?php echo $value->plan_name ?></h5>
									</div>
									<div class="single-buy-box-dec">
										<h2>%<?php echo $value->plan_percent ?></h2>
										<h2><?php echo $value->plan_duration ?></h2>
										<P>Minimum: $<?php echo $value->plan_min ?></P>
										<input type="hidden" name="userId" value="<?php echo $userId; ?>" />
										<p>Maximum: $<?php echo $value->plan_max ?></p>
										<p>WITHDRAW AFTER <?php echo $value->plan_period ?> DAYS</p>
										<div>10% Referral Commission</div><br>
										<a href="deposit" class="btn-style btn-filled btn-filled-2 mb-5" style ="b">Purchase plan</a>
									</div>
								</div>
							</div>
							
						<?php } ?>
							<?php } else { ?>
								
								<!-- end single buy box -->
								<div class="col-lg-4 col-md-4 col-12 text-center mb-lg-0 mb-md-0 mb-5">
									<div class="single-buy-box">
										<div class="single-buy-box-header">
										<h5>PLAN A</h5>
										</div>
										<div class="single-buy-box-dec">
											<h2>%4.5</h2>
											<h2>DAILY</h2>
											<P>Minimum: $1,000</P>
											<p>Maximum: $4,999</p>
											<p>WITHDRAW AFTER 7 DAYS</p>
											<div>10% Referral Commission</div><br>
											<a href="deposit" class="btn-style btn-filled btn-filled-2 mb-5">Purchase plan</a>
										</div>
									</div>
								</div>

							<?php } ?>
							
							
							
        </div>
    </section>
</div>


<?php require_once "foote.php"?>

<?php require_once ('script.php')?>
