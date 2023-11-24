
<?php
require_once('../connection_mysql.php');
require_once('../modelo/modelo_posteos.php');
require_once('../permisos.php');
session_start();

$error = ''; // Variable para almacenar el mensaje de error


if (Permisos::tienePermiso('editar post', $_SESSION['user_id'])){
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $posteoModel = new PosteoModel($conn);
    if (isset($_POST['id']) && isset($_POST['titulo']) && isset($_POST['contenido'])) {
        $id = $_POST['id'];
        $titulo = $_POST['titulo'];
        $contenido = $_POST['contenido'];

        // Verificar si se cargó una nueva imagen
        if (isset($_FILES['imagen']) && $_FILES['imagen']['size'] > 0) {
            $imagen = $_FILES['imagen']['name'];
            $imagen_temp = $_FILES['imagen']['tmp_name'];
            $imagen_destino = "../imagenes_posteos/" . $imagen; // Ruta de destino en el servidor

            move_uploaded_file($imagen_temp, $imagen_destino);

            $imagen_destino = "imagenes_posteos/" . $imagen;
        } else {
            
                $imagen_destino = null;
            
        }

        // Actualizar el posteo en la base de datos
        $posteoModel->editarPost($titulo, $contenido, $imagen_destino,$id);
        
        
      

        // Cerrar la conexión a la base de datos
        
    } else {
        echo "Datos faltantes.";
    }
} else {
    echo "Acceso no autorizado.";
}

header('Location: ../vista/vista_posteo_editado_ok.php');
}
else{
    header('location: ../vista/vista_usuario_noautorizado.php');
}

?>