<?php
require_once('../connection_mysql.php');
require_once('../modelo/modelo_usuario.php');
require_once('../permisos.php');
session_start();

$error = ''; // Variable para almacenar el mensaje de error
$usuarios = [];
$userId = $_GET['id'];

if (Permisos::tienePermiso('edit users', $_SESSION['user_id'])){
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuariosModel = new UsuariosModel($conn);


    if (isset($_POST['submit'])) {
        $newName = $_POST['newName'];
        $newEmail = $_POST['newEmail'];

          // Validar registro
          $errors = $usuariosModel->validarEdit($newName, $newEmail);
          if (empty($errors)) {
            $usuarios = $usuariosModel->editarUsuario($newName, $newEmail, $userId);
              header('location: ../vista/vista_usuario_cambio_passwordok.php');
          }


        


    }
}
include('../vista/vista_usuario_editar2.php');
}
else{
    header('location: ../vista/vista_usuario_noautorizado.php');
}

?>