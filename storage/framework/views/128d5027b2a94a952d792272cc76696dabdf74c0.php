
<?php $__env->startSection('title', 'Materias'); ?>
<?php $__env->startSection('content'); ?>
    <style>
        * {
            font-family: 'Quicksand', sans-serif;
        }

        .algo {
            text-align: center;
            display: flex;
            justify-content: center;
            width: auto;
        }

        tr {
            height: 100px;
        }

        td {
            display: table-cell;
            vertical-align: middle;
        }

        a {
            margin-left: 10px;
        }

        button {
            margin-left: 10px;
        }

        .subcontainer {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            flex-direction: row;
        }

        a {
            text-decoration: none;
        }

        .horario {
            color: black;
            border: 1px solid black;
            border-radius: 25px;
            padding: 10px;
        }

        .botonera {
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
            width: 300px;
        }
    </style>
    <?php if(Session::has('status')): ?>
        <div class="alert alert-success alert-dismissible fade show"><?php echo e(Session('status')); ?>

            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>
    <?php $__empty_1 = true; $__currentLoopData = $materias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $materia): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <?php if($loop->first): ?>
            <div class="descripciones">
                <table class="table container">
                    <tr>
                        <div class="algo">
                            <th>Materia</th>
                            <th>Carrera</th>
                            <th>Año</th>
                            <th>Orden</th>
                            <th>Programa</th>
                            <td>
                                <a class="btn btn-success svg" href="<?php echo e(route('materia.create')); ?>">
                                    <img src="<?php echo e(asset('svg/new.svg')); ?>" width="20" height="20" alt="Crear"
                                        title="Crear">
                                    Crear Materia
                                </a>
                            </td>
                        </div>
                    </tr>
        <?php endif; ?>
        <tr>
            <div class="subcontainer">
                <td><?php echo e($materia->descripcion); ?></td>
                <td><?php echo e($materia->deCarrera->descripcion); ?></td>
                <td><?php echo e($materia->deAnio->descripcion); ?></td>
                <td><?php echo e($materia->orden); ?></td>
                <td>
                    <?php if($materia->dePrograma): ?>
                        <span class="badge badge-light"><a
                                href="<?php echo e(asset('./storage/' . $materia->contenidos)); ?>"><?php echo e(basename($materia->dePrograma)); ?></a>
                        </span>
                    <?php endif; ?>
                </td>
                <td>
                    <?php echo e(Form::model($materia, ['method' => 'delete', 'route' => ['materia.destroy', $materia->id]])); ?>

                    <?php echo csrf_field(); ?>
                    <div class="botonera">

                        <a href="<?php echo e(route('materia.edit', ['materium' => $materia->id])); ?>" class="btn btn-primary svg ">
                            <img src="<?php echo e(asset('svg/edit.svg')); ?>" width="20" height="20" alt="Editar"
                                title="Editar">
                        </a>

                        <button type="submit" name="borrar<?php echo e($materia->id); ?>" class="btn btn-danger  svg"
                            onclick="if (!confirm('Está seguro de borrar la carrera?')) return false;">
                            <img src="<?php echo e(asset('svg/delete.svg')); ?>" width="20" height="20" alt="Borrar"
                                title="Borrar">
                        </button>


                    </div>
                    <?php echo Form::close(); ?>

                </td>
            </div>
        </tr>
        <?php if($loop->last): ?>
            </table>
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <div class="descripciones">
            <table class="table container">
                <tr>
                    <div class="algo">
                        <td>Id</td>
                        <td>Materia</td>
                        <td>Carrera</td>
                        <td>Año</td>
                        <td>Programa</td>
                        <td>
                            <a class="btn btn-success svg" href="<?php echo e(route('materia.create')); ?>">
                                <img src="<?php echo e(asset('svg/new.svg')); ?>" width="20" height="20" alt="Crear"
                                    title="Crear">
                                Crear Materia
                            </a>
                        </td>
                    </div>
                </tr>
                <p class="text-capitalize"> No hay materias.</p>
    <?php endif; ?>
    </div>
    <hr>
    <!-- Paginación -->
    <div class="d-flex justify-content-center">
        <!--
          Agregar en App\Providers\AppServiceProvider:
          use Illuminate\Pagination\Paginator;
              public function boot() { Paginator::useBootstrap(); } -->
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\User\Desktop\freelance\isft38\resources\views/backend/materia/index.blade.php ENDPATH**/ ?>