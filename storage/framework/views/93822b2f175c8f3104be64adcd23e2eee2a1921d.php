
<?php $__env->startSection('title', 'Sedes'); ?>
<?php $__env->startSection('content'); ?>
<?php $__empty_1 = true; $__currentLoopData = $sedes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sede): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
<?php if($loop->first): ?>
<div class="descripciones">
  <table class="table container">
    <tr>
      <div class="centrar">
        <th>Sede</th>
        <th>Ciudad</th>
        <th>Calle</th>
        <th>Número</th>
        <td>
          <a class="btn btn-success svg" href="<?php echo e(route('sede.create')); ?>">
            <img src="<?php echo e(asset('svg/new.svg')); ?>" width="20" height="20" alt="Crear" title="Crear">
            Crear Sede
          </a>
        </td>
      </div>
    </tr>
    <?php endif; ?>
    <tr class="table-light">

      <th class="text-primary"><?php echo e($sede->descripcion); ?></th>
      <td> <?php echo e($sede->ciudad); ?> </td>
      <td><?php echo e($sede->calle); ?></td>
      <td><?php echo e($sede->numero); ?></td>
      <td>
        <?php echo e(Form::model($sede, [ 'method' => 'delete' , 'route' => ['sede.destroy', $sede->id] ])); ?>

        <?php echo csrf_field(); ?>

        <a href="<?php echo e(route('sede.show', ['sede' => $sede->id ])); ?>" class="btn btn-info svg">
          <img src="<?php echo e(asset('svg/show.svg')); ?>" width="20" height="20" alt="Mostrar" title="Mostrar">
        </a>
        <a href="<?php echo e(route('sede.edit', ['sede' => $sede->id ])); ?>" class="btn btn-primary svg ">
          <img src="<?php echo e(asset('svg/edit.svg')); ?>" width="20" height="20" alt="Teléfono" title="Teléfono">
        </a>
        <button type="submit" name="borrar<?php echo e($sede->id); ?>" class="btn btn-danger  svg" onclick="if (!confirm('Está seguro de borrar la sede?')) return false;">
          <img src="<?php echo e(asset('svg/delete.svg')); ?>" width="20" height="20" alt="Borrar" title="Borrar">
        </button>
        <?php echo Form::close(); ?>

      </td>

    </tr>
    <tr>
      <td>
        <?php echo e(Form::open(['route' => 'sedeemail.store'])); ?>

        <?php echo csrf_field(); ?>
        <div class="row">
          <div class="col-md-2">
            <button type="submit" name="insemail<?php echo e($sede->id); ?>" class="btn btn-success">
              <img src="<?php echo e(asset('svg/mail.svg')); ?>" width="20" height="20" alt="Nuevo email" title="Nuevo email">
            </button>
          </div>
          <div class="col-md-10">
            <?php echo e(Form::text("sede_id", $sede->id, ["hidden" => "hidden"])); ?>

            <?php echo e(Form::email("email", null, ["class" => "form-control"  ])); ?>

          </div>
        </div>
        <?php echo Form::close(); ?>

        <?php $__currentLoopData = $sede->emails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $email): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

        <?php echo e(Form::model($email, [ 'method' => 'delete' , 'route' => ['sedeemail.destroy', $email->id] ])); ?>

        <?php echo csrf_field(); ?>

        <button type="submit" name="borrar<?php echo e($email->id); ?>" class="btn btn-danger  svg" onclick="if (!confirm('Está seguro de borrar el email?')) return false;">
          <img src="<?php echo e(asset('svg/delete.svg')); ?>" width="20" height="20" alt="Borrar" title="Borrar">
        </button> <?php echo e($email->email); ?><br>
        <?php echo Form::close(); ?>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </td>
      <td colspan="3">
        <?php echo e(Form::open(['route' => 'sedetelefono.store'])); ?>

        <?php echo csrf_field(); ?>
        <div class="row">
          <div class="col-md-2">
            <button type="submit" name="instelef<?php echo e($sede->id); ?>" class="btn btn-success  svg">
              <img src="<?php echo e(asset('svg/phone.svg')); ?>" width="20" height="20" alt="Borrar" title="Borrar">
            </button>
          </div>
          <div class="col-md-2">
            <?php echo e(Form::text("sede_id", $sede->id, ["hidden" => "hidden"])); ?>

            <?php echo e(Form::number("caracteristica", null, ["class" => "form-control", "placeholder" => "", ])); ?>

          </div>
          <div class="col-md-4">
            <?php echo e(Form::number("numero", null , ["class" => "form-control", "placeholder" => "", ])); ?>

          </div>

        </div>
        <?php echo Form::close(); ?>

        <?php $__currentLoopData = $sede->telefonos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $telef): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

        <?php echo e(Form::model($telef, [ 'method' => 'delete' , 'route' => ['sedetelefono.destroy', $telef->id] ])); ?>

        <?php echo csrf_field(); ?>

        <button type="submit" name="borrar<?php echo e($telef->id); ?>" class="btn btn-danger  svg" onclick="if (!confirm('Está seguro de borrar el teléfono?')) return false;">
          <img src="<?php echo e(asset('svg/delete.svg')); ?>" width="20" height="20" alt="Borrar" title="Borrar">
        </button> <?php echo e($telef->caracteristica); ?>-<?php echo e($telef->numero); ?><br>


        <?php echo Form::close(); ?>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </td>
      <td></td>
    </tr>
    <?php if($loop->last): ?>
  </table>
</div>
</div>
<?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
<div class="descripciones">
  <table class="table container">
    <tr>
      <div class="centrar">
        <th>Sede</th>
        <th>Ciudad</th>
        <th>Calle</th>
        <th>Número</th>
        <td>
          <a class="btn btn-success svg" href="<?php echo e(route('sede.create')); ?>">
            <img src="<?php echo e(asset('svg/new.svg')); ?>" width="20" height="20" alt="Crear" title="Crear">
            Crear Sede
          </a>
        </td>
      </div>
    </tr>
  </table>
  <p class="text-capitalize container"> No hay sedes.</p>
  <?php endif; ?>

  <!-- Paginación -->
  <div class="d-flex justify-content-center">
    <!-- 
  Agregar en App\Providers\AppServiceProvider:
  use Illuminate\Pagination\Paginator;
      public function boot() { Paginator::useBootstrap(); } -->
  </div>
  <?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\User\Desktop\freelance\isft38\resources\views/backend/sede/index.blade.php ENDPATH**/ ?>