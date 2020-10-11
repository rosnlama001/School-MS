<?php
session_start();

require_once("../../database/conn.php");
if (!$_POST) {
    require_once("../html/login.php");
} else if (isset($_POST["sub"])) {
    $_SESSION["eMail"] = $_POST["eMail"];
    $_SESSION["pass"] = $_POST["pass"];
    $_SESSION["login"] = "yes";
    $login = $_SESSION["login"];
    $sql = "select * from user where eMail='{$_POST['eMail']}' and pass='{$_POST['pass']}';";
    $result = $mysqli->query($sql);
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if (isset($_POST["remember-me"])) {
            setcookie("eMail", $_POST["eMail"], time() + 2592000, "/");
            setcookie("pass", $_POST["pass"], time() + 2592000, "/");
        } else {
            setcookie("eMail", $_POST["eMail"], time() -  30, "/");
            setcookie("pass", $_POST["pass"], time() -  30, "/");
        }
        header("location:../../teacher/php/home.php");
    } else {
        echo ("Your are not registered or dataserver not connected");
    }
} else {
    echo ("Please login again");
}