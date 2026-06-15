<?php
    require_once 'includes/database.php';
    session_start();
    if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
        $id_variable="borrar";
    }
?>