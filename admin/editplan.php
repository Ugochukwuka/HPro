<?php 
require_once ('../action/main_work.php');

if(isset($_GET['plan_id'])){
    
   $planuid = $_GET['plan_id'];
}


$plandetails = $for->getuniqueplandetails($planuid);

//here is d company logo
$allCompanyDetPic = $for->displayCompanydetailsPic();

if(is_array($plandetails)){
    foreach ($plandetails as $key => $value) {
        # code...
        $planame = $value->plan_name;
        
        //print_r($planame); die();
        
require_once "head_1.php"; 

require_once ('herder_1.php');

require_once ('sidebar_1.php')?>




<?php ini_set('display_errors', 'off'); ?>
<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card"> 
                        <div class="card-header">
                            <h3>Edit Plan</h3>
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
                                        
                                        <form action="../action/main_work?option=updateplan" method="post">
                                            <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Plan Name</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" class="form-control" name="plan_name" value="<?php echo $value->plan_name ?>" placeholder="Enter Plan Name">
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Plan Percentage</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" class="form-control" name="plan_percent" value="<?php echo $value->plan_percent ?>" placeholder="Enter Plan Percentage">
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Plan Duration</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" class="form-control" name="plan_duration" value="<?php echo $value->plan_duration ?>" placeholder="Enter Plan Duration (Daily)">
                                    </div>
                                </div>
                                <div>
                                    <input type="hidden" value="<?php echo $value->plan_id ?>" name="planid">
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Plan Period</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" class="form-control" name="plan_period" value="<?php echo $value->plan_period ?>" placeholder="Enter Plan Period 1 for 1 Day">
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Mini Plan Amount</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" class="form-control" name="plan_min" value="<?php echo $value->plan_min ?>" placeholder="Enter Minimum Plan Amount">
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Maximum Plan Amount</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" class="form-control" name="plan_max" value="<?php echo $value->plan_max ?>" placeholder="Enter Plan Amount">
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                    <div class="col-sm-12 col-md-7">
                                        <button type="submit" name="" class="btn btn-primary">Update Plan
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
     <?php   }
        } ?>
        </div>
        </section>


<?php require_once "footer_1.php"?>

<?php require_once ('script_1.php')?>

