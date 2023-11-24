<?php
require_once('../connection_mysql.php');
require_once('../modelo/modelo_usuario.php');
session_start();

$error = ''; // Variable para almacenar el mensaje de error

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuariosModel = new UsuariosModel($conn);

    // Obtener datos del formulario
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validar credenciales
    
    $result = $usuariosModel->validarCredenciales($email, $password);

    if (is_array($result)) {
        // Credenciales válidas
        $_SESSION['user_id'] = $result['id'];
        $_SESSION['user_name'] = $result['nombre'];
        $_SESSION['user_email'] = $result['email'];
        header('Location: ../controlador/controlador_usuario_panel.php'); // Redirige a la página de inicio de sesión exitosa
    } else {
        // Mostrar mensaje de error
        $error = $result;
    }
}

include('../vista/vista_usuario_login.php');
?>
