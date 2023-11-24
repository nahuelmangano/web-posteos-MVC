<?php


// Verifica si el usuario ha iniciado sesión, de lo contrario, redirige a la página de inicio de sesión
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    include("../head.php");
    ?>
    <title>Editar Usuario</title>
</head>
<body style="background-color: #d1d5db">

   
 <div class="container">
    <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card shadow-2-strong" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">
        <h2>Editar Usuario</h2>
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
        <form method="post" action="../controlador/controlador_usuario_editx.php?id=  <?php echo $userId ?>">
            <div class="form-group">
            <label for="newName">Nuevo Nombre:</label>
                <input type="text" name="newName" id="newName" class="form-control" required>
            </div>
            <div class="form-group">
            <label for="newEmail">Nuevo Correo Electrónico:</label>
                <input type="email"  name="newEmail" id="newEmail" class="form-control" required>
            </div>
           
            <br>
            <button type="submit" name="submit" class="btn btn-primary">Guardar cambios</button>
           
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

