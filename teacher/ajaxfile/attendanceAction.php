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
}else if(isset($_POST['status']) && $_POST['status']=='student'){
    $num_rec_per_page = 5;
    $page  ='';
    if (isset($_POST["page_no"])) { 
         $page  = $_POST["page_no"]; 
    }else{
          $page=1; 
    };
    $start_from1 = ($page-1) * $num_rec_per_page;
    $start_from = "$start_from1";
    $condi_array = array("status" => "{$_POST['status']}");
    $table="";
    $table1="";
    if($_POST['status']=='student'){
        $table.="studentattendance";
        $table1.="studentpf";
    }else if($_POST['status']=='teacher'){
        $table.="teacherattendance";
        $table1.="teacherpf";
    }
    $row1=$obj->get_data($table);
    // $fac=mb_convert_encoding($_POST['faculty'],"SJIS","UTF-8");
    
    $faculty1=$_POST['faculty'];
    $coni=array("fid"=>"{$faculty1}");
    $fac_tb=$obj->get_data("faculty",'fname',$coni);
    if($fac_tb[0]){
        $faculty=$fac_tb[0]['fname'];
        $fac=$fac_tb[0]['fname'];
    }
    $today="2020-11-29";
    $key=$table1.".faculty";
    $date=$table.".date";
    // $condi_array1=array("{$key}"=>"{$faculty}","{$date}"=>"{$today}");
    $condi_array1=array("{$key}"=>"{$faculty}");
    $row=$obj->get_join_data($table,$table1,'*','pfId',$condi_array1,'time','desc',$start_from,$num_rec_per_page);
    //   die($row);
        if(isset($row[0])){   
                $data['data'] = $row;
                $result = count($row1);
                $data['total'] = $result; 
                $data['faculty']=$fac;          
                echo json_encode($data);
        }else{
            // $data['faculty']=$fac;
            $data['error']="0";
            $data['faculty']=$fac;
            echo json_encode($data);
        }
}else if(isset($_POST['status']) && $_POST['status']=='insert'){
    print_r($_POST);
    extract($_POST);
    // regno,time,select,date
    echo $regno;
    // $condi_array=array("regno"=>"{$regno}");
    // $row =$obj->get_data("studentpf",'pfId',$condi_array);
    // // print_r($row);
    // $id=$row[0]['pfId'];
    // echo $id;

}
?>