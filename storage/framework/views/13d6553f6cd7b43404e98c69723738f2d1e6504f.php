

<?php $__env->startSection('title', 'Horarios por Carrera'); ?>

<?php $__env->startSection('content'); ?>

<style>


body {
  background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
  color: black;
  font-family: 'Montserrat', sans-serif;
}
.input-group-text {
    margin-bottom: 0.5rem;

    background-color: #800000; /* Nuevo color de fondo */
    color: #ffffff;
    border: none;
    border-radius: 10px 0 0 10px;
}

.form-control {
    border: none;
    border-radius: 0 10px 10px 0;
    box-shadow: none;
}

.form-control:focus {
    box-shadow: none;
    border-color: #2a5298;
}

.input-group.mb-3 {
    margin-bottom: 1.5rem;
}
.card {
    background-color: #ffffff;
    border-radius: 15px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    transition: box-shadow 0.3s ease-in-out; /* Solo transición de sombra */
    width: 100%;
    max-width: 600px; /* Aumenta el ancho máximo según lo necesites */
}

.card:hover {
    transform: none; 
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1); /* Mantén la sombra original */
}

.card-header {
    background-color: #800000; /* Nuevo color de fondo */
    color: #ffffff;
    text-align: center;
    font-weight: bold;
    padding: 15px;
    border-bottom: none;
}

.card-body {
    font-family: 'Montserrat', sans-serif;

    padding: 20px;
}
button[type="submit"] {
    padding: 15px;
    background-color: #800000; /* Nuevo color de fondo */
    color: #ffffff;
    border: none;
    border-radius: 50px;
    font-weight: bold;
    text-transform: uppercase;
    letter-spacing: 1px;
    transition: background-color 0.3s, transform 0.3s, box-shadow 0.3s;
}

button[type="submit"]:hover {
    background-color: #d64e5e; /* Color al pasar el ratón */
    transform: translateY(-3px);
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.3);
}

.alert {
    font-size: 0.9rem;
    margin-top: 0.5rem;
}

    label {
        width: 4rem;
    }
    @media (max-width: 576px) {
    .card {
        margin: 1rem;
        border-radius: 10px;
        max-width: 100%;
    }

    .form-control {
        font-size: 1rem; /* Aumenta el tamaño en pantallas más pequeñas */
    }
}

@media (max-width: 400px) {
    .input-group-text, .form-control {
        font-size: 0.9rem;
    }

    button[type="submit"] {
        padding: 10px;
        font-size: 0.9rem;
    }
}

</style>


<div>
    <?php if(Session::has('status')): ?>
    <div class="alert alert-success"><?php echo e(Session('status')); ?></div>
    <?php endif; ?>
</div>

<div class="container" style="display: flex ; align-items: center; justify-content: center">

    <div class="card my-4">
        <h5 class="card-header">HORARIOS POR CARRERA</h5>
        <div class="card-body">
            <?php echo e(Form::open(['route' => 'horarios.searchPorCarrera'])); ?>

            <?php echo csrf_field(); ?>
            <div class="input-group mb-3">
                <div class="input-group-text">
                    <?php echo e(Form::label("sede_id",'Sede', ['class' => 'control-label'])); ?>

                </div>
                <?php echo e(Form::select("sede_id", $sedes, null, ["class" => "form-control", "placeholder" => "Seleccione la sede" ])); ?>

            </div>
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

            <div class="input-group mb-3">
                <div class="input-group-text">
                    <?php echo e(Form::label("carrera",'Carrera', ['class' => 'control-label'])); ?>

                </div>
                <?php echo e(Form::select("carrera_id", $carreras, null, ["class" => "form-control", "placeholder" => "Seleccione una carrera" ])); ?>

            </div>
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

            <div class="input-group mb-3">
                <div class="input-group-text">
                    <?php echo e(Form::label("año", 'Año', ['class' => 'control-label'])); ?>

                </div>
                <?php echo e(Form::select("anio_id", $anios, null, ["class" => "form-control", "placeholder" => "Seleccione el año" ])); ?>

            </div>
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

            <div class="input-group mb-3">
                <div class="input-group-text">
                    <?php echo e(Form::label("comision",'Comisión', ['class' => 'control-label'])); ?>

                </div>
                <?php echo e(Form::select("comision_id", $comisions, null, ["class" => "form-control", "placeholder" => "Seleccione la comisión" ])); ?>

            </div>
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
            <div class="d-grid gap-2 col my-2 mx-auto">
                <button class="form-control" type="submit">Consultar</button>
            </div>

        </div>
        <?php echo Form::close(); ?>

    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\User\Desktop\freelance\isft38\resources\views/frontend/horarios/porCarrera.blade.php ENDPATH**/ ?>