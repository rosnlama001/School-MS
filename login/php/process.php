<?php
include("../../database/db.php");
include("../../functions/function.php");
// query object ----------------------
$obj1 = new sfunction();
$obj = new query();
// query object end--------------
if (!$_POST) {
    require_once("../html/login.php");
} else if (isset($_POST['log'])) {
    $urlstatus = $obj1->get_safe_value($_POST['status']);
    $email = $obj1->get_safe_value($_POST['eMail']);
    $pass = $obj1->get_safe_value($_POST['pass']);

    $condi_array = array("eMail" => "{$email}");
    $row = $obj->get_data("user", "", $condi_array);

    if (isset($row[0])) {
        session_start();
        $_SESSION['Islogin'] = "yes";
        $_SESSION["status"] = $row[0]['status'];
        $_SESSION['email'] = $row[0]['eMail'];
        $_SESSION['pass'] = $row[0]['pass'];
        $_SESSION['userName'] = $row[0]['userName'];
        //  check hash password 
        if ($pass = password_verify($pass, $row[0]['pass']) && $row[0]['otp'] == "") {
            // rem
            if (isset($_POST['remem'])) {
                setcookie("email", $row[0]['eMail'], time() + 60 * 60 * 24 * 365, "/");
                setcookie("pass", $row[0]['pass'], time() + 60 * 60 * 24 * 365, "/");
            } else {
                setcookie("email", $row[0]['eMail'], time() - 60 * 60 * 24 * 366, "/");
                setcookie("pass", $row[0]['pass'], time() - 60 * 60 * 24 * 366, "/");
            }
            // end rem
            if (($row[0]['status'] == "teacher" && $row[0]['status'] == $urlstatus) || ($row[0]['status'] == "admin"  && $row[0]['status'] == $urlstatus)) {
                redirect("../../teacher/php/home.php");
            } else if ($row[0]['status'] == "student" && $row[0]['status'] == $urlstatus) {
                redirect("../../student/php/home.php");
            } else {
                $red = "illegal";
                redirect("../../index.php?red={$red}");
            }
        } else {
            // $error = "メールアドレスまたはパスワードを間違っています。";
            redirect("../html/login.php?status={$urlstatus}&&error=error");
        }
    }
    if ($row == 0) {
        // $error = "メールアドレスまたはパスワードを間違っています。";
        redirect("../html/login.php?status={$urlstatus}&&error=error");
    }
} else if (isset($_POST['reg'])) {
    // status
    // userName
    // regeMail
    // regpass
    $status = $obj1->get_safe_value($_POST['status']);
    $userName = $obj1->get_safe_value($_POST['userName']);
    $regeMail = $obj1->get_safe_value($_POST['regeMail']);
    $regpass = $obj1->get_safe_value($_POST['regpass']);
    $hashPass = password_hash($regpass, PASSWORD_DEFAULT);
    $date = get_date();
    $otp = get_otp(5);

    $condi_array = array("eMail" => "{$regeMail}");
    $row = $obj->get_data("user", "", $condi_array);
    if (isset($row[0])) {
        $error = "メールアドレスは既に登録されていますので、別のメールアドレスでお試しください。";
        redirect("../../index.html?error={$error}");
    } else {
        mb_language("uni");
        mb_internal_encoding("UTF-8");
        $subject = "OTP確認";
        $message = "OTPは" . $otp . "です。";
        $mailFrom = "From: ADMIN<admin@sms.com>\r\n";
        if (mb_send_mail($regeMail, $subject, $message, $mailFrom)) {
            $obj->insert_data(
                "user",
                "userName,eMail,pass,status,otp,regDate,otpDate",
                "$userName,$regeMail,$hashPass,$status,$otp,$date,$date"
            );
            $msg = "メール確認のためOTPをメールで送信しました。"; 
            require_once("../html/otp.php");
        }
    }
} else if (isset($_POST["sub"])) {
    $otp = $obj1->get_safe_value($_POST["otp"]);
    $condi_array = array("otp" => "{$otp}");;
    $row = $obj->get_data("user", "", $condi_array);
    if (isset($row[0])) {
        $date = get_date();
        $timeOut = (strtotime($date) - strtotime($row["otpDate"]));
        if ($timeOut < 30) {
            redirect("../../index.php?red=OK");
        }
        echo $row[0]["otp"];
        echo "OTP confirmed";
    }
}
