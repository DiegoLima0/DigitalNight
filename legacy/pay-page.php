<?php
 if (session_status() == PHP_SESSION_NONE) {
      session_start();
  }
  $carrito_a_pagar = $_SESSION['carrito_para_pago'] ?? ['productos' => [], 'total' => '0.00'];

  if (empty($carrito_a_pagar['productos'])) {
  }

  $section="views/pay-page";
  require_once "pay-page_processor.php";
  require_once "views/layout.php";
?>