<?php
use IMS\Database;

// create_table.php (for example)

include_once 'lib/Database.php'; // Include the file where Database class is defined

$tables =[

    'products' => "id INT AUTO_INCREMENT PRIMARY KEY,
                    prd_name VARCHAR(30) NOT NULL,
                    serial_no INT,
                    description TEXT,
                    price DECIMAL(10,2) NOT NULL,
                    quantity INT NOT NULL DEFAULT 0
                    category_id INT
                    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP",

     'inventory' =>   'id INT AUTO_INCREMENT PRIMARY KEY, product_id INT, quantity INT',   
     
     'reports' => 'id INT AUTO_INCREMENT PRIMARY KEY, title VARCHAR(100), content TEXT'


    
];



$db = new Database(); // Create an instance of the Database class
$db->createTable($tables);


?>
