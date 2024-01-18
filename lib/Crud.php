<?php 

namespace lib;

require_once 'Database.php';

class Crud{

    private $db;
    public function  __construct(){
        $this->db= new Database();

    }

    public function create($tables, $data){
        $columns= implode(', ', array_keys($data));
        $placeholders = implode (', ', array_fill(0, count($data), '?'));
        
        $sql="INSERT INTO $tables ($columns) VALUES ($placeholders)";

        $stmt= $this->db->prepare($sql);

        $values = array_values($data);
        $types = str_repeat('s' , count($values));

        $stmt->bind_param($types, ...$values);

        $stmt->execute();

        return $stmt->affected_rows;
        

    }

    public function update($table, $data, $condition){
        $setClause = '';
        foreach ($data as $column => $value) {
            // Properly format values (string values should be enclosed in quotes)
            $formattedValue = is_string($value) ? "'$value'" : $value;
            $setClause .= "$column = $formattedValue, ";
        }
        $setClause = rtrim($setClause,',');  // Remove trailing comma
        
        $sql = "UPDATE $table SET $setClause WHERE $condition";
        print($sql);
        // Debugging: echo "SQL Query: $sql";
        
        $stmt = $this->db->prepare($sql);
        
        if ($stmt === false) {
            echo "Error preparing statement: " ;
        }
        
        // Assuming all values are strings, adjust as needed
        $bindTypes = str_repeat('s', count($data));
        $values = array_values($data);
        
        // Bind parameters
        $stmt->bind_param($bindTypes, ...$values);
        
        // Execute update
        $stmt->execute();
        
        // Check for success
        if ($stmt->errno) {
            echo "Error executing statement: " . $stmt->error;
            return false;
        }
        
        $success = $stmt->affected_rows > 0;
        
        // Close the statement
        $stmt->close();
        
        return $success;
    }
    
    
    
    

        


    }





    $tables='products';
    $data= array(
        'prd_name'=> 'soda',
        'serial_no'=>2334556,
        'description'=> 'This is the best soda i have taken in a long time',
        'price'=>2500 ,
        'quantity'=>5,
        'category_id'=>1,
        'created_at'=>'2023-02-12',
        'updated_at'=>'2024-01-01',

    );

    $crud = new Crud();

    $result=$crud->create($tables, $data);

    if($result !==false){
        echo "User inserted successfully. Affected row:$result";

    }else{
        echo "Error inserting user.";
    }


    $table = 'products';
    $data = array(
        'quantity' => 10,
        'prd_name' => 'coca cola'
    );
    $condition = 'id = 1';
    
    $result = $crud->update($table, $data, $condition);
    
    
   



