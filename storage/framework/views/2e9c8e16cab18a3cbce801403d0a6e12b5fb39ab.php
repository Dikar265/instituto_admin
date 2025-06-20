
<?php $__env->startSection('content'); ?>
    <style>
      .titulo {
    text-align: center;
    color: #ffffff;
    border-top: 10px solid #ffffff;
    margin-bottom: 30px;
    padding-top: 20px;
    text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);
  }


  .carousel {
    width: 100%;  /* Carrusel ocupa el ancho completo */
    aspect-ratio: 16 / 9;  /* Proporción de 16:9 */
    max-height: 500px;  /* Altura máxima opcional */
    margin: 0 auto;  /* Centrado horizontal */
}
.carousel-item img {
    width: 100%;  /* Las imágenes ocupan todo el ancho del carrusel */
    height: 100%;  /* Ocupan toda la altura */
    object-fit: cover;  /* Mantener proporción, cubrir todo el espacio */
    border-radius: 10px; /* Borde opcional redondeado */
}



.carousel-item::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(128, 0, 0, 0.2); /* Capa semi-transparente */
    z-index: 1;
    color: #ffffff;

}



  .titulo h1 {
    font-size: 3rem;
    font-weight: 700;
    text-transform: uppercase;
  }

        .carreras {
            display: flex;
            flex-wrap: wrap;
            margin: 20px;
        }

        .card-text {
            display: flex;
            flex-direction: column;
            text-overflow: ellipsis;
            flex: 1;
            margin: 10px;
            padding: 5px;
            text-align: center;
        }

        .card-text p {
            text-align: justify;
        }

        @media (min-width: 1000px) {
            .card-text {
                display: flex;
                flex-direction: column;
                text-overflow: ellipsis;
                flex: 1;
                margin: 10px;
                padding: 5px;
                text-align: center;
                height: 17rem;
            }
        }

        .btn-group {
            margin-top: 20px;
        }






        .botonMateria {
            padding: 17px 40px;
            border-radius: 7px;
            border-color: #B2B2B2;
            background-color: white;
            box-shadow: rgb(0 0 0 / 5%) 0 0 8px;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            font-size: 15px;
            transition: all .5s ease;
        }


        .botonMateria:hover {
            letter-spacing: 3px;
            background-color: #FF4A4A;
            color: hsl(0, 0%, 100%);
            box-shadow: #D61C4E 0px 7px 29px 0px;
        }

        .botonMateria:active {
            letter-spacing: 3px;
            background-color: hsl(261deg 80% 48%);
            color: hsl(0, 0%, 100%);
            box-shadow: rgb(93 24 220) 0px 0px 0px 0px;
            transform: translateY(10px);
            transition: 100ms;
        }

        .imagenCarrera {
            width: 100%;
            height: 300px;
            object-fit: cover;
        }

        .modal-header {
            background: #262626;
            color: white;
        }

        .modal-footer {
            background: #262626;
        }
    </style>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <style>
        /* * {
                                                                                                                          overflow-x: hidden;
                                                                                                                        } */

        .containerss {
            display: flex;
            flex-direction: column;
            width: 100%;
            padding: 30px;
            margin: 0 auto;
            justify-content: center;
        }

        .titulo {
    text-align: center;
    color: #ffffff;
    border-top: 10px solid #ffffff;
    margin-bottom: 30px;
    padding-top: 20px;
    text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);
  }

  .titulo h1 {
    font-size: 3rem;
    font-weight: 700;
    text-transform: uppercase;
  }
        .texto {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }

        .texto p {
            padding: 30px;
            width: 90%;
            text-align: justify;
            color: #ffffff;
        }

        .card {
            display: flex;
            margin: 40px 40px;
            text-align: center;
        }

        .card-img-top {
            height: 250px;
            object-fit: cover;
        }

        .fondoCards {
            background-color: #f8f9f9;
            padding-top: 40px;
        }

        .card-texto {
            text-align: justify;
            margin: 0 10px;
            display: inline-block;
        }

        .card-link1 {
            position: relative;
            bottom: 20px
        }

        button {
            position: relative;
            display: inline-block;
            cursor: pointer;
            outline: none;
            border: 0;
            vertical-align: middle;
            text-decoration: none;
            background: transparent;
            padding: 0;
            font-size: inherit;
            font-family: inherit;
        }

        button.learn-more {
            width: 12rem;
            height: auto;
        }

        button.learn-more .circle {
            transition: all 0.45s cubic-bezier(0.65, 0, 0.076, 1);
            position: relative;
            display: block;
            margin: 0;
            width: 3rem;
            height: 3rem;
            background: #282936;
            border-radius: 1.625rem;
        }

        button.learn-more .circle .icon {
            transition: all 0.45s cubic-bezier(0.65, 0, 0.076, 1);
            position: absolute;
            top: 0;
            bottom: 0;
            margin: auto;
            background: #fff;
        }

        button.learn-more .circle .icon.arrow {
            transition: all 0.45s cubic-bezier(0.65, 0, 0.076, 1);
            left: 0.625rem;
            width: 1.125rem;
            height: 0.125rem;
            background: none;
        }

        .row {
            display: flex;
            justify-content: center;
        }

        .row .row-hijos {
            padding: 0;
        }

        @media (max-width:768px) {
            .row .row-hijos {
                width: 350px;
            }

            .carousel-inner img {
                height: 50vh;

            }
        }

        button.learn-more .circle .icon.arrow::before {
            position: absolute;
            content: "";
            top: -0.29rem;
            right: 0.0625rem;
            width: 0.625rem;
            height: 0.625rem;
            border-top: 0.125rem solid #fff;
            border-right: 0.125rem solid #fff;
            transform: rotate(45deg);
        }

        button.learn-more .button-text {
            transition: all 0.45s cubic-bezier(0.65, 0, 0.076, 1);
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            padding: 0.75rem 0;
            margin: 0 0 0 1.85rem;
            color: #282936;
            font-weight: 700;
            line-height: 1.6;
            text-align: center;
            text-transform: uppercase;
        }

        button:hover .circle {
            width: 100%;
        }

        button:hover .circle .icon.arrow {
            background: #fff;
            transform: translate(1rem, 0);
        }

        button:hover .button-text {
            color: #fff;
        }

        /* From uiverse.io by @alexmaracinaru  */
        .cta {
            border: none;
            background: none;
        }

        .cta span {
            padding-bottom: 7px;
            letter-spacing: 4px;
            font-size: 14px;
            padding-right: 15px;
            text-transform: uppercase;
        }

        .cta svg {
            transform: translateX(-8px);
            transition: all 0.3s ease;
        }

        .cta:hover svg {
            transform: translateX(0);
        }

        .cta:active svg {
            transform: scale(0.9);
        }

        .hover-underline-animation {
            position: relative;
            color: white;
            padding-bottom: 20px;
        }

        .hover-underline-animation:after {
            content: "";
            position: absolute;
            width: 100%;
            transform: scaleX(0);
            height: 2px;
            bottom: 0;
            left: 0;
            background-color: #000000;
            transform-origin: bottom right;
            transition: transform 0.25s ease-out;
        }

        .cta:hover .hover-underline-animation:after {
            transform: scaleX(1);
            transform-origin: bottom left;
        }

        #arrow-horizontal {
            fill: white;
        }

        .sesion {
            background-color: rgba(0, 0, 0, 0.3);
            display: flex;
            align-items: center;
            justify-content: center;
            pointer-events: none;
            opacity: 0;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            height: 100vh;
            width: 100vw;
            transition: opacity 0.3s ease;
            overflow: auto;
            overflow: scroll;
            z-index: 2000;
        }

        .show {
            pointer-events: auto;
            opacity: 1;
        }

        .vent_sesion {
            margin: auto;
            position: relative;
            background-color: rgba(255, 255, 255);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.9);
        }

        .container-historia {
            background-image: url(historia.jpg);
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            height: 200px;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
        }

        .container-objetivo {
            background-image: url(objetivo.jpg);
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            height: 200px;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
        }

        .container-son {
            word-wrap: break-word;
            width: 600px;
            height: 350px;
            padding: 20px;
            overflow: auto;
        }
     



        @media (max-width:768px) {
            .container-son {
                width: 320px;
            }
            .carousel {
        width: 100%;  /* En pantallas pequeñas, ocupa todo el ancho */
    }
        }

        .btn_cerrar {
            position: absolute;
            top: -20px;
            right: -20px;
            z-index: 1;
            border: none;
            cursor: pointer;
        }

        .btn_cerrar svg {
            background: white;
            border-radius: 50px;
        }

        .box-body {
            display: flex;
            justify-content: center;
            margin: 0 auto;
            padding: 30px;
        }

        @media (max-width:400px) {
            .card-novedades {
                margin: 30px 0;
            }
        }

        .imagen-card {
            width: 100%;
            height: 300px;
            object-fit: cover;
        }

        #mi-carousel {
            width: 100vw;
            height: 90vh;
        }

        @media (max-width:768px) {
            .carousel-inner img {
                height: 20vh;
            }
        }

        .carousel-inner,
        .item-active,
        .item- {
            width: 100%;
            height: 100%;
        }

        .item-active,
        .item img {
            width: 100%;
            height: 100%;
        }

        .overlay {
            color: #fff;
            position: absolute;
            z-index: 12;
            top: 10%;
            left: 0;
            width: 100%;
            text-align: left;
        }

        #present,
        .title {
            text-shadow: 0 0 0.2em #87F, 0 0 0.2em #87F;
            font-size: 4vw;
            width: 40%;
            text-align: center;
            position: absolute;
            top: 40%;
            left: 30%;
            z-index: 1000;
            color: #fff;
        }

        .title {
            top: 25%;
            font-size: 3vw;
            text-align: center;
        }

        #present::after {
            content: "";
            border-left: 3px solid #fff;
            height: 100%;
            animation: write 2s infinite alternate steps(14);
        }

        .bottonAutoScroll {
            width: 30%;
            position: absolute;
            bottom: 5%;
            left: 40%;
            color: #fff;
        }

        .hero__scroll {
            position: absolute;
            text-align: center;
            bottom: 60px;
            width: 200px;
            margin: auto;
            display: block;
            cursor: pointer;
            padding-bottom: 40px;
            left: 0;
            right: 0;
            text-transform: uppercase;
        }

        .hero__scroll .chevron {
            margin-top: 20px;
            display: block;
            -webkit-animation: pulse 2s infinite;
            animation: pulse 2s infinite;
            color: #FF4081;
        }

        .chevron::before {
            border-style: solid;
            border-width: 0.25em 0.25em 0 0;
            content: '';
            display: inline-block;
            height: 20px;
            position: relative;
            -webkit-transform: rotate(-45deg);
            -ms-transform: rotate(-45deg);
            transform: rotate(-45deg);
            vertical-align: top;
            width: 20px;
        }

        .chevron.right:before {
            left: 0;
            -webkit-transform: rotate(45deg);
            -ms-transform: rotate(45deg);
            transform: rotate(45deg);
        }

        .chevron.bottom:before {
            top: 0;
            -webkit-transform: rotate(135deg);
            -ms-transform: rotate(135deg);
            transform: rotate(135deg);
        }

        .chevron.left:before {
            left: 0.25em;
            -webkit-transform: rotate(-135deg);
            -ms-transform: rotate(-135deg);
            transform: rotate(-135deg);
        }

        i {
            text-align: center;
        }

        #cuerpoCartel {
            margin-left: -100%;
            margin-top: -100%;
        }

        @-webkit-keyframes pulse {
            0% {
                -webkit-transform: translate(0, 0);
                transform: translate(0, 0);
            }

            50% {
                -webkit-transform: translate(0, 10px);
                transform: translate(0, 10px);
            }

            100% {
                -webkit-transform: translate(0, 0);
                transform: translate(0, 0);
            }
        }

        @keyframes  pulse {
            0% {
                -webkit-transform: translate(0, 0);
                transform: translate(0, 0);
            }

            50% {
                -webkit-transform: translate(0, 10px);
                transform: translate(0, 10px);
            }

            100% {
                -webkit-transform: translate(0, 0);
                transform: translate(0, 0);
            }
        }

        @keyframes  write {
            from {
                width: 100%;
            }

            to {
                width: 0;
            }
        }

        .news,
        .news:hover {
            text-decoration: none;
            color: white;
        }
    </style>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <div id="demo" class="carousel slide" data-bs-ride="carousel">

        <!-- Indicators/dots -->
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
            <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
        </div>

        <!-- The slideshow/carousel -->
        <div class="carousel-inner">

            
            <div class="carousel-item active" >
    <img src="sede.jpg" class="d-block w-100">
