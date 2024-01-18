<?php
namespace lib;

class Database{
    private $host="localhost";
    private $user="root";
    private $pass="";
    private $name="ims";
    private $conn;
    private $stmt;
    

    // private static $instance;
   


    public function __construct(){
        $this->conn = new \mysqli($this->host ,$this->user, $this->pass, $this->name );

        if($this->conn->connect_error){
            die("Connection failed" . $this->conn->connect_error);
        }
    
    }

    public function query($sql) {
        return mysqli_query($this->conn, $sql);
    
    }

    public function tableExists($tableName){
        $sql = "SHOW TABLES LIKE '$tableName'";
        $result = $this->conn->query($sql);
        return $result->num_rows > 0;
    }
    
    
    public function createTable($tables){
        if (is_array($tables)){
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
}

    public function prepare($query){
        return $this->conn->prepare($query);
    }

    public function bind_params($params){
        // Assumiing $params is an array where keys are parameters

        $types = implode('', array_keys($params));
        $values = array_values($params);

        $stmt=$this->stmt;

        $stmt->bind_param($types, ...$values);
    }

    public function execute(){
        $stmt = $this->stmt;
        $stmt->execute();
        return $stmt->affected_row();
    }

}

