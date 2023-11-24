<!DOCTYPE html>
<html>
<head>
    <?php
    include("../head.php");
    ?>
    <title>Posteo Nuevo</title>
</head>
<body style="background-color: #d1d5db">
    <div class="container">       
            <!-- Formulario para crear un nuevo posteo -->
            <h1 class="mt-5">Crear un nuevo posteo</h1>
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
            <form action="../controlador/controlador_posteo_nuevo.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="titulo">Título:</label>
                    <input type="text" class="form-control" name="titulo" required>
                    <small class="text-muted">Debe contener al menos una palabra.</small>
                </div>

                <div class="form-group">
                    <label for="contenido">Contenido:</label>
                    <textarea class="form-control" name="contenido" rows="4" required></textarea>
                    <small class="text-muted">Debe contener al menos una palabra.</small>
                </div>
                <br>

                <div>
                    <select class="form-select" id="tipo_posteo" name="tipo_posteo" aria-label="Default select example" required>
                        <option value="" selected disabled hidden>Seleccione un tipo de posteo</option>
                        <option value="perdido">Perdido</option>
                        <option value="encontrado">Encontrado</option>
                    </select>
                    <small class="text-muted">Seleccione un tipo de posteo.</small>
                </div>
                <br>

                <div class="form-group">
                    <label for="imagen">Imagen:</label>
                    <input type="file" class="form-control-file" name="imagen" accept="image/*" required>
                    <small class="text-muted">Seleccione una imagen.</small>
                </div>

                <br>

                <button type="submit" class="btn btn-primary">Guardar</button>
                <a href="../controlador/controlador_posteo.php" class="btn btn-warning">Inicio</a>
            </form>
     
    </div>
</body>
</html>
