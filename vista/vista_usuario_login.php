<!DOCTYPE html>
<html lang="en">
<head>
    <?php include("../head.php"); ?>
    <title>Log In</title>
</head>
<body>
    <div class="container">
        <section class="vh-100" style="background-color: #508bfc;">
            <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                        <div class="card shadow-2-strong" style="border-radius: 1rem;">
                            <div class="card-body p-5 text-center">
                                <h3 class="mb-5">Iniciar Sesión</h3>

                                <!-- Mostrar mensaje de error  -->
                                <?php if ($error !== ''): ?>
                                    <div class="alert alert-danger" role="alert">
                                        <?php echo $error; ?>
                                    </div>
                                <?php endif; ?>

                                <form method="post" action="../controlador/controlador_usuario_login.php">
                                    <div class="form-group">
                                        <div class="form-outline mb-4">
                                            <input type="email" id="typeEmailX-2" name="email" class="form-control form-control-lg" required />
                                            <label class="form-label" for="typeEmailX-2">Correo Electrónico</label>
                                        </div>

                                        <div class="form-outline mb-4">
                                            <input type="password" id="typePasswordX-2" class="form-control form-control-lg" name="password" required />
                                            <label class="form-label" for="typePasswordX-2">Contraseña</label>
                                        </div>

                                        <button class="btn btn-primary btn-lg btn-block" type="submit">Iniciar Sesión</button>

                                        <hr class="my-4">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>
</html>