</div>
<div class="carousel-item">
<img src="collage1.jpg" class="d-block w-100">
</div>
<div class="carousel-item">
    <img src="collage2.jpg" class="d-block w-100">
</div>

        <span class="hero__scroll aos-init aos-animate bottonAutoScroll" data-aos="fade-up" data-aos-easing="ease"
            data-aos-delay="590">
            
            <h1>ISFT Nº 38</h1>
            
            <a class="news d-none d-md-block" href="#labor_pedagogica">
                <i class="chevron bottom"></i></a>
        </span>
        <script>
            var h22 = document.getElementById('present');
            var cuerpoCartel = document.getElementById('cuerpoCartel');
            console.log("h22", h22);
            let write = (texto = '', etiqueta = '') => {
                let arrfromstr = texto.split('');
                let i = 0;
                let j = texto.length;
                etiqueta.innerHTML = '';
                let printstr = setInterval(function() {
                    if (i === arrfromstr.length) {
                        etiqueta.innerHTML = texto.substring(0, j);
                        j--;
                        if (j === 1) {
                            etiqueta.innerHTML = '';
                            i = 0;
                            j = texto.length;
                        }
                    } else {
                        etiqueta.innerHTML += arrfromstr[i];
                        i++;
                    }

                }, 200);
            };

            write(cuerpoCartel.innerHTML, h22);
        </script>
        <!-- Left and right controls/icons -->
        <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>

    

    <!--Fin Novedades -->


    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>

    <script type="text/javascript">
        const btn_sesion = document.getElementById('btn_sesion');
        const btn_sesion2 = document.getElementById('btn_sesion2');
        const sesion = document.getElementById('sesion');
        const sesion2 = document.getElementById('sesion2');
        const btn_cerrar = document.getElementById('btn_cerrar');
        const btn_cerrar2 = document.getElementById('btn_cerrar2');
        const texto_objetivo = document.getElementById('texto-card-objetivo');

        btn_sesion.addEventListener('click', () => {
            sesion.classList.add('show');
        });

        btn_cerrar.addEventListener('click', () => {
            sesion.classList.remove('show');
        });

        btn_sesion2.addEventListener('click', () => {
            sesion2.classList.add('show');
        });

        btn_cerrar2.addEventListener('click', () => {
            sesion2.classList.remove('show');
        });


        window.document.onload()
        texto_objetivo.trimStart();
    </script>
    <br>
    <div id="labor_pedagogica">
        <div class="titulo">
            <h1 data-aos="zoom-in-up" class="text-dark">NOSOTROS</h1>
        </div>
        <div class="container">

            <br>
            <?php $__currentLoopData = $historias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $historia): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php echo $historia->historia; ?>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <br>
            <?php $__currentLoopData = $objetivos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $objetivo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php echo $objetivo->objetivo; ?>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </div>
    </div>


    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\User\Desktop\freelance\isft38\resources\views/frontend/nosotros/index.blade.php ENDPATH**/ ?>