<?php
session_start();
session_destroy();
header('Location: controlador_posteo.php');
?>