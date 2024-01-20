<?php

namespace lib;

require_once 'Database.php';

class Crud {

    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function create($table, $data) {
        $columns = implode(', ', array_keys($data));
        $placeholders = implode(', ', array_fill(0, count($data), '?'));

        $sql = "INSERT INTO $table ($columns) VALUES ($placeholders)";

        $stmt = $this->db->prepare($sql);

        $values = array_values($data);
        $types = str_repeat('s', count($values));

        $stmt->bind_param($types, ...$values);

        $stmt->execute();

        return $stmt->affected_rows;
    }

    public function update($table, $data, $condition) {
        $setClause = '';
        $values = array();
        $bindTypes = '';
    
        foreach ($data as $column => $value) {
            // Properly format values (string values should be enclosed in quotes)
            $setClause .= "$column = ?, ";
            $values[] = $value;
    
            // Adjust the bind types based on the type of value
            if (is_int($value)) {
                $bindTypes .= 'i';
            } else {
                $bindTypes .= 's';
            }
        }
    
        $setClause = rtrim($setClause, ', ');  // Remove trailing comma and space
    
        $sql = "UPDATE $table SET $setClause WHERE $condition";
    
        $stmt = $this->db->prepare($sql);
    
        if ($stmt === false) {
            echo "Error preparing statement: ";
        }
    
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
    
    public function readData($tableName){
        $sql= "SELECT * FROM $tableName";
        // print("result"); 

        $stmt= $this->db->prepare($sql);

        // print($stmt);

        if(!$stmt){
            die("Error in preparing statement");
        }

        $stmt->execute();

        $result = $stmt->get_result();
        $data = [];

        while ($row = $result->fetch_assoc()){
            $data[] = $row;
            // print_r($row);
        }
        return $data;

    }
    public function deleteData($tableName, $primaryKeyValue){
        $sql = "DELETE FROM $tableName WHERE id= ?";

        $stmt = $this->db->prepare($sql);

        if(!$stmt){
            die("Error in prearing statement");
        }

        $stmt->bind_param('i' , $primaryKeyValue);

        $success = $stmt->execute();

        if ($success) {
            echo "Data has been successfully deleted.";
        } else {
            echo "Error deleting data.";
        }

    }
}

// Instantiate the Crud class
$crud = new Crud();


$tables = 'products';
$data = array(
    'prd_name' => 's',
    'serial_no' => "i",
    'description' => 'i',
    'price' => 'i',
    'quantity' => 'i',
    'category_id' => 'i',
    'created_at' => '2023-02-12',
    'updated_at' => '2024-01-01',
);

// Perform create operation
$result = $crud->create($tables, $data);

if ($result !== false) {
    echo "User inserted successfully. Affected row: $result";
} else {
    echo "Error inserting user.";
}

// Example data for update operation
$table = 'products';

$data = array('quantity' => "9", 
'prd_name' => "Fanta "
);
$condition = ' id = 8';

// Perform update operation
$result = $crud->update($table, $data, $condition);

$crud = new Crud();
$data = $crud->readData("products");
$crud->deleteData('products', 7);
