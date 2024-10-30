<?php
require ('../action/main_work.php');
if (isset($_GET['come']))
    $userId = $_GET['come'];
//  $for ->seeallreff($userId);die();
$for ->addprofit();
$for ->deycounter();
$for ->BuilderPlain();
$for ->SilverPlain();
$for ->DiamondPlain();
$for ->UltimatePlain();
$for ->BusinessPlain();
$for ->ref();

?>