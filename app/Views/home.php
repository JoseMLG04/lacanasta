<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Principal</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            text-align: center;
            padding: 50px;
        }

        h2 {
            margin-bottom: 40px;
            font-size: 2em;
            color: #333;
        }

        .options {
            display: flex;
            justify-content: center;
            gap: 30px;
        }

        .option {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 150px;
        }

        .option a {
            text-decoration: none;
            font-size: 1.2em;
            color: #333;
            font-weight: bold;
        }

        .option a:hover {
            color: #007BFF;
        }

        footer {
            text-align: center;
            padding: 10px;
            background-color: #f8f9fa;
            position: fixed;
            bottom: 0;
            width: 100%;
            font-size: 14px;
        }

        footer h3, footer p {
            margin: 5px 0;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>¿Cómo podemos ayudarte?</h2>
    <div class="options">
        <!-- Opción para Equipos -->
        <div class="option">
            <a href="<?= base_url('equipos'); ?>">Equipos</a>
        </div>

        <!-- Opción para Jornadas -->
        <div class="option">
            <a href="<?= base_url('jornadas'); ?>">Jornadas</a>
        </div>

        <!-- Opción para Informes -->
        <div class="option">
            <a href="<?= base_url('informes'); ?>">Informes</a>
        </div>
    </div>
</div>

<!-- Footer con la información de los desarrolladores y del sistema -->
<footer>
    <h3>José Mauricio López García, Carnet: 5190-21-352</h3>  
    <h3>Emerson Sebastian Hernandez Rojas, Carnet: 5190-20-21989</h3>  
    <p>
        <strong>Archivo:</strong> <?= $_SERVER['PHP_SELF']; ?><br>
        <strong>Servidor:</strong> <?= $_SERVER['SERVER_NAME']; ?><br>
        <strong>Cliente IP:</strong> <?= $_SERVER['REMOTE_ADDR']; ?><br>
        <strong>Cliente Nombre:</strong> <?= isset($_SERVER['REMOTE_HOST']) ? $_SERVER['REMOTE_HOST'] : 'No disponible'; ?><br>
        <strong>User Agent:</strong> <?= $_SERVER['HTTP_USER_AGENT']; ?><br>
    </p>
</footer>

</body>
</html>
