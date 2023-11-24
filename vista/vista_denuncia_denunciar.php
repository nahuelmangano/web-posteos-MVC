<!DOCTYPE html>
<html lang="en">

<head>
    <title>Denunciar Posteo</title>
    <?php include("../head.php"); ?>
    <link rel="stylesheet" href="http://localhost/integrador_mvc/estilos/estilos_denuncia.css">
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="confirmation-box">
                    <h1>Denunciar Posteo</h1>

                    <?php
                        echo '<p>¿Estás seguro de que deseas denunciar este posteo?</p>';                      
                        echo '<br>';
                        echo '<br>';
                        echo '<a href="../controlador/controlador_denuncia_denunciar.php?id=' . $id_posteo . '&confirmar=1" class="btn btn-success">Sí</a>';
                        echo '<a href="../controlador/controlador_posteo.php" class="btn btn-danger">No</a>';
                   
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>