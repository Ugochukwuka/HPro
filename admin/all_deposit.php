<?php require_once ('../action/main_work.php')?>
<?php ini_set('display_errors', 'off'); ?>
<?php $alluser = $for->alldeposit()?>
<?php $alluserss = $for->GetfName($userId);

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
                            <h4>All Deposit Table</h4>
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
                                        <th>Plan</th>
                                        <th>Coin Type</th>
                                        <th>Amount</th>
                                        <th>INTEREST</th>
                                        <th>Referral</th>
                                        <th>Status</th>
                                        <th>Day Counter</th>
                                        <th>Proof</th>
                                        <th>Due Date</th>
                                        <th>Action</th>
                                    </tr>
                                    <?php if (is_array($alluser)){ $no = 1;?>
                                        <?php foreach ($alluser as $k=>$allusers) { ;?>
                                            <tr>
                                            <td> <?php echo $no;?></td>
                                            <td> <?php echo $allusers ->username;?></td>
                                            <td> <?php echo $allusers ->plan;?></td>
                                            <td> <?php echo $allusers ->coin_type;?></td>
                                            <td> $<?php echo number_format($allusers ->amount);?></td>
                                            <td> $<?php echo number_format($allusers ->interest);?></td>
                                            <?php $referrerDetails = $for->GetfName($allusers->users_unique_id) ?>
                                            <td> <?php echo $referrerDetails['count'] > 0 ? $referrerDetails['data']['fullname'] : '' ?></td>
                                            <td> <?php echo $allusers ->status ;?></td>
                                            <td> <?php echo $allusers ->day_counter ;?></td>
                                            <td><div title="Click to view image" style="width: 50px;"><a target="_blank" href="../images/<?php echo $allusers->image; ?>"><img class="img-responsive" src="../images/<?php echo $allusers->image; ?>" /></a> </div> </td>
                                            <td> <?php echo $allusers ->created_at ;?></td>
                                            <td>       <div class="dropdown d-inline mr-2">
                                                    <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton3"
                                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        Easy Dropdown
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="prompts?user_id=<?php echo $allusers->deposit_id ?>&action=delete">Delete</a>
                                                        <a class="dropdown-item" href="de_profiledeposit?user_id=<?php echo $allusers->deposit_id ?>&action=edit">Edit</a>
                                                        <a class="dropdown-item" href="prompts?user_id=<?php echo $allusers->deposit_id ?>&action=<?php echo $allusers->status === 'confirmed' ? 'block':'unblock'; ?>"><?php echo $allusers->status === 'confirmed' ? 'pending':'confirmed'; ?></a>
                                                    </div>
                                                </div>
                                            </td>
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
