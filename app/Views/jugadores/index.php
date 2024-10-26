<?= $this->extend('base'); ?>

<?= $this->section('title'); ?>
Lista de Jugadores
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<h2 class="my-4">Lista de Jugadores</h2>

<a href="<?= base_url('jugadores/create/' . $equipo['id_equipo']); ?>" class="btn btn-success mb-3">Agregar nuevo jugador</a>

<table class="table table-dark table-striped">
    <thead>
        <tr>
            <th>Nombre del Jugador</th>
            <th>Apellidos</th>
            <th>Fecha de Nacimiento</th>
            <th>Foto</th>
            <th>Acción</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($jugadores as $jugador): ?>
            <tr>
                <td><?= esc($jugador['nombres']); ?></td>
                <td><?= esc($jugador['apellidos']); ?></td>
                <td><?= esc($jugador['fecha_nacimiento']); ?></td>
                <td><img src="<?= base_url('uploads/jugadores/' . $jugador['imagen']); ?>" width="50"></td>
                <td>
                    <a href="<?= base_url('jugadores/edit/' . $jugador['id_jugador']); ?>" class="btn btn-warning btn-sm">Editar</a>
                    <a href="<?= base_url('jugadores/delete/' . $jugador['id_jugador']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro?');">Eliminar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<div class="d-flex justify-content-between">
    <a href="<?= base_url('equipos'); ?>" class="btn btn-secondary">Volver a Equipos</a>
    <a href="<?= base_url('/'); ?>" class="btn btn-secondary">Volver al Menú Principal</a>
</div>
<?= $this->endSection(); ?>
