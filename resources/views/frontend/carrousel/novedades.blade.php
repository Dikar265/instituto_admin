    @extends('frontend.layout.main')

    @section('content')
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Instagram Feed</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        <style>
            body {
                background-color: white;
                color: #333;
            }

            .container {
                padding-top: 20px;
                padding-bottom: 20px;
            }

           .instagram-carousel {
                margin: 0 -10px;
            }

            .instagram-carousel .card-instagram {
                padding: 2px;
                margin: 5px 5px;
                border-radius: 5px;
                border: 1px solid #ccc;
                min-height: 500px;
                width: 350px;
                background-color: #fff;
                box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.60); 
                position: relative;
                overflow: hidden;
            }

            /* Estilo para las flechas del carrusel */
            .slick-prev,
            .slick-next {
                width: 40px;
                height: 40px;
                background-color: rgba(0, 0, 0, 0.5);
                /* Color de fondo */
                border-radius: 50%;
                /* Forma de círculo */
                display: flex;
                justify-content: center;
                align-items: center;
                z-index: 1;
            }

            /* Alineación de las flechas */
            .slick-prev {
                left: -35px;
                /* Ajusta la posición horizontal */
            }

            .slick-next {
                right: -35px;
                /* Ajusta la posición horizontal */
            }

            /* Estilo del icono dentro de las flechas */
            .slick-prev:before,
            .slick-next:before {
                font-family: 'Font Awesome 5 Free';
                font-weight: 900;
                font-size: 20px;
                color: white;
                /* Color del icono */
            }

            /* Icono de la flecha izquierda */
            .slick-prev:before {
                content: '\f104';
                /* Unicode de la flecha izquierda de FontAwesome */
            }

            /* Icono de la flecha derecha */
            .slick-next:before {
                content: '\f105';
                /* Unicode de la flecha derecha de FontAwesome */
            }

            .card-body-instagram {
                padding: 0;
                width: 100%;
                display: flex;
                flex-direction: column;
            }


            .card-text-instagram{
                color: black;
                font-size: 15px;
                /*text-transform: lowercase;*/
                margin-left: 5px;
            }
            .card-text-instagram a {
                font-size: 14px;
                color: #EA2121;
                text-decoration: none;
                text-transform: none;
                /* Asegúrate de que el texto no se convierta en mayúsculas */
            }

            .card-text-instagram a:hover {
                text-decoration: underline;
            }
            

            .media-wrapper {
                margin-bottom: 15px;
                width: 100%;
                height: 300px;
                border-radius: 3px;
                overflow: hidden;
                display: flex;
                justify-content: center;
                align-items: center;
            }

            .media-wrapper img,
            .media-wrapper video {
                width: 350px;
                height: 300px;
                object-fit: cover;
            }

            .top-info {
                background-color: #fff;
                border-bottom: 1px solid #ccc;
                display: flex;
                justify-content: space-between;
                align-items: center;
                /* Centra verticalmente los elementos */
            }

            .instagram-info {
                font-size: 14px;
                color: #666;
            }

            .instagram-logo {
                font-size: 20px;
                /* Ajusta el tamaño del ícono si es necesario */
                color: #666;
                display: flex;
                align-items: center;
                /* Centra verticalmente el ícono */
            }

            .instagram-logo:hover {
                text-decoration: none;
                color: #EA2121;
                /* Color del ícono al pasar el ratón */
                border-color: #EA2121;
                /* Color del borde al pasar el ratón */
            }


            .instagram-carousel-inner {
                position: relative;
                width: 100%;
                height: 350px;
                overflow: hidden;
                display: flex;
                justify-content: center;
                align-items: center;
            }

            .instagram-carousel-inner img,
            .instagram-carousel-inner video {
                width: 350px;
                height: 350px;
                object-fit: cover;
            }

            .instagram-carousel-inner .slick-slide {
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100%;
            }

            .instagram-carousel-inner .slick-dots {
                position: absolute;
                bottom: 15px;
                left: 50%;
                transform: translateX(-50%);
                margin: 0;
                padding: 0;
                list-style: none;
                display: flex;
                justify-content: center;
                z-index: 2;
            }

            .instagram-carousel-inner .slick-dots li {
                margin: 0 5px;
            }

            .instagram-carousel-inner .slick-dots li button {
                border: none;
                background: none;
                cursor: pointer;
            }

            .instagram-carousel-inner .slick-dots li button:before {
                font-size: 8px;
                color: #666;
                /* Color de los dots */
                opacity: 0.75;
            }

            .instagram-carousel-inner .slick-dots li.slick-active button:before {
                opacity: 1;
                color: #EA2121;
            }

            .card-buttons-instagram {
                width: 100%;
                margin-bottom: 10px;
                display: flex;
                justify-content: space-between;
            }

            .icons-left {
                display: flex;
                justify-content: space-between;
            }






            .btn-icon {
                display: flex;
                justify-content: center;
                align-items: center;
            }

            .btn-icon:hover {
                color: #EA2121;
                /* Color del ícono al pasar el ratón */
                border-color: #EA2121;
                /* Color del borde al pasar el ratón */
                text-decoration: none;
            }

            .btn-icon:not(.share) {
                margin-right: 20px;
                /* Espacio entre los íconos de like y comentario */
            }

            .card-buttons-instagram .share {
                margin-left: auto;
                /* Empuja el botón de compartir hacia la derecha */
            }


            .info img {
                width: 28px;
                padding: 2px;
                background: rgb(249,243,0);
    background: linear-gradient(58deg, rgba(249,243,0,1) 0%, rgba(221,115,0,1) 21%, rgba(255,206,0,1) 35%, rgba(232,0,238,1) 63%, rgba(208,95,255,1) 74%, rgba(255,17,149,1) 84%, rgba(255,103,0,1) 100%);
            }

            .info {
                display: flex;
                margin-bottom: 10px;
            }

            .name {
                font-size: 15px;
            }

            .timestamp {
                margin-top: 3px;
                font-size: 12px;
                color: #ababab;
                margin-left: 5px;
            }

            .user-name {
                display: flex;
                flex-direction: column;
                margin-left: 10px;
            }

            .username {
                font-size: 12px;
                color: #ababab;

            }

            .header-card-instagram{
                width: 100%;
                display: flex;
                justify-content: space-between;
                margin-top: 15px;
                margin-left: 5px;
            }

            p{
                margin: 0;
                padding: 0;
            }

            .slick-prev:hover,
            .slick-next:hover {
                background-color: #666;
            }

    .video-container {
        height: 90vh;
        overflow: hidden;
        position: relative; /* Necesario para el texto absoluto */
        margin-bottom: 3vh;
        padding-bottom: 3vh;
    }

    video {
        height: 100%;
        width: 100%;
        object-fit: cover;
    }
    .welcome-text {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        font-family: Verdana, Arial, Helvetica, sans-serif;

        font-size: 36px; /* Tamaño de letra */
        color: white; /* Color de texto */
        text-align: center; /* Centrar texto */
        font-weight: bold; /* Negrita para resaltar */
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7); /* Sombra para mejor legibilidad */
        padding: 20px;
        background: rgba(128, 0, 0, 0.5); /* Fondo blanco semi-transparente para el formulario */

        border-radius: 10px; /* Bordes redondeados */
    }

    @media (max-width: 768px) {
        .video-container {
            height: 50vh; /* Reduce el alto del video en móviles */
            margin-bottom: 0px;
            padding-bottom: 0px;
        }
        .welcome-text {
            font-size: 3vw; /* Aumenta el tamaño en pantallas más pequeñas */
            padding: 3vw;
        }
    }
        /* Para pantallas pequeñas (móviles) */
    @media (max-width: 480px) {
            .video-container {
            height: 30vh; /* Reduce el alto del video en móviles */
            margin-bottom: 0px;
            padding-bottom: 0px;
        }
        .welcome-text {
            font-size: 5vw; /* Aumenta más para que sea legible en móviles */
            padding: 2vw;
            max-width: 90%; /* Se asegura que el texto no ocupe todo el ancho */
           margin-top: 0%;
        }

        video {
            width: 100%; /* Asegura que el video se ajuste a la pantalla en móviles */
            height: auto;
        }


    }

        .icon-dots {
            padding-right: 5px;
        }

        </style>
    </head>
    <body>
    	<div class="video-container">
    	    	<video class="col-12" width="auto" height="auto"  autoplay loop muted>
      <source src="video.mp4" type="video/mp4">
      <source src="video.ogg" type="video/ogg">
      Video no soportado por su navegador.
    </video>
        <div class="welcome-text">Instituto Superior de Formación Técnica N° 38</div> <!-- Texto añadido -->
    </div>
        
    </div>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
        <script>
            $(document).ready(function(){
                $('.instagram-carousel').slick({
                    slidesToShow: 4,
                    slidesToScroll: 2,
                    dots: true,
                    infinite: true,
                    arrows: true,
                    autoplay: true,
                    autoplaySpeed: 6000,
                    prevArrow: '<button type="button" class="slick-prev"></button>',
                    nextArrow: '<button type="button" class="slick-next"></button>',
                    responsive: [
                        {
                            breakpoint: 1150,
                            settings: {
                                slidesToShow: 3,
                                slidesToScroll: 1,
                                dots: true,
                                arrows: true
                            }
                        },
                        {
                            breakpoint: 850,
                            settings: {
                                slidesToShow: 2,
                                slidesToScroll: 1,
                                dots: true,
                                arrows: true
                            }
                        },
                        {
                            breakpoint: 600,
                            settings: {
                                slidesToShow: 1,
                                slidesToScroll: 1,
                                dots: false,
                                arrows: true
                            }
                        }
                    ]
                });

                setTimeout(function() {
                    $('.instagram-carousel-inner').slick({
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        infinite: true,
                        arrows: false,
                        dots: true,
                    });
                }, 1000);
            });
        </script>
    </body>
    </html>
    @endsection
