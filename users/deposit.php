<?php ini_set('display_errors', 'off'); ?>
<?php //session_start();?>
<?php
require_once ('../action/main_work.php');
if (isset($_GET['come']))
    $userId = $_GET['come'];
$userDetails = $for->getLoggedInUserDetails($_SESSION['userUniqueId']);

$plandetails = $for->viewallplans();

//here is d company logo
$allCompanyDetPic = $for->displayCompanydetailsPic();

$paymentmethodetails = $for->viewpaymentmethod();

//print_r($paymentmethodetails); die();


?>
<?php require_once "head.php"?>

<?php require_once ('herder.php')?>


<!-- start page container -->

<?php require_once ('sidebar.php')?>


<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h3>Deposit</h3>
                        </div>
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
                        <form action="../action/main_work.php?option=deposit" method="post" enctype="multipart/form-data">
                        <div class="card-body">
                      
                            <div class="form-group">
                                <label>Select plan</label>
                                <select class="form-control form-control-sm" name="plan" >
                                    <?php if(isset($_SESSION['plan'])){ ?>
                                        <!-- <option value="<?php echo $_SESSION['plan']; ?>"><?php //echo $_SESSION['plan']; ?></option> -->
                                    <?php } ?>
                                    <option></option>
                                    <?php 
                                        if(is_array($plandetails)){
                                            foreach ($plandetails as $key => $value) { ?>
                                                
                                                <option><?php echo $value->plan_name ?>
                                            </option>
                                                
                                         <?php   }
                                        }
                                    ?>
                                    <!-- <option>Silver Plan</option>
                                    <option>Diamond Plan</option>
                                    <option>Ultimate Plan</option>
                                    <option>Business Plan</option> -->
                                </select>
                                <input type="hidden" name="planpercent" value="<?php echo $plandetails->plan_percent ?>">
                            </div>

                                   <div class=" form-group mb-4 " style="margin-top: 20px">
                                   <input type="hidden" name="referral" value="<?php echo $userDetails->referral ?>">
                                   
                                <h6>Amount</h6>
                                <div class="input-group mb-4">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">$</span>
                                        <!-- <span class="input-group-text">0.00</span> -->
                                    </div>
                                    <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)" name="amount" value="<?php //if (isset($_SESSION{'amount'})) {echo $_SESSION['amount'];}?>">
                                </div>
                            </div>
                            
                            <!-- Address -->
                           <?php 

                                foreach ($paymentmethodetails as $key => $value) {?>
                                    
                                    <h5 style ="text-align:center; padding-top:25px "><?php echo $value->payment_method ?>:</h5>
                                    
                                    <br>
                                    <center>
                                        <div class="input-group">
                                            <input type="text" value="<?php echo $value->payment_address ?>" id="myInput" readonly>
                                            <div class="input-group-append">
                                                <button type='button' class="input-group-text bg-primary white acbtn round" onclick="myfun();">Copy USDT Address</button>
                                            </div>
                                        </div>
                                    </center> 
                         <?php       }
                           ?>
                            <br>
                            <div class="form-group">
                                <label>Select payment method</label>
                                <select class="form-control form-control-sm" name="coin" >
                                    <?php if(isset($_SESSION['coin'])){ ?>
                                        <option selected value="<?php echo $_SESSION['coin']; ?>"><?php //echo $_SESSION['coin']; ?></option>
                                    <?php } ?>
                                         <option></option> 
                                         <?php
                                         
                                            foreach ($paymentmethodetails as $key => $value) {?>
                                                
                                                <option><?php echo $value->payment_method ?></option>
                                        <?php    }
                                         ?>
                                        
                                </select>
                            </div>
                            <br>
                            <h6>payment proof</h6>
                            <input accept='image/*' type="file" name="fileToUpload" id="fileToUpload">
                        <div class="card-footer">
                            <button class="btn btn-primary">Submit</button>
                        </div>
                        </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script src="copier.js"></script>

<?php require_once "foote.php"?>

<?php require_once ('script.php')?>

