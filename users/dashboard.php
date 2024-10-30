<?php ini_set('display_errors', 'off'); ?>
<?php require_once ('../action/main_work.php')?>

<?php
if (isset($_GET['come']))
    $userId = $_GET['come'];
$userDetails = $for->selectsingleuser($userId);
//userDetail
$userDetail = $for->counrff($userId);

$userDetailss = $for->sumbalances($userId);

$ip = $for->get_client_ip(); 
//print_r($ip); die(); ref

$runref = $for->ref();

$userDetailsss = $for->sumreff($userId);
// runref

// print_r($runref); die();


$userDetailsssamo = $for->meanamount($userId);

//this gets the total withdraw profit
$userDetailssswithd = $for ->meanwithdrwa($userId);

//this gets the total amount to b withdrawan
$userDetailsamount = $for->getotalwithamount($userId);

//this gets the total bonus to b withdrawan
$userDetailsbonus = $for->getotalwithbonus($userId);
$withdrawaltotal = $userDetailssswithd + $userDetailsamount + $userDetailsbonus;

//here is d company logo
$allCompanyDetPic = $for->displayCompanydetailsPic();
//print_r($allCompanyDetPic); die();

if(empty($allCompanyDetPic)){
  $allCompanyDetPic = 0; 
}else {
  # code...
  $pic = $for->displayCompanydetailsPic();
  
}

//here is d site link
$allCompanyDetSiteName = $for->displayCompanydetailsPicSiteName();
//print_r($allCompanyDetSiteName); die();

$LiveChatCode = $for->displayCompanylivechatcode();


//print_r($withdrawaltotal); die();

$userDetailsssinves = $for ->meanwithinvest($userId);

?>

<?php require_once ("head.php") ?>

<?php require_once ('herder.php') ?>


<!-- start page container -->

<?php require_once ('sidebar.php')?>
<div class="main-content">
    <section class="section">
        <div class="row ">

          <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="card">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row ">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                        <div class="card-content">
                          <h5 class="font-15">Account Balance</h5>
                          <h2 class="mb-3 font-18">$<?php echo number_format($userDetailsssamo)?></h2>
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                          <img style="width:100px; margin-right:8px" src="assets/sevenbal.jpeg" alt="">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

              <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="card">
                    <div class="card-statistic-4">
                        <div class="align-items-center justify-content-between">
                            <div class="row ">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                                    <div class="card-content">
                                        <h1 class="font-15">Profit Balance</h1>
                                        <h2 class="mb-3 font-18">$<?php echo number_format($userDetailss)?></h2>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                                    <div class="banner-img">
                                        <img src="assets/img/banner/1.png" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

             <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="card">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row ">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                        <div class="card-content">
                          <h1 class="font-15">Total investment</h1>
                          <h2 class="mb-3 font-18"><?php echo $userDetailsssinves?></h2>
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                          <img src="assets/img/banner/4.png" alt="">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="card">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row ">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                        <div class="card-content">
                          <h5 class="font-15">Total Withdraw</h5>
                          <h2 class="mb-3 font-18">$<?php echo number_format($withdrawaltotal)?></h2>
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                          <img src="assets/img/banner/3.png" alt="">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="card">
                    <div class="card-statistic-4">
                        <div class="align-items-center justify-content-between">
                            <div class="row ">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                                    <div class="card-content">
                                        <h5 class="font-15"> REFERRAL</h5>
                                        <h2 class="mb-3 font-18"><?php echo $userDetail?></h2>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                                    <div class="banner-img" style ="margin-right:15px"> 
                                        <img src="assets/img/banner/2.png" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="card">
                    <div class="card-statistic-4">
                        <div class="align-items-center justify-content-between">
                            <div class="row ">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                                    <div class="card-content">
                                        <h1 class="font-15">REFERRAL BONUS</h1>
                                        <h2 class="mb-3 font-18">$<?php echo number_format($userDetailsss)?></h2>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                                    <div class="banner-img" style = "padding-top:10px;margin-right:-5px;">
                                        <img src="Referrals_Pic.jpeg" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4>REFERRAL LINK</h4>
                        <div class="card-header-action">
                            <a data-collapse="#mycard-collapse" class="btn btn-icon btn-info" href="#"><i
                                        class="fas fa-minus"></i></a>
                        </div>
                    </div>
                    <div class="collapse show" id="mycard-collapse">
                        <div class="card-body" style="color: red">
                        http://<?php echo $allCompanyDetSiteName ?>.com/register.php?Ref=<?php echo $userDetails->ref_id?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    </div>


<?php require_once "foote.php"?>

<?php require_once ('script.php')?>
