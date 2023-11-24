<!DOCTYPE html>
<html>
<head>
    <?php include("../head.php"); ?>
    <title>Registrarse</title>
</head>
<body>
    <div class="container">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card shadow-2-strong" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">
                            <h2>Registro de Usuario</h2>
                            <!-- Mostrar mensajes de error  -->
                            <?php if (!empty($errors)) : ?>
                                <div class="alert alert-danger">
                                    <ul>
                                        <?php foreach ($errors as $error) : ?>
                                            <li><?php echo $error; ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            <?php endif; ?>

                            <form method="post" action="controlador_usuario_registro.php">
                                <div class="form-group">
                                    <label>Usuario</label>
                                    <input type="text" name="nombre" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Correo Electrónico</label>
                                    <input type="email" name="email" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Contraseña</label>
                                    <input type="password" name="password" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Confirmar Contraseña</label>
                                    <input type="password" name="confirmarPassword" class="form-control" required>
                                </div>
                                <br>
                                <button type="submit" class="btn btn-primary">Registrarse</button>
                                <a href="../controlador/controlador_posteo.php" class="btn btn-warning">Inicio</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
