<?php
require_once('../permisos.php');
require_once('../connection_mysql.php');
require('../modelo/modelo_usuario.php');
session_start();

if (Permisos::tienePermiso('listar users', $_SESSION['user_id'])){
  
$usuarioModel = new UsuariosModel($conn);
$usuarios = $usuarioModel->listarUsuarios();



include('../vista/vista_usuario_listar.php');
}
else{
    header("Location: ../vista/vista_usuario_noautorizado.php");
}

$conn = null;
?>