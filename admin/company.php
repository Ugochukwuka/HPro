<?php require_once ('../action/main_work.php')?>

<?php $allCompanyDetPic = $for->displayCompanydetailsPic(); ?>

<?php require_once "head_1.php"?>

<?php require_once ('herder_1.php')?>


<!-- start page container Company Details-->

<?php require_once ('sidebar_1.php')?>


<?php ini_set('display_errors', 'off'); ?>
<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card"> 
                        <div class="card-header">
                            <h3>Add Company Details</h3>
                        </div>
                        <div class="card-body">
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
                            
                            <form action="../action/main_work?option=addcompany" method="post" enctype="multipart/form-data">
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Site Name</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" class="form-control" name="site_name" value="" placeholder="Enter Site Name">
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Short Name</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" class="form-control" name="short_name" value="" placeholder="Enter Short Name">
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Email</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" class="form-control" name="email" value="" placeholder="Enter Company Email">
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Phone</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" class="form-control" name="phone" value="" placeholder="Enter Company Phone Number">
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Address</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" class="form-control" name="address" value="" placeholder="Enter Company Address">
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Description</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" class="form-control" name="description" value="" placeholder="Enter Company Description">
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Referral Percentage</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" class="form-control" name="refpercent" value="" placeholder="Enter Referral Percentage">
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Add Company Logo</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="file" class="form-control" name="passport" value="" placeholder="Enter Company Logo">
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Live Chat Code</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" class="form-control" name="livechatcode" value="" placeholder="Enter Live Chat eg (pFUYLEIzYf)">
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                    <div class="col-sm-12 col-md-7">
                                        <button type="submit" name="" class="btn btn-primary">Add Company Details
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>


<?php require_once "footer_1.php"?>

<?php require_once ('script_1.php')?>

