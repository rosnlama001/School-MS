<?php
require_once("../../database/conn.php");
if (!$_POST) {
    require_once("../html/login.php");
} elseif (isset($_POST["reg"])) {

    $sql = "insert into user (userName,eMail,pass) values('{$_POST['userName']}','{$_POST['regeMail']}','{$_POST['regpass']}');";
    $result = $mysqli->query($sql);
    if ($result) {
        header("location:../html/registered.php");
    } else {
        echo ("its mada");
    }
} else {

    echo "first register to use.";
}