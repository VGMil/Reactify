<?php

class User
{
    private ?int $id;
    public string $nombre;
    public string $correo;
    public string $password_hash;

    public function __construct(?int $id, string $nombre, string $correo, string $password_hash){
        $this->id = $id;
        $this->nombre = $nombre;
        $this->correo = $correo;
        $this->password_hash = $password_hash;
    }

    // --- MÉTODO PARA CREAR UN NUEVO USUARIO (ESTÁTICO) ---
    public static function create(string $nombre, string $correo, string $plain_password): self
    {
        // 1. Hashear la contraseña de forma segura
        $password_hash = password_hash($plain_password, PASSWORD_DEFAULT);

        // 2. Crear una nueva instancia de User con el hash
        return new self(id: null, nombre: $nombre, correo: $correo, password_hash: $password_hash);
    }

    public function save(): bool
    {
        $mysqli = getDatabaseConnection();
        
        if ($this->id === null) {
            // INSERT para un nuevo usuario
            $sql = "INSERT INTO usuarios (nombre, correo, password_hash) VALUES (?, ?, ?)";
            $stmt = $mysqli->prepare($sql);

            // 'sss' indica que los 3 parámetros son de tipo string
            $stmt->bind_param("sss", $this->nombre, $this->correo, $this->password_hash);

            $result = $stmt->execute();
            $stmt->close();

            if ($result) {
                // Obtenemos el ID del nuevo usuario y lo asignamos al objeto
                $this->id = $mysqli->insert_id;
            }
            return $result;
        }
        return false;
    }

    public static function findById(int $id): ?self
    {
        $mysqli = getDatabaseConnection();
        $sql = "SELECT id, nombre, correo, password_hash, created_at FROM usuarios WHERE id = ?";
        $stmt = $mysqli->prepare($sql);

        // 'i' indica que el parámetro es de tipo integer
        $stmt->bind_param("i", $id);
        $stmt->execute();

        // Obtenemos el resultado
        $result = $stmt->get_result();
        $userData = $result->fetch_assoc();

        $stmt->close();
        $mysqli->close(); // Cerramos la conexión si no la vamos a usar más

        if ($userData === null) {
            return null;
        }

        // Creamos una nueva instancia de User con los datos de la BD
        $user = new self((int)$userData['id'],$userData['nombre'], $userData['correo'], $userData['password_hash']);
        return $user;
    }

    public static function findByCorreo(string $correo): ?self
    {
        $mysqli = getDatabaseConnection();
        $sql = "SELECT id, nombre, correo, password_hash, created_at FROM usuarios WHERE correo = ?";
        $stmt = $mysqli->prepare($sql);

        // 's' indica que el parámetro es de tipo string
        $stmt->bind_param("s", $correo);
        $stmt->execute();

        // Obtenemos el resultado
        $result = $stmt->get_result();
        $userData = $result->fetch_assoc();

        $stmt->close();

        if ($userData === null) {
            return null;
        }

        // Creamos una nueva instancia de User con los datos de la BD
        $user = new self((int)$userData['id'],$userData['nombre'], $userData['correo'], $userData['password_hash']);
        return $user;
    }
    public function verifyPassword(string $plain_password): bool
    {
        $test = password_hash($plain_password, PASSWORD_DEFAULT);
        error_log($plain_password);
        error_log($test);
        return password_verify($plain_password, $this->password_hash);
    }
}
