<?= $this->extend('base'); ?>

<?= $this->section('title'); ?>

Editar Equipo
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<h2 class="my-4">Editar Equipo</h2>

<div class="card">
    <div class="card-body">
        <form action="<?= base_url('equipos/update/' . $equipo['id_equipo']); ?>" method="post" enctype="multipart/form-data">
            
            <div class="mb-3">
                <label for="nombre_equipo" class="form-label">Nombre del Equipo:</label>
                <input type="text" class="form-control" name="nombre_equipo" value="<?= esc($equipo['nombre_equipo']); ?>" required>
            </div>

            <div class="mb-3">
                <label for="imagen" class="form-label">Logo del Equipo (Opcional):</label>
                <input type="file" class="form-control" name="imagen" id="imagen">
            </div>

            <!-- Mostrar el logo actual del equipo si existe -->
            <?php if (!empty($equipo['imagen'])): ?>
                <div class="mb-3">
                    <label class="form-label">Logo actual:</label>
                    <img src="<?= base_url('uploads/logos/' . $equipo['imagen']); ?>" alt="Logo del Equipo" width="100">
                </div>
            <?php endif; ?>

            <div class="d-flex justify-content-between">
                <a href="<?= base_url('equipos'); ?>" class="btn btn-secondary">Volver</a>
                <button type="submit" class="btn btn-success">Actualizar Equipo</button>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection(); ?>
