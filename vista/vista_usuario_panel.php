<!DOCTYPE html>
<html>

<head>
    <?php include("../head.php"); ?>
    <title>Panel de usuario</title>
</head>

<body style="background-color: #d1d5db">

    <?php include("../navbar.php"); ?>

    <div class="container">
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">
                                <?php echo ($_SESSION['user_name']) . "</h5>"; ?>
                                <p class="card-text">Correo Electrónico:
                                    <?php echo ($_SESSION['user_email']); ?>
                                </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <h2>Bienvenido al Panel de Usuario</h2>
                    <p>En este panel, puedes acceder a varias funciones y opciones:</p>
                    <ul>
                        <li><a href="../controlador/controlador_posteo.php">Posteos</a></li>
                    
                        <li><a href="../controlador/controlador_posteo_nuevo.php">Nuevo posteo</a></li>
                        <li><a href="../controlador/controlador_usuario_editar.php">Editar Perfil</a></li>
                        <li><a href="../controlador/controlador_usuario_editar_password.php">Cambiar Contraseña</a></li>
                        <li><a href="../controlador/controlador_usuario_eliminar_mio.php">Eliminar mi cuenta</a></li>
                        <li><a href="../controlador/controlador_posteo_misposteos.php">Ver Mis Publicaciones</a></li>

                    </ul>

                    <?php if (Permisos::tienePermiso('panel_admin', $_SESSION['user_id'])): ?>
                        
                        <h2>Panel de Admin</h2>
                        <ul>
                            <li><a href="../controlador/controlador_usuario_listar.php">Ver lista usuarios</a></li>
                            <li><a href="../controlador/controlador_usuario_listar_eliminados.php">Ver lista usuarios eliminadas</a></li>
                            <li><a href="../controlador/controlador_denuncia_listar.php">Ver Posteos Denunciados</a></li>
                        </ul>
                    <?php endif; ?>

                </div>
            </div>
        </div>
    </div>

</body>

</html>