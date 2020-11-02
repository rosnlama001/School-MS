<?php 
// // session_start();
include("../../database/db.php");
include("../../functions/function.php");
// query object ----------------------
$obj1 = new sfunction();
$obj = new query();
// query object end--------------
$output="";

if(isset($_SESSION['Islogin']) && isset($_SESSION['Islogin'])!='yes'){
    redirect("../../index.php");
}else{
    $limit_per_page=5;
    $page="";
    if(isset($_POST["page_no"])){
        $page=$_POST["page_no"];
    }
    else{
        $page=1;
    }
    $start_from=($page-1)*$limit_per_page;
    $condi_array = array("status" => "student");
    $row=$obj->get_join_data('user','studentpf','*','userId',$condi_array,'','',$start_from,$limit_per_page);
        if(isset($row[0])){
            $output.=" <div style='overflow-x:auto;'>
                        <table id='mytbl'>
                            <tr>
                                <th>sn</th>
                                <th>username</th>
                                <th>email</th>
                                <th>phone</th>
                                <th>address</th>
                                <th>Faculty</th>
                                <th>Course</th>
                                <th>action</th>
                            </tr>";
                            $sn=1;
            for($i=0; $i<count($row); $i++,$sn++){
                $output.=" <tr>
                        <td>$sn</td>
                        <td><a href=''>{$row[$i]['fullName']}</a></td>
                        <td>{$row[$i]['eMail']}</td>
                        <td>{$row[$i]['mobile']}</td>
                        <td>{$row[$i]['address']}</td>
                        <td>{$row[$i]['faculty']}</td>
                        <td>{$row[$i]['course']}</td>
                        <td>
                            <a href='' class='smBtn'>Edit</a>
                            <a href='' class='smBtn-d'>Delete</a>
                        </td>
                    </tr>";
            }
           
            $output.="</table>";
            $output.="</div>
            <div class='pagenition'>";
        $row1=$obj->get_data('user');
        $total_record=count($row1);
        $total_page=ceil($total_record/$limit_per_page);
        
        for($i=1;$i<=$total_page;$i++){
            if($i==$page){
                $active="active";
            }else{
                $active="";
            }
            if($total_record>$limit_per_page){
                $output.="<span id='$i'  class='pgnbtn $active'>$i</span>";
            }
        }

           $output.=" </div>";
            echo $output;
        }else{
            echo "No data Found for students";
        }
}


?>