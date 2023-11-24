<?php
require_once('../connection_mysql.php');
require_once('../modelo/modelo_posteos.php');
require_once('../permisos.php');
session_start();

$error = ''; // Variable para almacenar el mensaje de error
$posteos=[];

if (Permisos::tienePermiso('editar post', $_SESSION['user_id'])){
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $posteoModel = new PosteoModel($conn);

    if (isset($_GET['id'])) {
        $id_posteo = $_GET['id'];
        $posteos = $posteoModel->obtenerPosteo($id_posteo); 
       
        $imagen_actual = $posteos[0]["imagen_path"];
       
       
    } 
}
    include('../vista/vista_posteo_editar.php');
}
else{
    header('location: ../vista/vista_usuario_noautorizado.php');
}
?>