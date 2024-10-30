<?php require_once ('../action/main_work.php')?>
<?php
$id = $_SESSION['userUniqueId'];
$eachUserDetails = $for->selectWithdrwallsingle($id);
$eachCapitalUserDetails = $for->selectCapitalWithdrwallsingle($id);
$eachBonusUserDetails = $for->selectBonusWithdrwallsingle($id);

if (isset($_GET['come']))
    $userId = $_GET['come'];
$userDetails = $for->getLoggedInUserDetails($_SESSION['userUniqueId']);

//here is d company logo
$allCompanyDetPic = $for->displayCompanydetailsPic();

//print_r($eachBonusUserDetails); die();

?>

<?php require_once "head.php"?>

<?php require_once ('herder.php')?>


<!-- start page container -->

<?php require_once ('sidebar.php')?>

<div class="main-content">
    <!-- Here is the Profit Withdrawal History -->
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Withdraw Profit History</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                                    <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th>UserName</th>
                                        <th>Address</th> 
                                        <th>Coin Type</th>
                                        <th>Amount</th>
                                        <!-- <th>Btc Amount</th> -->
                                        <!-- <th>Referral</th>
                                        <th>Status</th>
                                        <th>Day Count</th> -->
                                       <!-- <th>Deposit</th> -->
                                        <!-- <th>Withdraw</th> -->
                                        <!-- <th>Date</th> -->
                                        <!-- <th>Email</th> --> 
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php if(is_object($eachUserDetails) > 0){ ?>
                                    <?php $no = 1; ?>
                                    <?php while($userDetails = mysqli_fetch_assoc($eachUserDetails)){?>
                                    <tr>
                                        
                                        <td><?php echo $no ?></td>
                                        <td><?php echo $userDetails['username']; ?></td>
                                        <td><?php echo $userDetails['wallet']; ?></td> 
                                        <td><?php echo $userDetails['coin_type']; ?></td>
                                        <td>$<?php echo number_format($userDetails['amount']); ?></td> 
                                        <!-- <td>$<?php //echo $userDetails['interest']; ?></td> -->
                                        <!-- <td><?php //echo $userDetails['referral']; ?></td> -->
                                        <!-- <td><?php //echo $userDetails['status']; ?></td> -->
                                        <!-- <td><?php //echo $userDetails['day_counter']; ?></td> -->
                                        <?php //if($userDetails['day_counter'] >= 1  ) {?>
                                        <!-- <td>       <div class="dropdown d-inline mr-2">
                                                    <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton3"
                                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        Easy Dropdown
                                                    </button>
                                                    <div class="dropdown-menu"style="background-color:white">
                                                        <a  class="dropdown-item" href="withdraw.php?deposit_id=<?php //echo $userDetails['deposit_id'];?>">Withdraw Profit</a>
                                                        <a  class="dropdown-item" href="withdrawamount.php?deposit_id=<?php //echo $userDetails['deposit_id'];?>">Withdraw Amount</a>
                                                        <a  class="dropdown-item" href="button_reinvest.php?deposit_id=<?php //echo $userDetails['deposit_id']?>&action=upgrate">Re-invest</a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td><?php //echo $userDetails['created_at']; ?></td> -->
                                            <!-- <td><?php //echo $userDetails['email'] ?></td> -->
                                            <?php //}?>
                                        <?php $no++; }?>
                                    </tr>
                                    <?php }else{ ?>
                                        <tr>
                                            <td colspan="10"><p class="text-center alert-warning"><?php echo($userDetails);?></p></td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Here is the Capital Withdrawal History -->
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Withdraw Amount History</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                                    <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th>UserName</th>
                                        <th>Address</th> 
                                        <th>Coin Type</th>
                                        <th>Amount</th>
                                        <!-- <th>Btc Amount</th> -->
                                        <!-- <th>Referral</th>
                                        <th>Status</th>
                                        <th>Day Count</th> -->
                                       <!-- <th>Deposit</th> -->
                                        <!-- <th>Withdraw</th> -->
                                        <!-- <th>Date</th> -->
                                        <!-- <th>Email</th> --> 
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php if(is_object($eachCapitalUserDetails) > 0){ ?>
                                    <?php $no = 1; ?>
                                    <?php while($userDetails = mysqli_fetch_assoc($eachCapitalUserDetails)){?>
                                    <tr>
                                        
                                        <td><?php echo $no ?></td>
                                        <td><?php echo $userDetails['username']; ?></td>
                                        <td><?php echo $userDetails['wallet']; ?></td> 
                                        <td><?php echo $userDetails['coin_type']; ?></td>
                                        <td>$<?php echo number_format($userDetails['amount']); ?></td> 
                                        <!-- <td>$<?php //echo $userDetails['interest']; ?></td> -->
                                        <!-- <td><?php //echo $userDetails['referral']; ?></td> -->
                                        <!-- <td><?php //echo $userDetails['status']; ?></td> -->
                                        <!-- <td><?php //echo $userDetails['day_counter']; ?></td> -->
                                        <?php //if($userDetails['day_counter'] >= 1  ) {?>
                                        <!-- <td>       <div class="dropdown d-inline mr-2">
                                                    <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton3"
                                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        Easy Dropdown
                                                    </button>
                                                    <div class="dropdown-menu"style="background-color:white">
                                                        <a  class="dropdown-item" href="withdraw.php?deposit_id=<?php //echo $userDetails['deposit_id'];?>">Withdraw Profit</a>
                                                        <a  class="dropdown-item" href="withdrawamount.php?deposit_id=<?php //echo $userDetails['deposit_id'];?>">Withdraw Amount</a>
                                                        <a  class="dropdown-item" href="button_reinvest.php?deposit_id=<?php //echo $userDetails['deposit_id']?>&action=upgrate">Re-invest</a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td><?php //echo $userDetails['created_at']; ?></td> -->
                                            <!-- <td><?php //echo $userDetails['email'] ?></td> -->
                                            <?php //}?>
                                        <?php $no++; }?>
                                    </tr>
                                    <?php }else{ ?>
                                        <tr>
                                            <td colspan="10"><p class="text-center alert-warning"><?php echo($userDetails);?></p></td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Here is the Bonus Withdrawal History -->
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Withdraw Bonus History</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                                    <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th>UserName</th>
                                        <th>Address</th> 
                                        <th>Coin Type</th>
                                        <th>Amount</th>
                                        <!-- <th>Btc Amount</th> -->
                                        <!-- <th>Referral</th>
                                        <th>Status</th>
                                        <th>Day Count</th> -->
                                       <!-- <th>Deposit</th> -->
                                        <!-- <th>Withdraw</th> -->
                                        <!-- <th>Date</th> -->
                                        <!-- <th>Email</th> --> 
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php if(is_object($eachBonusUserDetails) > 0){ ?>
                                    <?php $no = 1; ?>
                                    <?php while($userDetails = mysqli_fetch_assoc($eachBonusUserDetails)){?>
                                    <tr>
                                        
                                        <td><?php echo $no ?></td>
                                        <td><?php echo $userDetails['username']; ?></td>
                                        <td><?php echo $userDetails['wallet']; ?></td> 
                                        <td><?php echo $userDetails['coin_type']; ?></td>
                                        <td>$<?php echo number_format($userDetails['amount']); ?></td> 
                                        <!-- <td>$<?php //echo $userDetails['interest']; ?></td> -->
                                        <!-- <td><?php //echo $userDetails['referral']; ?></td> -->
                                        <!-- <td><?php //echo $userDetails['status']; ?></td> -->
                                        <!-- <td><?php //echo $userDetails['day_counter']; ?></td> -->
                                        <?php //if($userDetails['day_counter'] >= 1  ) {?>
                                        <!-- <td>       <div class="dropdown d-inline mr-2">
                                                    <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton3"
                                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        Easy Dropdown
                                                    </button>
                                                    <div class="dropdown-menu"style="background-color:white">
                                                        <a  class="dropdown-item" href="withdraw.php?deposit_id=<?php //echo $userDetails['deposit_id'];?>">Withdraw Profit</a>
                                                        <a  class="dropdown-item" href="withdrawamount.php?deposit_id=<?php //echo $userDetails['deposit_id'];?>">Withdraw Amount</a>
                                                        <a  class="dropdown-item" href="button_reinvest.php?deposit_id=<?php //echo $userDetails['deposit_id']?>&action=upgrate">Re-invest</a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td><?php //echo $userDetails['created_at']; ?></td> -->
                                            <!-- <td><?php //echo $userDetails['email'] ?></td> -->
                                            <?php //}?>
                                        <?php $no++; }?>
                                    </tr>
                                    <?php }else{ ?>
                                        <tr>
                                            <td colspan="10"><p class="text-center alert-warning"><?php echo($userDetails);?></p></td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
</div>



<?php require_once "foote.php"?>

<?php require_once ('script.php')?>



