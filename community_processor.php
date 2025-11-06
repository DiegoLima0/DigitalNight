<?php
session_start();
require_once 'includes/database.php';

$user_id = $_SESSION['user_id'] ?? 0;
$publications_list = []; 

$game_id = isset($_GET['idGame']) ? (int)$_GET['idGame'] : 0; 
$game_title = '';

/*
$sql_publications = "..."; 
$result_publications = $conexion->query($sql_publications);
if ($result_publications) {
    while ($row = $result_publications->fetch_assoc()) {
        $publications_list[] = $row;
    }
}
*/

$foto_perfil_actual = $_SESSION['profile_picture'] ?? 'default.png';

$conexion->close();
?>  