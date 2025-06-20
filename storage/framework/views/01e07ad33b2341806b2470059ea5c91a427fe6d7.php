
<?php $__env->startSection('content'); ?>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
<style>
    .form-control,
    .form-select {
        border: none;
        border-bottom: 2px solid #ced4da;
        border-radius: 5px;
        padding: 10px;
        background-color: #fff;
        transition: all 0.3s ease-in-out;
    }

    .form-control::placeholder,
    .form-select::placeholder {
        color: black;
    }

    form label {
        font-weight: bold;
    }

    .boton {
        text-align: center;
    }

    .boton button {
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
    .boton button:hover {
        background-color: #d64e5e; /* Color al pasar el ratón */
        transform: translateY(-3px);
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.3);
    }

    .form-control:hover {
        background: transparent;
    }

    .form-control:focus,
    .form-select:focus {
        border-bottom: 2px solid #007bff;
        box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        border-color: transparent;
        outline: 0 none;
    }

    .container-padre {
        display: flex;

        justify-content: center; /* Centra horizontalmente */
        align-items: center; /* Centra verticalmente */
        width: 100%;
        background-image: url('contacto.jpeg');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        padding: 10px;

    }

    .container-hijo {
        width: 100%;
        max-width: 900px; /* Ancho máximo del formulario */
        background: rgba(255, 255, 255, 0.6); /* Fondo blanco semi-transparente para el formulario */
        padding: 10px;
        border-radius: 20px;
        margin-left: 360px; /* Ajusta el contenedor 50 píxeles hacia la derecha desde el margen izquierdo del contenedor padre */

    }

    .container-map_icons {
        display: flex;
        justify-content: space-evenly;
        align-items: center;
    }

    iframe {
        border: 1px solid grey;
        border-radius: 10px;
        width: 400px;
        height: 300px;
    }

    .container-3img {
        display: flex;
        border: 1px solid gray;
        border-radius: 10px;
        padding: 20px;
        flex-direction: column;
        align-items: center;
        text-align: center;
        gap: 1em;
        margin: 50px 0;
    }

    .icon-text {
        width: 200px;
        text-align: left;
        margin-left: 10px;
    }

    @media  screen and (max-width:1100px) {
        .container-padre {
            flex-direction: column;
        }

        .container-padre form {
            width: 100%;
        }

        .container-map_icons {
            width: 100%;
            flex-direction: column;
            justify-content: space-around;
        }

        form {
            padding: 0px;
        }

        .form-control,
        .form-select {
            padding: 8px;
        }

        .boton button {
            padding: 8px 15px;
        }
    }

    @media  screen and (max-width:768px) {
        iframe {
            width: 300px;
        }
    }



    /* Mejoras en la responsividad */

@media  screen and (max-width:1100px) {
    .container-padre {
        flex-direction: column;
        padding: 20px; /* Aumenta el padding para evitar bordes pegados */
    }

    .container-hijo {
        margin-left: 0; /* Elimina el margen lateral en pantallas más pequeñas */
    }

    .container-map_icons {
        flex-direction: column;
        justify-content: space-around;
        gap: 15px; /* Añade un espacio entre los elementos */
    }

    iframe {
        width: 100%; /* Ancho completo en pantallas pequeñas */
        height: auto; /* Ajusta la altura automáticamente */
    }
}
@media  screen and (max-width:480px) {
    iframe {
        width: 100%; /* Ancho completo en pantallas muy pequeñas */
        height: 200px; /* Ajusta la altura para móviles pequeños */
    }
}

@media  screen and (max-width:768px) {
    .container-hijo {
        padding: 20px; /* Más espacio interno para el formulario */
        max-width: 100%; /* Asegura que el contenedor ocupe el 100% en móviles */
    }

    .boton button {
        width: 100%; /* Botón a todo el ancho en pantallas pequeñas */
    }

    .icon-text {
        text-align: center; /* Centra los textos de los íconos */
        margin-left: 0; /* Elimina el margen a la izquierda */
    }

    iframe {
        width: 100%;
        height: 250px; /* Ajusta la altura del iframe en móviles */
    }

    .form-control,
    .form-select {
        width: 100%;
        padding: 10px; /* Espacio adecuado para campos de entrada en móviles */
    }
}

@media  screen and (max-width:480px) {
    .container-map_icons {
        flex-direction: column;
    }

    .boton button {
        padding: 10px; /* Aumenta el padding del botón en pantallas más pequeñas */
    }

    iframe {
        width: 100%; /* Asegurarse de que el mapa se vea completo */
        height: 300px; /* Ajustar altura según el espacio disponible */
    }
    .container-padre {
        height: auto;
        padding: 20px;
    }

    .container-hijo {
        width: 100%;
        margin: 0 auto;
        padding: 10px;
        border-radius: 10px; /* Suavizar bordes para que se vea mejor en pantallas pequeñas */
    }

    .form-control, .form-select {
        width: 100%;
        font-size: 1rem;
        padding: 12px;
    }

}
</style>


<div>
    <div class="alert alert-primary alert-dismissible fade show" style=" background-color: #800000; color: white; font-weight:bold;  text-align: center;" role="alert">
        <i>Atención de secretaría: Lunes a Viernes, de 17:45 a 22:00hs</i>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
