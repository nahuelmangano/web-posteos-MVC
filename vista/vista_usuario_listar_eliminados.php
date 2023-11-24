<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    include("../head.php");
    ?>
    <title>Usuarios Eliminados</title>
</head>

<body style="background-color: #d1d5db">

<div class="container mt-5"> 
    <div class="row justify-content-center">
        <div class="col-md-8"> 
            <h1>USUARIOS ELIMINADOS</h1>
            <a href="../controlador/controlador_usuario_panel.php" class="btn btn-primary">Panel de usuario</a>
            <a href="../controlador/controlador_posteo.php" class="btn btn-warning">Inicio</a>
            <br>
            <br>

            
          
          <?php foreach ($usuarios as $usuario): ?>
          
     
            <div class="card mb-3" style="font-size: 14px;">
                     <div class="card-body">
                   <h5 class="card-title">ID:   <?php echo $usuario["id"]; ?></h5>
                
                   <p class="card-text"> Nombre:   <?php echo $usuario["nombre"] ?></p>
                   <p class="card-text">Email:   <?php echo $usuario["email"] ?></p>
                   <a href="../controlador/controlador_usuario_activar.php?id=  <?php echo $usuario["id"] ?>" class="btn btn-success">Activar </a>
                    
                   <a href="../controlador/controlador_usuario_blanquear_password.php?id=  <?php echo $usuario["id"] ?>" class="btn btn-secondary">Blanquear Clave</a>
    
                   <a href="../controlador/controlador_usuario_editx.php?id=  <?php echo $usuario["id"] ?>" class="btn btn-warning">Editar datos Usuario</a>
                   </div>
                   </div>
        <?php endforeach; ?>








       

      
        
        </div>
    </div>
</div>

</body>

</html>
