<?php 
namespace lib;

include_once 'Database.php';

class Inventory{

    private $db;

    public function __construct(){
        $this->db = new Database();
    }
    public function createInventoryTable($tables){
        $this->db->createTable($tables);
    }

    public function getProductFromInventory($productId){

    }

    public function generateInventoryReport(){
        
    }

}
$InventoryInstance = new Inventory();

$tables =[

     'inventory' =>   
     'id INT(11) AUTO_INCREMENT PRIMARY KEY, 
      product_id INT(11) NOT NULL, 
      quantity INT(11) NOT NULL',   


];

$InventoryInstance->createInventoryTable($tables);


?>