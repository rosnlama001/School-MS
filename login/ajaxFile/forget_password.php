<?php
include("../../database/db.php");
include("../../functions/function.php");
// query object ----------------------
$obj1=new sfunction();
$obj=new query();
// query object end--------------
if(isset($_POST['femail'])){
     $femail=$obj1->get_safe_value($_POST['femail']);
     $condi_array = array("eMail"=>"{$femail}");

     $row=$obj->get_data("user","",$condi_array);
    //  select * form user where eMail="$femail";
    
     if(isset($row[0])){
            $ok='ok';
            echo $ok;
     }else{
         echo $ok = "bad";
     }

}

?>