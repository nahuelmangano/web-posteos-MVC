<?php
if (!empty($posteos)) {
    echo "<br>";
    echo "<ul class='navbar-nav ml-auto'>";
    foreach ($posteos as $posteo) {
     
        echo "<li><a href='../controlador/controlador_posteo_solouno.php?id=" . $posteo["id"] . "'>" . $posteo["titulo"] . "</a>
        <br><p>".$posteo["contenido"]."</p>
        </li>";
    }
    echo "</ul>";
} else {
    echo "No se encontraron resultados.";
}
?>
