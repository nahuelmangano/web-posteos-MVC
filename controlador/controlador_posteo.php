<?php
require_once('../connection_mysql.php');
require('../modelo/modelo_posteos.php');
session_start();


$posteoModel = new PosteoModel($conn);
$posteos = $posteoModel->obtenerPosteosActivos();

$numPosteos = count($posteos);
for ($i = 0; $i < $numPosteos; $i++) {
    $posteos[$i]['comentarios'] = $posteoModel->obtenerComentariosPorPosteo($posteos[$i]['id']);
}

include('../vista/vista_posteo.php');

$conn = null;


?>