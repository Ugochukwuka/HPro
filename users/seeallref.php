<?php require_once ('../action/main_work.php')?>
<?php
// $id = $_SESSION['userUniqueId'];
// $eachUserDetails = $for->selectdeposittable($id);
// if (isset($_GET['come']))
    $userId = $_GET['come'];
    // $eachUserDetails = $for->seeallreff($userId);
$userDetails = $for->getLoggedInUserDetails($_SESSION['userUniqueId']);


?>
<?php

//$userReferraldeta gets d details of all d persons using a ref link
$userReferraldeta = $for->useref($userId);
//$row = mysqli_fetch_array($userReferraldeta);

//here is d company logo
$allCompanyDetPic = $for->displayCompanydetailsPic();

//print_r($userReferraldeta); die();

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
                            <h4>Referral History</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                                    <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th>UserName</th>
                                        <!-- <th>Plan</th>
                                        <th>Coin Type</th>
                                        <th>Amount</th>
                                        <th>Btc Amount</th>
                                        <th>Referral</th>
                                        <th>Status</th> -->
                                        <th>Date</th>
                                     </tr>
                                    </thead>
                                    <tbody>
                                    <!-- foreach ($userReferraldeta as $key => $value) {
                                        # code...
                                    $name = ($value['username']);
                                        print_r($name); die();
                                    }
                                    !-->
                                    <?php if(is_array($userReferraldeta)){ ?>
                                    <?php $no = 1; ?>
                                    <?php foreach($userReferraldeta as $k =>$value){?>
                                    <tr>
                                        <td><?php echo $no ?></td>
                                        <td><?php echo ( $value['username']); ?></td>
                                        <!--
                                        <td><?php //print //$userDetails->plan; ?></td>
                                        <td><?php //print //$userDetails->coin_type; ?></td>
                                        <td>$<?php //print //number_format($userDetails->amount); ?></td>
                                        <td>$<?php //print //$userDetails->interest; ?></td>
                                        <td><?php //print //$userDetails->referral; ?></td>
                                        <td><?php //echo //$userDetails->status; ?></td>-->
                                        <td><?php echo $value['created_at']; ?></td>
                                    
                                        <?php $no++; }?>
                                    </tr>
                                    <?php }else{ ?>
                                        <tr>
                                            <td colspan="10"><p class="text-center alert-warning"><?php echo 'No Referral';?></p></td>
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
