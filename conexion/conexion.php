<?php
$host = 'localhost';  // o la dirección IP del servidor de la base de datos
$db = 'zenith';
$user = 'root';  // reemplaza con tu nombre de usuario de la base de datos
$pass = '123456';  // reemplaza con tu contraseña de la base de datos,prueba de conexxion

try {
    // Crear una instancia de PDO para la conexión a la base de datos
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    // Configurar PDO para que lance excepciones en caso de error
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Si la conexión es exitosa, se define una variable
    $conexion_exitosa = true;
} catch (PDOException $e) {
    // Si ocurre un error, se define una variable indicando el fallo
    $conexion_exitosa = false;
}
?>
