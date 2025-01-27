<?php
// Datos de conexión
$host = "localhost";
$dbname = "winco";
$username = "root";
$password = "";

try {
    // Conexión a la base de datos
    $conexion = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Consulta SQL para obtener los datos
    $consulta = $conexion->query("SELECT * FROM productos");

    // Obtener los datos como un array asociativo
    $datos = $consulta->fetchAll(PDO::FETCH_ASSOC);

    // Convertir los datos a JSON
    $json = json_encode($datos, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

    // Guardar el JSON en un archivo
    file_put_contents("productos.json", $json);

    echo "Exportación completada con éxito.";
} catch (PDOException $e) {
    echo "Error en la conexión: " . $e->getMessage();
}
?>