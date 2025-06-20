<div class="tabla">
    <style>
        tr td {
            text-align: center
        }

        .valor_booleano6:checked {
            background-color: #40fd0d;
            border-color: #40fd0d;
        }
    </style>
    
    

    <table id="tabla-registros" class="table table-dark table-striped ">

        <thead>
            <td>Día y Hora</td>
            <td>DNI</td>
            
            <td>Fotocopia de dni </td>
            <td>Fotocopia de titulo</td>
            <td>Certificado de secundaria</td>
            <td>Foto</td>
            <td>Partida de nacimiento</td>
            <td>INSCRIPTO</td>
            <td>Legajo</td>
            <td>Inscripción</td>
            <td>Solicitud Alumno</td>

        </thead>
        <tbody>
            <?php $__currentLoopData = $registros; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $registro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <?php $date = new DateTime($registro->dia_hora); ?>
                    <td> <?php echo e($date->format('d-m H:i')); ?> </td>
                    <td> <?php echo e($registro->dni); ?> </td>

                    
                    <td>

                        <form class="cambiar-booleano-form"
                            action="<?php echo e(route('check.fotoc.dni', ['id' => $registro->id])); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>

                            <div class="form-check form-switch">
                                <label for="valor_booleano">
                                    <input type="checkbox" name="valor_booleano" class="valor_booleano form-check-input"
                                        <?php echo e($registro->fotoc_dni_ok ? 'checked' : ''); ?>>
                                </label>
                            </div>
                        </form>



                    </td>
                    <td>
                        <form class="cambiar-booleano-form2"
                            action="<?php echo e(route('check.fotoc.titulo', ['id' => $registro->id])); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>

                            <div class="form-check form-switch">
                                <label for="">

                                    <input type="checkbox" name="valor_booleano2"
                                        class="valor_booleano2 form-check-input"
                                        <?php echo e($registro->fotoc_titulo_ok ? 'checked' : ''); ?>>


                                </label>
                            </div>
                        </form>

                    </td>
                    <td>
                        <form class="cambiar-booleano-form3"
                            action="<?php echo e(route('check.certif.secund', ['id' => $registro->id])); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>

                            <div class="form-check form-switch">
                                <label for="">

                                    <input type="checkbox" name="valor_booleano3"
                                        class="valor_booleano3 form-check-input"
                                        <?php echo e($registro->certificado_sec_ok ? 'checked' : ''); ?>>


                                </label>
                            </div>
                        </form>
                        
                    </td>
                    <td>
                        <form class="cambiar-booleano-form4" action="<?php echo e(route('check.foto', ['id' => $registro->id])); ?>"
                            method="POST">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>

                            <div class="form-check form-switch">
                                <label for="">

                                    <input type="checkbox" name="valor_booleano4"
                                        class="valor_booleano4 form-check-input"
                                        <?php echo e($registro->foto_ok ? 'checked' : ''); ?>>


                                </label>
                            </div>
                        </form>
                        
                    </td>
                    <td>
                        <form class="cambiar-booleano-form5"
                            action="<?php echo e(route('check.part.nac', ['id' => $registro->id])); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>

                            <div class="form-check form-switch">
                                <label for="">
                                    <input type="checkbox" name="valor_booleano5"
                                        class="valor_booleano5 form-check-input"
                                        <?php echo e($registro->partida_nac_ok ? 'checked' : ''); ?>>
                                </label>
                            </div>
                        </form>
                        
                    </td>

                    <td>
                        <form class="cambiar-booleano-form6"
                            action="<?php echo e(route('check.confirmado', ['id' => $registro->id])); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>

                            <div class="form-check form-switch">
                                <label for="">
                                    <input type="checkbox" name="valor_booleano6"
                                        class="valor_booleano6 form-check-input"
                                        <?php echo e($registro->confirmado ? 'checked' : ''); ?>

                                        onclick="if (!confirm('Está seguro de modificar la Inscripción?')) return false;">
                                </label>
                            </div>
                        </form>
                        
                    </td>


                    <td>
                        <?php echo e(Form::model($registro, ['method' => 'get', 'route' => ['legajo', 'id' => $registro->id], 'files' => true])); ?>

                        <?php echo csrf_field(); ?>
                        <button type="submit" href="<?php echo e(route('legajo', $registro->id)); ?>"
                            class="btn btn-success"><?php echo e(__('Descargar Legajo')); ?></button>
