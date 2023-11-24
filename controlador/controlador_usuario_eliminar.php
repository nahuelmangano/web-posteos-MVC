<?php
require_once('../connection_mysql.php');
require_once('../modelo/modelo_usuario.php');
require_once('../permisos.php');
session_start();

if (Permisos::tienePermiso('eliminar user', $_SESSION['user_id'])) {
    $error = ''; // Variable para almacenar el mensaje de error
    $id_user = $_GET['id'];
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        $usuariosModel = new UsuariosModel($conn);

        if (isset($_GET['confirmar']) && $_GET['confirmar'] == 1) {
            $usuariosModel->eliminarMiUsuario($id_user);
            header('Location: ../vista/vista_usuario_eliminadook.php');

        }
    }
    include('../vista/vista_usuario_eliminar2.php');
} else {
    header('location: ../vista/vista_usuario_noautorizado.php');
}
?>