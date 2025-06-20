
<?php $__env->startSection('title', 'Carreras'); ?>
<?php $__env->startSection('content'); ?>
<style>
*{
    font-family: 'Quicksand', sans-serif;
}
.algo{
      text-align: center;
      display: flex;
      justify-content: center;
      width: auto;
}
tr{
  height: 100px;
}
td{
    display: table-cell;
    vertical-align: middle;
}
a{
  margin-left: 10px;
}
button{
  margin-left: 10px;
}
.subcontainer{
  display: flex;
  justify-content: center;
  flex-wrap: wrap;
  flex-direction: row;
}
a{
  text-decoration: none;
}
.horario{
  color:black;
  border:1px solid black;
  border-radius:25px;
  padding: 10px;
}
.botonera{
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
     <?php $__empty_1 = true; $__currentLoopData = $carreras; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $carrera): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
       <?php if($loop->first): ?>
       <div class="descripciones">
       <table class="table container" >  
        <tr>
          <div class="algo">
            <th>Carrera</th>
            <th>Resolución</th>            
            <th>Años</th>
            <td></td>
            <td>
              <a class="btn btn-success svg" href="<?php echo e(route('carrera.create')); ?>">
              <img src="<?php echo e(asset('svg/new.svg')); ?>" width="20" height="20" alt="Crear" title="Crear">
              Crear Carrera
              </a>
          </td>
          </div>
        </tr>     
       <?php endif; ?>
       <tr>
        <div class="subcontainer">
        <td><?php echo e($carrera->descripcion); ?></td>
        <td><?php echo e($carrera->resolucion); ?></td>              
        <td><?php echo e($carrera->anios); ?></td>        
        <td>
          <?php if($carrera->res_archivo): ?><span class="badge badge-light"><a href="<?php echo e(asset('./storage/'. $carrera->res_archivo)); ?>"><?php echo e(basename($carrera->res_archivo)); ?></a> </span> <?php endif; ?>
        </td> 
         <td>
          <?php echo e(Form::model($carrera, [ 'method' => 'delete' , 'route' => ['carrera.destroy', $carrera->id] ])); ?>

            <?php echo csrf_field(); ?>  
          <div class="botonera">
            <a href="<?php echo e(route('carrera.show', ['carrera' => $carrera->id ])); ?>" class="btn btn-info svg " >
              <img src="<?php echo e(asset('svg/show.svg')); ?>"  width="20" height="20"  alt="Show" title="Show">
            </a>

            <a href="<?php echo e(route('carrera.edit', ['carrera' => $carrera->id ])); ?>" class="btn btn-primary svg " >
              <img src="<?php echo e(asset('svg/edit.svg')); ?>"  width="20" height="20"  alt="Editar" title="Editar">
            </a>

            <button type="submit" name="borrar<?php echo e($carrera->id); ?>" class="btn btn-danger  svg" onclick="if (!confirm('Está seguro de borrar la carrera?')) return false;">
              <img src="<?php echo e(asset('svg/delete.svg')); ?>" width="20" height="20"  alt="Borrar" title="Borrar">
            </button>
              <a href="<?php echo e(route('carrera.materias', ['carrera_id' => $carrera->id ])); ?>" class="btn btn-warning svg " >
              <img src="<?php echo e(asset('svg/historia.svg')); ?>"  width="20" height="20"  alt="Show" title="Show"> Materias
            </a>
          </div>
            <?php echo Form::close(); ?>  
         </td>
         </div>
      </tr>
       <?php if($loop->last): ?>
       </table>
       </div>  
       <?php endif; ?>
   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
     <p class="text-capitalize"> No hay carreras.</p>
   <?php endif; ?>   
 </div><hr>
<!-- Paginación -->
<div class="d-flex justify-content-center">
<!-- 
  Agregar en App\Providers\AppServiceProvider:
  use Illuminate\Pagination\Paginator;
      public function boot() { Paginator::useBootstrap(); } --> 
</div> 
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\User\Desktop\freelance\isft38\resources\views/backend/carrera/index.blade.php ENDPATH**/ ?>