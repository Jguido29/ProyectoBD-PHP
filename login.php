<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h2>LOGIN</h2>
    <form action="procesar_login.php" method="POST">
        <label>Usuario:</label>
        <input type="text" name="usuario" required><br>
        <label>Contraseña:</label>
        <input type="password" name="clave" required><br>
        <button type="submit">Entrar</button>
        <p>¿No tienes cuenta? <a href="registro.php">Crear usuario</a></p>  
    </form>
        <img src="login.png" alt="Your Website Logo"></body>
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
        padding: 8px 12px;
        background-color: #401ae9;
        color: white;
        border: none;
        cursor: pointer;
    }

    button:hover {
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
        margin-top: 30px;
    }
    img:hover {
        transform: scale(1.05);
        transition: transform 0.3s;
    }
    .error {
        color: red;
    }
    .success {
        color: green;
    }
    .warning {
        color: orange;
    }
   

</style>