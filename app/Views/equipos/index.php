<?= $this->extend('base'); ?>

<?= $this->section('title'); ?>
Lista de Equipos
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<h2>Lista de Equipos</h2>

<a href="<?= base_url('equipos/create'); ?>" class="btn btn-success">Agregar nuevo equipo</a>

<table class="table table-dark">
    <thead>
        <tr>
            <th>Nombre del Equipo</th>
            <th>Logo</th>
            <th>Acción</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($equipos as $equipo): ?>
            <tr>
                <td><?= esc($equipo['nombre_equipo']); ?></td>
                <td><img src="<?= base_url('uploads/logos/' . $equipo['imagen']); ?>" width="50"></td>
                <td>
                    <a href="<?= base_url('equipos/jugadores/' . $equipo['id_equipo']); ?>" class="btn btn-info">Ver</a>
                    <a href="<?= base_url('equipos/edit/' . $equipo['id_equipo']); ?>" class="btn btn-warning">Editar</a>
                    <a href="<?= base_url('equipos/delete/' . $equipo['id_equipo']); ?>" class="btn btn-danger" onclick="return confirm('¿Estás seguro?');">Eliminar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<a href="<?= base_url('/'); ?>" class="btn btn-primary">Volver al Menú Principal</a>
<?= $this->endSection(); ?>
