<?php
require_once("../../database/conn.php");
if (!$_POST) {
    require_once("../html/fpass.php");
} elseif ($_POST["sub"]) {
    $sql = "select * from user where eMail='{$_POST['eMail']}';";
    $result = $mysqli->query($sql);
    if ($result->num_rows == 1) {
        session_start();
        $row = $result->fetch_assoc();
        $_SESSION["userId"] = $row["userId"];
        $userId = $_SESSION["userId"];
        mb_language("uni");
        mb_internal_encoding("UTF-8");
        $subject = "OTP確認";
        $message = "OTPは" . $otp . "です。";
        $mailFrom = "From: 管理者<meru@example.com>\r\n";
        if (mb_send_mail($row['eMail'], $subject, $message, $mailFrom)) {
            $sql = "update user set otp='{$otp}', dateTime='{$time}' where userId='{$row['userId']}';";
            $mysqli->query($sql);
            header("location:fpassII.php");
        }
    } else {
        echo "メールは存在しません。";
        require_once("../html/fpass.php");
    }
} else {
    echo ("data era");
}