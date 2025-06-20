
<?php $__env->startSection('title', 'Cupos'); ?>
<?php $__env->startSection('content'); ?>
    <div class="container mt-3">
        <div class=" p-3 d-flex justify-content-center">
            <h3>Cupos</h3>
        </div>
        <?php if(session('deleted')): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?php echo e(session('deleted')); ?>

            </div>
        <?php endif; ?>

        <?php $__empty_1 = true; $__currentLoopData = $cupos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cupo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <?php if($loop->first): ?>
                <table class="table container table-bordered border border-2 border-dark">
                    <thead>
                        <tr>
                            <th class="align-middle">Carrera</th>
                            <th class="align-middle">Cupos</th>
                            <!--<th class="align-middle">Reservados</th>-->
                            <th class="align-middle">Inscriptos</th>
                            <th class="align-middle">No se Presentaron hasta hoy</th>
                            <th class="align-middle">Pendientes desde hoy Con Datos</th>
                            <th class="align-middle">Pendientes desde hoy Sin Datos</th>
                            <th class="align-middle">Cupos Libres p/ Lista Espera</th>
                            <th class="align-middle">Listado</th>
                            <?php if(Auth::user()->is_admin == 1): ?>
                                <th class="d-flex justify-content-end align-middle">
                                    <a class="btn btn-success" href="<?php echo e(route('cupos.create')); ?>">
                                        <img src="<?php echo e(asset('svg/new.svg')); ?>" width="20" height="20" alt="Crear"
                                            title="Crear">
                                        Crear Cupos</a>
                                </th>
                            <?php endif; ?>
                        </tr>
                    </thead>
            <?php endif; ?>
            <tbody>
                <tr>
                    <td><?php echo e($cupo->carrera->descripcion); ?></td>
                    <td><?php echo e($cupo->cupos); ?></td>
                   <!-- <td><?php echo e($cupo->reservados); ?></td>-->
                    <td><?php echo e($cupo->inscriptos); ?></td>
                    <td><?php echo e($cupo->perdidos); ?></td>
                    <td><?php echo e($cupo->pendientes); ?></td>
                    <td><a target='_blank' href='/<?php echo e($cupo->carrera->id); ?>'><?php echo e($cupo->pendientes_sd); ?></a></td>
                    <td><?php echo e($cupo->cupos - $cupo->inscriptos - $cupo->pendientes - $cupo->pendientes_sd); ?></td>
                    <td>
                        <?php echo e(Form::model($cupo, ['method' => 'get', 'route' => ['listado', 'id' => $cupo->carrera_id], 'files' => true])); ?>

                        <?php echo csrf_field(); ?>
                        <button type="submit" href="<?php echo e(route('listado', $cupo->carrera_id)); ?>"
                            class="btn btn-success"><?php echo e(__('Descargar')); ?></button>
                        <?php echo Form::close(); ?>

                    </td>
                    <?php if(Auth::user()->is_admin == 1): ?>
                        <td class="d-flex justify-content-end align-middle">
                            <?php echo e(Form::model($cupos, ['method' => 'delete', 'route' => ['cupos.destroy', $cupo->id]])); ?>

                            <?php echo csrf_field(); ?>
                            <a href="<?php echo e(route('cupos.show', ['cupo' => $cupo->id])); ?>" class="btn btn-info"><img
                                    src="<?php echo e(asset('svg/show.svg')); ?>" width="20" height="20" alt="Mostrar"
                                    title="Mostrar"></a>
                            <a href="<?php echo e(route('cupos.edit', ['cupo' => $cupo->id])); ?>" class="btn btn-primary"><img
                                    src="<?php echo e(asset('svg/edit.svg')); ?>" width="20" height="20" alt="Editar"
                                    title="Editar"></a>
                                      <?php if(Auth::user()->is_admin == 1 ): ?>
                            <button type="submit" name="borrar<?php echo e($cupo->id); ?>" class="btn btn-danger"
                                onclick="if (!confirm('Está seguro de borrar el cupo?')) return false;"><img
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
            <?php endif; ?>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <table class="table container">
                <tr>
                    <th class="align-middle">Carrera</th>
                    <th class="align-middle">Cupos</th>
                    <th class="align-middle">Reservados</th>
                    <th class="align-middle">Inscriptos</th>
                    <?php if(Auth::user()->is_admin == 1): ?>
                        <th class="d-flex justify-content-end align-middle">
                            <a class="btn btn-success" href="<?php echo e(route('cupos.create')); ?>">
                                <img src="<?php echo e(asset('svg/new.svg')); ?>" width="20" height="20" alt="Crear"
                                    title="Crear">
                                Crear Cupo</a>
                        </th>
                    <?php endif; ?>
                </tr>
                <tr>
                    <td class="align-middle">No hay cupos creados</td>
                </tr>
            </table>
        <?php endif; ?>

    <?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\User\Desktop\freelance\isft38\resources\views/backend/cupos/index.blade.php ENDPATH**/ ?>
