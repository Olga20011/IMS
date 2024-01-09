<?php
namespace IMS;

class Database{
    private $host="localhost";
    private $user="root";
    private $pass="";
    private $name="ims";
    private $conn;
   


    public function __construct(){
        $this->conn = new \mysqli($this->host ,$this->user, $this->pass, $this->name );

        if($this->conn->connect_error){
            die("Connection failed" . $this->conn->connect_error);
        }
    
    }

    public function tableExists(){
        $sql = "SHOW TABLES LIKE 'products'"  ;
        $result = $this->conn->query($sql);
        return $result->num_rows > 0;
    }
    
    public function createTable($tables){
        foreach($tables as $tableName =>$tableDefinition)
        if(!$this->tableExists($tableName)){
            $sql= "CREATE TABLE $tableName ($tableDefinition)";
            if($this->conn->query($sql)==TRUE){
                echo "Table '$tableName' created successfully <br>";
            }else{
                echo "Error creating table '$tableName': " . $this->conn->error . "<br>" ;    
            }
        }else{
            echo "Table '$tableName' already exists <br>";
        }
    }
}

?>