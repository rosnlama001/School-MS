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
}else if(isset($_POST["status"]) && $_POST["status"]=="fetch"){
            $num_rec_per_page = 7;
            $page  ='';
            if (isset($_POST["page_no"])) { 
                 $page  = $_POST["page_no"]; 
            }else{
                  $page=1; 
            };
      $start_from1 = ($page-1) * $num_rec_per_page;
      $start_from = "$start_from1";
     $condi_array = array("status" => "student");
     $row=$obj->get_data('studentpf','*','','pfId','desc',$start_from,$num_rec_per_page);
    // echo json_encode($row);
    //  $row=$obj->get_data("studentpf","*","","","",'0',$num_rec_per_page);
    //  die($row);
    //  $row=$obj->get_join_data('user','studentpf','*','userId',$condi_array,'','',$start_from,$num_rec_per_page);
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
    $condi_array = array("pfId" => "{$userId}");
    $row = $obj->get_data("studentpf", "*", $condi_array);
    // $row = $obj->get_join_data('user','studentpf','','userId',$condi_array);
    if (isset($row[0])) {
        $data['data'] = $row[0];
        echo json_encode($data);
    }else{
        $data['error']="no data found";
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
    $hobby = $_POST['hobby'];
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
    $row = $obj->update_data('studentpf', $condi_array, 'pfId', $userId);
    if (!isset($row)) {
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
    if ($row) {
        // echo "NOT REGISTERED";
        echo 0;
    } else {
        // echo "User Registered Success";
        echo 1;
    }
} else {
    echo "data error";
}

?>
