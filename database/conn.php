<?php
$mysqli = new mysqli("localhost", "root", "", "project");
// OTP generate
$otp = "";
for ($i = 0; $i < 4; $i++) {
    $otp .= mt_rand(0, 9);
}
// time setup
date_default_timezone_set("Asia/Tokyo");
$time = date('Y/m/d h:i:s');
// or die($mysqli)