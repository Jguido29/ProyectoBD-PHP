<?php
session_start();
if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'admin') {
    header("Location: login.php");
    exit;
}
?>

<h2>Crear Nuevo Curso</h2>
<form method="POST" action="guardar_curso.php">
    <label>Nombre del curso:</label><br>
    <input type="text" name="nombre" required><br>
    <label>Descripción:</label><br>
    <textarea name="descripcion"></textarea><br>
    <label>Fecha de inicio:</label><br>
    <input type="date" name="fecha_inicio" required><br>
    <label>Fecha de fin:</label><br>
    <input type="date" name="fecha_fin" required><br>
    <label>Cupos:</label><br>
    <input type="number" name="cupos" required><br>
    <button type="submit">Guardar Curso</button>
    <a href='admin_panel.php' class='button-link'>Volver</a>
</form>
    

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f0f0f0;
            text-align: center;
        }
        h2 {
            color: #401ae9;
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-top: 10px;
        }
        input[type="text"],
        input[type="date"],
        input[type="number"],
        textarea {
            width: 50%;
            padding: 5px;
            margin-top: 5px;
            box-sizing: border-box;
        }
        button {
            margin-top: 10px;
            padding: 10px 15px;
            background-color: #401ae9;
            color: white;
            border: none;
            border-radius: 5px;
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
        a.button-link {
            margin-top: 20px;
            display: inline-block;
        }
    textarea {
            width: 50%;
            height: 100px;
            resize: vertical;
        }


    </style>