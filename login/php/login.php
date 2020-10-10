<?php
session_start();
require_once("../../database/conn.php");
if (!$_POST) {
    require_once("../html/login.php");
} else if ($_GET["status"] == "teacher") {
    // echo $_GET["status"];
    if (isset($_POST["eMail"]) && isset($_POST["pass"])) {
        $sql = "select * from user where eMail='{$_POST['eMail']}' and pass='{$_POST['pass']}';";
        $result = $mysqli->query($sql);
        if ($result->num_rows == 1) {
            header("location:../../teacher/php/home.php");
            echo ("loggd in");
        } else {
            echo ("login fail");
        }
    } else {
        echo ("post fail");
    }
} else {
    echo "You are not teacher";
}
if ($_GET["status"] == "admin") {
    // echo $_GET["status"];
    if (isset($_POST["eMail"]) && isset($_POST["pass"])) {
        $sql = "select * from user where eMail='{$_POST['eMail']}' and pass='{$_POST['pass']}';";
        $result = $mysqli->query($sql);
        if ($result->num_rows == 1) {
            header("location:../../teacher/php/home.php");
            echo ("loggd in");
        } else {
            echo ("login fail");
        }
    } else {
        echo ("post fail");
    }
} else {
    echo "You are not admin";
}