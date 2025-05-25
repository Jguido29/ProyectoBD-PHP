<?php
session_start();
if (!isset($_SESSION['usuario']) || $_SESSION['rol'] !== 'usuario') {
    // Si no hay sesión iniciada o no es usuario, redirige a login
    header("Location: login.php");
    exit;
}

include 'conexion.php';

// Procesar inscripción si viene POST con curso_id
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['curso_id'])) {
    $curso_id = $_POST['curso_id'];
    $nombre_completo = $_SESSION['usuario']; // Nombre del usuario logueado

    // Preparar la consulta para insertar inscripción
    $stmt = $conn->prepare("INSERT INTO inscritos (id_curso, nombre_completo) VALUES (?,?)");
    $stmt->bind_param("is", $curso_id, $nombre_completo);

    if ($stmt->execute()) {
        echo "<p style='color:green;'>Inscripción exitosa al curso.</p>";
    } else {
        echo "<p style='color:red;'>Error al inscribirse: " . $conn->error . "</p>";
    }
}

// Obtener todos los cursos
$result = $conn->query("SELECT * FROM cursos");
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Panel del Estudiante</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        table { border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        button { padding: 6px 12px; }
    </style>
</head>
<body>

<h2>Bienvenido, <?php echo htmlspecialchars($_SESSION['usuario']); ?></h2>
<h3>Estos son los cursos disponibles</h3>
<di>
<table>
    <tr>
        <th>Nombre</th>
        <th>Descripción</th>
        <th>Fechas</th>
        <th>Cupos</th>
        <th>Acción</th>
    </tr>
    <?php while ($curso = $result->fetch_assoc()) { ?>
    <tr>
        <td><?php echo htmlspecialchars($curso['nombre']); ?></td>
        <td><?php echo htmlspecialchars($curso['descripcion']); ?></td>
        <td><?php echo htmlspecialchars($curso['fecha_inicio']) . " a " . htmlspecialchars($curso['fecha_fin']); ?></td>
        <td><?php echo htmlspecialchars($curso['cupos']); ?></td>
        <td>
            <form method="POST" action="">
                <input type="hidden" name="curso_id" value="<?php echo $curso['id']; ?>">
                <button type="submit">Inscribirse</button>
            </form>
        </td>
    </tr>
    <?php } ?>
</table>

<br>

<a href='logout.php' class='button-link'>Cerrar seccion</a>
</di>
</body>
</html>

<style>
    body {
        font-family: Arial, sans-serif;
        text-align: center;
        padding-top: 50px;
        background-color: #f0f0f0;
    }
    h2 {
        color: #401ae9;
        margin-bottom: 20px;
    }
    table {
        width: 80%;
        margin: auto;
        border-collapse: collapse;
    }
    th, td {
        padding: 10px;
        text-align: left;
    }
    th {
        background-color: #f2f2f2;
    }
    button {
        padding: 6px 12px;
        background-color: #401ae9;
        color: white;
        border: none;
        cursor: pointer;
    }
    button:hover {
        background-color: #3501c4;
    }
    .button-link {
        display: inline-block;
        padding: 10px 20px;
        background-color: #401ae9;
        color: white;
        text-decoration: none;
        border-radius: 5px;
    }
    .button-link:hover {
        background-color: #3501c4;
    }
    a {
        color: #401ae9;
        text-decoration: none;
    }
    a:hover {
        text-decoration: underline;
    }
    img {
        max-width: 15%;
        margin-top: 20px;
    }
    img:hover {
        transform: scale(1.05);
        transition: transform 0.3s;
    }
</style>