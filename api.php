<?php
header('Content-Type: application/json');

require_once __DIR__ . '/classes/Product.php';
require_once __DIR__ . '/classes/Validator.php';
require_once __DIR__ . '/classes/Database.php';
require_once __DIR__ . '/classes/ProductRepository.php';

$database = new Database();
$repository = new ProductRepository($database);

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    echo json_encode([
        'status' => 'success',
        'products' => $repository->getSortedByDateTime()
    ]);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    [$errors, $dateTime] = Validator::validate($data);

    if (!empty($errors)) {
        echo json_encode(['status' => 'error', 'errors' => $errors]);
        exit;
    }

    $product = new Product($data['title'], $data['price'], $dateTime);
    $repository->save($product);

    echo json_encode([
        'status' => 'success',
        'products' => $repository->getSortedByDateTime()
    ]);
    exit;
}

http_response_code(405);
echo json_encode(['status' => 'error', 'message' => 'Method not allowed']);
