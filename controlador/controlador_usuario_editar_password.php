<?php
require_once('../connection_mysql.php');
require_once('../modelo/modelo_usuario.php');
require_once('../permisos.php');
session_start();


$posteos = [];
if (Permisos::tienePermiso('edit mi user', $_SESSION['user_id'])) {

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $usuariosModel = new UsuariosModel($conn);

        if (isset($_SESSION['user_id'])) {
            if (isset($_POST['new_password']) && isset($_POST['confirm_password'])) {
                
                $user_id = $_SESSION['user_id'];
              
                $new_password = $_POST['new_password'];
                $confirm_password = $_POST['confirm_password'];
               
                $errors = $usuariosModel->validarPassword($new_password, $confirm_password);
                if (empty($errors)) {
                    $usuariosModel->editarPassword($new_password, $user_id);
                    header('location: ../vista/vista_usuario_cambio_passwordok.php');
                }            
            } 
        }
        else {
            echo "El usuario no está autenticado.";
        }
      
    }
    include('../vista/vista_usuario_editar_password.php');
} else {
    header('location: ../vista/vista_usuario_noautorizado.php');
}

?>