<?php
require_once("../../database/conn.php");
if (!$_POST) {
    require_once("../html/login.php");
} else if (isset($_POST["reg"])) {

    $sql = "insert into user (userName,eMail,pass) values('{$_POST['userName']}','{$_POST['regeMail']}','{$_POST['regpass']}');";
    $result = $mysqli->query($sql);
    if ($result) {
        echo "data submited";
    } else {
        echo ("its mada");
    }
} else {

    echo "first register to use.";
}