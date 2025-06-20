<?php $__env->startSection('title', __('noticias.index')); ?>
<?php $__env->startSection('content'); ?>
    <style>
        img {
            max-width: 100%;
            height: auto;
        }
    </style>
    <?php if(Session::has('status')): ?>
        <div class="alert alert-success alert-dismissible fade show"><?php echo e(Session('status')); ?>

            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>
    <div class="container">
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a href="<?php echo e(route('noticias.create')); ?>" class="btn btn-success"><img src="<?php echo e(asset('svg/new.svg')); ?>"
                    width="20" height="20" alt="Crear Noticia" title="Crear Noticia"> Crear Noticia</a>
        </div>
        <div class="row"> </div>
        <?php $__empty_1 = true; $__currentLoopData = $noticias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $noticia): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="card mb-3">
                <div class="row g-0">
                    <div class="col-md-2">
                        <?php if($noticia->imagen): ?>
                            <?php if(Str::startsWith($noticia->imagen, 'http')): ?>
                                <img src="<?php echo e($noticia->imagen); ?>" class="card-img-top" alt="...">
                            <?php else: ?>
                                <!-- <img src="<?php echo e(asset('./storage/' . $noticia->imagen)); ?>" class="card-img-top" alt="..."> -->
                                <img src="<?php echo e(url('foto_noticia/'. $noticia->imagen)); ?>" class="card-img-top" alt="...">
                            <?php endif; ?>
                        <?php else: ?>
                            <h5 class="text-center text-muted"> <?php echo e(__('noticias.noimg')); ?> </h5>
                            <hr>
                        <?php endif; ?>
                    </div>
                    <div class="col-md-2">
                        <?php if($noticia->imagen2): ?>
                            <?php if(Str::startsWith($noticia->imagen2, 'http')): ?>
                                <img src="<?php echo e($noticia->imagen2); ?>" class="card-img-top" alt="...">
                            <?php else: ?>
                                <!-- <img src="<?php echo e(asset('./storage/' . $noticia->imagen2)); ?>" class="card-img-top"
                                    alt="..."> -->
								<img src="<?php echo e(url('foto_noticia/'. $noticia->imagen2)); ?>" class="card-img-top" alt="...">
                            <?php endif; ?>
                        <?php else: ?>
                            <h5 class="text-center text-muted"> <?php echo e(__('noticias.noimg')); ?> </h5>
                            <hr>
                        <?php endif; ?>

                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h3 class="card-title text-primary text-uppercase"><?php echo e($noticia->titulo); ?></h3>
                            <p class="card-text text-right">
                                <a href="<?php echo e(route('noticias.autor', ['autor' => $noticia->creadaPor->id])); ?>">
                                    <small class="text-muted">
                                        <?php echo e($noticia->creadaPor->name); ?></small>
                                </a>

                                <small class="text-muted  offset-8">
                                    <?php echo e($noticia->updated_at->toFormattedDateString()); ?></small>
                            </p>
                            <p class="card-text"><?php echo $noticia->cuerpo; ?></p><br />
                            <?php if($noticia->archivo1): ?>
                                <span class="badge bg-warning"> <a
                                        href="<?php echo e(asset('./storage/' . $noticia->archivo1)); ?>"><?php echo e(basename($noticia->archivo1)); ?></a>
                                </span>
                            <?php endif; ?>
                            <?php if($noticia->archivo2): ?>
                                <span class="badge bg-warning"> <a
                                        href="<?php echo e(asset('./storage/' . $noticia->archivo2)); ?>"><?php echo e(basename($noticia->archivo2)); ?></a>
                                </span>
                            <?php endif; ?>
                            <?php if($noticia->archivo3): ?>
                                <span class="badge bg-warning"> <a
                                        href="<?php echo e(asset('./storage/' . $noticia->archivo3)); ?>"><?php echo e(basename($noticia->archivo3)); ?></a>
                                </span>
                            <?php endif; ?>
                            <?php if($noticia->deCarrera): ?>
                                <a href="<?php echo e(route('noticias.carrera', ['carrera' => $noticia->carrera_id])); ?>">
                                    <span class="badge bg-success"><?php echo e($noticia->deCarrera->descripcion); ?></span></a>
                            <?php endif; ?>
                            <?php $__currentLoopData = $noticia->etiquetas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $e): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <a href="<?php echo e(route('noticias.etiqueta', ['etiqueta' => $e->id])); ?>">
                                    <span class="badge bg-primary"><?php echo e($e->descripcion); ?></span></a>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </div>
                    </div>
                    <div class="card-footer">
                        <?php echo e(Form::model($noticia, ['method' => 'delete', 'route' => ['noticias.destroy', $noticia->id]])); ?>

                        <?php echo csrf_field(); ?>
                        <div class="row  offset-md-10">

                            <a href="<?php echo e(route('noticias.show', ['noticia' => $noticia->id])); ?>"
                                class="btn btn-info col-md-4"><img src="<?php echo e(asset('svg/show.svg')); ?>" width="20"
                                    height="20" alt="<?php echo e(__('noticias.mostrar')); ?>"
                                    title="<?php echo e(__('noticias.mostrar')); ?>"></a>
                            <a href="<?php echo e(route('noticias.edit', ['noticia' => $noticia->id])); ?>"
                                class="btn btn-primary col-md-4"><img src="<?php echo e(asset('svg/edit.svg')); ?>" width="20"
                                    height="20" alt="<?php echo e(__('noticias.editar')); ?>"
                                    title="<?php echo e(__('noticias.editar')); ?>"></a>
                            <button type="submit" class="btn btn-danger col-md-4  "
                                onclick="if (!confirm('<?php echo e(__('noticias.confirmar')); ?>' )) return false;"><img
                                    src="<?php echo e(asset('svg/delete.svg')); ?>" width="20" height="20"
                                    alt="<?php echo e(__('noticias.borrar')); ?>" title="<?php echo e(__('noticias.borrar')); ?>"></button>
                            <?php echo Form::close(); ?>

                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <p class="text-capitalize"> No hay noticias </p>
        <?php endif; ?>

    </div>
    <hr>
    <!-- Paginación -->
    <div class="d-flex justify-content-center">
        <!--
                                                      Agregar en App\Providers\AppServiceProvider:
                                                      use Illuminate\Pagination\Paginator;
                                                          public function boot() { Paginator::useBootstrap(); } -->
        <?php echo $noticias->links(); ?>

    </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\User\Desktop\freelance\isft38\resources\views/backend/noticia/noticias.blade.php ENDPATH**/ ?>