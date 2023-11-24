

<?php
require_once('../permisos.php');

if (isset($_SESSION['user_id'])) {
    // Verifica si el usuario es el creador del posteo o es un admin
    $esCreador = ($_SESSION['user_id'] == $posteo['creador']);
  
    if ($esCreador || (Permisos::tienePermiso('listar users', $_SESSION['user_id']))) {
        // Si es el creador o un admin, muestra los botones de editar y eliminar
        echo "<a href='../controlador/controlador_posteo_editar.php?id=" . $posteo["id"] . "' class='btn btn-primary '>Editar</a>";
        echo " ";
        echo "<a href='../controlador/controlador_posteo_eliminar.php?id=" . $posteo["id"] . "' class='btn btn-danger '>Eliminar</a>";
    }

    // Muestra el botón de denunciar siempre, independientemente del rol
    echo " ";
    echo "<a href='../controlador/controlador_denuncia_denunciar.php?id=" . $posteo["id"] . "' class='btn btn-dark '>Denunciar Post</a>";
}
?>
