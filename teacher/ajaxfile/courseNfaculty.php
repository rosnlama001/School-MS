
<?php 
// require_once("../html/faculty.php"); 
// // session_start();
include("../../database/db.php");
include("../../functions/function.php");
// query object ----------------------
$obj1 = new sfunction();
$obj = new query();

// query object end--------------
if(isset($_POST['status']) && isset($_POST['status'])=='faculty'){
    $row =$obj->get_data('faculty');
    if($row[0]){
        $data['data']=$row;
        echo json_encode($data);
    }
}
?>
