<?= $this->extend('base'); ?>

<?= $this->section('title'); ?>
Jugadores del Equipo <?= esc($equipo['nombre_equipo']); ?> (Ordenados por apellidos)
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<h2 class="my-4">Jugadores del equipo <?= esc($equipo['nombre_equipo']); ?> (Ordenados por apellidos)</h2>

<a href="<?= base_url('informes/jugadores_por_equipo_ordenados_pdf/' . $equipo['id_equipo']); ?>" target="_blank" class="btn btn-info mb-3">Descargar PDF</a>

<ul class="list-group">
    <?php foreach ($jugadores as $jugador): ?>
        <li class="list-group-item d-flex justify-content-between align-items-center">
            <div>
                <img src="<?= base_url('uploads/jugadores/' . $jugador['imagen']); ?>" alt="Foto de <?= esc($jugador['nombres']); ?>" class="img-thumbnail" width="50">
                <?= esc($jugador['apellidos']) . ', ' . esc($jugador['nombres']); ?> (Fecha de Nacimiento: <?= esc($jugador['fecha_nacimiento']); ?>)
            </div>
        </li>
    <?php endforeach; ?>
</ul>
<div class="footer text-center mt-4">
    Informe generado el <?= date('d-m-Y'); ?>
</div>
<div class="d-flex justify-content-between mt-4">
    <a href="<?= base_url('informes'); ?>" class="btn btn-secondary">Volver a Informes</a>
    <a href="<?= base_url('/'); ?>" class="btn btn-secondary">Volver al Menú Principal</a>
</div>
<?= $this->endSection(); ?>
