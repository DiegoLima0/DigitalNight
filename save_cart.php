<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents("php://input"), true);

    if (isset($data['productos']) && isset($data['total'])) {
        $_SESSION['carrito_para_pago'] = [
            'productos' => $data['productos'],
            'total' => $data['total']         
        ];

        echo json_encode(['success' => true]);
        exit;
    }
}

http_response_code(400);
echo json_encode(['success' => false, 'message' => 'Datos inválidos.']);
?>