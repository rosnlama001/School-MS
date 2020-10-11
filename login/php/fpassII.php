<?php
if (!$_POST) {
    require_once("../html/otp.php");
} elseif (isset($_POST["sub"])) {
    $sql = "select * from user where otp='{$_POST['otp']}';";
    $result = $mysqli->query($sql);
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $val = (strtotime(date('Y/m/d h:i:s')) - strtotime($row["dateTime"]));
        if ($val > 60) {
            echo "登録完了時間60秒すぎました。" . "<br>";
            echo "また <a href='register.php'>ユーザ登録</a> をお願いします。" . "<br>";
            $sql = "delete from user where userId='{$row['userId']}';";
            $mysqli->query($sql);
        } else {
            mb_language("uni");
            mb_internal_encoding("UTF-8");
            $subject = "OTP確認";
            $message = "OTPは" . $randStr . "です。";
            $mailFrom = "From: 管理者<meru@example.com>\r\n";
            if (mb_send_mail($row['eMail'], $subject, $message, $mailFrom)) {
                $sql = "update user set dummyPass='', securityCode='{$randStr}', dateTime='{$time}' where userId='{$row['userId']}';";
                $mysqli->query($sql);
                header("location:registered.php");
            }
        }
    } else {
        echo "<a href='register.php' style='text-decoration:none; font-weight:bold'>登録</a>" . "してからご利用ください。";
    }
} else {
    echo "（エラー）";
}