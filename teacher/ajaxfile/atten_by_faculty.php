<?php 
// session_start();
include("../../database/db.php");
include("../../functions/function.php");
// query object ----------------------
$obj1 = new sfunction();
$obj = new query();
// $data=get_date();
// query object end--------------
    if (isset($_SESSION['Islogin']) && isset($_SESSION['Islogin']) != 'yes') {
        redirect("../../index.php");
    }else if(isset($_POST['status']) && $_POST['status']=='student'){
        if($_POST['status']=='student'){
            $row = $obj->get_data("faculty");
            if(isset($row[0])){
                $data['data']=$row;   
            } 
            $data['total']=[];
            $data['totalp']=[];
            $data['totala']=[];
            foreach($row as $list){
                $condi_array=array("faculty"=>"{$list['fname']}");
                $row1 =$obj->get_join_data("studentpf",'faculty','studentpf.faculty','faculty',$condi_array,'','','','','fname');
                if($row1[0]){
                    $total=count($row1);
                }else{
                    $total="0";
                } 
                array_push($data['total'],$total); 
                $row2 =$obj->get_join_data("studentpf",'studentattendance','*','pfId',$condi_array);
                if($row2[0]){
                    $totalp=count($row2);
                }else{
                    $totalp="0";
                }
                array_push($data['totalp'],$totalp);
                $totala=($total-$totalp);
                array_push($data['totala'],$totala);
            }
            // print_r($data['total']);
            echo json_encode($data);
        }
        
    }

?>