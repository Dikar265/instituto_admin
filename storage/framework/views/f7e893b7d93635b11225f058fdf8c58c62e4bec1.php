
<?php $__env->startSection('title', 'Usuarios'); ?>
<?php $__env->startSection('content'); ?>
<div class="descripciones">

  <?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
  <?php if($loop->first): ?>
  <table class="table container">
    <tr>
    <tr>
      <th class="align-middle">Usuario</th>
      <th class="align-middle">Email</th>
      <td class="d-flex justify-content-end align-middle">
        <a class="btn btn-success" href="<?php echo e(route('users.create')); ?>">
          <img src="<?php echo e(asset('svg/new.svg')); ?>" width="20" height="20" alt="Crear" title="Crear">
          Crear Usuario</a>
      </td>
    </tr>
    <?php endif; ?>
    <tr>
      <td><?php echo e($user->name); ?></td>
      <td><?php echo e($user->email); ?></td>
      <td>
        <?php echo e(Form::model($user, [ 'method' => 'delete' , 'route' => ['users.destroy', $user->id] ])); ?>

        <?php echo csrf_field(); ?>
        <a href="<?php echo e(route('users.show', ['user' => $user->id ])); ?>" class="btn btn-info"><img src="<?php echo e(asset('svg/show.svg')); ?>" width="20" height="20" alt="Mostrar" title="Mostrar"></a>
        <a href="<?php echo e(route('users.edit', ['user' => $user->id ])); ?>" class="btn btn-primary"><img src="<?php echo e(asset('svg/edit.svg')); ?>" width="20" height="20" alt="Editar" title="Editar"></a>
        <button type="submit" class="btn btn-danger" onclick="if (!confirm('Está seguro de borrar la etiqueta?')) return false;"><img src="<?php echo e(asset('svg/delete.svg')); ?>" width="20" height="20" alt="Borrar" title="Borrar"></button>
        <?php echo Form::close(); ?>

      </td>
    </tr>
    <?php if($loop->last): ?>
  </table>
  <?php endif; ?>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
  <table class="table container">
    <tr>
      <th class="align-middle">Usuario</th>
      <th class="align-middle">Email</th>
      <td class="d-flex justify-content-end align-middle">
        <a class="btn btn-success" href="<?php echo e(route('users.create')); ?>">
          <img src="<?php echo e(asset('svg/new.svg')); ?>" width="20" height="20" alt="Crear" title="Crear">
          Crear Usuario</a>
      </td>
    </tr>
  </table>
  <p class="text-capitalize container"> No hay usuarios.</p>
  <a class="btn btn-success" href="<?php echo e(route('users.create')); ?>">
    <img src="<?php echo e(asset('svg/new.svg')); ?>" width="20" height="20" alt="Crear" title="Crear">
    Crear Usuario</a>
  <p class="text-capitalize"> No hay usuarios.</p>
  <?php endif; ?>
</div>
<hr>
<!-- Paginación -->
<div class="d-flex justify-content-center">
  <!-- 
  Agregar en App\Providers\AppServiceProvider:
  use Illuminate\Pagination\Paginator;
      public function boot() { Paginator::useBootstrap(); } -->
  <?php echo $users->links(); ?>

</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\User\Desktop\freelance\isft38\resources\views/backend/user/users.blade.php ENDPATH**/ ?>