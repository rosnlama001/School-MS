<?php
include("../database/conn.php");
// to use this function 
    // include  file path
    // and 
    // call the function 
    // $eMail=get_safe_value($_POST['email']);
    // 
// -------------------------------------------------------
    function get_safe_value($str){
        global $mysqli;
        $result=$mysqli -> real_escape_string($str);
        $result=htmlentities($result);
        return $result;
        }

    function redirect($url){
    return header("location:{$url}");
    }
    // redirect("../index.html");
    function get_date(){
        date_default_timezone_set("Asia/Tokyo");
        $date=date("Y/m/d h:i:s");
        echo $date;
    }
    // get_date();
    function get_otp($val){
        $otp = "";
        for ($i = 0; $i < $val; $i++) {
            $otp .= mt_rand(0, 9);
        }
        echo $otp;
    }
    // get_otp(8);

?>
