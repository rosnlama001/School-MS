<?php include("../include/header.php"); ?>
<?php 
// require_once("../html/faculty.php"); 
// // session_start();
include("../../database/db.php");
include("../../functions/function.php");
// query object ----------------------
$obj1 = new sfunction();
$obj = new query();
// query object end--------------
if(isset($_SESSION['Islogin']) && isset($_SESSION['Islogin'])!='yes'){
    redirect("../../index.php");
}else{
    $row1=$obj->get_data('faculty','*','','fid','desc');
    
    if(isset($row1[0])){
        require_once("../html/faculty.php"); 
    }else{
        $_SESSION['erMsg']="No data Found for faculty";
    }
}
?>
<?php include("../include/footer.php"); ?>