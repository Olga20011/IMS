<?php
use lib\Database;
use lib\Inventory;
use lib\Products;
use lib\Crud;


// create_table.php (for example)

// include_once 'lib/Database.php'; // Include the file where Database class is defined

// include_once 'lib/Products.php'; // Include the file where Database class is defined
// include_once 'lib/Inventory.php'; // Include the file where Database class is defined
include_once 'lib/Crud.php'; // Include the file where Database class is defined



// $products= new Products();

// $inventory= new Inventory();
// $tables='products';
// $data= array(
//     'prd_name'=> 'soda',
//     'serial_no'=>2334556,
//     'description'=> 'This is the best soda i have taken in a long time',
//     'price'=>2500 ,
//     'quantity'=>5,
//     'category_id'=>1,
//     'created_at'=>'2023-02-12',
//     'updated_at'=>'2024-01-01',

// );

$crud = new Crud();

// $result=$crud->create($tables, $data);

// if($result !==false){
//     echo "User inserted successfully. Affected row:$result";

// }else{
//     echo "Error inserting user.";
// }



// $tables =[

//     'products' => "id INT AUTO_INCREMENT PRIMARY KEY,
//                     prd_name VARCHAR(30) NOT NULL,
//                     serial_no INT(11),
//                     description TEXT,
//                     price DECIMAL(10,2) NOT NULL,
//                     quantity INT NOT NULL DEFAULT 0,
//                     category_id INT,
//                     created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
//                     updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP",

//      'inventory' =>   'id INT(11) AUTO_INCREMENT PRIMARY KEY, product_id INT(11) NOT NULL, quantity INT(11) NOT NULL',   
     
//      'reports' => 'id INT(11) AUTO_INCREMENT PRIMARY KEY, title VARCHAR(100) NOT NULL, content TEXT'


    
// ];


// print("hello");
// $db = new Database(); // Create an instance of the Database class
// print("hello");

// $db->createTable($tables);


