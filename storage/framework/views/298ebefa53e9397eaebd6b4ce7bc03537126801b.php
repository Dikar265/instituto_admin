
<?php $__env->startSection('title', 'Profesores'); ?>
<?php $__env->startSection('content'); ?>
<?php if(Session::has('status')): ?>
<div class="alert alert-success alert-dismissible fade show"><?php echo e(Session('status')); ?>

    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<?php endif; ?>
<?php $__empty_1 = true; $__currentLoopData = $profesores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $profesor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
<?php if($loop->first): ?>
<table class="table m-o container">
    <tr class="text-dark">
        <th class="align-middle ps-5">Nombre</th>
        <th class="align-middle">Apellido</th>
        <td class="d-flex justify-content-end">
            <a href="<?php echo e(route('profesor.create')); ?>" class="btn btn-success">
                <img src="<?php echo e(asset('svg/new.svg')); ?>" height="20" width="20" alt="Crear" title="Crear">
                Crear Profesor
            </a>
        </td>
    </tr>
    <?php endif; ?>
    <tr>
        <td class="align-middle ps-5"><?php echo e($profesor->nombre); ?></td>
        <td class="align-middle"><?php echo e($profesor->apellido); ?></td>
        <td class="d-flex justify-content-end">
            <?php echo e(Form::model($profesores, [ 'method' => 'delete', 'route' => ['profesor.destroy', $profesor -> id] ])); ?>

            <?php echo csrf_field(); ?>
            <a href="<?php echo e(route('profesor.edit', ['profesor' => $profesor->id ] )); ?>" class="btn btn-primary">
                <img src="<?php echo e(asset('svg/edit.svg')); ?>" width="20" height="20" alt="Editar" title="Editar">
            </a>
            <button type="submit" class="btn btn-danger" onclick="if (!confirm('¿Esta seguro de borrar el profesor?')) return false;">
                <img src="<?php echo e(asset('svg/delete.svg')); ?>" width="20" height="20" alt="Borrar" title="Borrar">
            </button>
            <?php echo Form::close(); ?>

        </td>
    </tr>
    <?php if($loop->last): ?>
</table>

<?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
<table class="table m-o container">
    <tr class="text-dark">
        <th class="align-middle ps-5">Nombre</th>
        <th class="align-middle">Apellido</th>
        <td class="d-flex justify-content-end">
            <a href="<?php echo e(route('profesor.create')); ?>" class="btn btn-success">
                <img src="<?php echo e(asset('svg/new.svg')); ?>" height="20" width="20" alt="Crear" title="Crear">
                Crear Profesor
            </a>
        </td>
    </tr>
</table>
<p class="text-capitalize"> No hay profesores.</p>
<?php endif; ?>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\User\Desktop\freelance\isft38\resources\views/backend/profesor/index.blade.php ENDPATH**/ ?>