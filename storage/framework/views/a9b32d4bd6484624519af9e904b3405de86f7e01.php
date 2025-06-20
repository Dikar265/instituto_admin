

<?php $__env->startSection('title', 'Horarios por Carreras'); ?>

<?php $__env->startSection('content'); ?>
<div class="Inicio">
  <h1 class="TextoInicio">Cargar horarios</h1>
</div>
<div>
    <?php if(Session::has('status')): ?>
    <div class="alert alert-success"><?php echo e(Session('status')); ?></div>
    <?php endif; ?>
</div>
 
<div class="links">
      <?php echo e(Form::open(['route' => 'horario.search'])); ?>

      <div class="form-group">
        <?php echo e(Form::label("sede_id",'Sede', ['class' => 'control-label'])); ?>

        <?php echo e(Form::select("sede_id", $sedes, null, ["class" => "form-control", "placeholder" => "Seleccione la sede" ])); ?>

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
        <?php echo e(Form::label("carrera",'Carrera', ['class' => 'control-label'])); ?>

        <?php echo e(Form::select("carrera_id", $carreras, null, ["class" => "form-control", "placeholder" => "Seleccione una carrera" ])); ?>

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
        <?php echo e(Form::label("año", 'Año', ['class' => 'control-label'])); ?>

        <?php echo e(Form::select("anio_id", $anios, null, ["class" => "form-control", "placeholder" => "Seleccione el año" ])); ?>

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
       <?php echo e(Form::label("comision",'Comisión', ['class' => 'control-label'])); ?>

        <?php echo e(Form::select("comision_id", $comisions, null, ["class" => "form-control", "placeholder" => "Seleccione la comision" ])); ?>

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

      </br><button type="submit" class="btn btn-success form-control">Consultar</button>
    </div>
    <?php echo Form::close(); ?>

  </div>

  <?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\User\Desktop\freelance\isft38\resources\views/backend/horario/index.blade.php ENDPATH**/ ?>