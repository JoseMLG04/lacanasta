<?= $this->extend('base'); ?>

<?= $this->section('title'); ?>
Informe de Máximos Anotadores
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<h2 class="my-4 text-center">Informe de Máximos Anotadores</h2>

<a href="<?= base_url('informes/maximos_anotadores_pdf'); ?>" target="_blank" class="btn btn-info mb-3">Descargar PDF</a>

<table class="table table-bordered table-striped">
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

<div class="footer text-center mt-4">
    Informe generado el <?= date('d-m-Y'); ?>
</div>

<!-- Botones para volver -->
<div class="d-flex justify-content-between mt-4">
    <a href="<?= base_url('informes'); ?>" class="btn btn-secondary">Volver a Informes</a>
    <a href="<?= base_url('/'); ?>" class="btn btn-secondary">Volver al Menú Principal</a>
</div>
<?= $this->endSection(); ?>
