<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="http://localhost/integrador_MVC/controlador/controlador_posteo.php">Pagina de
      Posteos</a>
    <button href="http://localhost/integrador_v2/index.php" class="navbar-toggler" type="button"
      data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
      aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="http://localhost/integrador_MVC/controlador/controlador_posteo.php">Inicio</a>
      </li>
      <li class="nav-item">
        <a href="http://localhost/integrador_MVC/controlador/controlador_posteo_encontrado.php"
          class="nav-link">Encontrados</a>
      </li>
      <li class="nav-item">
        <a href="http://localhost/integrador_MVC/controlador/controlador_posteo_perdido.php"
          class="nav-link">Perdidos</a>
      </li>
      <li class="nav-item">
        <a href="http://localhost/integrador_MVC/controlador/controlador_posteo_busqueda.php"
          class="nav-link">Buscar</a>
      </li>
      <?php


      if (isset($_SESSION['user_id'])) {
        // Si el usuario ha iniciado sesión, muestra el botón "Log Out" y "Panel de usuario" a la derecha.
        echo '<li>';
        echo '<a href="http://localhost/integrador_MVC/controlador/controlador_usuario_logout.php" class="nav-link">Log Out</a>';
        echo '</li>';
        echo '<li>';
        echo '<a href="http://localhost/integrador_MVC/controlador/controlador_usuario_panel.php" class="nav-link">Panel de usuario</a>';
        echo '</li>';
      } else {
        // Si el usuario no ha iniciado sesión, muestra el botón "Log In" y "Registrarse" a la derecha.
        echo '<li>';
        echo '<a href="http://localhost/integrador_MVC/controlador/controlador_usuario_login.php" class="nav-link">Log in</a>';
        echo '</li>';
        echo '<li>';
        echo '<a href="http://localhost/integrador_MVC/controlador/controlador_usuario_registro.php" class="nav-link">Registrarse</a>';
        echo '</li>';
      }
      ?>
    </ul>
  </div>
</nav>