
<?php $__env->startSection('title', 'Etiquetas'); ?>
<?php $__env->startSection('content'); ?>
<div class="descripciones">
  <?php $__empty_1 = true; $__currentLoopData = $etiquetas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $etiqueta): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
  <?php if($loop->first): ?>

  <table class="table container">
    <tr>
      <th class="align-middle">Nombre</th>
      <th class="align-middle">Descripción</th>
      <td class="d-flex justify-content-end align-middle">
        <a class="btn btn-success" href="<?php echo e(route('etiquetas.create')); ?>">
          <img src="<?php echo e(asset('svg/new.svg')); ?>" width="20" height="20" alt="Crear" title="Crear">
          Crear Etiqueta</a>
      </td>
    </tr>
    <?php endif; ?>
    <tr>
      <td><?php echo e($etiqueta->nombre); ?></td>
      <td><?php echo e($etiqueta->descripcion); ?></td>
      <td class="d-flex justify-content-end align-middle">
        <?php echo e(Form::model($etiqueta, [ 'method' => 'delete' , 'route' => ['etiquetas.destroy', $etiqueta->id] ])); ?>

        <?php echo csrf_field(); ?>
        <a href="<?php echo e(route('etiquetas.show', ['etiqueta' => $etiqueta->id ])); ?>" class="btn btn-info"><img src="<?php echo e(asset('svg/show.svg')); ?>" width="20" height="20" alt="Mostrar" title="Mostrar"></a>
        <a href="<?php echo e(route('etiquetas.edit', ['etiqueta' => $etiqueta->id ])); ?>" class="btn btn-primary"><img src="<?php echo e(asset('svg/edit.svg')); ?>" width="20" height="20" alt="Editar" title="Editar"></a>
        <button type="submit" name="borrar<?php echo e($etiqueta->id); ?>" class="btn btn-danger" onclick="if (!confirm('Está seguro de borrar la etiqueta?')) return false;"><img src="<?php echo e(asset('svg/delete.svg')); ?>" width="20" height="20" alt="Borrar" title="Borrar"></button>
        <?php echo Form::close(); ?>

      </td>
    </tr>
    <?php if($loop->last): ?>
  </table>
  <?php endif; ?>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
  <table class="table container">
    <tr>
      <th class="align-middle">Nombre</th>
      <th class="align-middle">Descripción</th>
      <td class="d-flex justify-content-end align-middle">
        <a class="btn btn-success" href="<?php echo e(route('etiquetas.create')); ?>">
          <img src="<?php echo e(asset('svg/new.svg')); ?>" width="20" height="20" alt="Crear" title="Crear">
          Crear Etiqueta</a>
      </td>
    </tr>
  </table>
  <p class="text-capitalize container"> No hay etiquetas.</p>
  <a class="btn btn-success" href="<?php echo e(route('etiquetas.create')); ?>">
    <img src="<?php echo e(asset('svg/new.svg')); ?>" width="20" height="20" alt="Crear" title="Crear">
    Crear Etiqueta</a>
  <p class="text-capitalize"> No hay etiquetas.</p>
  <?php endif; ?>
</div>
<hr>
<!-- Paginación -->
<div class="d-flex justify-content-center">
  <!-- 
  Agregar en App\Providers\AppServiceProvider:
  use Illuminate\Pagination\Paginator;
      public function boot() { Paginator::useBootstrap(); } -->
  <?php echo $etiquetas->links(); ?>

</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\User\Desktop\freelance\isft38\resources\views/backend/etiqueta/etiquetas.blade.php ENDPATH**/ ?>