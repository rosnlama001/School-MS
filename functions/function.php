<?php
include("../database/conn.php");
get_safe_value($str){
    $result=$conn -> real_escape_string($str);
    $result=htmlentities($str);
    return $result;
}

$str="<p>hello</p>";
get_safe_value($str)
?>
