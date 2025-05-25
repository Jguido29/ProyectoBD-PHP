<?php
session_start();
if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'admin') {
    header("Location: login.php");
    exit;
}
include 'conexion.php';

$resultado = $conn->query("SELECT * FROM cursos");

echo "<h2>Listado de Cursos</h2>";
while ($row = $resultado->fetch_assoc()) {
    echo "<p><strong>" . $row['nombre'] . "</strong><br>" .
         "Inicio: " . $row['fecha_inicio'] . " | Fin: " . $row['fecha_fin'] . "<br>" .
         "Cupos: " . $row['cupos'] . "<br>" .
         "Descripción: " . $row['descripcion'] . "</p><hr>";
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