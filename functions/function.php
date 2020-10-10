<?php
include("../database/conn.php");
get_safe_value($str){
    $result=$mysqli -> real_escape_string($str);
    $result=htmlentities($result);
    return $result;
}

$str="<p>hello</p>";
get_safe_value($str);
?>
