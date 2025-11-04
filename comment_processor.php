<?php

session_start();
require_once 'includes/database.php';

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true || !isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = (int) $_SESSION['user_id'];
$upload_dir = 'img/publications/';

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['action'])) {

    $action = $_POST['action'];
    $commentary = isset($_POST['content']) ? trim($_POST['content']) : '';
    $commentary_seguro = $conexion->real_escape_string($commentary);

    $id_game = isset($_POST['idGame']) ? (int) $_POST['idGame'] : 0;

    $image_file_name = 'NULL';

    if (isset($_FILES['publication_image']) && $_FILES['publication_image']['error'] === UPLOAD_ERR_OK) {
    $file_tmp = $_FILES['publication_image']['tmp_name'];
    $file_name = uniqid() . '_' . basename($_FILES['publication_image']['name']);
    $destination = $upload_dir . $file_name;

    // if (move_uploaded_file($file_tmp, $destination)) { 
    //     $image_file_name = "'" . $conexion->real_escape_string($file_name) . "'";
    // }
}

    // LÓGICA PARA PUBLICACIÓN

    if ($action === 'post_community_publication' && !empty($commentary)) {

        $id_game = isset($_POST['idGame']) ? (int) $_POST['idGame'] : 0;

        if ($id_game === 0) {
            header("Location: community.php?error=no_id_game_sent");
            exit();
        }

        $sql_insert = "INSERT INTO comment (commentary, idUser, idGame, imagen, created_at, parent_id)
                       VALUES ('$commentary_seguro', $user_id, $id_game, $image_file_name, NOW(), NULL)";

        if ($conexion->query($sql_insert)) {
            header("Location: community.php?idGame=$id_game&post=ok");
            exit();
        } else {
            error_log("Error MySQL en publicación: " . $conexion->error . " - Query: " . $sql_insert);
            header("Location: community.php?idGame=$id_game&error=db_fail");
            exit();
        }
    }
    // LÓGICA PARA RESPONDER
    if ($action === 'post_reply' && !empty($commentary) && isset($_POST['parent_id'])) {
        $parent_id = (int) $_POST['parent_id'];

        $id_game_reply = (int) $_POST['idGame'];

        $sql_insert = "INSERT INTO comment (commentary, idUser, idGame, imagen, created_at, parent_id) 
                       VALUES ('$commentary_seguro', $user_id, $id_game_reply, $image_file_name, NOW(), $parent_id)";

        if ($conexion->query($sql_insert)) {
            header("Location: communityPublication.php?id=$parent_id");
            exit();
        }
    }
}

$conexion->close();
?>