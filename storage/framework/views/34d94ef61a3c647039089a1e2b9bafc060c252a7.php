
<?php $__env->startSection('title', 'Turnos'); ?>
<?php $__env->startSection('content'); ?>
    <div class="container mt-3">
        <div class=" p-3 d-flex justify-content-center">
            <h3>Turnos</h3>
        </div>
        <?php if(session('deleted')): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?php echo e(session('deleted')); ?>

            </div>
        <?php endif; ?>

        <?php $__empty_1 = true; $__currentLoopData = $turnos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $turno): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <?php if($loop->first): ?>
                <table class="table container table-bordered border border-2 border-dark">
                    <thead>
                        <tr>
                            <th class="align-middle">Dia y Hora</th>
                            <th class="align-middle">DNI</th>
                            <th class="align-middle">Carrera</th>
                            <?php if(Auth::user()->is_admin == 1): ?>
                                <th class="d-flex justify-content-center align-middle">
                                    <a class="btn btn-success" href="<?php echo e(route('turnos.create')); ?>">
                                        <img src="<?php echo e(asset('svg/new.svg')); ?>" width="20" height="20" alt="Crear"
                                            title="Crear">
                                        Crear Turnos</a>
                                </th>
                            <?php endif; ?>
                        </tr>
                    </thead>
            <?php endif; ?>
            <tbody>
                <tr>
                    <td><?php echo e(date('d-m-Y H:i', strtotime($turno->dia_hora))); ?></td>
                    <?php if($turno->dni == null): ?>
                        <td>No asignado</td>
                    <?php else: ?>
                        <td><?php echo e($turno->dni); ?></td>
                    <?php endif; ?>
                    <?php if($turno->carrera_id == null): ?>
                        <td>No asignado</td>
                    <?php else: ?>
                        <td><?php echo e($turno->carrera->descripcion); ?></td>
                    <?php endif; ?>
                    <?php if(Auth::user()->is_admin == 1): ?>
                        <td class="d-flex justify-content-center align-middle">
                            <?php echo e(Form::model($turnos, ['method' => 'delete', 'route' => ['turnos.destroy', $turno->id]])); ?>

                            <?php echo csrf_field(); ?>
                            <a href="<?php echo e(route('turnos.show', ['turno' => $turno->id])); ?>" class="btn btn-info"><img
                                    src="<?php echo e(asset('svg/show.svg')); ?>" width="20" height="20" alt="Mostrar"
                                    title="Mostrar"></a>
                            <a href="<?php echo e(route('turnos.edit', ['turno' => $turno->id])); ?>" class="btn btn-primary"><img
                                    src="<?php echo e(asset('svg/edit.svg')); ?>" width="20" height="20" alt="Editar"
                                    title="Editar"></a>
                                         <?php if(Auth::user()->is_admin == 1 ): ?>
                            <button type="submit" name="borrar<?php echo e($turno->id); ?>" class="btn btn-danger"
                                onclick="if (!confirm('Está seguro de borrar el turno?')) return false;"><img
                                    src="<?php echo e(asset('svg/delete.svg')); ?>" width="20" height="20" alt="Borrar"
                                    title="Borrar"></button>
                                    <?php endif; ?>
                            <?php echo Form::close(); ?>

                        </td>
                    <?php endif; ?>
                </tr>
            </tbody>
            <?php if($loop->last): ?>
                </table>
                <?php echo $turnos->links(); ?>

            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <table class="table container">
                <tr>
                    <th class="align-middle">Dia y Hora</th>
                    <th class="align-middle">DNI</th>
                    <th class="align-middle">Carrera</th>
                    <th class="d-flex justify-content-end align-middle">
                        <a class="btn btn-success" href="<?php echo e(route('turnos.create')); ?>">
                            <img src="<?php echo e(asset('svg/new.svg')); ?>" width="20" height="20" alt="Crear"
                                title="Crear">
                            Crear Turnos</a>
                    </th>
                </tr>
                <tr>
                    <td class="align-middle">No hay turnos creados</td>
                </tr>
            </table>
        <?php endif; ?>

    <?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\User\Desktop\freelance\isft38\resources\views/backend/turnos/index.blade.php ENDPATH**/ ?>