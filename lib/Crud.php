<?php 
namespace lib;

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

        return $stmt->affected_row;
        

    }
}

?>