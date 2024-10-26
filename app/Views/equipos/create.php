<?= $this->extend('base'); ?>

<?= $this->section('title'); ?>
Agregar Equipo
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<h2 class="my-4">Agregar Equipo</h2>

<div class="card">
    <div class="card-body">
        <form action="<?= base_url('equipos/store'); ?>" method="post" enctype="multipart/form-data">
            
            <div class="mb-3">
                <label for="nombre_equipo" class="form-label">Nombre del Equipo:</label>
                <input type="text" class="form-control" name="nombre_equipo" required>
            </div>

            <div class="mb-3">
                <label for="imagen" class="form-label">Logo del Equipo:</label>
                <input type="file" class="form-control" name="imagen" id="imagen" required>
            </div>

            <div class="d-flex justify-content-between">
                <a href="<?= base_url('equipos'); ?>" class="btn btn-secondary">Volver</a>
                <button type="submit" class="btn btn-success">Guardar Equipo</button>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection(); ?>
