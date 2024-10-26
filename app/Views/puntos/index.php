<?= $this->extend('base'); ?>

<?= $this->section('title'); ?>
Puntos para la Jornada: <?= esc($jornada['descripcion']); ?>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<h2 class="my-4">Puntos para la jornada: <?= esc($jornada['descripcion']); ?></h2>

<a href="<?= base_url('puntos/create/' . $jornada['id_jornada']); ?>" class="btn btn-success mb-3">Agregar nuevo punto</a>

<table class="table table-dark table-striped">
    <thead>
        <tr>
            <th>Jugador</th>
            <th>Equipo</th>
            <th>Puntos</th>
            <th>Tipo de Tiro</th>
            <th>Acción</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($puntos as $punto): ?>
            <tr>
                <td><?= esc($punto['nombres']) . ' ' . esc($punto['apellidos']); ?></td>
                <td><?= esc($punto['nombre_equipo']); ?></td>
                <td><?= esc($punto['puntos']); ?></td>
                <td><?= esc($punto['tipo_tiro']); ?></td>
                <td>
                    <a href="<?= base_url('puntos/edit/' . $punto['id_puntos']); ?>" class="btn btn-warning btn-sm">Editar</a>
                    <a href="<?= base_url('puntos/delete/' . $punto['id_puntos']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este punto?');">Eliminar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<div class="d-flex justify-content-between">
    <a href="<?= base_url('jornadas'); ?>" class="btn btn-secondary">Volver a Jornadas</a>
    <a href="<?= base_url('/'); ?>" class="btn btn-secondary">Volver al Menú Principal</a>
</div>
<?= $this->endSection(); ?>
