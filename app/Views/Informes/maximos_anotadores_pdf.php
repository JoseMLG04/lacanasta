<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informe de Máximos Anotadores</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        h2 {
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 10px;
            border: 1px solid #000;
            text-align: left;
        }
        .footer {
            margin-top: 20px;
            text-align: center;
        }
    </style>
</head>
<body>
    <h2>Informe de Máximos Anotadores</h2>

    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Total Puntos</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($jugadores as $jugador): ?>
                <tr>
                    <td><?= esc($jugador['nombres']); ?></td>
                    <td><?= esc($jugador['apellidos']); ?></td>
                    <td><?= esc($jugador['total_puntos']); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div class="footer">
        Informe generado el <?= date('d-m-Y'); ?>
    </div>
</body>
</html>
