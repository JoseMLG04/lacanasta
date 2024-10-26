<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jugadores del equipo <?= esc($equipo['nombre_equipo']); ?> (Ordenados por apellidos)</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        ul {
            list-style: none;
            padding: 0;
        }
        li {
            margin-bottom: 10px;
        }
        .jugador-info {
            display: flex;
            align-items: center;
        }
        .jugador-info img {
            margin-right: 15px;
            width: 50px;
            height: 50px;
            object-fit: cover;
        }
        .footer {
            margin-top: 20px;
            text-align: center;
        }
    </style>
</head>
<body>
    <h2>Jugadores del equipo <?= esc($equipo['nombre_equipo']); ?> (Ordenados por apellidos)</h2>

    <ul>
        <?php foreach ($jugadores as $jugador): ?>
            <li class="jugador-info">
                <?= esc($jugador['apellidos']) . ' ' . esc($jugador['nombres']); ?>
            </li>
        <?php endforeach; ?>
    </ul>

    <div class="footer">
        Informe generado el <?= date('d-m-Y'); ?>
    </div>
</body>
</html>
