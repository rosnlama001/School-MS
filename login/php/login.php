<?php
session_start();
require_once("../../database/conn.php");
if (!$_POST) {
    require_once("../html/login.php");
} else if (isset($_POST["eMail"]) && isset($_POST["pass"])) {
    $sql = "select * from user where eMail='{$_POST['eMail']}' and pass='{$_POST['pass']}';";
    $result = $mysqli->query($sql);
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $_SESSION["userId"] = $row["userId"];
        $_SESSION["login"] = "yes";
        $login = $_SESSION["login"];
        // print_r($row);
        header("location:../html/profile.php");
        // echo ("loggd in");
        // echo $_SESSION["userId"];
    } else {
        echo ("Your are not registered or dataserver not connected");
    }
} else {
    echo ("Please login again");
}