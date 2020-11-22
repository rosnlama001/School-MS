<?php
include("../../database/db.php");
include("../../functions/function.php");
// query object ----------------------
$obj1 = new sfunction();
$obj = new query();
// query object end--------------
// $arry = [];
if (isset($_POST["data_fetch"])) {
    // $condi_array = array("eMail" => "{$email}");
    $row = $obj->get_data("faculty", "fid, fname");
    $row1 = $obj->get_data("course", "cid, cname, fid");
    $arry['faculty'] = $row;
    // $arry['course'] = $row1;

    if (isset($row[0])) {
        // header("Content-Disposition:attachment;filename='jsonfile'");
        // array_push($arry, $row, $row1);
        echo json_encode($arry);
    }
}
if (isset($_POST["select_val"])) {
    $val = $_POST["select_val"];
    $condi_array = array("fid" => "{$val}");
    $row1 = $obj->get_data("course", "cid, cname", $condi_array);
    $arry['course'] = $row1;
    // $arry['course'] = $row1;

    if (isset($row1[0])) {
        echo json_encode($arry);
    }
}
