<?php

// create_table.php (for example)

include_once 'C:\Folder\htdocs\IMS\lib\Database.php'; // Include the file where Database class is defined

$db = new Database(); // Create an instance of the Database class

// Define the table structure
$tableDefinition = "id INT AUTO_INCREMENT PRIMARY KEY,
                    prd_name VARCHAR(30) NOT NULL,
                    serial_no INT";

// Create a table named "products" with the specified definition
$db->createTable("products", $tableDefinition);

?>
