<?php require_once ('../action/main_work.php')?>
<?php
$id = $_SESSION['userUniqueId'];
$eachUserDetails = $for->selectdeposittable($id);
if (isset($_GET['come']))
    $userId = $_GET['come'];
$userDetails = $for->getLoggedInUserDetails($_SESSION['userUniqueId']);

//here is d company logo
$allCompanyDetPic = $for->displayCompanydetailsPic();

//print_r($eachUserDetails); die();
?>

<?php require_once "head.php"?>

<?php require_once ('herder.php')?>


<!-- start page container -->

<?php require_once ('sidebar.php')?>


<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Deposit Table</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                                    <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th>UserName</th>
                                        <th>Plan</th>
                                        <th>Coin Type</th>
                                        <th>Amount</th>
                                        <th>Btc Amount</th>
                                        <th>Referral</th>
                                        <th>Status</th>
                                        <th>Day Count</th>
                                        <th>Date</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php if(is_object($eachUserDetails) > 0){ ?>
                                    <?php $no = 1; ?>
                                    <?php while($userDetails = mysqli_fetch_assoc($eachUserDetails)){?>
                                    <tr>
                                        <td><?php echo $no ?></td>
                                        <td><?php echo $userDetails['username']; ?></td>
                                        <td><?php echo $userDetails['plan']; ?></td>
                                        <td><?php echo $userDetails['coin_type']; ?></td>
                                        <td>$<?php echo number_format($userDetails['amount']); ?></td>
                                        <td>$<?php echo $userDetails['interest']; ?></td>
                                        <td><?php echo $userDetails['referral']; ?></td>
                                        <td><?php echo $userDetails['status']; ?></td>
                                        <td><?php echo $userDetails['day_counter']; ?></td>
                                        <td><?php echo $userDetails['created_at']; ?></td>
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
