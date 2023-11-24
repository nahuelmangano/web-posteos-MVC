<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include("head.php");
    ?>
    <link rel="stylesheet" href="estilos/estilos_post.css">
    <title>Index</title>
</head>

<body style="background-color: #d1d5db">
    <?php
    include('navbar.php');
    ?>

    <div class="container mt-5">

        <?php
        header('Location: controlador/controlador_posteo.php');
        ?>

    </div>
</body>

</html>