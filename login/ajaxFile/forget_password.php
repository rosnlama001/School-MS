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
        $date = get_date();
        $otp = get_otp(5);
        mb_language("uni");
        mb_internal_encoding("UTF-8");
        $subject = "OTP確認";
        $message = "OTPは" . $otp . "です。";
        $mailFrom = "From: ADMIN<admin@sms.com>\r\n";
        echo $date;
     }else{
         echo $ok = "bad";
     }

}

?>