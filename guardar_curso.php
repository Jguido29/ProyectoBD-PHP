<?php
session_start();
if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'admin') {
    header("Location: login.php");
    exit;
}
include 'conexion.php';

$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$fecha_inicio = $_POST['fecha_inicio'];
$fecha_fin = $_POST['fecha_fin'];
$cupos = $_POST['cupos'];

$sql = "INSERT INTO cursos (nombre, descripcion, fecha_inicio, fecha_fin, cupos)
        VALUES (?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssi", $nombre, $descripcion, $fecha_inicio, $fecha_fin, $cupos);
$stmt->execute();

header("Location: listar_cursos.php");
?>