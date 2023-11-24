<?php
require_once('../connection_mysql.php');
require('../modelo/modelo_usuario.php');
require_once('../permisos.php');
session_start();

if (Permisos::tienePermiso('denuncias', $_SESSION['user_id'])){
$usuarioModel = new UsuariosModel($conn);
$denuncias = $usuarioModel->denunciaListar();



include('../vista/vista_denuncia_listar.php');
}
else{
    header('location: ../vista/vista_usuario_noautorizado.php');
}
$conn = null;
?>