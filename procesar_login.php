<?php
session_start();
include 'conexion.php';

$usuario = $_POST['usuario'];
$clave = $_POST['clave'];

$sql = "SELECT * FROM usuarios WHERE nombre_usuario = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $usuario);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $row = $result->fetch_assoc();
    if ($row && $clave === $row['clave']) {
        $_SESSION['usuario'] = $row['nombre_usuario'];
        $_SESSION['rol'] = $row['rol'];
        if ($row['rol'] === 'admin') {
            header("Location: admin_panel.php");
        } else {
            header("Location: usuario_panel.php");
        }
        exit;
    }
}
echo "Usuario o contraseña incorrectos.";
?>