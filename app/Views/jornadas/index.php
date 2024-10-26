<?= $this->extend('base'); ?>

<?= $this->section('title'); ?>
Lista de Jornadas
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<h2 class="my-4">Lista de Jornadas</h2>

<a href="<?= base_url('jornadas/create'); ?>" class="btn btn-success mb-3">Agregar nueva jornada</a>

<table class="table table-dark table-striped">
    <thead>
        <tr>
            <th>Fecha</th>
            <th>Nombre de la Jornada</th>
            <th>Acción</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($jornadas as $jornada): ?>
            <tr>
                <td><?= esc($jornada['fecha']); ?></td>
                <td><?= esc($jornada['descripcion']); ?></td>
                <td>
                    <a href="<?= base_url('puntos/jornada/' . $jornada['id_jornada']); ?>" class="btn btn-info btn-sm">Ver Puntos</a>
                    <a href="<?= base_url('jornadas/edit/' . $jornada['id_jornada']); ?>" class="btn btn-warning btn-sm">Editar</a>
                    <a href="<?= base_url('jornadas/delete/' . $jornada['id_jornada']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro?');">Eliminar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<div class="d-flex justify-content-between">
    <a href="<?= base_url('/'); ?>" class="btn btn-secondary">Volver al Menú Principal</a>
</div>
<?= $this->endSection(); ?>
