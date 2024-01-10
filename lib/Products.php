<?php 

namespace lib;

include_once 'Database.php';

class Products{
    private $db; //instance of Database class

    public function __construct(){
        $this->db =new Database();

    }
    public function createProductTables($tables){
        $this->db->createTable($tables);

    }
    public function listAllProducts(){

    }

    public function searchProducts(){

    }
    public function calcTotalPrice($products){

    }
    public function generateProductReport(){

    }
}

$productInstance = new Products();
$tables=[
    'products' => "id INT AUTO_INCREMENT PRIMARY KEY,
                    prd_name VARCHAR(30) NOT NULL,
                    serial_no INT(11),
                    description TEXT,
                    price DECIMAL(10,2) NOT NULL,
                    quantity INT NOT NULL DEFAULT 0,
                    category_id INT,
                    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP",
];
$productInstance->createProductTables($tables);



?>