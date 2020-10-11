<?php
include("../database/conn.php");
// to use this function 
// include  file path
// and 
// call the function 
// $eMail=get_safe_value($_POST['email']);
// 
// -------------------------------------------------------
<<<<<<< HEAD
    function get_safe_value($str){
        global $mysqli;
        $result=$mysqli -> real_escape_string($str);
        $result=htmlentities($result);
        return $result;
        }

    function redirect($url){
=======
function get_safe_value($str)
{
    global $mysqli;
    $result = $mysqli->real_escape_string($str);
    $result = htmlentities($result);
    return $result;
}
function redirect($url)
{
>>>>>>> 4857d6c395b1cd6c724ef4553432983d75632fc1
    return header("location:{$url}");
}
// redirect("../index.html");
function get_date()
{
    date_default_timezone_set("Asia/Tokyo");
    $date = date("Y/m/d h:i:s");
    echo $date;
}
// get_date();
function get_otp($val)
{
    $otp = "";
    for ($i = 0; $i <  $val; $i++) {
        $otp .= mt_rand(0, 9);
    }
<<<<<<< HEAD
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
=======
    echo $otp;
}
    // get_otp(5);
>>>>>>> 4857d6c395b1cd6c724ef4553432983d75632fc1
