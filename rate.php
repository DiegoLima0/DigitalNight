<?php
session_start();
header('Content-Type: application/json');

require_once "includes/database.php";

// Verificar login
if (!isset($_SESSION['user_id'])) {
    echo json_encode([
        'status' => 'error',
        'message' => 'Debes iniciar sesión para votar.'
    ]);
    exit;
}

$idUser = $_SESSION['user_id'];

// Leer datos enviados por fetch()
$data = json_decode(file_get_contents("php://input"), true);

if (!$data || !isset($data['idGame']) || !isset($data['rating'])) {
    http_response_code(400);
    echo json_encode(['status' => 'error', 'message' => 'Datos inválidos']);
    exit;
}

$idGame = intval($data['idGame']);
$rating = intval($data['rating']);

// Guardar rating (si ya existe, actualizar)
$stmt = $conexion->prepare("
    INSERT INTO game_ratings (idGame, idUser, rating)
    VALUES (?, ?, ?)
    ON DUPLICATE KEY UPDATE rating = VALUES(rating)
");

$stmt->bind_param("iii", $idGame, $idUser, $rating);

if (!$stmt->execute()) {
    http_response_code(500);
    echo json_encode(['status' => 'error', 'message' => 'Error al guardar rating']);
    exit;
}

// Obtener nuevo promedio
$query = $conexion->prepare("
    SELECT AVG(rating) AS avg_rating, COUNT(*) AS total_votes
    FROM game_ratings
    WHERE idGame = ?
");

$query->bind_param("i", $idGame);
$query->execute();
$result = $query->get_result()->fetch_assoc();

echo json_encode([
    'status' => 'success',
    'newAverage' => round(floatval($result['avg_rating']), 2),
    'newCount' => intval($result['total_votes'])
]);
