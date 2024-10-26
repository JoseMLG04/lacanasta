<?= $this->extend('base'); ?>

<?= $this->section('title'); ?>
Registrar Puntos para la Jornada: <?= esc($jornada['descripcion']); ?>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<h2 class="my-4">Registrar puntos para la jornada: Jornada <?= esc($jornada['descripcion']); ?></h2>

<div class="card">
    <div class="card-body">
        <form action="<?= base_url('puntos/store'); ?>" method="post">
            <div class="mb-3">
                <label for="id_jugador" class="form-label">Jugador:</label>
                <select name="id_jugador" id="id_jugador" class="form-select" required>
                    <?php foreach ($jugadores as $jugador): ?>
                        <option value="<?= esc($jugador['id_jugador']); ?>">
                            <?= esc($jugador['nombre_equipo'] . ' - ' . $jugador['nombres'] . ' ' . $jugador['apellidos']); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="puntos" class="form-label">Puntos:</label>
                <input type="number" class="form-control" name="puntos" id="puntos" required>
            </div>

            <div class="mb-3">
                <label for="tipo_tiro" class="form-label">Tipo de Tiro:</label>
                <select name="tipo_tiro" id="tipo_tiro" class="form-select">
                    <option value="Libre">Libre</option>
                    <option value="Dos Puntos">Dos Puntos</option>
                    <option value="Tres Puntos">Tres Puntos</option>
                </select>
            </div>

            <input type="hidden" name="id_jornada" value="<?= esc($jornada['id_jornada']); ?>">

            <div class="d-flex justify-content-between">
                <a href="<?= base_url('puntos/jornada/' . $jornada['id_jornada']); ?>" class="btn btn-secondary">Volver</a>
                <button type="submit" class="btn btn-success">Guardar Puntos</button>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection(); ?>
