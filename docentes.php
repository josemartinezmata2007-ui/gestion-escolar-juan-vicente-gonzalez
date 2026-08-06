<?php
$conn = new mysqli("localhost", "root", "", "gestion_escolar");

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// CREAR
if (isset($_POST['agregar_docente'])) {
    $nombre = $_POST['nombre'];
    $cedula = $_POST['cedula'];
    $especialidad = $_POST['especialidad'];
    $telefono = $_POST['telefono'];

    $stmt = $conn->prepare("INSERT INTO docentes (nombre, cedula, especialidad, telefono) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $nombre, $cedula, $especialidad, $telefono);
    $stmt->execute();
    header("Location: docentes.php");
}

// ELIMINAR
if (isset($_GET['eliminar'])) {
    $id = $_GET['eliminar'];
    $stmt = $conn->prepare("DELETE FROM docentes WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    header("Location: docentes.php");
}

// LEER
$resultado = $conn->query("SELECT * FROM docentes");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestión de Docentes</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; background-color: #f4f6f9; }
        .card { background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); margin-bottom: 20px; }
        input, button { padding: 8px; margin: 5px 0; display: block; width: 100%; max-width: 300px; }
        table { width: 100%; border-collapse: collapse; background: white; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: left; }
        th { background-color: #0056b3; color: white; }
    </style>
</head>
<body>

<div class="card">
    <h2>Registrar Nuevo Docente</h2>
    <form method="POST">
        <input type="text" name="nombre" placeholder="Nombre Completo" required>
        <input type="text" name="cedula" placeholder="Cédula" required>
        <input type="text" name="especialidad" placeholder="Especialidad (ej. Matemática)">
        <input type="text" name="telefono" placeholder="Teléfono">
        <button type="submit" name="agregar_docente" style="background:#28a745; color:white; border:none;">Guardar Docente</button>
    </form>
</div>

<div class="card">
    <h2>Lista de Docentes</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Cédula</th>
            <th>Especialidad</th>
            <th>Teléfono</th>
            <th>Acción</th>
        </tr>
        <?php while ($row = $resultado->fetch_assoc()): ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['nombre'] ?></td>
            <td><?= $row['cedula'] ?></td>
            <td><?= $row['especialidad'] ?></td>
            <td><?= $row['telefono'] ?></td>
            <td>
                <a href="docentes.php?eliminar=<?= $row['id'] ?>" onclick="return confirm('¿Eliminar docente?')" style="color:red;">Eliminar</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</div>

</body>
</html>
