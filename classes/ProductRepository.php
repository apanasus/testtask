<?php
require_once __DIR__ . '/Database.php';
require_once __DIR__ . '/Product.php';

class ProductRepository {
    private Database $db;

    public function __construct(Database $db) {
        $this->db = $db;
    }

    public function save(Product $product): void {
        $this->db->insertProduct($product);
    }

    public function getSortedByDateTime(): array {
        return $this->db->getAllProducts();
    }
}
