<?php
require_once('../connection_mysql.php');
require('../modelo/modelo_posteos.php');
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['busqueda'])) {
        $busqueda = $_POST['busqueda'];

        $posteoModel = new PosteoModel($conn);
        $posteos = $posteoModel->buscarPosteos($busqueda);

       
    } else {
        echo "Ingresa un término de búsqueda.";
    }
}
include('../vista/vista_buscar.php');
?>
