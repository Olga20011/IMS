<?php 
namespace lib;

class Inventory {
    private $prd;

    public function __construct() {
        $this->prd = new Products();
        $this->__initialize();
    }

    public function createInventoryTable($tables) {
        $this->prd->createProductTables($tables);
    }

    public function getProductFromInventory($productId) {
        // Implementation for getting product from inventory
    }

    public function generateInventoryReport() {
        // Implementation for generating inventory report
    }

    private function __initialize() {
        $tables = [
            'inventory' => 'id INT(11) AUTO_INCREMENT PRIMARY KEY, 
                            product_id INT(11) NOT NULL, 
                            quantity INT(11) NOT NULL',   
        ];
        // $this->prd->createProductTables($tables);
    }
}

new Inventory();
