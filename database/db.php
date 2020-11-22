<?php
class Database
{
    private $server = "localhost";
    private $user = "root";
    private $password = "";
    private $dbname = "project";

    protected function conn()
    {
        $mysqli = new mysqli($this->server, $this->user, $this->password, $this->dbname) or die($mysqli);
        return $mysqli;
    }
}
class sfunction extends Database
{
    public function get_safe_value($str)
    {
        $result = $this->conn()->real_escape_string($str);
        $result = htmlentities($result);
        return $result;
    }
}
class query extends Database
{
    // tocheck the database connection
    // public function try(){
    // if($this->conn()){
    //     echo "connected.<br>";
    // }
    // else{
    //     echo "connection failes .<br>";
    // }
    // }
    // -------------------------
    public function  get_data($table, $field = "", $condition = "", $order_by_field = "", $order_updown = "", $limitofset = "", $limit = "")
    {
        $sql = "select * from $table ";
        if ($field != "") {
            $sql = "select {$field} from {$table}";
        }
        if ($condition != "") {
            $sql .= " where ";
            $count = count($condition);
            $i = 0;
            foreach ($condition as $key => $value) {
                $sql .= " {$key} ='{$value}' ";
                $i++;
                if ($i < $count) {
                    $sql .= " and ";
                }
            }
        }
        if ($order_by_field != "" && $order_updown != "") {
            $sql .= " order by {$order_by_field} {$order_updown} ";
        }
        if ($limitofset != "" && $limit != "") {
            $sql .= " limit  {$limitofset},{$limit} ";
        }
        //  die($sql);
        $result = $this->conn()->query($sql);
        if ($result->num_rows > 0) {
            $arr = array();
            while ($row = $result->fetch_assoc()) {
                $arr[] = $row;
            }
            // print_r($arr);
            return $arr;
        } else {
            //  echo "No data found";
            return 0;
        }
    }
    public function  insert_data($table, $field, $values)
    {
        $sql = "insert into $table";
        if ($field != "" && $values != "") {
            $sql .= "({$field})";
            $array = explode(",", $values);
            $count = count($array);
            $i = 0;
            $sql .= " values(";
            foreach ($array as $value) {
                $i++;
                $sql .= " '$value";
                if ($i < $count) {
                    $sql .= "',";
                }
            }
            $sql .= "')";
        }

        // die($sql);
        $result = $this->conn()->query($sql);
        // if($result==true){
        //     echo "Data  successfully Inserted";
        // }else{
        //     echo "Something Error in Inserting  data";
        // }
    }
    public function  update_data($table, $condition = "", $whereFiled = "", $wherethis = "")
    {
        $sql = "update $table set ";
        if ($condition != "") {
            $count = count($condition);
            $i = 0;
            foreach ($condition as $key => $value) {
                $sql .= " {$key} ='{$value}' ";
                $i++;
                if ($i < $count) {
                    $sql .= ",";
                }
            }
        }
        if ($whereFiled != "" && $wherethis != "") {
            $sql .= " where {$whereFiled} = '{$wherethis}'";
        }
        // die($sql);
        $result = $this->conn()->query($sql);
        // if($result==true){
        //     echo "Data  successfully Updated";
        // }else{
        //     echo "Something Error in Updating  data";
        // }
    }
    public function  delete_data($table, $whereFiled = "", $wherethis = "")
    {
        $sql = "delete from $table";
        if ($whereFiled != "" && $wherethis != "") {
            $sql .= " where {$whereFiled} = '{$wherethis}'";
        }

        // die($sql);
        $result = $this->conn()->query($sql);
        // if($result==true){
        //     echo "Data  successfully Deleted";
        // }else{
        //     echo "Something Error in Deleting  data";
        // }
    }
    public function  get_join_data($table1, $table2, $field = "", $condition1 = "", $condition2 = "", $order_by_field = "", $order_updown = "", $limitofset = "", $limit = "")
    {
        $sql = "select * from $table1,$table2 ";
        if ($field != "") {
            $sql = "select {$field} from {$table1},{$table2}";
        }
        if ($condition1 != "") {
            $sql .= " where $table1.$condition1 = $table2.$condition1 ";
            if ($condition2 != "") {
                $sql .= " and ";
                $count = count($condition2);
                $i = 0;
                foreach ($condition2 as $key => $value) {
                    $sql .= " {$key} ='{$value}' ";
                    $i++;
                    if ($i < $count) {
                        $sql .= " and ";
                    }
                }
            }
        }
        if ($order_by_field != "" && $order_updown != "") {
            $sql .= " order by {$order_by_field} {$order_updown} ";
        }
        if (($limitofset != "" || $limitofset == 0) && $limit != "") {
            $sql .= " limit  {$limitofset},{$limit} ";
        }
        //  die($sql);
        $result = $this->conn()->query($sql);
        if ($result->num_rows > 0) {
            $arr = array();
            while ($row = $result->fetch_assoc()) {
                $arr[] = $row;
            }
            // print_r($arr);
            return $arr;
            // echo $sql;
        } else {
            //  echo "No data found";
            return 0;
        }
    }
}

// to use this all object and its classes functi0ons
// $obj=new query();
// $obj->try();
// $condi_array = array("userName"=>"deepak");
// $obj->insert_data("user","userName,eMail,pass","deepak,deepakrajbanshi68@gmail.com,deepak2");
// $obj->delete_data("user","userId","4");
// $obj->update_data("user",$condi_array,"userId","4");
// $row=$obj->get_data("user","",$condi_array);
// foreach($row as $list){
//     echo $list['userName']." ".$list['eMail']." ".$list['pass']."<br>";
// }