<?php
include("../../database/db.php");
include("../../functions/function.php");
// query object ----------------------
$obj1 = new sfunction();
$obj = new query();
 if(isset($_POST['fid'])){
    //  echo $_POST['fid'];
    $fid=$_POST['fid'];
    $condi_array = array("fid" => "{$fid}");
    $row=$obj->get_data('course','*',$condi_array,'cid','desc');

    if(isset($row[0])){
        require_once("../html/course.php"); 
        // echo "don2";
    }else{
        $_SESSION['erMsg']="No data Found for course";
    }
}
?>