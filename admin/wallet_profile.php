<?php require_once ('../action/main_work.php');

$allCompanyDetPic = $for->displayCompanydetailsPic();


?>

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
                            <h3>Add Plan Details</h3>
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
                            
                            <form action="../action/main_work?option=wallet" method="post">
                                
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Payment Method</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" class="form-control" name="payment_method" value="" placeholder="Enter Payment Method">
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Payment Address</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" class="form-control" name="payment_address" value="" placeholder="Enter Payment Address">
                                    </div>
                                </div>
                                
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                    <div class="col-sm-12 col-md-7">
                                        <button type="submit" name="" class="btn btn-primary">Add Plan Details
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

