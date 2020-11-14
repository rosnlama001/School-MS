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
}else if(isset($_POST["status"]) && $_POST["status"]=="fetch"){
            $num_rec_per_page = 10;
            $page  ='';
            if (isset($_POST["page_no"])) {  $page  = $_POST["page_no"]; } else {  $page=1; };
            $start_from = ($page-1) * $num_rec_per_page;
     $condi_array = array("status" => "student");
     $row=$obj->get_join_data('user','studentpf','*','userId',$condi_array,'','',$start_from,$num_rec_per_page);
            if(isset($row[0])){   
            $json[]=$row; 
            $data['data'] = $json;
            $row1=$obj->get_data('studentpf');
            $result = count($row1);
            $data['total'] = $result;
            echo json_encode($data);
            }else{
            echo "<strong style='color:crimson' >No data Found for students</strong>";
            }
}else if(isset($_POST['status']) && $_POST['status']=='getData'){
     $userId = $_POST['userId'];
     $status = $_POST['status'];
    $condi_array = array("user.userId" => "{$userId}");
    $row = $obj->get_join_data('user','studentpf','','userId',$condi_array);
    if(isset($row[0])){   
        echo json_encode($row[0]);
        }
}

?>