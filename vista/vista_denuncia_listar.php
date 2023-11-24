<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include("../head.php");
    ?>
    <title>Denuncias Posts</title>
</head>

<body style="background-color: #d1d5db">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h3>POST DENUNCIADOS</h3>
                <a href="../controlador/controlador_usuario_panel.php" class="btn btn-primary">Panel de usuario</a>
                <br>
                <br>
                <?php


                // Manejar el formulario de actualización del estado
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $postId = $_POST["post_id"];
                    $newState = $_POST["estado"];

                    // Actualizar el estado en la tabla t_denuncia
                    $updateSql = "UPDATE t_denuncias SET estado = :estado WHERE posteo_id = :post_id";
                    $stmt = $conn->prepare($updateSql);
                    $stmt->bindParam(':estado', $newState, PDO::PARAM_STR);
                    $stmt->bindParam(':post_id', $postId, PDO::PARAM_INT);
                    $stmt->execute();
                }


                foreach ($denuncias as $denuncia):

                    echo '<div class="card mb-3" style="font-size: 14px;">';
                    echo '<div class="card-body">';
                    echo '<h5 class="card-title">ID: ' . $denuncia["id"] . '</h5>';
                    echo '<p class="card-text">Titulo: ' . $denuncia["titulo"] . '</p>';
                    echo '<p class="card-text">Descripcion: ' . $denuncia["contenido"] . '</p>';
                    echo '<p class="card-text">Estado de denuncia: ' . $denuncia["estado"] . '</p>';

                    // Formulario para actualizar el estado de la denuncia
                    echo '<form method="post" action="">';
                    echo '<input type="hidden" name="post_id" value="' . $denuncia["id"] . '">';
                    echo '<label for="estado">Cambiar estado:</label>';
                    echo '<select name="estado" id="estado">';
                    echo '<option value="Pendiente" selected>Pendiente</option>';
                    echo '<option value="Aprobada">Aprobada</option>';
                    echo '<option value="Rechazada">Rechazada</option>';
                    echo '</select>';
                    echo '<button type="submit" >Actualizar Estado</button>';
                    echo '</form>';
                    echo '</br>';

                    echo "<a class='btn btn-danger' href='../controlador/controlador_posteo_eliminar.php?id=" . $denuncia["id"] . "'>Eliminar</a>";
                    echo " ";
                    echo "<a class='btn btn-success' href='../controlador/controlador_denuncia_liberar.php?id=" . $denuncia["id"] . "'>Liberar</a>";
                    echo " ";
                    echo "<a class='btn btn-warning' href='../controlador/controlador_posteo_solouno.php?id=" . $denuncia["id"] . "'> Ver Posteo  </a>";
                    echo '</div>';
                    echo '</div>';
                endforeach;



                ?>
            </div>
        </div>
    </div>
</body>

</html>