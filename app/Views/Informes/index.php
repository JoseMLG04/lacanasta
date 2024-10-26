<?= $this->extend('base'); ?>

<?= $this->section('title'); ?>
Informes
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<h2 class="my-4">Informes</h2>

<div class="list-group">
    <!-- Enlaces a los diferentes informes -->
    <a href="<?= base_url('informes/jugadores_por_equipo'); ?>" class="list-group-item list-group-item-action">Ver jugadores agrupados por equipo</a>
    <a href="<?= base_url('informes/maximos_anotadores'); ?>" class="list-group-item list-group-item-action">Ver máximos anotadores</a>
</div>

<!-- Formulario para el informe 2 (Jugadores por equipo, ordenados) -->
<h3 class="mt-4">Ver jugadores de un equipo (ordenados por apellidos)</h3>
<form action="" method="get" id="equipoForm" class="form-inline">
    <div class="mb-3">
        <label for="id_equipo" class="form-label">Seleccione un equipo:</label>
        <select name="id_equipo" id="id_equipo" class="form-select">
            <option value="">Seleccionar equipo</option>
            <?php foreach ($equipos as $equipo): ?>
                <option value="<?= esc($equipo['id_equipo']); ?>"><?= esc($equipo['nombre_equipo']); ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Ver Jugadores</button>
</form>

<script>
    document.getElementById('id_equipo').addEventListener('change', function() {
        const id_equipo = this.value;
        if (id_equipo) {
            window.location.href = "<?= base_url('informes/jugadores_por_equipo_ordenados'); ?>/" + id_equipo;
        }
    });
</script>

<!-- Enlace para volver al menú principal (Home) -->
<a href="<?= base_url('/'); ?>" class="btn btn-secondary mt-3">Volver al Menú Principal</a>
<?= $this->endSection(); ?>
