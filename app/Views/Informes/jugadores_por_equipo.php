<?= $this->extend('base'); ?>

<?= $this->section('title'); ?>
Informe de jugadores agrupados por equipo
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<h2 class="my-4">Informe de todos los jugadores agrupados por equipo</h2>

<a href="<?= base_url('informes/jugadores_por_equipo_pdf'); ?>" target="_blank" class="btn btn-info mb-3">Descargar PDF</a>

<?php foreach ($jugadoresPorEquipo as $nombreEquipo => $jugadores): ?>
    <h3 class="mt-4">Equipo: <?= esc($nombreEquipo); ?></h3>
    <ul class="list-group">
        <?php foreach ($jugadores as $jugador): ?>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <div>
                    <img src="<?= base_url('uploads/jugadores/' . $jugador['imagen']); ?>" alt="Foto de <?= esc($jugador['nombres']); ?>" class="img-thumbnail" width="50">
                    <?= esc($jugador['nombres']) . ' ' . esc($jugador['apellidos']); ?> (Fecha de Nacimiento: <?= esc($jugador['fecha_nacimiento']); ?>)
                </div>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endforeach; ?>
<div class="footer text-center mt-4">
    Informe generado el <?= date('d-m-Y'); ?>
</div>

<div class="d-flex justify-content-between mt-4">
    <a href="<?= base_url('informes'); ?>" class="btn btn-secondary">Volver a Informes</a>
    <a href="<?= base_url('/'); ?>" class="btn btn-secondary">Volver al Menú Principal</a>
</div>
<?= $this->endSection(); ?>
