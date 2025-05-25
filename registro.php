<?php
include 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['nombre_usuario'];
    $clave = $_POST['clave'];
    $rol = 'usuario';

    $stmt = $conn->prepare("INSERT INTO usuarios (nombre_usuario, clave, rol) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $usuario, $clave, $rol);

    if ($stmt->execute()) {
        echo "<p style='color:green;'>SE CREO CORRECTAMENTE. Puedes iniciar sesión ahora.</p>";
        echo "<a href='login.php' class='button-link'>Iniciar Sesión</a>";

    } else {
        echo "<p style='color:red;'>ERROR: " . $conn->error . "</p>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Crear Usuario</title>
</head>
<body>
    <h2>Registro de Usuario</h2>
    <form method="POST">
        <label>Nombre de usuario:</label><br>
        <input type="text" name="nombre_usuario" required><br>
        <label>Contraseña:</label><br>
        <input type="password" name="clave" required><br><br>
        <button type="submit">Registrarse</button>
        <a href='login.php' class='button-link'>Cancelar</a>
    </form>
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

    form {
        display: inline-block;
        text-align: left;
    }

    label {
        display: block;
        margin-bottom: 5px;
    }

    input[type="text"],
    input[type="password"] {
        width: 200px;
        padding: 8px;
        margin-bottom: 10px;
    }

    button {
        padding: 8px 20px;
        background-color: #401ae9;
        color: white;
        border: none;
        cursor: pointer;
    }

    button:hover {
        background-color: #3501c4;
    }
    .button-link {
        padding: 7px 20px;
        background-color: #401ae9;
        color: white;
        border: none;
        cursor: pointer;
    }
    .button-link:hover {
        background-color: #3501c4;
    }
    a {
        color: #401ae9;
        text-decoration: none;
    }
    
   
