<?php

class UsuariosModel
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function validarRegistro($nombre, $email, $password, $confirmarPassword)
    {
        $errors = [];

        // Validar campos vacíos
        if (empty($nombre)) {
            $errors[] = "El campo Usuario es obligatorio.";
        }

        if (empty($email)) {
            $errors[] = "El campo Correo Electrónico es obligatorio.";
        }

        if (empty($password)) {
            $errors[] = "El campo Contraseña es obligatorio.";
        }

        // Validar formato de correo electrónico
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "El formato del correo electrónico no es válido.";
        }

        // Validar contraseña (al menos una letra y un número)
        if (!preg_match('/^(?=.*[A-Za-z])(?=.*\d).+$/', $password)) {
            $errors[] = "La contraseña debe contener al menos una letra y un número.";
        }

        // Validar confirmar contraseña
        if (empty($confirmarPassword) || $confirmarPassword !== $password) {
            $errors[] = "Las contraseñas no coinciden.";
        }

        // Validar si el correo electrónico ya existe en la base de datos
        $stmt = $this->conn->prepare("SELECT email FROM usuarios WHERE email = ?");
        $stmt->execute([$email]);

        if ($stmt->fetchColumn()) {
            $errors[] = "El correo electrónico ya está registrado.";
        }

        return $errors;
    }
    //acaaaaaa

    public function validarEdit($nombre, $email)
    {
        $errors = [];

        // Validar campos vacíos
        if (empty($nombre)) {
            $errors[] = "El campo Usuario es obligatorio.";
        }

        if (empty($email)) {
            $errors[] = "El campo Correo Electrónico es obligatorio.";
        }

        // Validar formato de correo electrónico
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "El formato del correo electrónico no es válido.";
        }

        return $errors;
    }

    //acaaaa


    public function validarPassword($password, $confirmarPassword)
    {
        $errors = [];

        if (empty($password)) {
            $errors[] = "El campo Contraseña es obligatorio.";
        }

        // Validar contraseña (al menos una letra y un número)
        if (!preg_match('/^(?=.*[A-Za-z])(?=.*\d).+$/', $password)) {
            $errors[] = "La contraseña debe contener al menos una letra y un número.";
        }

        // Validar confirmar contraseña
        if (empty($confirmarPassword) || $confirmarPassword !== $password) {
            $errors[] = "Las contraseñas no coinciden.";
        }

        return $errors;
    }





    public static function validarPosteo($titulo, $contenido, $tipo, $imagen)
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
        $tiposValidos = array("Encontrado", "Perdido");
        if (empty($tipo) || !in_array($tipo, $tiposValidos)) {
            $errores[] = "Selecciona un tipo válido (Encontrado/Perdido).";
        }

        // Validar imagen (puedes ajustar según tus necesidades)
        if (empty($imagen)) {
            $errores[] = "Carga una imagen para el posteo.";
        }

        return $errores;
    }

    public function realizarRegistro($nombre, $email, $password)
    {
        //dsdasdasdsa

        // Hash de la contraseña
        $passwordHash = password_hash($password, PASSWORD_BCRYPT);

        // Inserción en la tabla de usuarios
        $stmtUsuarios = $this->conn->prepare("INSERT INTO usuarios (nombre, email, password) VALUES (?, ?, ?)");
        $stmtUsuarios->execute([$nombre, $email, $passwordHash]);

        // Obtener el ID del usuario recién insertado
        $idUsuario = $this->conn->lastInsertId();

        // ID del rol que quieres asignar (en este caso, 3)
        $idRol = 3;

        // Inserción en la tabla roles_usuarios
        $stmtRolesUsuarios = $this->conn->prepare("INSERT INTO roles_usuarios (id_rol, id_usuario) VALUES (?, ?)");
        $stmtRolesUsuarios->execute([$idRol, $idUsuario]);

        return true;



        //dsajdklsad
    }
    public function validarCredenciales($email, $password)
    {
        $error = '';

        $stmt = $this->conn->prepare("SELECT * FROM usuarios WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password']) && ($user['activo'] == 1)) {
            return $user;
        } elseif ($user && $user['activo'] == 0) {
            $error = "Usuario Bloqueado";
        } else {
            $error = "Credenciales incorrectas";
        }

        return $error;
    }


    public function denunciarPost($id_posteo)
    {
        $stmt = $this->conn->prepare("UPDATE posteos SET denuncia = 1 WHERE id = $id_posteo");
        $stmt->execute();
        $stmt2 = $this->conn->prepare("INSERT INTO t_denuncias (posteo_id) VALUES (?)");
        $stmt2->execute([$id_posteo]);

        return true;


    }
    public function denunciaListar()
    {
        // Consultar los posteos desde la base de datos
        $stmt = "SELECT p.id, p.titulo, p.contenido, d.estado
    FROM posteos p
    JOIN t_denuncias d ON p.id = d.posteo_id
    WHERE p.denuncia = 1";
        $result = $this->conn->query($stmt);
        $denuncias = [];

        if ($result) {
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                $denuncias[] = $row;
            }
        }

        return $denuncias;
    }
    public function liberarPost($id_posteo)
    {
        $stmt = $this->conn->prepare("UPDATE posteos SET denuncia = 0 WHERE id = $id_posteo");
        $stmt->execute();
        $stmt2 = $this->conn->prepare("INSERT INTO t_denuncias (posteo_id) VALUES (?)");
        $stmt2->execute([$id_posteo]);

        return true;


    }

    public function eliminarMiUsuario($id_user)
    {
        //activo 1 -- inactivo 0
        $stmt = $this->conn->prepare("UPDATE usuarios SET activo = 0 WHERE id = $id_user");
        $stmt->execute();


        return true;


    }

    public function activarMiUsuario($id_user)
    {
        //activo 1 -- inactivo 0
        $stmt = $this->conn->prepare("UPDATE usuarios SET activo = 1 WHERE id = $id_user");
        $stmt->execute();


        return true;


    }


    public function eliminarPost($id_posteo)
    {
        //activo 1 -- inactivo 0
        $stmt = $this->conn->prepare("UPDATE posteos SET activo = 0 WHERE id = $id_posteo");
        $stmt->execute();


        return true;


    }

    public function editarUsuario($nombre, $email, $id)
    {
        $stmt = $this->conn->prepare("UPDATE usuarios SET nombre = '$nombre', email = '$email' WHERE id = $id");
        $stmt->execute();

        return true;
    }

    public function editarPassword($password, $id_user)
    {
        $passwordHash = password_hash($password, PASSWORD_BCRYPT);

        $stmt = $this->conn->prepare("UPDATE usuarios SET password = '$passwordHash' WHERE id = $id_user");
        $stmt->execute();

        return true;
    }

    public function listarUsuarios()
    {

        $stmt = "SELECT id, nombre, email FROM usuarios WHERE activo = 1";
        $result = $this->conn->query($stmt);
        $usuarios = [];

        if ($result) {
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                $usuarios[] = $row;
            }
        }

        return $usuarios;
    }

    public function listarEliminados()
    {

        $stmt = "SELECT id, nombre, email FROM usuarios WHERE activo = 0";
        $result = $this->conn->query($stmt);
        $usuarios = [];

        if ($result) {
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                $usuarios[] = $row;
            }
        }

        return $usuarios;
    }
}
?>