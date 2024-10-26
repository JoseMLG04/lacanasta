<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informe de jugadores agrupados por equipo</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        h2, h3 {
            text-align: center;
        }
        ul {
            list-style: none;
            padding: 0;
        }
        li {
            margin-bottom: 10px;
        }
        .footer {
            margin-top: 20px;
            text-align: center;
        }
    </style>
</head>
<body>
    <h2>Informe de jugadores agrupados por equipo</h2>

    <?php foreach ($jugadoresPorEquipo as $equipo => $jugadores): ?>
        <h3>Equipo: <?= esc($equipo); ?></h3>
        <ul>
            <?php foreach ($jugadores as $jugador): ?>
                <li>
                    <?= esc($jugador['nombres']) . ' ' . esc($jugador['apellidos']); ?> (Fecha de Nacimiento: <?= esc($jugador['fecha_nacimiento']); ?>)
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endforeach; ?>

    <div class="footer">
        Informe generado el <?= date('d-m-Y'); ?>
    </div>
</body>
</html>
