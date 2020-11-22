<?php
// session_start();
include("../../database/db.php");
include("../../functions/function.php");
// query object ----------------------
$obj1 = new sfunction();
$obj = new query();
// query object end--------------
if (isset($_SESSION['Islogin']) && isset($_SESSION['Islogin']) != 'yes') {
    redirect("../../index.php");
<<<<<<< HEAD
}else if(isset($_POST["status"]) && $_POST["status"]=="fetch"){
            $num_rec_per_page = 10;
            $page  ='';
            if (isset($_POST["page_no"])) {  $page  = $_POST["page_no"]; } else {  $page=1; };
            $start_from = ($page-1) * $num_rec_per_page;
     $condi_array = array("status" => "student");
     $row=$obj->get_data("studentpf","*","","","",$start_from,$num_rec_per_page);
    //  die($row);
    //  $row=$obj->get_join_data('user','studentpf','*','userId',$condi_array,'','',$start_from,$num_rec_per_page);
            if(isset($row[0])){   
                    $json[]=$row; 
                    $data['data'] = $json;

                    $row1=$obj->get_data('studentpf');
                    $result = count($row1);
                    $data['total'] = $result;

                    $row2=$obj->get_data('faculty');
                    $json1[]=$row2;
                    $data['faculty'] = $json1;

                    $row3=$obj->get_data('course');
                    $json2[]=$row3;
                    $data['course'] = $json2;
                    
                    echo json_encode($data);
            }else{
            echo "<strong style='color:crimson' >No data Found for students</strong>";
            }
}else if(isset($_POST['status']) && $_POST['status']=='getData'){
     $userId = $_POST['userId'];
     $status = $_POST['status'];
    $condi_array = array("pfId" => "{$userId}");
    $row=$obj->get_data("studentpf","*",$condi_array);
    // $row = $obj->get_join_data('user','studentpf','','userId',$condi_array);
    if(isset($row[0])){ 
        $data['data']=$row[0];
=======
} else if (isset($_POST["status"]) && $_POST["status"] == "fetch") {
    $num_rec_per_page = 10;
    $page  = '';
    if (isset($_POST["page_no"])) {
        $page  = $_POST["page_no"];
    } else {
        $page = 1;
    };
    $start_from = ($page - 1) * $num_rec_per_page;
    $condi_array = array("status" => "student");
    $row = $obj->get_join_data('user', 'studentpf', '*', 'userId', $condi_array, '', '', $start_from, $num_rec_per_page);
    if (isset($row[0])) {
        $json[] = $row;
        $data['data'] = $json;

        $row1 = $obj->get_data('studentpf');
        $result = count($row1);
        $data['total'] = $result;

        $row2 = $obj->get_data('faculty');
        $json1[] = $row2;
        $data['faculty'] = $json1;

        $row3 = $obj->get_data('course');
        $json2[] = $row3;
        $data['course'] = $json2;

        echo json_encode($data);
    } else {
        echo "<strong style='color:crimson' >No data Found for students</strong>";
    }
} else if (isset($_POST['status']) && $_POST['status'] == 'getData') {
    $userId = $_POST['userId'];
    $status = $_POST['status'];
    $condi_array = array("user.userId" => "{$userId}");
    $row = $obj->get_join_data('user', 'studentpf', '', 'userId', $condi_array);
    if (isset($row[0])) {
        $data['data'] = $row[0];
>>>>>>> e4dd95330868abd383b8e1e88562ded2fa43a725
        echo json_encode($data);
    }
} else if (isset($_POST['status']) && $_POST['status'] == 'update') {
    $userId = $_POST['userId'];
    $regno = $_POST['regno'];
    $lname = $_POST['lname'];
    $fname = $_POST['fname'];
    $zip = $_POST['zip'];
    $address1 = $_POST['address1'];
    $address2 = $_POST['address2'];
    $dob = $_POST['dob'];
    $tel = $_POST['tel'];
    $faculty = $_POST['faculty'];
    $course = $_POST['course'];
    $gender = $_POST['gender'];
    // $hobby = $_POST['hobby'];
    $condi_array = array(
        "regno" => "{$regno}",
        "lname" => "{$lname}",
        "fname" => "{$fname}",
        "postcode" => "{$zip}",
        "address" => "{$address1}",
        "address1" => "{$address2}",
        "mobile" => "{$tel}",
        "faculty" => "{$faculty}",
        "course" => "{$course}",
    );
<<<<<<< HEAD
    $row = $obj->update_data('studentpf',$condi_array,'pfId',$userId);
    if(!isset($row)){ 
            echo 1;
    }else{
            echo 0;
        }
}
else if(isset($_POST['status']) && $_POST['status']=='delete'){
   $userId = $_POST['userId'];
   $status = $_POST['status'];
   $row = $obj->delete_data('studentpf','pfId',$userId);
   if(isset($row)){ 
=======
    $row = $obj->update_data('studentpf', $condi_array, 'userId', $userId);
    if (!isset($row)) {
>>>>>>> e4dd95330868abd383b8e1e88562ded2fa43a725
        echo 1;
    } else {
        echo 0;
    }
} else if (isset($_POST['status']) && $_POST['status'] == 'delete') {
    echo  $userId = $_POST['userId'];
    echo  $status = $_POST['status'];
    $row = $obj->delete_data('studentpf', 'userId', $userId);
    if (isset($row)) {
        echo 1;
    } else {
        echo 0;
    }
} else if (isset($_POST['status']) && $_POST['status'] == 'insert') {
    // echo  $status = $_POST['status'];
    $json = $_POST['json'];
    $inputData = json_decode($json);
    // print_r($inputData->hobby);
    // print_r($inputData);
    $hobby = implode(" ", $inputData->hobby);
    // echo $hobby;
    $row = $obj->insert_data("studentpf", "regno,lname,fname,sex,birthdate,mobile,postcode,address,address1,faculty,course,hobby", "{$inputData->regno},{$inputData->lname},{$inputData->fname},{$inputData->Gender},{$inputData->dob},{$inputData->tel},{$inputData->zip},{$inputData->address1},{$inputData->address2},{$inputData->faculty},{$inputData->course},{$hobby}");
    if (!$row) {
        echo "NOT REGISTERED";
    } else {
        echo "User Registered Success";
    }

    // print_r($inputData->zip);
}
<<<<<<< HEAD
else if(isset($_POST['status']) && $_POST['status']=='insert'){
    echo  $userId = $_POST['userId'];
    echo  $status = $_POST['status'];
    
 }
?>
=======
>>>>>>> e4dd95330868abd383b8e1e88562ded2fa43a725
