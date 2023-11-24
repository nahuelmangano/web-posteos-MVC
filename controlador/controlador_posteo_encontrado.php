<?php
session_start();
require_once('../connection_mysql.php');
require('../modelo/modelo_posteos.php');

$posteoModel = new PosteoModel($conn);
$posteos = $posteoModel->obtenerPosteosEncontrados();

$numPosteos = count($posteos);
for ($i = 0; $i < $numPosteos; $i++) {
    $posteos[$i]['comentarios'] = $posteoModel->obtenerComentariosPorPosteo($posteos[$i]['id']);
}

include('../vista/vista_posteo.php');

$conn = null;
?>