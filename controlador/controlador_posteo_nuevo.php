<?php
session_start();
require_once('../connection_mysql.php');
require_once('../modelo/modelo_posteos.php');
require_once('../permisos.php');


$errors = []; // Array para almacenar mensajes de error

if (Permisos::tienePermiso('crear post', $_SESSION['user_id'])){
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $posteoModel = new PosteoModel($conn);

    // Obtener datos del formulario
    $titulo = $_POST['titulo'];
    $contenido = $_POST['contenido'];
    $tipo_posteo = $_POST['tipo_posteo'];



    // Procesar la carga de la imagen
    if (isset($_FILES['imagen'])) {
        $imagen = $_FILES['imagen']['name'];
        $imagen_temp = $_FILES['imagen']['tmp_name'];
        $imagen_destino = "imagenes_posteos/" . $imagen; // Ruta de destino en el servidor
        move_uploaded_file($imagen_temp, $imagen_destino);
    } else {
        echo 'Entro aca     --- --- --   ';
        $imagen = ""; // Si no se cargó ninguna imagen
    }
    $creador = $_SESSION['user_id'];



     // Validar registro
     $errors = $posteoModel->validarPosteo($titulo,$contenido,$tipo_posteo,$imagen);

    // Validar datos
    if (empty($errors)) {

        $posteoModel->guardarPosteo($titulo, $contenido, $tipo_posteo, $imagen_destino, $creador);
        header('Location: ../vista/vista_posteo_creadook.php');
    }
}
include('../vista/vista_posteo_nuevo.php');
}
else{
    header('location: ../vista/vista_usuario_noautorizado.php');
}

?>