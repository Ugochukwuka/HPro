
<?php require_once ('../action/main_work.php')?>
<?php $alluser = $for->allreferral();

$allCompanyDetPic = $for->displayCompanydetailsPic();

?>

<?php require_once "head_1.php"?>

<?php require_once ('herder_1.php')?>


<!-- start page container -->

<?php require_once ('sidebar_1.php')?>


<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Referral Table</h4>
                            <div class="card-header-form">
                                <form>
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search">
                                        <div class="input-group-btn">
                                            <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <tr>
                                        <th class="text-center">
                                            <div class="custom-checkbox custom-checkbox-table custom-control">
                                                <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad"
                                                       class="custom-control-input" id="checkbox-all">
                                                <label for="checkbox-all" class="custom-control-label">&nbsp;</label>
                                            </div>
                                        </th>
                                        <th>UserName</th>
                                        <th>PLan</th>
                                        <th>Coin</th>
                                        <th>Amount</th>
                                        <th>Referral</th>
                                        <th>REF Amount</th>
                                        <th>Due Date</th>
                                    </tr>
                                    <?php if (is_array($alluser)){ $no = 1;?>
                                        <?php foreach ($alluser as $k=> $allusers) { ;?>
                                            <tr>
                                            <td> <?php echo $no;?></td>
                                            <td> <?php echo $allusers ->username;?></td>
                                            <td> <?php echo $allusers ->plan ;?></td>
                                            <td> <?php echo $allusers ->coin_type ;?></td>
                                            <td> $<?php echo number_format($allusers ->amount) ;?></td>
                                            <?php $referrerDetails = $for->GetfName($allusers->users_unique_id) ?>
                                            <td> <?php echo $referrerDetails['count'] > 0 ? $referrerDetails['data']['fullname'] : '' ?></td>
                                            <td> $<?php echo number_format($allusers ->ref_amount) ;?></td>
                                            <td> <?php echo $allusers ->created_at ;?></td>
                                            <?php $no++; } ?>
                                        </tr>
                                    <?php }else{ ?>
                                        <tr>
                                            <td colspan="10"><p class="text-center alert-danger alert"><?php echo $alluser; ?></p></td>
                                        </tr>
                                    <?php } ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>


<?php require_once "footer_1.php"?>

<?php require_once ('script_1.php')?>
