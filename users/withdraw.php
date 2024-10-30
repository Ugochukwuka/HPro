<?php //session_start()?>
<?php require_once ('../action/main_work.php')?>
<?php if (isset($_GET['deposit_id'])){

    $depId = $_GET['deposit_id'];
}else {
    $depId = $_SESSION['depId'];
}
    $userDetails = $for->getLoggedInUserDetails($_SESSION['userUniqueId']);
    $userId = $_SESSION['userUniqueId'];
    //print_r($userId); die();
    
    $eachUserDeposit = $for->selectdeposittableinterest($depId);
    $row = mysqli_fetch_assoc($eachUserDeposit);

    //here is d company logo
    $allCompanyDetPic = $for->displayCompanydetailsPic();
    
    $paymentmethodetails = $for->viewpaymentmethod();

    //print_r($row['interest']); die();

    // if(isset($_SESSION['depId'])){
    //     print($_SESSION['depId']); die();
    // }
    // print_r("We are In"); die();
//$interestvalue = ($row['interest']); die();

//print_r($row); die();

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
                        <form action="../action/main_work.php?option=withdraw" method="post">
                            <div class="card-header">
                                <h3>Withdraw</h3>
                                <p><?php //echo $row['interest']; ?></p>
                            </div>
                            <input type="hidden" name="userinterest" value="<?php echo $row['interest'];?>">
                            <!-- <input type="hidden" name="userId" value="<?php //echo $userDetails['users_unique_id'];?>"> -->
                            
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
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Wallet Address</label>
                                    <input type="text" class="form-control" name="wallet" value="<?php if (isset($_SESSION{'wallet'})) {echo $_SESSION['wallet'];}?>">
                                    <input type="hidden" name="depId" value="<?php echo $depId ?>">
                                </div>

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
                                <input type="hidden" name="userId" value="<?php echo $userId; ?>" />
                                <div class=" form-group mb-4 " style="margin-top: 20px">
                                    <h6>Amount</h6>
                                    <div class="input-group mb-4">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">$</span>
                                            <span class="input-group-text">0.00</span>
                                        </div>
                                        <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)" name="amount" value="<?php if (isset($_SESSION{'amount'})) {echo $_SESSION['amount'];}?>">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>


<?php require_once "foote.php"?>

<?php require_once ('script.php')?>

