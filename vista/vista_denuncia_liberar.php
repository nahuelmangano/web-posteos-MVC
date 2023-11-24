<!DOCTYPE html>
<html>
<head>
    <?php
    include("../head.php");
    ?>
    <link rel="stylesheet" href="http://localhost/integrador_mvc/estilos/estilos_denuncia.css">
    <title>Liberar Post</title>
</head>

<body>
<div class="container mt-5"> 
    <div class="row justify-content-center"> 
        <div class="col-md-8"> <!-- Tamaño del contenedor de los posteos -->
    <h1>Liberar Posteo</h1>

    <?php   

        echo '<p>¿Estás seguro de que deseas liberar este posteo?</p>';
        echo $id_posteo;
        echo "<br>";
        echo "<br>";
        echo '<a href="../controlador/controlador_denuncia_liberar.php?id=' . $id_posteo . '&confirmar=0" class="btn btn-success">Sí</a>  <a href="../controlador/controlador_denuncia_listar.php"class="btn btn-danger">No</a>';
       
    ?>
        </div>
    </div>
</div>

</body>

</html>