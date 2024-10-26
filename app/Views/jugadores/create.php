<?= $this->extend('base'); ?>

<?= $this->section('title'); ?>
Agregar Jugador
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<h2 class="my-4">Agregar Jugador</h2>

<div class="card">
    <div class="card-body">
        <form action="<?= base_url('jugadores/store'); ?>" method="post" enctype="multipart/form-data">

            <div class="mb-3">
                <label for="nombres" class="form-label">Nombres:</label>
                <input type="text" class="form-control" name="nombres" id="nombres" required>
            </div>
            
            <div class="mb-3">
                <label for="apellidos" class="form-label">Apellidos:</label>
                <input type="text" class="form-control" name="apellidos" id="apellidos" required>
            </div>
            
            <div class="mb-3">
                <label for="fecha_nacimiento" class="form-label">Fecha de Nacimiento:</label>
                <input type="date" class="form-control" name="fecha_nacimiento" id="fecha_nacimiento" required>
            </div>
            
            <div class="mb-3">
                <label for="imagen" class="form-label">Fotografía:</label>
                <input type="file" class="form-control" name="imagen" id="imagen">
            </div>
            
            <input type="hidden" name="id_equipo" value="<?= esc($equipo['id_equipo']); ?>">
            
            <div class="d-flex justify-content-between">
                <a href="<?= base_url('equipos'); ?>" class="btn btn-secondary">Volver</a>
                <button type="submit" class="btn btn-success">Guardar Jugador</button>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection(); ?>
