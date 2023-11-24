<!DOCTYPE html>
<html lang="es">

<head>
    <?php include("../head.php"); ?>
    <title>Index</title>
</head>

<body style="background-color: #d1d5db">
    <?php include('../navbar.php'); ?>

    <div class="container mt-5">
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <?php foreach ($posteos as $posteo): ?>
                <div class="col mb-3">
                    <div class="card" style="font-size: 14px; height: 100%;">
                        <div class="card-body">
                            <h5 class="card-title">
                                <?php echo $posteo["titulo"]; ?>
                            </h5>
                            <p class="card-text">
                                <?php echo $posteo["tipo_post"]; ?>
                            </p>
                            <p class="card-text">
                                <?php echo $posteo["contenido"]; ?>
                            </p>

                            <?php if (!empty($posteo["imagen_path"])): ?>
                                <img src="<?php echo $posteo["imagen_path"]; ?>" class="card-img-top post-image"
                                    alt="Imagen del posteo">
                            <?php endif; ?>

                            <p class="card-text"><small class="text-muted">Fecha de Publicación:
                                    <?php echo $posteo["fecha_publicacion"]; ?>
                                </small></p>

                            <!-- Botones y formulario de comentarios (si es necesario) -->
                            <?php require('../botones_posts.php'); ?>

                            <!-- Comentarios -->
                            <div class="card-body" style="max-height: 100px; overflow-y: auto;">
                                <h6 class="card-subtitle mb-2 text-muted">Comentarios:</h6>
                                <?php foreach ($posteo['comentarios'] as $comentario): ?>
                                    <p class="card-text">
                                        <?php echo $comentario["comentario"]; ?>
                                    </p>
                                    <p class="card-text"><small class="text-muted">Fecha del Comentario:
                                            <?php echo $comentario["fecha_comentario"]; ?>
                                        </small></p>
                                <?php endforeach; ?>
                            </div>

                            <!-- Formulario para agregar comentarios -->
                            <?php if (isset($_SESSION['user_id'])): ?>
                                <div class="card-body">
                                    <h5 class="card-title">Agregar un Comentario</h5>
                                    <form action="../controlador/controlador_comentario_guardar.php" method="post">
                                        <input type="hidden" name="posteo_id" value="<?php echo $posteo['id']; ?>">
                                        <div class="form-group">
                                            <label for="comentario">Comentario:</label>
                                            <textarea class="form-control" name="comentario" rows="2" required></textarea>
                                        </div>
                                        <br>
                                        <button type="submit" class="btn btn-primary">Enviar Comentario</button>
                                    </form>
                                </div>
                            <?php endif; ?>

                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>

</html>