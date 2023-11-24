<?php
require_once('../connection_mysql.php');
require_once('../modelo/modelo_usuario.php');
require_once('../permisos.php');
session_start();

$errors = []; // Array para almacenar mensajes de error
$posteos = [];
$user_id = $_GET['id'];

if (Permisos::tienePermiso('edit users', $_SESSION['user_id'])) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $usuariosModel = new UsuariosModel($conn);

        if (isset($_POST['new_password']) && isset($_POST['confirm_password'])) {

            $new_password = $_POST['new_password'];
            $confirm_password = $_POST['confirm_password'];
            // Validar registro
            $errors = $usuariosModel->validarPassword($new_password, $confirm_password);
            if (empty($errors)) {
                $usuariosModel->editarPassword($new_password, $user_id);
                header('location: ../vista/vista_usuario_cambio_passwordok.php');
            }
        }
    }
    include('../vista/vista_usuario_blanquear_password.php');
} else {
    header('location: ../vista/vista_usuario_noautorizado.php');
}
?>