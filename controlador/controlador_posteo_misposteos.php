<?php
require_once('../connection_mysql.php');
require('../modelo/modelo_posteos.php');
require_once('../permisos.php');
session_start();

$posteoModel = new PosteoModel($conn);
$posteos=[];


if (Permisos::tienePermiso('ver user', $_SESSION['user_id'])){
if (isset($_SESSION['user_id'])) {
    $id_posteo = $_SESSION['user_id'];
$posteos = $posteoModel->misPosteos($id_posteo);

$numPosteos = count($posteos);

for ($i = 0; $i < $numPosteos; $i++) {
    $posteos[$i]['comentarios'] = $posteoModel->obtenerComentariosPorPosteo($posteos[$i]['id']);
}
}
include('../vista/vista_posteo.php');

}
else{
    header('location: ../vista/vista_usuario_noautorizado.php');
}
$conn = null;
?>