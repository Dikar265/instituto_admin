<?php $__env->startSection('title', 'Programas'); ?>

<?php $__env->startSection('content'); ?>
<style>
    .Inicio {
        text-align: center;
        margin: 20px;
        color: white;
        font-family: 'Quicksand', sans-serif;
        font-weight: 800;
        position: relative;
    }



    .links {
        padding: 25px;
        width: 70%;
        height: 50%;
        margin: 0 auto;
    }

    .form-group {
        margin-top: 10px;
        justify-content: center;
    }

    .form-group label {
        color: white;
        outline: none;
        margin-bottom: 5px;
        font-family: 'Quicksand', sans-serif;
        font-weight: 800;
        font-size: 20px;
    }

    .form-control {
        border: 1px solid gray;
        padding: 10px;
        outline: none;
    }


    .volver {
        margin-left: 600px;
        margin-right: 600px;
        background-color: #019267;
        border-radius: 10px;
        font-family: 'Quicksand', sans-serif;

    }

    .form-check {
        color: white;
    }
</style>
<div class="Inicio">
    <h1 class="TextoInicio">Nuevo Programa</h1>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Profesores</h5>

            </div>
            <div class="modal-body">
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                    <label for="floatingInput">Usuario</label>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">Contraseña</label>
                </div>
            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-primary">Ingresar</button>
            </div>
        </div>
    </div>
</div>

<div>
    <?php if(Session::has('status')): ?>
    <div class="alert alert-success"><?php echo e(Session('status')); ?></div>
    <?php endif; ?>
    <?php if(Session::has('status-error')): ?>
    <div class="alert alert-danger"><?php echo e(Session('status-error')); ?></div>
    <?php endif; ?>
