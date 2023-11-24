<?php


// Verifica si el usuario ha iniciado sesión, de lo contrario, redirige a la página de inicio de sesión
if (!isset($_SESSION['user_id'])) {
    header('Location: ../../registro/login.php');
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <?php
    include("../head.php");
    ?>
    <title>Blanquear Contraseña</title>


</head>
<body style="background-color: #d1d5db">
    <div class="container">
    <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card shadow-2-strong" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">
        <h2>Cambiar Contraseña</h2>
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
        <form method="post" action="../controlador/controlador_usuario_blanquear_password.php?id=<?php echo $user_id ?>">
           
            <div class="form-group">
                <label>Nueva Contraseña</label>
                <input type="password" name="new_password" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Confirmar Contraseña</label>
                <input type="password" name="confirm_password" class="form-control" required>
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Cambiar Contraseña</button>
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