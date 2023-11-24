<?php
require_once('../permisos.php');
require_once('../connection_mysql.php');
require('../modelo/modelo_usuario.php');
session_start();

if (Permisos::tienePermiso('listar users', $_SESSION['user_id'])){
$usuarioModel = new UsuariosModel($conn);
$usuarios = $usuarioModel->listarEliminados();



include('../vista/vista_usuario_listar_eliminados.php');

}
else{
    header('location: ../vista/vista_usuario_noautorizado.php');
}

$conn = null;
?>