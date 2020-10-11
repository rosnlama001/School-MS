<?php
require_once("../../database/conn.php");
require_once("../../functions/function.php");
if (isset($_POST["reg"])) {
    $status = $_POST["status"];
    $userName = get_safe_value($mysqli, $_POST["userName"]);
    $eMail = get_safe_value($mysqli, $_POST["eMail"]);
    $pass = get_safe_value($mysqli, $_POST["pass"]);
    $pass = password_hash($pass, PASSWORD_DEFAULT);
    $sql = "insert into user (userName,eMail,pass,status,regDate) values('{$userName}','{$eMail}','{$pass}','{$status}',now());";
    $result = $mysqli->query($sql);
    if ($result) {
        redirect("../html/registered.php");
    } else {
        echo ("its mada");
    }
} else {
    redirect("../../index.html");
}