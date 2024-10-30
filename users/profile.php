<?php ini_set('display_errors', 'off'); ?>

<?php require_once ('../action/main_work.php')?>
<?php $for->valdateSession('../login.php');

//here is d company logo
$allCompanyDetPic = $for->displayCompanydetailsPic();

?>

<?php $userDetails = $for->getLoggedInUserDetails($_SESSION['userUniqueId']); ?>
<?php require_once "head.php"?>

<?php require_once ('herder.php')?>


<!-- start page container -->

<?php require_once ('sidebar.php')?>

<?php ini_set('display_errors', 'off'); ?>

<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3>My Profile</h3>
                        </div>
                        <div class="card-body">
                            <form>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Full Namme</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" class="form-control"value="<?php echo ucwords($userDetails->fullname) ?>" placeholder="fullname" readonly>
                                </div>
                            </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">UserName</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" class="form-control"value="<?php echo ucwords($userDetails->username ) ?>" placeholder="username" readonly>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Email</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" class="form-control"value="<?php echo ucwords($userDetails->email) ?>" placeholder="email" readonly>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Date</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" class="form-control"value="<?php echo ucwords($userDetails->created_at) ?>" placeholder="created_at" readonly> 
                                    </div>
                                </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                <div class="col-sm-12 col-md-7">
                                    <button class="btn btn-primary"> <div>
                                            <a class="btn btn-primary "href="update?userId=<?php echo $userDetails->users_unique_id; ?>">Enter here to update</a>
                                        </div></button>
                                </div>
                            </div>
                            </form>
                            <!-- <div class="image"  >
            <img src="../images/image_uploads/<?php echo $userDetails->image_name; ?>" style="height: 100%; width: 100%">

        </div> -->
                            <form action="../action/main_work?option=upload_image" method="post" enctype="multipart/form-data">
                <input class="form-control input-lg" type="file" name="passport"><br>
                <button type="submit" class="btn btn-success btn-block btn-lg" name="submit_image" >Upload Passport</button>
            </form>

            <form action="../action/main_work?option=delete_image" method="post" enctype="multipart/form-data">
                <button type="submit" class="btn btn-danger btn-block btn-lg" name="submit_image" >Delete Passport</button>
            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>


<?php require_once "foote.php"?>

<?php require_once ('script.php')?>

