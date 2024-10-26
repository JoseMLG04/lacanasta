<?= $this->extend('base'); ?>

<?= $this->section('title'); ?>
Editar Jugador
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<h2 class="my-4">Editar Jugador</h2>

<div class="card">
    <div class="card-body">
        <form action="<?= base_url('jugadores/update/' . $jugador['id_jugador']); ?>" method="post" enctype="multipart/form-data">
            
            <div class="mb-3">
                <label for="nombres" class="form-label">Nombres:</label>
                <input type="text" class="form-control" name="nombres" value="<?= esc($jugador['nombres']); ?>" required>
            </div>

            <div class="mb-3">
                <label for="apellidos" class="form-label">Apellidos:</label>
                <input type="text" class="form-control" name="apellidos" value="<?= esc($jugador['apellidos']); ?>" required>
            </div>

            <div class="mb-3">
                <label for="fecha_nacimiento" class="form-label">Fecha de Nacimiento:</label>
                <input type="date" class="form-control" name="fecha_nacimiento" value="<?= esc($jugador['fecha_nacimiento']); ?>" required>
            </div>

            <div class="mb-3">
                <label for="imagen" class="form-label">Fotografía (Opcional):</label>
                <input type="file" class="form-control" name="imagen" id="imagen">
            </div>

            <?php if (!empty($jugador['imagen'])): ?>
                <div class="mb-3">
                    <label class="form-label">Foto actual:</label>
                    <img src="<?= base_url('uploads/jugadores/' . $jugador['imagen']); ?>" alt="Foto del Jugador" width="100">
                </div>
            <?php endif; ?>
            
            <input type="hidden" name="id_equipo" value="<?= esc($jugador['id_equipo']); ?>">

            <div class="d-flex justify-content-between">
                <a href="<?= base_url('equipos/jugadores/' . $jugador['id_equipo']); ?>" class="btn btn-secondary">Volver a Jugadores</a>
                <button type="submit" class="btn btn-success">Actualizar Jugador</button>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection(); ?>
