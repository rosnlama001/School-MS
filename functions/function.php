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

    

?>
