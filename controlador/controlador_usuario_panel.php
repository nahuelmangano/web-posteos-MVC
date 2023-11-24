<?php
require_once('../permisos.php');
session_start();

// Verifica si el usuario ha iniciado sesión, de lo contrario, redirige a la página de inicio de sesión
if (!isset($_SESSION['user_id'])) {
    header('Location: ../controlador/controlador_usuario_login.php');
    exit();
}

include('../vista/vista_usuario_panel.php');
?>
