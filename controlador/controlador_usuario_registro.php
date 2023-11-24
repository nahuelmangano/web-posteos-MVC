<?php
require_once('../connection_mysql.php');
require_once('../modelo/modelo_usuario.php');

$errors = []; // Array para almacenar mensajes de error

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuariosModel = new UsuariosModel($conn);

    // Obtener datos del formulario
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmarPassword=$_POST['confirmarPassword'];

    // Validar registro
    $errors = $usuariosModel->validarRegistro($nombre, $email, $password, $confirmarPassword);

    // Si no hay errores, realizar el registro
    if (empty($errors)) {
        $usuariosModel->realizarRegistro($nombre, $email, $password);
    }
}
include('../vista/vista_usuario_registro.php');
?>
