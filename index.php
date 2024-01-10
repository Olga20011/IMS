<?php
use lib\Database;

// create_table.php (for example)

include_once 'lib/Database.php'; // Include the file where Database class is defined

$tables =[

    'products' => "id INT AUTO_INCREMENT PRIMARY KEY,
                    prd_name VARCHAR(30) NOT NULL,
                    serial_no INT(11),
                    description TEXT,
                    price DECIMAL(10,2) NOT NULL,
                    quantity INT NOT NULL DEFAULT 0,
                    category_id INT,
                    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP",

     'inventory' =>   'id INT(11) AUTO_INCREMENT PRIMARY KEY, product_id INT(11) NOT NULL, quantity INT(11) NOT NULL',   
     
     'reports' => 'id INT(11) AUTO_INCREMENT PRIMARY KEY, title VARCHAR(100) NOT NULL, content TEXT'


    
];


print("hello");
$db = new Database(); // Create an instance of the Database class
print("hello");

$db->createTable($tables);


?>
