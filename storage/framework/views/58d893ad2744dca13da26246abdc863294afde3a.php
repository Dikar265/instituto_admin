
<?php $__env->startSection('title', 'Comisiones'); ?>

<?php $__env->startSection('content'); ?>

  <table class="table texto-tabla mb-0 container">
    <div class="algo">
      <tr class="text-dark text-center mb-0">
        <th class="text-left" scope="col">Comisión</th>
        <td class="">
          <a href="<?php echo e(route('comision.create')); ?>" class="btn btn-success">
            <img src="<?php echo e(asset('svg/new.svg')); ?>" height="20" width="20" alt="Crear" title="Crear">
            Crear comisión
          </a>
        </td>
      </tr>
    </div>

    <?php $__currentLoopData = $comisiones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comision): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
      <td class="text-center align-middle"><?php echo e($comision->comision); ?></td>
      <td class="align-middle">
        <?php echo e(Form::model($comision, [ 'method' => 'delete' , 'route' => ['comision.destroy', $comision->id] ])); ?>

        <?php echo csrf_field(); ?>
        <a href="<?php echo e(route('comision.edit', ['comision' => $comision->id ])); ?>" class="btn btn-primary ">
          <img src="<?php echo e(asset('svg/edit.svg')); ?>" width="20" height="20" alt="Editar" title="Editar">
        </a>
        <button type="submit" class="btn btn-danger" onclick="if (!confirm('Está seguro de borrar la comisión?')) return false;">
          <img src="<?php echo e(asset('svg/delete.svg')); ?>" width="20" height="20" alt="Borrar" title="Borrar">
        </button>
</div>
<?php echo Form::close(); ?>

</tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</table>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\User\Desktop\freelance\isft38\resources\views/backend/comision/Index.blade.php ENDPATH**/ ?>