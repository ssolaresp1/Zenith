<!DOCTYPE html>
<html>
<head>
    <title>Lista de Animales</title>
</head>
<body>
    <h1>Lista de Animales</h1>

    <?php
    // Incluir archivo de conexión con ruta absoluta
    require_once __DIR__ . '/../../conexion/conexion.php'; // Ajusta la ruta según la ubicación de conexion.php
    require_once '../controlador/AnimalController.php';
    
    // Crear instancia del controlador
    $controller = new AnimalController($pdo);

    // Listar todos los animales
    echo "<h2>Lista de Animales</h2>";
    $result = $controller->read();
    echo "<table border='1'>";
    echo "<tr><th>ID</th><th>Código</th><th>Nombre</th><th>Acciones</th></tr>";
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['codigo']}</td>";
        echo "<td>{$row['nombre']}</td>";
        echo "<td><a href='editar.php?id={$row['id']}'>Editar</a> | 
                  <form action='eliminar.php' method='post' style='display:inline;'>
                      <input type='hidden' name='id' value='{$row['id']}'>
                      <input type='submit' value='Eliminar'>
                  </form></td>";
        echo "</tr>";
    }
    echo "</table>";
    ?>
</body>
</html>
