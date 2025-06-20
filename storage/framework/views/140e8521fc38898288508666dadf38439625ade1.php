<div class="tabla">
    <style>
        tr td {
            text-align: center
        }
    </style>
    <table id="tabla-registros" class="table table-dark table-striped ">

        <thead>
            
            <td>N°</td> 
            <td>Día y Hora</td>
            <td>DNI</td>
            <td>Foto</td>
            <td>Nombre</td>
            <td>Apelido</td>
            <td>Carrera</td>
            <td></td>
        </thead>
        <tbody>
            <?php $__currentLoopData = $registros; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $registro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <?php $date = new DateTime($registro->dia_hora); ?>
                    <td> <?php echo e($loop->index + 1); ?> </td>
                    <td> <?php echo e($date->format('d-m H:i')); ?> </td>
                    <td> <?php echo e($registro->dni); ?> </td>
                    <td> <img src="<?php echo e(url('foto/' . $registro->foto)); ?>" alt="Foto aspirante" width="70px" height="70px">
                    </td>
                    <td><?php echo e($registro->nombre); ?> </td>
                    <td><?php echo e($registro->apellido); ?></td>
                    

                    <select style="display: none" disabled class="form-select form-select-sm  btn-danger"
                        style="cursor: pointer" id="carrera_a_estudiar" name="carrera_elegida_aspirante">


                        <?php $__currentLoopData = $carreras; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $carrera): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($carrera->id); ?>"
                                <?php echo e($registro->carrera_id == $carrera->id ? 'selected' : ''); ?>>
                                <?php echo e($carrera->descripcion); ?>

                                <?php echo e($registro->carrera_id == $carrera->id ? ($variable = $carrera->descripcion) : ''); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                    </select>
                    <td> <?php echo e($variable); ?></td>

                    <td style="width:240px">
                        

                        <a href="<?php echo e(route('registro.editar', $registro->id)); ?>" class="btn btn-primary btn-md"
                            title="Editar">

                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                         <?php if(Auth::user()->is_admin == 1 ): ?>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-danger btn-md" data-bs-toggle="modal"
                            data-bs-target="#modal<?php echo e($registro->id); ?>">

                            <i class="fa-solid fa-trash"></i>
                        </button>
                    <?php endif; ?>


                        
                        



                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </tbody>

    </table>
</div>


<?php $__currentLoopData = $registros; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $registro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <!-- Modal -->
    <div class="modal fade" id="modal<?php echo e($registro->id); ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">

        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmar-modal-label">Confirmar Eliminación</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Cerrar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <strong>DNI</strong>: <?php echo e(number_format($registro->dni, 0, ',', '.')); ?> (<?php echo e($registro->nombre); ?>

                    <?php echo e($registro->apellido); ?>)<br>
                    ¿Estás seguro de que deseas eliminar a este usuario?


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>


                    <form action="<?php echo e(route('registro.eliminar', $registro->id)); ?>" class="d-inline" method="POST">
                        <?php echo method_field('DELETE'); ?>
                        <?php echo csrf_field(); ?>
                        <button type="submit" class="btn btn-danger"title="Eliminar">
                            Eliminar
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>


    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH C:\Users\User\Desktop\freelance\isft38\resources\views/backend/alumnos/partials/admin/tabla_registros.blade.php ENDPATH**/ ?>