</div>
<div class="links">
    <div class="d-grid gap-2 d-md-flex" style="justify-content: center;">
        <a href="<?php echo e(route('programas')); ?>"><button class="btn btn-primary me-md-3" type="button">Listado de programas</button></a>
        <a href="/"><button class="btn btn-primary" type="button">Plantilla para programas</button></a>
    </div>

    <?php echo e(Form::open(['route' => 'programas.store', 'files' => true])); ?>

    <?php echo csrf_field(); ?>
    <!-- <?php echo e(csrf_field()); ?> -->
    <div class="form-group">
        <?php echo e(Form::label("sede_id", __('SEDE'), ['class' => 'control-label'])); ?>

        <?php echo e(Form::select("sede_id", $sede, null, ["class" => "form-control", "placeholder" => "Seleccione una sede"])); ?>

        <?php $__errorArgs = ['sede_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <div class="alert alert-danger"><?php echo e($message); ?></div>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>
    <div class="form-group">
        <?php echo e(Form::label("carrera_id", __('CARRERA'), ['class' => 'control-label'])); ?>

        <?php echo e(Form::select("carrera_id", $carreras, null, ["class" => "form-control", "placeholder" => "Seleccione una sede"])); ?>

        <?php $__errorArgs = ['carrera_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <div class="alert alert-danger"><?php echo e($message); ?></div>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>
    <div class="form-group">
        <?php echo e(Form::label("anio_id", __('AÑOS'), ['class' => 'control-label'])); ?>

        <?php echo e(Form::select("anio_id", $anios, null, ["class" => "form-control", "placeholder" => "Seleccione un año"])); ?>

        <?php $__errorArgs = ['anio_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <div class="alert alert-danger"><?php echo e($message); ?></div>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>

    <div class="form-group">
        <?php echo e(Form::label("materia_id", __('MATERIAS'), ['class' => 'control-label'])); ?>

        <?php echo e(Form::select("materia_id", $materias, null, ["class" => "form-control", "placeholder" => "Seleccione una materia"])); ?>

        <?php $__errorArgs = ['materia_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <div class="alert alert-danger"><?php echo e($message); ?></div>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>
    <div class="form-group">
        <?php echo e(Form::label("comision_id", __('COMISIONES'), ['class' => 'control-label'])); ?>

        <?php echo e(Form::select("comision_id", $comisiones, null, ["class" => "form-control", "placeholder" => "Seleccione una comision"])); ?>

        <?php $__errorArgs = ['comision_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <div class="alert alert-danger"><?php echo e($message); ?></div>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>
    <div class="form-group">
        <?php echo e(Form::label("profesor_id", __('PROFESORES'), ['class' => 'control-label'])); ?>

        <?php echo e(Form::select("profesor_id", $profesores, null, ["class" => "form-control", "placeholder" => "Selecciona un profesor"])); ?>

        <?php $__errorArgs = ['profesor_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <div class="alert alert-danger"><?php echo e($message); ?></div>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>

    <div class="form-group <?php if($errors->has('imagen')): ?> has-error has-feedback <?php endif; ?>" style="text-align:center;">
        <?php echo e(Form::label("imagen", __('PROGRAMA'), ['class' => 'control-label'])); ?>

        <br>
        <?php echo e(Form::file("imagen")); ?>

        <?php $__errorArgs = ['imagen'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <div class="alert alert-danger"><?php echo e($message); ?></div>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>
    </br>
    <div class="form-check">
        <input class="form-check-input" id="leido" type="checkbox" value="" id="flexCheckDefault">
        <label class="form-check-label text-dark" for="flexCheckDefault">
            He leído y declaro que el programa adjunto se realizó conforme a la: <a target="_blank" class="btn btn-danger" href="<?php echo e(asset('./Disposicion.pdf')); ?>">Disposición 30/05</a>
        </label>
    </div>
    <br>
    <button type="submit" id="boton" disabled class="btn btn-success btn-block container-fluid p-3"><?php echo e(__('Guardar')); ?></button>
</div>
<?php echo Form::close(); ?>






<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!-- Script Get Materias -->
<script type='text/javascript'>
    var checkbox = document.getElementById('leido');
    checkbox.addEventListener("change", validaCheckbox, false);

    function validaCheckbox() {
        var checked = checkbox.checked;
        if (checked) {
            $('#boton').prop('disabled', false);
        } else {
            $('#boton').prop('disabled', true);
        }
    }



    function search() {
        var anio_id = document.getElementById('anio_id').value;
        var carrera_id = document.getElementById('carrera_id').value;
        var sede_id = document.getElementById('sede_id').value;
        $('#materia_id').find('option').not(':first').remove();
        $('#materia_id').find('option').remove();
        $('#materia_id').append($('<option></option>').html('Cargando datos...'));
        $.ajax({
            url: '/getMaterias/' + carrera_id + '/' + anio_id + '/' + sede_id,
            type: 'get',
            dataType: 'json',
            success: function(response) {

                var len = 0;
                if (response['data'] != null) {
                    len = response['data'].length;
                }

                if (len > 0) {
                    $('#materia_id').find('option').remove();
                    $('#materia_id').append($('<option></option>').html('Seleccione una carrera...'));
                    for (var i = 0; i < len; i++) {

                        var id = response['data'][i].id;
                        var descripcion = response['data'][i].descripcion;

                        var option = "<option value='" + id + "'>" + descripcion + "</option>";

                        $("#materia_id").append(option);
                    }
                }

            }
        });
    }

    function searchCarreras() {
        var sede_id = document.getElementById('sede_id').value;
        //var sede_id = document.getElementById('sede_id').value;
        var carrera_id = document.getElementById('carrera_id').value;
        //$('#carrera_id').find('option').not(':first').remove();
        // $('#carrera_id').find('option').remove();
        $('#carrera_id').append($('<option></option>').html('Cargando datos...'));

        $.ajax({
            url: '/getCarreras/' + sede_id,
            type: 'get',
            dataType: 'json',
            success: function(response) {

                var len = 0;
                if (response['data'] != null) {
                    len = response['data'].length;
                }

                if (len > 0) {
                    $('#carrera_id').find('option').remove();
                    $('#carrera_id').append($('<option></option>').html('Seleccione una carrera...'));

                    for (var i = 0; i < len; i++) {

                        var id = response['data'][i].id;
                        var descripcion = response['data'][i].descripcion;

                        var option = "<option value='" + id + "'>" + descripcion + "</option>";

                        $("#carrera_id").append(option);
                    }
                }

            }
        });
    }



    $(document).ready(function() {
        //var miDato = localStorage.getItem("nombre").value;
        if (localStorage.getItem("nombre").value != "Cargando datos...") {
            $('#materia_id').find('option').remove();
            $('#materia_id').append($('<option></option>').html('Seleccione una carrera...'));

            $("#materia_id").append(localStorage.getItem("nombre").value);
        }
    });


    //$("#exampleModal").modal("show");
    $('#anio_id').change(function() {
        search();

    });
    $('#carrera_id').change(function() {
        search();
    });
    $('#sede_id').change(function() {
        searchCarreras();
        search();
    });
    $('#materia_id').change(function() {
        localStorage.clear();
        localStorage.setItem("nombre", document.getElementById('materia_id').value);
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\User\Desktop\freelance\isft38\resources\views/frontend/programa/createFront.blade.php ENDPATH**/ ?>