</div>

    <div class="container-padre">
        <div class="container-hijo">

            <?php if(Session::has('status')): ?>
            <div style="text-align:center;" class="alert alert-success"><?php echo e(Session('status')); ?></div>
            <?php endif; ?>

            <div class="container" style="margin-top:5px;">
                <?php echo e(Form::open(['route' => 'contacto.store', 'files' => true])); ?>

                <?php echo csrf_field(); ?>
                <div class="card">
                    <h5 class="card-header" style=" background-color: #800000; color: white ; font-weight:bold;  text-align: center;">CONTACTO</h5>
                    <div class="card-body" style="border:none;border:1px solid grey;">
                        <div class=" mb-3">
                            <!-- <?php echo e(Form::label("nombre", 'Nombre', ['class' => 'control-label'])); ?> -->
                            <?php echo e(Form::text("nombre", old("nombre"), ["class" => "form-control", "placeholder" => "Nombre y Apellido", ])); ?>

                            <?php $__errorArgs = ['nombre'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="alert alert-danger"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="mb-3">
                            <!-- <?php echo e(Form::label("email", 'Email', ['class' => 'control-label'])); ?> -->
                            <?php echo e(Form::email("email", old("email"), ["class" => "form-control", "placeholder" => "Email", ])); ?>

                            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="alert alert-danger"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="mb-3">
                            <!-- <label for="telefono" class="form-label">Teléfono</label> -->
                            <input type="number" name="telefono" class="form-control" id="telefono" placeholder="Teléfono" aria-describedby="emailHelp">
                        </div>

                        <div class="mb-3">
                            <!-- <label for="sede" class="form-label">Sede <i style="font-weight:normal;"></i></label> -->
                            <select name="sede" style="cursor:pointer;" class="form-select" name="sede" id="sede" placeholder="Sede">
                                <?php $__currentLoopData = $sedes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sede): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php $__currentLoopData = $sede->emails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $email): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($email->email); ?>"><?php echo e($sede->descripcion); ?> - <?php echo e($email->email); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <!-- <label for="message" class="form-label">Mensaje</label> -->
                            <div class="form-group">
                                <textarea class="form-control" name="mensaje" id="summernote"></textarea>
                            </div>
                        </div>

                        <div class="boton"><button type="submit" class="btn">Enviar</button></div>

                    </div>
                </div>
                <?php echo Form::close(); ?>

            </div>

            <div class="my-4 container-map_icons ">
                <iframe style="" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d13326.864819671318!2d-60.1787278!3d-33.3784744!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x832238dce218af32!2sInstituto%20Superior%20de%20Formaci%C3%B3n%20T%C3%A9cnica%20N%C2%B038!5e0!3m2!1ses!2sar!4v1661981270143!5m2!1ses!2sar" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                <div class="container-3img">

                    <?php $__currentLoopData = $sedes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sede): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div style="display:flex;align-items:center;">
                        <div style="border:1px solid black;border-radius:50px;padding:20px;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-geo-alt" viewBox="0 0 16 16">
                                <path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z" />
                                <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                            </svg>
                        </div>
                        <!-- <p class="pt-3 icon-text" style="font-weight:bold;">San Nicolás de los Arroyos</p> -->
                        <p class="pt-3 icon-text" style="font-weight:bold;"><?php echo e($sede->ciudad); ?></p>
                    </div>


                    <div style="display:flex;align-items:center;">
                        <div style="border:1px solid black;border-radius:50px;padding:20px;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                                <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z" />
                            </svg>
                        </div>

                        <div style="flex-direction:column;">
                            <?php $__currentLoopData = $sede->emails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $email): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($loop->first): ?>
                            <p class="icon-text" style="font-weight:bold;"><?php echo e($email->email); ?></p>
                            <?php else: ?>
                            <p class="icon-text" style="font-weight:bold;"><?php echo e($email->email); ?></p>
                            <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>

                    <div style="display:flex;align-items:center;">
                        <div style="border:1px solid black;border-radius:50px;padding:20px;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-telephone" viewBox="0 0 16 16">
                                <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z" />
                            </svg>
                        </div>
                        <div style="flex-direction:column;">
                            <?php $__currentLoopData = $sede->telefonos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $telef): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($loop->first): ?>
                            <p class="icon-text" style="font-weight:bold;"><?php echo e($telef->caracteristica); ?> - <?php echo e($telef->numero); ?> </p>
                            <?php else: ?>
                            <p class="icon-text" style="font-weight:bold;"><?php echo e($telef->caracteristica); ?> - <?php echo e($telef->numero); ?></p>
                            <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>

        <!-- <hr style="margin:50px"> -->

        <div class="bgImg" style="
            width:60%;
            background-image:url(contacto.jpeg);
            background-size:cover;">
        </div>



    <div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
            <img src="..." class="rounded me-2" alt="...">
            <strong class="me-auto">Bootstrap</strong>
            <small>11 mins ago</small>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
            Hello, world! This is a toast message.
        </div>
    </div>
</div>
<!-- include libraries(jQuery, bootstrap) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
<script type="text/javascript">
    $('#summernote').summernote({
        height: 100,
        placeholder: 'Escriba su consulta...',
        tabsize: 2,
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'clear']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
        ]
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\User\Desktop\freelance\isft38\resources\views/frontend/sede/contacto.blade.php ENDPATH**/ ?>