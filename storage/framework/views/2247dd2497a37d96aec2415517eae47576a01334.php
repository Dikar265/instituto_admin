<link rel="shortcut icon" type="image/png" href="<?php echo e(asset('/img/logo1.png')); ?>">
<!-- Fonts -->
<link rel="preconnect" href="https://fonts.bunny.net">

<link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

<!-- Datatables injected-->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<script src="cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css"
    integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"
    integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- Styles -->
<link rel="stylesheet" href="style/style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="js/main2.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
    integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"
    integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

<?php $__env->startSection('title', 'Inscripciones'); ?>
<?php $__env->startSection('content'); ?>

    <br>
    <?php if(session('mensaje2')): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Atención!</strong> <?php echo e(session('mensaje2')); ?>

            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>
    <div class="container-fluid">

        <div class="row mx-auto p-3 bg-light">
            

            
            

            <?php echo e(Form::open(['route' => 'ir_admin_post', 'method' => 'POST'])); ?>

            <div class="card-body">
                
                <div class="input-group mb-3">
                    <a href="<?php echo e(route('ir_admin')); ?>"><button type="button" class="btn btn-success me-2">
                            Hoy</button></a>
                  <!-- <a href="<?php echo e(route('errores')); ?>" target="_blank"><button type="button" class="btn btn-danger me-2">
                            Sin Datos</button></a>       -->                       
                    <a href="<?php echo e(route('inscripcion', 'admin')); ?>"><button type="button" class="btn btn-danger me-2">
                            Sin Turno</button></a>
                    <a href="<?php echo e(route('ir_admin', 'todos')); ?>"><button type="button" class="btn btn-primary me-2">
                            Todos</button></a>                                
                    <div class=" mx-4"></div>
                    <div class="input-group-text">
                        <?php echo e(Form::label('dni', 'DNI', ['class' => 'control-label'])); ?>

                    </div>
                    <?php echo e(Form::number('dni', old('dni'), ['class' => 'form-control col-4', 'placeholder' => ''])); ?>

                    <div class="input-group-text">
                        <?php echo e(Form::label('fecha', 'Fecha', ['class' => 'control-label'])); ?>

                    </div>
                    <?php echo e(Form::date('fecha', old('fecha'), ['class' => 'form-control col-5', 'placeholder' => ''])); ?>

                    <div class="input-group-text">
                        <?php echo e(Form::label('carrera_id', 'Carrera', ['class' => 'control-label'])); ?>

                    </div>
                    <?php echo e(Form::select('carrera_id', $carreras_sel, null, ['class' => 'form-control', 'placeholder' => ''])); ?>

                    <button type="submit" class="btn btn-primary me-2">
                        Buscar
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-search" viewBox="0 0 16 16">
                            <path
                                d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                        </svg>
                    </button>
                </div>
                <?php $__errorArgs = ['dni'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="alert alert-danger"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                <?php echo Form::close(); ?>

            </div>
        </div>

        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button"
                    role="tab" aria-controls="home" aria-selected="true">Pre-Inscriptos</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button"
                    role="tab" aria-controls="profile" aria-selected="false">Documentación</button>
            </li>
            
        </ul>

        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                
                <?php echo $__env->make('backend/alumnos/partials/admin/tabla_registros', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                
                <?php echo $__env->make('backend/alumnos/partials/admin/tabla_registros_doc', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            </div>

        </div>

    </div>
    </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="js/main.js"></script>
    <script src="js/admin.js"></script>
    <script src="https://unpkg.com/scrollreveal"></script>
    <script></script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\User\Desktop\freelance\isft38\resources\views/backend/alumnos/admin.blade.php ENDPATH**/ ?>