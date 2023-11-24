<?php
require_once('../connection_mysql.php');
require_once('../modelo/modelo_usuario.php');
require_once('../permisos.php');
session_start();

$error = ''; // Variable para almacenar el mensaje de error

if (Permisos::tienePermiso('denuncias', $_SESSION['user_id'])){
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $usuariosModel = new UsuariosModel($conn);

    if (isset($_GET['id'])) {
        $id_posteo = $_GET['id'];
       
    }
    if (isset($_GET['confirmar']) && $_GET['confirmar'] == 0) {
        $usuariosModel->liberarPost($id_posteo);
        header('Location: ../vista/vista_denuncia_liberada_ok.php');
        
        
        }
}



include('../vista/vista_denuncia_liberar.php');
}
else{
    header('location: ../vista/vista_usuario_noautorizado.php');
}

?>