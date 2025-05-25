<?php
session_start();
if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'admin') {
    header("Location: login.php");
    exit;
}
include 'conexion.php';

$sql = "SELECT i.nombre_completo, c.nombre AS curso
        FROM inscritos i
        JOIN cursos c ON i.id_curso = c.id
        ORDER BY c.nombre";

$resultado = $conn->query($sql);

echo "<h2>Inscritos por Curso</h2>";
while ($row = $resultado->fetch_assoc()) {
    echo "<p><strong>Curso:</strong> " . $row['curso'] . "<br>" .
         "<strong>Nombre:</strong> " . $row['nombre_completo'] . "<br>"."<br>";
}
echo "<a href='admin_panel.php' class='button-link'>Volver</a>";
?>
<style>
    body {
        font-family: Arial, sans-serif;
        text-align: left;
        padding-top: 50px;
        background-color: #f0f0f0;
    }
    tr {
        background-color: #f9f9f9;
    }
    th, td {
        padding: 10px;
        text-align: left;
    }
    echo {
        color: #401ae9;
        font-weight: bold;
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
    h2 {
        color: #401ae9;
        margin-bottom: 20px;
    }
    p {
        margin: 10px 0;
    }
</style>