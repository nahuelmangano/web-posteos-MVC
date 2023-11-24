<?php

class comentarioModel
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function guardarComentario($posteo_id, $comentario)
    {
        $stmt = $this->conn->prepare("INSERT INTO comentarios (posteo_id, comentario) VALUES (?, ?)");

        $stmt->execute([$posteo_id, $comentario]);


        return true;
    }
}


?>