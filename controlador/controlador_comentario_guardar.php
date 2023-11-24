<?php
require_once('../connection_mysql.php');
require_once('../modelo/modelo_comentario.php');
require_once('../permisos.php');

$errors = []; // Array para almacenar mensajes de error
if (Permisos::tienePermiso('comentar post', $_SESSION['user_id'])){

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $comentarioModel= new comentarioModel($conn);

    // Obtener datos del formulario
    $posteo_id = $_POST['posteo_id'];
    $comentario = $_POST['comentario'];

   //validar

    if (empty($errors)) {
        $comentarioModel->guardarComentario($posteo_id, $comentario);
    }
}
header("Location: " . $_SERVER["HTTP_REFERER"]);
}
else{
    header('location: ../vista/vista_usuario_noautorizado.php');
}

?>






