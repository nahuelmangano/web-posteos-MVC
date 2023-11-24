<?php
require_once('../connection_mysql.php');
require_once('../modelo/modelo_usuario.php');
require_once('../permisos.php');
session_start();

if (Permisos::tienePermiso('eliminar mi user', $_SESSION['user_id'])) {
    $error = ''; // Variable para almacenar el mensaje de error
    if (isset($_SESSION['user_id'])) {
        $id_user = $_SESSION['user_id'];
    }
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        $usuariosModel = new UsuariosModel($conn);


        if (isset($_GET['confirmar']) && $_GET['confirmar'] == 1) {
            $usuariosModel->eliminarMiUsuario($id_user);
            header('Location: ../controlador/controlador_usuario_logout.php');


        }
    }



    include('../vista/vista_usuario_eliminar.php');
} else {
    header('location: ../vista/vista_usuario_noautorizado.php');
}
?>