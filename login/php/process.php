<?php
include("../../database/db.php");
include("../../functions/function.php");
// query object ----------------------
$obj1=new sfunction();
$obj=new query();
// query object end--------------
if(!$_POST){
    require_once("../html/login.php");
}else if(isset($_POST['log'])){
    $urlstatus =$obj1->get_safe_value($_POST['status']);
    $email =$obj1->get_safe_value($_POST['eMail']);
    $pass =$obj1->get_safe_value($_POST['pass']);
    // $remem=$obj1->get_safe_value($_POST['remem']);
    $condi_array = array("eMail"=>"{$email}","pass"=>"{$pass}");
    $row=$obj->get_data("user","",$condi_array);
    if(isset($row[0])){
        session_start();
        $_SESSION['Islogin']="yes";
         $_SESSION["status"]=$row[0]['status'];
         $_SESSION['email']=$row[0]['eMail'];
         $_SESSION['userName']=$row[0]['userName'];
    
         if(($row[0]['status']=="teacher" && $row[0]['status']==$urlstatus) || ($row[0]['status']=="admin"  && $row[0]['status']==$urlstatus)){
             redirect("../../teacher/php/home.php");
         }
         else if($row[0]['status']=="student" && $row[0]['status']==$urlstatus){
            redirect("../../student/php/home.php");    
        }
        else{
            redirect("../../index.html");
        }
    }
    if($row==0){
        $error="メールアドレスまたはパスワードを間違っています。";
        require_once("../html/login.php");
    }
}else if(isset($_POST['reg'])){
    // status
    // userName
    // regeMail
    // regpass
      echo $status =$obj1->get_safe_value($_POST['status']);
      echo $userName =$obj1->get_safe_value($_POST['userName']);
     echo  $regeMail=$obj1->get_safe_value($_POST['regeMail']);
      echo $regpass=$obj1->get_safe_value($_POST['regpass']);
      
   

}
?>