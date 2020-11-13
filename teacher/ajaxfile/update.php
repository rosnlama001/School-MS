<?php
session_start();
$userid= 56;
// $userid= $_POST['userId'];
include("../../database/db.php");
include("../../functions/function.php");
// query object ----------------------
$obj1 = new sfunction();
$obj = new query();
$condi_array=array("user.userId" => "{$userid}");
$row=$obj->get_join_data('user','studentpf','*','userId',$condi_array);
if(isset($row[0])){
    echo json_encode($row[0],true);
}
else{
    echo "no data";
}


?>