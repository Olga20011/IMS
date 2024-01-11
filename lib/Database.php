<?php
namespace lib;

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
    public function tableExists($tableName){
        $sql = "SHOW TABLES LIKE '$tableName'";
        $result = $this->conn->query($sql);
        return $result->num_rows > 0;
    }
    
    
    public function createTable($tables){
        foreach($tables as $tableName =>$tableDefinition){
            echo $tableName ."<br>";
            // echo $tableDefinition."<br>";

            if(!$this->tableExists($tableName)){
                $sql= "CREATE TABLE $tableName ($tableDefinition)";
                echo $sql;
                if($this->conn->query($sql)===TRUE){
                    echo "Table '$tableName' created successfully <br>";
                }else{
                    echo "Error creating table '$tableName': " . $this->conn->error . "<br>" ;    
                }
            }else{
                echo "Table '$tableName' already exists <br>";
            }
        }
    }

    public function PreparedStatement($query, $param){
        $this->prepare($query);
        if(!empty($params)){
            $this->bind_params($params);
        }
        return $this->execute();
    }
}

?>