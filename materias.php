<?php
$conn = new mysqli("localhost", "root", "", "gestion_escolar");

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// CREAR MATERIA
if (isset($_POST['agregar_materia'])) {
    $nombre = $_POST['nombre_materia'];
    $codigo = $_POST['codigo'];
    $docente_id = $_POST['docente_id'];

    $stmt = $conn->prepare("INSERT INTO materias (nombre_materia, codigo, docente_id) VALUES (?, ?, ?)");
    $stmt->bind_param("ssi", $nombre, $codigo, $docente_id);
    $stmt->execute();
    header("Location: materias.php");
}

// ELIMINAR
if (isset($_GET['eliminar'])) {
    $id = $_GET['eliminar'];
    $stmt = $conn->prepare("DELETE FROM materias WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    header("Location: materias.php");
}

// LEER CON JOIN
$sql = "SELECT materias.id, materias.nombre_materia, materias.codigo, docentes.nombre AS docente 
        FROM materias 
        LEFT JOIN docentes ON materias.docente_id = docentes.id";
$resultado = $conn->query($sql);

$docentes = $conn->query("SELECT * FROM docentes");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestión de Materias</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; background-color: #f4f6f9; }
        .card { background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); margin-bottom: 20px; }
        input, select, button { padding: 8px; margin: 5px 0; display: block; width: 100%; max-width: 300px; }
        table { width: 100%; border-collapse: collapse; background: white; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: left; }
        th { background-color: #0056b3; color: white; }
    </style>
</head>
<body>

<div class="card">
    <h2>Registrar Asignatura / Materia</h2>
    <form method="POST">
        <input type="text" name="nombre_materia" placeholder="Nombre de la Materia" required>
        <input type="text" name="codigo" placeholder="Código (ej. MAT-101)" required>
        <select name="docente_id" required>
            <option value="">Seleccione Docente Asignado</option>
            <?php while ($d = $docentes->fetch_assoc()): ?>
                <option value="<?= $d['id'] ?>"><?= $d['nombre'] ?></option>
            <?php endwhile; ?>
        </select>
        <button type="submit" name="agregar_materia" style="background:#28a745; color:white; border:none;">Guardar Materia</button>
    </form>
</div>

<div class="card">
    <h2>Lista de Materias</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Materia</th>
            <th>Código</th>
            <th>Docente a Cargo</th>
            <th>Acción</th>
        </tr>
        <?php while ($row = $resultado->fetch_assoc()): ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['nombre_materia'] ?></td>
            <td><?= $row['codigo'] ?></td>
            <td><?= $row['docente'] ? $row['docente'] : 'Sin asignar' ?></td>
            <td>
                <a href="materias.php?eliminar=<?= $row['id'] ?>" onclick="return confirm('¿Eliminar materia?')" style="color:red;">Eliminar</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</div>

</body>
</html>
