<?php
class Database{
    private $__User = "root";
    private $__Pass = "";
    private $__Host = "localhost";
    private $__Data = "dsbinhdinh";
    public $__conn;

    function dbConnect(){
        if (!$this->__conn){

            $this->__conn = mysqli_connect($this->__Host, $this->__User, $this->__Pass, $this->__Data) or die ('Lỗi kết nối');

            mysqli_query($this->__conn, "SET character_set_results = 'utf-8', character_set_client = 'utf-8', character_set_database = 'utf-8', character_set_server = 'utf-8'");
            mysqli_set_charset($this->__conn, 'UTF8');
        }
    }

    function dbDisconnect(){
        if ($this->__conn){
            mysqli_close($this->__conn);
        }
    }

    function dbInsert($table, $data){
        $this->dbConnect();
        $field_list = '';
        $value_list = '';

        foreach ($data as $key => $value){
            $field_list .= ",$key";
            $value_list .= ",'".mysqli_escape_string($this->__conn, $value)."'";
        }

        $sql = 'INSERT INTO '.$table. '('.trim($field_list, ',').') VALUES ('.trim($value_list, ',').')';
 
        return mysqli_query($this->__conn, $sql);
    }

    function dbUpdate($table, $data, $where){
        $this->dbConnect();
        $sql = "";

        foreach ($data as $key => $value){
            $sql .= "$key = '".mysqli_escape_string($this->__conn, $value)."',";
        }

        $sql = 'UPDATE '.$table. ' SET '.trim($sql, ',').' WHERE '.$where;
 
        return mysqli_query($this->__conn, $sql);       
    }

    function dbGetlist($sql){

        $this->dbConnect();

        $result = mysqli_query($this->__conn, $sql);

        if (!$result) {
            die ("Truy Vấn Lỗi");
        }

        $return = array();

        while ($row = mysqli_fetch_assoc($result)){
            $return[] = $row;
        }

        mysqli_free_result($result);

        return $return;
    }

    function dbGetrow($sql){

        $this->dbConnect();

        $result = mysqli_query($this->__conn, $sql);

        if (!$result) {
            die ("Truy Vấn Lỗi");
        }

        $row = mysqli_fetch_assoc($result);

        mysqli_free_result($result);

        if ($row){
            return $row;
        }

        return false;
    }

    function dbRemove($table, $where){

        $this->dbConnect();
         
        $sql = "DELETE FROM $table WHERE $where";
        return mysqli_query($this->__conn, $sql);
    }


}

?>