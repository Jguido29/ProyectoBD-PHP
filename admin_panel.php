<?php
session_start();
if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'admin') {
    header("Location: login.php");
    exit;
}
?>

<h1>Panel de control</h1>

<h2>Bienvenido " <?php echo $_SESSION['usuario']; ?> "</h2>
<di>
<ul>
    <li><a href="crear_curso.php">Crear Curso</a></li>
    <li><a href="listar_cursos.php">Ver Cursos</a></li>
    <li><a href="ver_inscritos.php">Ver Inscritos</a></li>
    <li><a href="logout.php">Cerrar sesión</a></li>
</ul>
</di>
<di> <img src="admin.png"> </di>
<style>
    body {
        font-family: Arial, sans-serif;
        text-align: center;
        padding-top: 50px;
        background-color: #f0f0f0;
    }

    h1 {
        color: #401ae9;
        text-align: center;
        margin-bottom: 20px;
    }

    ul {
        list-style-type: none;
        padding: 0;
    }

    li {
        margin: 10px 0;
    }

    a {
        text-decoration: none;
        color: #401ae9;
        font-weight: bold;
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