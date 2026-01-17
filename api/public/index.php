<?php

require_once __DIR__ . '/../src/Database.php';

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

try {
    $pdo = Database::getConnection();

    $stmt = $pdo->query(
        "SELECT id, username, created_at 
         FROM users 
         WHERE deleted_at IS NULL"
    );

    $users = $stmt->fetchAll();

    echo json_encode([
        'status' => 'ok',
        'users' => $users
    ]);
} catch (Throwable $e) {
    http_response_code(500);
    echo json_encode([
        'status' => 'error',
        'message' => $e->getMessage()
    ]);
}