</div>
<?php echo Form::close(); ?>


</td>
<td>
    <?php echo e(Form::model($registro, ['method' => 'get', 'route' => ['solic', 'id' => $registro->id], 'files' => true])); ?>

    <?php echo csrf_field(); ?>
    <button type="submit" href="<?php echo e(route('solic', $registro->id)); ?>"
        class="btn btn-success"><?php echo e(__('Descargar Inscripción')); ?></button>
    </div>
    <?php echo Form::close(); ?>

</td>
<td>
    <?php echo e(Form::model($registro, ['method' => 'get', 'route' => ['solic.alumno', 'hash' => $registro->hash], 'files' => true])); ?>

    <?php echo csrf_field(); ?>
    <button type="submit" href="<?php echo e(route('solic.alumno', $registro->hash)); ?>"
        class="btn btn-success"><?php echo e(__('Descargar Solicitud')); ?></button>
    </div>
    <?php echo Form::close(); ?>

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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Fotocopia dni
        $('.valor_booleano').change(function() {
            $('.cambiar-booleano-form').submit();
        });

        $('.cambiar-booleano-form').submit(function(e) {
            e.preventDefault();

            $.ajax({
                type: 'POST',
                url: $(this).attr('action'),
                data: $(this).serialize(),
                success: function() {
                    $('#mensaje').show();
                    setTimeout(function() {
                        $('#mensaje').fadeOut();
                    }, 2000); // Ocultar el mensaje después de 2 segundos
                },
            });
        });









        // Fotocopia de titulo
        $('.valor_booleano2').change(function() {
            $('.cambiar-booleano-form2').submit();
        });

        $('.cambiar-booleano-form2').submit(function(e) {
            e.preventDefault();

            $.ajax({
                type: 'POST',
                url: $(this).attr('action'),
                data: $(this).serialize(),
                success: function() {
                    $('#mensaje').show();
                    setTimeout(function() {
                        $('#mensaje').fadeOut();
                    }, 2000); // Ocultar el mensaje después de 2 segundos
                },
            });
        });

        // Fotocopia de certificado secund
        $('.valor_booleano3').change(function() {
            $('.cambiar-booleano-form3').submit();
        });

        $('.cambiar-booleano-form3').submit(function(e) {
            e.preventDefault();

            $.ajax({
                type: 'POST',
                url: $(this).attr('action'),
                data: $(this).serialize(),
                success: function() {
                    $('#mensaje').show();
                    setTimeout(function() {
                        $('#mensaje').fadeOut();
                    }, 2000); // Ocultar el mensaje después de 2 segundos
                },
            });
        });
        // Fotocopia de certificado secund
        $('.valor_booleano4').change(function() {
            $('.cambiar-booleano-form4').submit();
        });

        $('.cambiar-booleano-form4').submit(function(e) {
            e.preventDefault();

            $.ajax({
                type: 'POST',
                url: $(this).attr('action'),
                data: $(this).serialize(),
                success: function() {
                    $('#mensaje').show();
                    setTimeout(function() {
                        $('#mensaje').fadeOut();
                    }, 2000); // Ocultar el mensaje después de 2 segundos
                },
            });
        });

        // Fotocopia de partida de nacimiento
        $('.valor_booleano5').change(function() {
            $('.cambiar-booleano-form5').submit();
        });

        $('.cambiar-booleano-form5').submit(function(e) {
            e.preventDefault();

            $.ajax({
                type: 'POST',
                url: $(this).attr('action'),
                data: $(this).serialize(),
                success: function() {
                    $('#mensaje').show();
                    setTimeout(function() {
                        $('#mensaje').fadeOut();
                    }, 2000); // Ocultar el mensaje después de 2 segundos
                },
            });
        });

        // Confirmado
        $('.valor_booleano6').change(function() {
            $('.cambiar-booleano-form6').submit();
        });

        $('.cambiar-booleano-form6').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: $(this).attr('action'),
                data: $(this).serialize(),
                success: function() {
                    $('#mensaje').show();
                    setTimeout(function() {
                        $('#mensaje').fadeOut();
                    }, 2000); // Ocultar el mensaje después de 2 segundos
                },
            });
        });

    });
</script>
<?php /**PATH C:\Users\User\Desktop\freelance\isft38\resources\views/backend/alumnos/partials/admin/tabla_registros_doc.blade.php ENDPATH**/ ?>