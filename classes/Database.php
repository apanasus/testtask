<?php
class Database {
    private PDO $pdo;

    public function __construct() {
        $host = 'db';
        $db   = 'test_db';
        $user = 'root';
        $pass = 'root';
        $charset = 'utf8mb4';

        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];

        $this->pdo = new PDO($dsn, $user, $pass, $options);
    }

    public function insertProduct(Product $product): void {
        $stmt = $this->pdo->prepare("INSERT INTO products (title, price, date_time) VALUES (?, ?, ?)");
        $stmt->execute([
            $product->title,
            $product->price,
            $product->dateTime->format('Y-m-d H:i:s')
        ]);
    }

    public function getAllProducts(): array {
        $stmt = $this->pdo->query("SELECT * FROM products ORDER BY date_time ASC");
        return $stmt->fetchAll();
    }
}
