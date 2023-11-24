<?php

class PosteoModel
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function validarPosteo($titulo, $contenido, $tipo, $imagen)
    {
        $errores = array();

        // Validar título
        if (empty($titulo) || strlen($titulo) < 4) {
            $errores[] = "El título debe tener al menos 4 letras.";
        }

        // Validar contenido
        if (empty($contenido) || strlen($contenido) < 4) {
            $errores[] = "El contenido debe tener al menos 4 letras.";
        }

        // Validar tipo (Encontrado/Perdido)
        $tiposValidos = array("encontrado", "perdido");
        if (empty($tipo) || !in_array($tipo, $tiposValidos)) {
            $errores[] = "Selecciona un tipo válido (Encontrado/Perdido).";
        }

        // Validar imagen (puedes ajustar según tus necesidades)
        if (empty($imagen)) {
            $errores[] = "Carga una imagen para el posteo.";
        }

        return $errores;
    }

    public function obtenerPosteosActivos()
    {
        $sql = "SELECT id, titulo, contenido, tipo_post, imagen_path, fecha_publicacion,creador FROM posteos WHERE activo = 1 ORDER BY fecha_publicacion DESC;
        ";


        $posteos = [];

        if ($result = $this->conn->query($sql)) {
            $posteos = $result->fetchAll(PDO::FETCH_ASSOC);
        }

        return $posteos;
    }



    public function obtenerPosteo($posteo_id)
    {
        $sql = "SELECT id, titulo, contenido, tipo_post, imagen_path, fecha_publicacion,creador FROM posteos WHERE activo = 1 AND id=$posteo_id ORDER BY fecha_publicacion DESC;
        ";


        $posteos = [];

        if ($result = $this->conn->query($sql)) {
            $posteos = $result->fetchAll(PDO::FETCH_ASSOC);
        }

        return $posteos;
    }
    public function obtenerPosteosEncontrados()
    {
        $sql = "SELECT id, titulo, contenido, tipo_post, imagen_path, fecha_publicacion,creador FROM posteos WHERE activo = 1 AND  tipo_post= 'encontrado' ORDER BY fecha_publicacion DESC";

        $result = $this->conn->query($sql);

        $posteos = [];

        if ($result) {
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                $posteos[] = $row;
            }
        }

        return $posteos;
    }

    public function obtenerPosteosPerdidos()
    {
        $sql = "SELECT id, titulo, contenido, tipo_post, imagen_path, fecha_publicacion,creador FROM posteos WHERE activo = 1 AND  tipo_post= 'perdido' ORDER BY fecha_publicacion DESC";
        $result = $this->conn->query($sql);

        $posteos = [];

        if ($result) {
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                $posteos[] = $row;
            }
        }

        return $posteos;
    }

    public function buscarPosteos($busqueda)
    {
        $sql = "SELECT * FROM posteos WHERE activo=1 AND titulo LIKE '%" . $busqueda . "%'";
        $result = $this->conn->query($sql);

        $posteos = [];

        if ($result) {
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                $posteos[] = $row;
            }
        }

        return $posteos;
    }

    public function guardarPosteo($titulo, $contenido, $tipo_posteo, $imagen_destino, $creador)
    {

        $stmt = $this->conn->prepare("INSERT INTO posteos (titulo, contenido,tipo_post, imagen_path, creador) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$titulo, $contenido, $tipo_posteo, $imagen_destino, $creador]);


        return true;
    }

    public function obtenerComentariosPorPosteo($posteoId)
    {
        $comentariosSql = "SELECT comentario, fecha_comentario FROM comentarios WHERE posteo_id = :posteo_id";
        $comentariosStmt = $this->conn->prepare($comentariosSql);
        $comentariosStmt->bindParam(':posteo_id', $posteoId, PDO::PARAM_INT);
        $comentariosStmt->execute();

        $comentarios = [];

        while ($comentario = $comentariosStmt->fetch(PDO::FETCH_ASSOC)) {
            $comentarios[] = $comentario;
        }

        return $comentarios;
    }

    public function misPosteos($id_creador)
    {
        $stmt = "SELECT id, titulo, contenido, tipo_post, imagen_path, fecha_publicacion,creador FROM posteos WHERE creador = $id_creador";

        $posteos = [];

        if ($result = $this->conn->query($stmt)) {
            $posteos = $result->fetchAll(PDO::FETCH_ASSOC);
        }

        return $posteos;

    }

    public function editarPost($titulo, $contenido, $imagen_destino, $id)
    {
        if ($imagen_destino !== null) {
            $stmt = $this->conn->prepare("UPDATE posteos SET titulo = '$titulo', contenido = '$contenido', imagen_path = '$imagen_destino' WHERE id = $id");
            $stmt->execute();
        } else {
            $stmt = $this->conn->prepare("UPDATE posteos SET titulo = '$titulo', contenido = '$contenido' WHERE id = $id");
            $stmt->execute();
        }



        return true;
    }

}


?>