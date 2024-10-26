<?= $this->extend('base'); ?>

<?= $this->section('title'); ?>
Editar Jornada
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<h2 class="my-4">Editar Jornada</h2>

<div class="card">
    <div class="card-body">
        <form action="<?= base_url('jornadas/update/' . $jornada['id_jornada']); ?>" method="post">
            <div class="mb-3">
                <label for="fecha" class="form-label">Fecha:</label>
                <input type="date" class="form-control" name="fecha" id="fecha" value="<?= esc($jornada['fecha']); ?>" required>
            </div>

            <div class="mb-3">
                <label for="descripcion" class="form-label">Nombre de la Jornada:</label>
                <input type="text" class="form-control" name="descripcion" id="descripcion" value="<?= esc($jornada['descripcion']); ?>" required>
            </div>

            <div class="d-flex justify-content-between">
                <a href="<?= base_url('jornadas'); ?>" class="btn btn-secondary">Volver</a>
                <button type="submit" class="btn btn-success">Actualizar Jornada</button>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection(); ?>
