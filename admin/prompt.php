
<?php if(isset($_GET['user_id']) && isset($_GET['action'])){
    $userid = $_GET['user_id'];
    $action = $_GET['action'];
}
//print_r($action); die();

?>
<div id="content" class="main-content">
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Delete Warning</title>
        <link rel="stylesheet" type="text/css" href="../bootstrap-3.4.1/css/bootstrap.min.css" />
    </head>
    <body>

    <section class="container">

        <div class="col-xs-12 col-xs-offset-0 col-sm-6 col-sm-offset-3 col-md-6 col-md-offset-3">
            <div class="row" style="margin-top: 50px">
                <h2 class="text-center text-danger">WARNING</h2>
                <h3 class="text-center text-light alert alert-warning"> Do you really want to continue?</h3>
            </div>
            <div class="text-center" style="margin-top: 10px">
                <form action="../action/main_work?option=<?php echo $action ;?>" method="post">
                    <input name="user_id" type="hidden" value="<?php echo $userid ;?>">
                    
                    <?php //here is fr prof with ?>
                    <?php if($action == 'confirmed')  { ?>
                        <button type="submit" class="btn-info-<?php if($action === 'confirmed'){ print 'danger'; } else{ echo 'success'; } ?> btn-lg">Yes</button>
                    <a href="all_withdraw" class="btn btn-success btn-lg">No</a>

                <?php   } elseif($action == 'pending') { ?>
                 
                    <button type="submit" class="btn-info-<?php if($action === 'pending'){ print 'danger'; } else{ echo 'success'; } ?> btn-lg">Yes</button>

                    <a href="all_withdraw" class="btn btn-success btn-lg">No</a>

                    <?php }elseif ($action == 'deletel') { ?>
                     <button type="submit" class="btn-info-<?php if($action === 'deletel'){ print 'danger'; } else{ echo 'success'; } ?> btn-lg">Yes</button>
                     
                     <a href="all_withdraw" class="btn btn-success btn-lg">No</a>


                    <?php //here is fr capital with ?>
            <?php    } elseif($action == 'cdeletel') { ?>
                <button type="submit" class="btn-info-<?php if($action === 'cdeletel'){ print 'danger'; } else{ echo 'success'; } ?> btn-lg">Yes</button>
            
                <a href="all_withdrawamount" class="btn btn-success btn-lg">No</a>

            
          <?php } elseif($action == 'cpending') { ?>
            <button type="submit" class="btn-info-<?php if($action === 'cpending'){ print 'danger'; } else{ echo 'success'; } ?> btn-lg">Yes</button>
            
            <a href="all_withdrawamount" class="btn btn-success btn-lg">No</a>

        <?php } elseif($action == 'cconfirmed') { ?>
            <button type="submit" class="btn-info-<?php if($action === 'cconfirmed'){ print 'danger'; } else{ echo 'success'; } ?> btn-lg">Yes</button>
            
            <a href="all_withdrawamount" class="btn btn-success btn-lg">No</a>


            <?php //here is fr bonus with ?>
            <?php    } elseif($action == 'delete4') { ?>
                <button type="submit" class="btn-info-<?php if($action === 'delete4'){ print 'danger'; } else{ echo 'success'; } ?> btn-lg">Yes</button>
            
                <a href="all_withref" class="btn btn-success btn-lg">No</a>

            
          <?php } elseif($action == 'pendiiing') { ?>
            <button type="submit" class="btn-info-<?php if($action === 'pendiiing'){ print 'danger'; } else{ echo 'success'; } ?> btn-lg">Yes</button>
            
            <a href="all_withref" class="btn btn-success btn-lg">No</a>

        <?php } elseif($action == 'confiiirmed') { ?>
            <button type="submit" class="btn-info-<?php if($action === 'confiiirmed'){ print 'danger'; } else{ echo 'success'; } ?> btn-lg">Yes</button>
            
            <a href="all_withref" class="btn btn-success btn-lg">No</a>



        <?php  }else {?>
            
            <button type="submit" class="btn-info-<?php if($action === 'deletel'){ print 'danger'; } else{ echo 'success'; } ?> btn-lg">Yes</button>

            <a href="all_withref" class="btn btn-success btn-lg">No</a>

       <?php }?>


                </form>

            </div>
        </div>

    </section>
    </body>
    </html>

</div>
<!-- end page container -->


