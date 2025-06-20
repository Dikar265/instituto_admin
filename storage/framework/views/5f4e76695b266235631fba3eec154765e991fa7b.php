

<?php $__env->startSection('title', 'Listado de materias'); ?>

<?php $__env->startSection('content'); ?>

<style>
  .img2 {
    border-radius: 5px;
    margin-left: 953px;
  }

  .Inicio {
    text-align: center;
    margin: 20px;
    font-family: 'Quicksand', sans-serif;
    font-weight: 800;
  }

  .links {
    padding: 25px;
    width: 70%;
    margin: 0 auto;
  }

  .form-group {
    margin-top: 10px;
  }

  .form-group label {
    outline: none;
    margin-bottom: 5px;
    font-family: 'Quicksand', sans-serif;
    font-weight: 800;
    font-size: 20px;
  }

  .form-select {
    border: 1px solid gray;
    padding: 10px;
    outline: none;
  }
</style>
<div>
  <?php if(Session::has('status')): ?>
  <div class="alert alert-success"><?php echo e(Session('status')); ?></div>
  <?php endif; ?>
</div>
<div class="Inicio">
  <h1 class="TextoInicio">Listado de programas</h1>
</div>
<a href="<?php echo e(route('programa.create')); ?>" class="btn btn-success img2">
  <img src="<?php echo e(asset('svg/new.svg')); ?>" height="30" width="20" alt="Crear" title="Crear">
  Crear Programa
</a>

<div class="links">

  <?php echo e(Form::open(['route' => 'programa.search'])); ?>

  <?php echo csrf_field(); ?>

  <div class="form-group">
    <?php echo e(Form::label("anio_id", 'Periodo',)); ?>

    <?php echo e(Form::select("anio_id", $periodos, $periodo, ["class" => "form-select", "placeholder" => "Seleccione un período"])); ?>

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


  <div class="form-group">
    <?php echo e(Form::label("sede_id", 'Sede', )); ?>

    <?php echo e(Form::select("sede_id", $sedes, $sede, ["class" => "form-select", "placeholder" => "Seleccione una sede"])); ?>

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


  <div class="form-group">
    <?php echo e(Form::label("carrera_id", 'Carrera', )); ?>

    <?php echo e(Form::select("carrera_id", $carreras, $carrera, ["class" => "form-select", "placeholder" => "Seleccione una carrera"])); ?>

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



  <div class="form-group">
    <?php echo e(Form::label("comision_id", 'Comisión', )); ?>

    <?php echo e(Form::select("comision_id", $comisiones, $comision, ["class" => "form-select", "placeholder" => "Seleccione una comisión"])); ?>

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


  <br>

  <div class="d-grid gap-2 col my-2 mx-auto">
    <button class="form-control btn btn-outline-dark" style="margin-top:1rem;" type="submit">Consultar</button>
  </div>
</div>
<?php echo Form::close(); ?>

<br>


<br>


<!-- ACORDEON -->
<div class="accordion" id="accordionExample">
  <div class="accordion-item">
    <?php $__currentLoopData = $anios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php ($titulo = $a->descripcion); ?>

    <?php $__currentLoopData = $programas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $programa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php if($a->id == $programa->anio_id): ?>

    <?php if($titulo): ?>
    <h2 class="accordion-header" id="heading<?php echo e($a->id); ?>">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo e($a->id); ?>" aria-expanded="true" aria-controls="collapse<?php echo e($a->id); ?>">

        <?php echo e($titulo); ?> <br>
      </button>
      <?php ($titulo = ''); ?>
      <?php endif; ?>

    </h2>
    <div id="collapse<?php echo e($a->id); ?>" class="accordion-collapse collapse" aria-labelledby="heading<?php echo e($a->id); ?>}" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">MATERIA</th>
              <th scope="col">PROFESOR</th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <?php echo e(Form::model($programa, [ 'method' => 'delete' , 'route' => ['programa.destroy', $programa->id] ])); ?>


              <td><a target="_blank" href="<?php echo e(asset('./storage/'. $programa->nombrearchivo)); ?>"><?php echo e($programa->materia->descripcion); ?></td>
              <td><?php echo e($programa->profesor->apellido); ?>,<?php echo e($programa->profesor->nombre); ?></td>

              <?php echo csrf_field(); ?>
              <td>
                <div class="botonera">
                  <button type="submit" name="borrar<?php echo e($programa->id); ?>" class="btn btn-danger  svg img" onclick="if (!confirm('Está seguro de borrar el programa?')) return false;">
                    <img src="<?php echo e(asset('svg/delete.svg')); ?>" width="20" height="30" alt="Borrar" title="Borrar">
                  </button>

                  <a href="<?php echo e(route('programa.edit', ['programa' => $programa->id ])); ?>" class="btn btn-primary svg img">
                    <img src="<?php echo e(asset('svg/edit.svg')); ?>" width="20" height="30" alt="Editar" title="Editar">
                  </a>
                </div>
              </td>
          </tbody>
          <?php echo Form::close(); ?>

          <?php endif; ?>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </table>
      </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </div>
</div>
</div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!-- Script Get Materias -->
<script type='text/javascript'>
  function search() {
    var sede_id = document.getElementById('sede_id').value;
    //var sede_id = document.getElementById('sede_id').value;
    var carrera_id = document.getElementById('carrera_id').value;
    //$('#carrera_id').find('option').not(':first').remove();
    $('#carrera_id').find('option').remove();
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

    $('#sede_id').change(function() {
      search();

    });
  });
</script>


<?php $__env->stopSection(); ?>
</div>

</div>
<?php echo $__env->make('backend.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\User\Desktop\freelance\isft38\resources\views/backend/programa/listado_programa.blade.php ENDPATH**/ ?>