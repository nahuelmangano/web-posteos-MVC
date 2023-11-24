<!DOCTYPE html>
<html lang="en">

<head>
    <title>Eliminar Posteo</title>
    <?php include("../head.php"); ?>
    <style>
        body {
            background-color: #d1d5db;
        }

        .container {
            margin-top: 5%;
        }

        .confirmation-box {
            text-align: center;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .btn-success {
            background-color: #28a745;
            border-color: #28a745;
        }

        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
        }

        .btn-success {
            margin-right: 5px;
            /* Agrega un margen derecho al botón "Sí" */
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="confirmation-box">
                    <h1>Eliminar Usuario</h1>

                    <?php
                    echo '<p>¿Estás seguro de que deseas eliminar tu usuario?</p>';
                    echo $id_user;
                    echo '<br>';
                    echo '<br>';
                    echo '<a href="../controlador/controlador_usuario_eliminar.php?id=' . $id_user . '&confirmar=1" class="btn btn-success">Sí</a>';
                    echo '<a href="../controlador/controlador_posteo.php" class="btn btn-danger">No</a>';

                    ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>