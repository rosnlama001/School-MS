<?php include("../include/header.php"); ?>
<?php 
// session_start();
include("../../database/db.php");
include("../../functions/function.php");
// query object ----------------------
$obj1 = new sfunction();
$obj = new query();
// query object end--------------
if(isset($_SESSION['Islogin']) && isset($_SESSION['Islogin'])!='yes'){
    redirect("../../index.php");
}else{
    // require_once("../html/course.php");
    $row=$obj->get_data('course','*','','cid','desc');
    // $row1=$obj->get_data('faculty','*','','fid','desc');
    
    if(isset($row[0])){
        require_once("../html/faculty.php"); 
    }else{
        $_SESSION['erMsg']="No data Found";
    }
}
?>
<?php include("../include/footer.php"); ?>