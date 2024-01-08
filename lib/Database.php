<?php

class Database{
    private $host="localhost";
    private $user="root";
    private $pass="";
    private $name="ims";
    private $conn;
   


    public function __construct(){
        $this->conn = new mysqli($this->host ,$this->user, $this->pass, $this->name );

        if($this->conn->connect_error){
            die("Connection failed" . $this->conn->connect_error);
        }
    
    }

    public function tableExists(){
        $sql = "SHOW TABLES LIKE 'products'"  ;
        $result = $this->conn->query($sql);
        return $result->num_rows > 0;
    }
    
    public function createTable($products, $tableDefinition){
        if(!$this->tableExists($products)){
            $sql= "CREATE TABLE $products ($tableDefinition)";
            if($this->conn->query($sql)==TRUE){
                echo "Table '$products' created successfully <br>";
            }else{
                echo "Error creating table '$products': " . $this->conn->error . "<br>" ;    
            }
        }else{
            echo "Table '$products' already exists <br>";
        }
    }
}

?>