<?php

class Conexion {
    private $host = "localhost";
    private $usuario = "tu_usuario";
    private $contrasena = "tu_contraseña";
    private $base_datos = "bd_personas";
    private $conexion;

    public function __construct() {
        $this->conexion = new PDO("mysql:host={$this->host};dbname={$this->base_datos}", $this->usuario, $this->contrasena);
        $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function obtenerConexion() {
        return $this->conexion;
    }
}

class CiudadanoRepositorio {
    private $conexion;

    public function __construct($conexion) {
        $this->conexion = $conexion;
    }

    public function obtenerTodosLosCiudadanos() {
        $query = "SELECT * FROM ciudadano";
        $statement = $this->conexion->prepare($query);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}

// Uso del repositorio
try {
    $conexion = new Conexion();
    $ciudadanoRepositorio = new CiudadanoRepositorio($conexion->obtenerConexion());

    $ciudadanos = $ciudadanoRepositorio->obtenerTodosLosCiudadanos();

    // Mostrar los resultados
    echo "<h2>Datos de Ciudadanos</h2>";
    echo "<table border='1'>";
    echo "<tr><th>CI</th><th>Nombres</th><th>Apellidos</th><th>Fecha</th></tr>";

    foreach ($ciudadanos as $ciudadano) {
        echo "<tr>";
        echo "<td>{$ciudadano['ci']}</td>";
        echo "<td>{$ciudadano['nombres']}</td>";
        echo "<td>{$ciudadano['apellidos']}</td>";
        echo "<td>{$ciudadano['fecha']}</td>";
        echo "</tr>";
    }

    echo "</table>";

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

?>
