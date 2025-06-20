		@extends('frontend.layout.main')
		@section('content')
		    <style>
		        /* * {
		                                            overflow-x: hidden;
		                                          } */
		.textohome{
		    font-size: 28px;
		  text-transform: none;
		    font-family: helvetica;
		    text-align: right;
		   white-space: nowrap;
		   padding: 0px;
		   /*margin-left: 500px;*/
		   margin-left: 60vh;
		   margin-bottom: 210px;


		}

		/*.sliding-text-container {
		    position: absolute;
		    top: 140px;
		    left: 80px;
		    width: 100%;
		    text-align: left;
		    overflow: hidden;
		}*/

		        .sliding-text-container {
		            position: absolute;
		            top: 50%;
		            left: 50%;
		            transform: translate(-50%, -50%);
		            text-align: left;
		            color: #fff;
		            width: 100%;
		            overflow: hidden;
		            z-index: 1;
		            text-align: left;
		        }

		/*.sliding-text {
		    display: inline-block;
		    white-space: nowrap;
		    font-size: 60px;
		    color: #fff;
		    animation: slide-in 3s forwards;
		}*/

		.sliding-text {
		    display: inline-block;
		    white-space: nowrap;
		    font-size: 1rem;
		    color: #fff;
		    animation: slide-in 3s forwards;
		        }


		@keyframes slide-in {
		    0% {
		        transform: translateX(-100%); /* Comienza fuera de la pantalla */
		    }
		    100% {
		        transform: translateX(0); /* Termina visible en la pantalla */
		    }
		}

		.carousel-inner::before {
		            content: "";
		            position: absolute;
		            top: 0;
		            left: 0;
		            width: 100%;
		            height: 100%;
		            background-color: rgba(0, 0, 0, 0.5); /* Fondo oscuro para resaltar el texto */
		            z-index: 0;
		        }

		 /* Estilo para el texto y botón en la parte superior derecha */
		        .top-right-text {
		            position: absolute;
		            top: 20px;
		            right: 20px;
		            color: white;
		            text-align: right;
		            z-index: 2;
		        }

		        .top-right-text p {
		            font-size: 1.5rem;
		            margin-bottom: 1rem;
		        }

		        .inscribite {
		            border: 2px solid rgb(0, 0, 0);
		            border-radius: 50px;
		            background-color: transparent;
		            color: rgb(0, 0, 0);
		            padding: 0.75rem 1.5rem;
		            font-size: 1.25rem;
		            cursor: pointer;
		            text-align: center;
		            transition: background-color 0.3s ease, color 0.3s ease;
		            display: inline-block;
		        }

		@media (max-width: 480px)  {
		    .titulo-cronograma {
		        font-size: 28px !important; /* Tamaño de fuente reducido para pantallas medianas */
		    }

		    .sliding-text {
		        font-size: 2.25rem; /* Tamaño de texto más pequeño para pantallas pequeñas */
		    }

		    .sliding-text-container {
		        margin-right: 520px;
		        margin-left: -30px;
		        top: 35px; /* Ajuste de posición para pantallas pequeñas */
		        text-align: center;

		    }

		    .textohome {
		        font-size: 8px;
		        margin-left: 145px; /* Reduce más el margen izquierdo */
		        margin-bottom: -50px;

		    }
		    .textohome .p {
		        margin-bottom: -20px;
		    }
	/*	     .inscribite {
		        font-size: 8px !important;
		        padding: 2px 2px !important;

		        max-width: 100px;
		        display: block !important;
		        width: 97% !important;
		        margin-left: 70px !important;
		        margin-bottom: 20px;
		        margin-top: -10px;
		    } */

		    .inscribite {
		        font-size: 8px !important; /* Asegúrate de que el tamaño de la fuente se reduzca */
		        padding: 2px 2px !important; /* Reduce el espaciado del botón */
		        /* margin: 0 auto !important; */ /* Asegura que el margen sea cero y el botón esté centrado */
		        max-width: 100px; /* Limita el tamaño máximo del botón */
		        display: block !important; /* Forza el comportamiento de bloque */
		        width: 97% !important; /* Ajusta el ancho para que se adapte al contenido */
		        /*margin-left: 70px !important;*/
		        margin-bottom: 20px;
		        margin-top: -10px;
		    }

		    .textoinscribite {

		        font-size: 7px !important; /* Asegura que el texto dentro del botón también se reduzca */
		    }
		    .camino{
		        margin-bottom: 0px;
		        margin-top: 15px;
		        margin-left: 37px;
		    }
		    .click{
		        margin-left: 44px !important;


		    }
		}

		@media (max-width: 390px)  {
		    .titulo-cronograma {
		        font-size: 28px !important; /* Tamaño de fuente reducido para pantallas medianas */
		    }

		    .sliding-text {
		        font-size: 2rem; /* Tamaño de texto más pequeño para pantallas pequeñas */
		    }

		    .sliding-text-container {
		        margin-right: 550px;
		        margin-left: -30px;
		        top: 35px; /* Ajuste de posición para pantallas pequeñas */
		        text-align: left;
		        left:60%;
		    }

		    .textohome {
		        font-size: 8px;
		        margin-left: 145px; /* Reduce más el margen izquierdo */
		        margin-bottom: -50px;

		    }
		    .textohome .p {
		        margin-bottom: -20px;
		    }
		    .inscribite {
		        font-size: 8px !important; /* Asegúrate de que el tamaño de la fuente se reduzca */
		        padding: 2px 2px !important; /* Reduce el espaciado del botón */
		        /* margin: 0 auto !important; */ /* Asegura que el margen sea cero y el botón esté centrado */
		        max-width: 100px; /* Limita el tamaño máximo del botón */
		        display: block !important; /* Forza el comportamiento de bloque */
		        width: 97% !important; /* Ajusta el ancho para que se adapte al contenido */
		        /*margin-left: 70px !important;*/
		        margin-bottom: 20px;
		        margin-top: -10px;
		    }

		    .textoinscribite {

		        font-size: 7px !important; /* Asegura que el texto dentro del botón también se reduzca */
		    }
		    .camino{
		        margin-bottom: 0px;
		        margin-top: 15px;
		        margin-left: 37px;
		    }
		    .click{
		        margin-left: 44px !important;


		    }
		}
		/* Ajustes específicos para 390 x 844 (pantallas más grandes) */
		@media (min-width: 361px) and (max-width: 390px) {
		    .titulo-cronograma {
		        font-size: 25px !important; /* Ajuste para 390 x 844 */
		    }
		    .sliding-text {
		        font-size: 5rem;
		    }
		    .sliding-text-container {
		        margin-right: 280px;
		        margin-left: -30px;
		        top: 28px;
		        text-align: left;
		    }
		    .textohome {
		        font-size: 9px;
		        margin-left: 100px;
		        margin-bottom: -20px;
		    }

		    .inscribite {
		        font-size: 8px !important; /* Asegúrate de que el tamaño de la fuente se reduzca */
		        padding: 2px 2px !important; /* Reduce el espaciado del botón */
		        /* margin: 0 auto !important; */ /* Asegura que el margen sea cero y el botón esté centrado */
		        max-width: 100px; /* Limita el tamaño máximo del botón */
		        display: block !important; /* Forza el comportamiento de bloque */
		        width: 97% !important; /* Ajusta el ancho para que se adapte al contenido */
		        /*margin-left: 70px !important;*/
		        margin-bottom: 20px;
		        margin-top: -10px;
		    }

		    .camino {
		        margin-bottom: 5px;
		        margin-top: 12px;
		        margin-left: 30px;
		    }
		    .click {
		        margin-left: 35px !important;
		    }
		}
		/*.inscribite {
		    border: 2px solid white;
		    border-radius: 20px;
		    background-color: transparent;
		    color: white;
		    padding: 10px 20px;
		    font-size: 16px;
		    cursor: pointer;
		    text-align: center;
		    display: inline-block;
		    transition: background-color 0.3s ease, color 0.3s ease;
		    margin-left: 170px;
		}*/

		/* Efecto al pasar el cursor */
		/*.inscribite:hover {
		    background-color: white;
		    color: #700101;
		}
		.textoinscribite:hover {
		    color: #700101;
		}*/


		 @media (min-width: 1024px) {
		            .sliding-text {
		                font-size: 4rem;
		            }
		             }

		 @media (max-width: 1023px) {
		            .sliding-text {
		                font-size: 3rem;
		            }
		             }

		 @media (max-width: 768px) {
		            .sliding-text {
		                font-size: 2rem;
		            }

		            .top-right-text p {
		                font-size: 1rem;
		            }

		            .inscribite {
		                font-size: 1rem;
		                padding: 0.5rem 1rem;
		            }
		        }

		        @media (max-width: 480px) {
		            .sliding-text {
		                font-size: 1.0rem;
		            }

		            .top-right-text p {
		                font-size: 0.675rem;
		            }

		            .inscribite {
		                font-size: 0.675rem;
		                padding: 0.5rem 1rem;
		            }
		        }

		  .inscribite:hover {
		            background-color: white;
		            color: #700101;
		        }

		        .inscribite a {
		            text-decoration: none;
		            color: inherit;
		        }

		        .containerss {
		            display: flex;
		            flex-direction: column;
		            width: 100%;
		            padding: 30px;
		            margin: 0 auto;
		            justify-content: center;
		        }

		        .titulo h1 {
		            text-align: center;
		            color: white;
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


		/* prueba */
		.arrow {
		  background-color: #4CAF50; /* Color de fondo de la sección */
		  color: white;
		  padding: 20px;
		  text-align: center;
		  position: relative;
		  margin: 50px 0;
		  clip-path: polygon(0 0, 100% 0, 100% 80%, 50% 100%, 0 80%);
		  /* polygon crea la forma de la flecha */
		}

		.arrow{
		  margin: 0;
		}

		.arrow-section {
		  background-color: #4CAF50; /* Color de fondo de la sección */
		  color: white;
		  padding: 20px;
		  text-align: center;
		  position: relative;
		  margin: 50px 0;
		  clip-path: polygon(0 0, 100% 0, 100% 100%, 30% 100%, 0 50%);
		  /* polygon crea la forma de la flecha hacia la derecha */
		}

		.arrow-section h2 {
		  margin: 0;
		}


		.arrow-derecha {
		  background-color: #4CAF50; /* Color de fondo de la sección */
		  color: white;
		  padding: 20px;
		  text-align: center;
		  position: relative;
		  margin: 50px 0;
		  clip-path: polygon(100% 0, 100% 100%, 0 100%, 0 50%, 50% 50%);
		  /* polygon crea la forma de la flecha hacia la izquierda */
		}

		.arrow-derecha h2 {
		  margin: 0;
		}

		.titulos{
		    background: linear-gradient(30deg, transparent 0%, #FF5252 0%,#FF5252 90%,transparent 5%);
		    position: relative;
		    outline: none; /* Elimina el outline del elemento */

		}


		.flecha-container {
			position: relative;
		    display: block;
		    width: 600px;
		    height: 400px;
		}

		.text{
		 	display: block;
		 	border: 1px solid red;
		    background-color: red;
		    color: white;
		 	padding: 2rem;
		 	margin-top: 2rem;
		 	width: 50%;
		}

		        /* secciones */

		        .fondotituloinicio{
		             /* background-color: #700101; */
		             width: 35%;
		            margin-top: 50px;
		            margin-bottom: 0px;
		            background: linear-gradient(30deg, transparent 0%, #700101 0%,#700101 77%,transparent 5%);
		    position: relative;
		    outline: none; /* Elimina el outline del elemento */


		        }
		        .fondotituloinicio2{
		            /* background-color: #700101; */
		            width: 35%;
		            margin-top: 50px;
		            margin-bottom: 0px;
		            background: linear-gradient(30deg, transparent 0%, #700101 0%,#700101 77%,transparent 5%);
		    position: relative;
		    outline: none; /* Elimina el outline del elemento */

		        }

		        .fondoinicio{
		            background-color: #700101;

		            padding: 50px 10px 0px 10px;

		            font-family: "Inter", sans-serif;

		        }

		.tituloinicio1{
		    padding: 20px;
		    margin-left: 3%;
		    font-size: 180%;
		    margin-top: 30px ;
		margin-bottom: 30px ;
		color: white;
		 }

		.tituloinicio{
		    font-size: 200%;
		padding: 20px;
		margin-left: 16%;
		margin-top: 30px ;
		margin-bottom: 0px ;
		color: white;
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

		        /* From uiverse.io by @alexmaracinaru */
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

		            .fondotituloinicio,
		    .fondotituloinicio2 {
		        width: 100%; /* Ajusta el ancho en pantallas más pequeñas */
		        margin-left: 0;
		        margin-right: 0; /* Centra el div en pantallas pequeñas */
		    }

		    .tituloinicio {
		        margin-left: 10%; /* Ajusta el margen en pantallas pequeñas */
		       /*  text-align: center; */ /* Centra el texto */
		    }
		    .tituloinicio1 {
		        margin-left: 2%;
		        font-size: 130%;
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
		/* flecha autoscroll */
		        .hero__scroll .chevron {
		            margin-top: 20px;
		            display: block;
		            -webkit-animation: pulse 2s infinite;
		            animation: pulse 2s infinite;
		            color: #38884A;
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

		        @keyframes pulse {
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

		        @keyframes write {
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






		        /* NOVEDADES CSS */


		/* swiper card  */

		.card {
		        border: none;
		        border-radius: 15px;
		        overflow: hidden;
		        transition: transform 0.3s ease, box-shadow 0.3s ease;

		    }

		    .card:hover {
		        transform: translateY(-10px);
		        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
		    }


		    .card-body {
		        padding: 1.25rem;

		    }

		    .card-title {
		        font-size: 1.25rem;
		        font-weight: 600;
		    }

		    .card-text {
		        color: #555;
		    }

		    .btn-outline-primary {
		        border-radius: 20px;
		        padding: 0.5rem 1rem;
		        transition: background-color 0.3s ease, color 0.3s ease;
		    }

		    .btn-outline-primary:hover {
		        background-color: #007bff;
		        color: #fff;
		    }

		    .badge-success {
		        background-color: #28a745;
		    }
		    .tarjeta-carousel .carousel-inner img {
		    border-radius: 15px;
		    width: 100%; /* Ajusta el ancho de las imágenes */
		    height: 100%; /* Ajusta la altura si es necesario */
		    object-fit: cover; /* Asegura que las imágenes se ajusten bien dentro del contenedor */
		}

		/* Controladores del carousel de noticias */
		.tarjeta-carousel .carousel-control-prev-icon,
		.tarjeta-carousel .carousel-control-next-icon {
		    background-color: rgba(0, 0, 0, 0.5); /* Cambia el color de fondo de los iconos de navegación */
		    border-radius: 50%; /* Redondea los iconos si es necesario */
		}

		.tarjeta-carousel .carousel-control-prev,
		.tarjeta-carousel .carousel-control-next {
		    width: 5%; /* Ajusta el tamaño de los botones de navegación */
		}
		/*
		fin swiper card */





		.name{
		  font-size: 18px;
		  font-weight: 500;
		  color: #333;
		}



		.slide-content{
		  margin: 0 40px;

		}

		.contenedornoticias{
		  min-height: 100vh;
		 display: flex;
		 align-items: center;
		 justify-content: center;
		 background-color: #FFFF;
		}
		.image-content, .card-content{
		display: flex;
		flex-direction: column;
		align-items: center;
		padding: 10px 14px;
		}
		.image-content{
		  padding: 25px 0;
		  row-gap: 5px;
		  position: relative;
		}



		.button{
		  border:none;
		  font-size: 16px;
		  color: #fff;
		  padding: 8px 16px ;
		  background-color: #750000;
		  border-radius: 5px;
		  /*margin: 14px;*/
		  cursor: pointer;
		  transition: all 0.3s ease;
		}
		.button:hover{
		  background-color: #e14b2f;
		}


		/*
		cronograma  */
		/* Contenedor de las cards */


		/* Estilo para cada card */


		/* Imagen de la card */





		@media (max-width: 767.98px) { /* Para pantallas pequeñas */
		    .card-container .row {
		        margin-right: 0;
		        margin-left: 0;
		    }

		    .card-container .col-sm-12 {
		        padding-right: 0;
		        padding-left: 0;
		    }

		    .card {
		        margin-right: 0;
		        margin-left: 0;
		    }
		}

		/* lo nuevo */
		   .carousel-inner img {
		            width: 100%;
		            height: auto;
		        }

		         /* Superponer el texto sobre la imagen */
		        .carousel-item {
		            position: relative;
		        }


		    </style>

		    <!-- Required meta tags -->
		    <meta charset="utf-8">
		    <meta name="viewport" content="width=device-width, initial-scale=1">


		<!-- Carousel -->
		    <div id="demo" class="carousel slide" data-bs-ride="false">
		        <div class="carousel-inner">
		            <div class="carousel-item active">
		                <img src="https://sjb-lasalle.edu.pe/imgs/vision-mision-instituto-san-juan-bautista-la-salle-juliaca-puno.JPG" alt="Imagen de portada 5" class="d-block w-100">
		                <!-- Sliding text overlay -->
		                <div class="sliding-text-container">
		                    <span class="sliding-text">Bienvenidos al Instituto</span>
		                </div>

		                <!-- Texto y botón en la esquina superior derecha -->
		                <div class="top-right-text" style="color: #000000">
		                    <p>Tu camino hacia el éxito<br>comienza con un click.</p>
		                    <button class="inscribite">
		                        <a href="">Inscribite</a>
		                    </button>
		                </div>
		            </div>

		            <div class="carousel-item">
		                <img src="https://lazosdeoro.pe/wp-content/uploads//2019-03-19-1-1024x768.jpg" alt="Imagen de portada" class="d-block w-100">
		                <!-- Sliding text overlay -->
		                <div class="sliding-text-container">
		                    <span class="sliding-text">Bienvenidos al ISFT N° 38</span>
		                </div>

		                <!-- Texto y botón en la esquina superior derecha -->
		                <div class="top-right-text" style="color: #000000">
		                    <p cka>Tu camino hacia el éxito<br>comienza con un click.</p>
		                    <button class="inscribite" style="color: #000000; background-color:#000000">
		                        <a href="">Inscribite</a>
		                    </button>
		                </div>
		            </div>
		        </div>
		    </div>




		    <!-- Card 1
		    <div class="card-cronograma">

		        <img src="agenda.png" alt="Imagen de Cursada" class="card-img">

		        <h3 class="titulo-cronograma">Inicio y finalización de Cursada por Cuatrimestres</h3>

		        <div class="card-info">
		            <p>

		                Inscripciones Ingreso 1º año: 01/12/23 al 28/12/23 y 14/02/24 al 08/03/24 (Presencial)<br><br>

		                Inscripciones Cursada 2º y 3º año: 01/03 al 08/03 (Presencial)<br><br>

		                Trayecto Instroducción al Nivel Superior: 11/03 al 27/03<br><br>

		                Periodo Primer Cuatrimestre: 03/04 al 12/07<br><br>

		                Receso Invernal: 15/07 al 26/07<br><br>

		                Periodo Segundo Cuatrimestre: 12/08 al 22/11<br><br>

		                Acto Finalización de Cursada: 18, 19 o 20/12 según disposición regional.
		            </p>
		        </div>
		    </div>

		     Card 2
		    <div class="card-cronograma">
		        <img src="examenportada.png" alt="Imagen de Inscripciones" class="card-img">
		        <h3  class="titulo-cronograma">Inscripciones a Cursada y Mesas de Exámenes Finales</h3>
		        <div class="card-info">
		            <p>

		                Inscripciones Cursada 2º y 3º año: 01/03 al 08/03 (Presencial)<br><br>

		                Trayecto Instrucción al Nivel Superior: 11/03 al 27/03<br><br>

		                Inscripciones a Exámenes Turno Agosto: 24/06 al 28/06 22h (Virtual)<br><br>

		                Mesas de Exámenes Turno Agosto - Recuperatorios Pendientes: 29/07 al 09/08<br><br>

		                Inscripciones a Exámenes Finales Turno Nov – Dic: 01/11 al 10/11<br><br>

		                Periodo de Coloquios (Promociones): 11/11 al 15/11<br><br>

		                Instancias de Regularizadores (Regularizados se inscriben en SEGUNDO LLAMADO): 18/11 al 22/11<br><br>

		                Mesas de Exámenes Finales Turno Nov – Dic: 26/11 al 06/12 y 09/12 al 20/12<br><br>

		                Inscripciones a Exámenes Finales Turno Feb - Marzo 2025: 09/12 al 15/12 22h (Virtual)<br><br>

		                Finalización de Actividades: 27/12<br><br>

		                Pre-Inscripciones Ingreso 1º año 2025: 01/11/24 al 07/03/25 (Virtual con turno)<br><br>

		                Mesas de Exámenes Finales Febrero - Marzo 2025: 17/02 al 28/02 y 03/03 al 14/03
		            </p>
		        </div>
		    </div> -->
		</div>


		    </div>






		            <!--Inicio Novedades -->




		        <!-- <div id="novedades" class="row">
		                @foreach ($novedades as $novedad)
		                <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="100">
		                    <div class="card h-100 shadow-sm border-0">
		                        <div id="carousel{{ $novedad->id }}" class="carousel slide" data-bs-ride="carousel" data-bs-interval="12500">
		                            <div class="carousel-inner">
		                                @if ($novedad->imagen)
		                                <div class="carousel-item active">
		                                    <img src="{{ asset('./storage/' . $novedad->imagen) }}" alt="...">
		                                </div>
		                                @endif
		                                @if ($novedad->imagen2)
		                                <div class="carousel-item">
		                                    <img src="{{ asset('./storage/' . $novedad->imagen2) }}" alt="...">
		                                </div>
		                                @endif
		                                @if ($novedad->imagen3)
		                                <div class="carousel-item">
		                                    <img src="{{ asset('./storage/' . $novedad->imagen3) }}" alt="...">
		                                </div>
		                                @endif
		                            </div>
		                            <button class="carousel-control-prev" type="button" data-bs-target="#carousel{{ $novedad->id }}" data-bs-slide="prev">
		                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
		                                <span class="visually-hidden">Previous</span>
		                            </button>
		                            <button class="carousel-control-next" type="button" data-bs-target="#carousel{{ $novedad->id }}" data-bs-slide="next">
		                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
		                                <span class="visually-hidden">Next</span>
		                            </button>
		                        </div>
		                        <div class="card-body">
		                            <h5 class="card-title text-dark">{{ $novedad->titulo }}</h5>
		                            <div class="mt-2">
		                            <small class="text-muted  offset"> {{ $novedad->updated_at->toFormattedDateString() }}</small>
		                            </div>
		                            <p class="card-text text-secondary">{!! ($novedad->cuerpo) !!}</p>
		                            <div class="mt-2">
		                            @if($novedad->deCarrera->descripcion  ?? '')
		                                    <span class="badge bg-success">{{ $novedad->deCarrera->descripcion  ?? '' }}</span>
		                            @endif
		                            </div>
		                            <div class="mt-2">
		                                @foreach ($novedad->etiquetas as $etiqueta)
		                                <span  class="badge bg-primary me-1">{{ $etiqueta->descripcion  ?? ''}}</span>
		                                @endforeach
		                            </div>
		                            <br>
		                            <div class="mt-auto">
		                                @if ($novedad->archivo1)
		                                <a href="{{ asset('./storage/' . $novedad->archivo1) }}" target="_blank" class="btn btn-outline-primary btn-sm d-inline-block mb-1">{{ basename($novedad->archivo1) }}</a>
		                                @endif
		                                @if ($novedad->archivo2)
		                                <a href="{{ asset('./storage/' . $novedad->archivo2) }}" target="_blank" class="btn btn-outline-primary btn-sm d-inline-block mb-1">{{ basename($novedad->archivo2) }}</a>
		                                @endif
		                                @if ($novedad->archivo3)
		                                <a href="{{ asset('./storage/' . $novedad->archivo3) }}" target="_blank" class="btn btn-outline-primary btn-sm d-inline-block">{{ basename($novedad->archivo3) }}</a>
		                                @endif
		                            </div>
		                        </div>
		                    </div>
		                </div>
		                @endforeach
		            </div>
		        </div> -->




		        @foreach ($novedades as $novedad)
		        @if($loop->first)
		        <div class="fondotituloinicio2">
		          <h2 class="tituloinicio"><i class="fa-regular fa-newspaper"></i> Novedades</h2>
		       </div>
		        <div class="fondoinicio">
		        <div class="card-container">
		        <div id="novedades" class="row">
		        @endif
		        <div class="col-lg-4 col-md-6 col-sm-12 mb-4" data-aos="fade-up" data-aos-delay="100">
		            <div class="card h-100 shadow-sm border-0">
		                <div id="carousel{{ $novedad->id }}" class="carousel slide tarjeta-carousel" data-bs-ride="carousel" data-bs-interval="12500">
		                    <div class="carousel-inner">
		                        @if ($novedad->imagen)
		                        <div class="carousel-item active">
		                            <!-- <img class="img-fluid" src="{{ asset('./storage/' . $novedad->imagen) }}" alt="..."> -->
		                            <img class="img-fluid" src="{{ url('foto_noticia/'. $novedad->imagen) }}" alt="...">
		                        </div>
		                        @endif
		                        @if ($novedad->imagen2)
		                        <div class="carousel-item">
		                           <!--  <img class="img-fluid" src="{{ asset('./storage/' . $novedad->imagen2) }}" alt="..."> -->
		                            <img class="img-fluid" src="{{ url('foto_noticia/'. $novedad->imagen2) }}" alt="...">
		                        </div>
		                        @endif
		                    </div>
		                     @if ($novedad->imagen && $novedad->imagen2)
		                    <button class="carousel-control-prev" type="button" data-bs-target="#carousel{{ $novedad->id }}" data-bs-slide="prev">
		                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
		                        <span class="visually-hidden">Previous</span>
		                    </button>
		                    <button class="carousel-control-next" type="button" data-bs-target="#carousel{{ $novedad->id }}" data-bs-slide="next">
		                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
		                        <span class="visually-hidden">Next</span>
		                    </button>
		                     @endif
		                </div>
		                <div class="card-body">
		                    <h5 class="card-title text-dark">{{ $novedad->titulo }}</h5>
		                    <div class="mt-2">
		                    <!-- <small class="text-muted offset"> {{ \Carbon\Carbon::parse($novedad->updated_at)->locale('es')->translatedFormat('d F Y') }}</small> -->
		                    </div>
		                    <p class="card-text text-secondary">{!! ($novedad->cuerpo) !!}</p>
		                    <div class="mt-2">
		                        @if($novedad->deCarrera->descripcion ?? '')
		                        <span class="badge bg-success">{{ $novedad->deCarrera->descripcion ?? '' }}</span>
		                        @endif
		                    </div>
		                    <div class="mt-2">
		                        @foreach ($novedad->etiquetas as $etiqueta)
		                        @if($etiqueta->nombre <> 'novedades')
		                        <span class="badge bg-primary me-1">{{ $etiqueta->descripcion ?? ''}}</span>
		                        @endif
		                        @endforeach
		                    </div>
		                    <br>
		                    <div class="mt-auto">
		                        @if ($novedad->archivo1)
		                        <a href="{{ asset('./storage/' . $novedad->archivo1) }}" target="_blank" class="btn btn-outline-primary btn-sm d-inline-block mb-1">{{ basename($novedad->archivo1) }}</a>
		                        @endif
		                        @if ($novedad->archivo2)
		                        <a href="{{ asset('./storage/' . $novedad->archivo2) }}" target="_blank" class="btn btn-outline-primary btn-sm d-inline-block mb-1">{{ basename($novedad->archivo2) }}</a>
		                        @endif
		                        @if ($novedad->archivo3)
		                        <a href="{{ asset('./storage/' . $novedad->archivo3) }}" target="_blank" class="btn btn-outline-primary btn-sm d-inline-block">{{ basename($novedad->archivo3) }}</a>
		                        @endif
		                    </div>
		                </div>
		            </div>
		        </div>
		         @if($loop->last)
					    </div>
					</div>
					 </div> <!-- termina fondo inicio -->
		        @endif
		        @endforeach



		 <!--Fin Novedades -->


		<div id="novedades" class="fondoCards">

		        <div class="fondotituloinicio">
		        <h2 class="tituloinicio1"><i class="fa-regular fa-calendar-days"></i> Calendario Académico</h2>
		        </div>

		        <div class="card-container">
		    <div id="novedades" class="row">
		        @foreach ($cronograma as $novedad)
		        <div class="col-lg-4 col-md-6 col-sm-12 mb-4" data-aos="fade-up" data-aos-delay="100">
		            <div class="card h-100 shadow-sm border-0">
		                <div id="carousel{{ $novedad->id }}" class="carousel slide tarjeta-carousel" data-bs-ride="carousel" data-bs-interval="12500">
		                    <div class="carousel-inner">
		                        @if ($novedad->imagen)
		                        <div class="carousel-item active">
		                            <!-- <img class="img-fluid" src="{{ asset('./storage/' . $novedad->imagen) }}" alt="..."> -->
		                            <img class="img-fluid" src="{{ url('foto_noticia/'. $novedad->imagen) }}" alt="...">
		                        </div>
		                        @endif
		                        @if ($novedad->imagen2)
		                        <div class="carousel-item">
		                            <!-- <img class="img-fluid" src="{{ asset('./storage/' . $novedad->imagen2) }}" alt="..."> -->
									<img class="img-fluid" src="{{ url('foto_noticia/'. $novedad->imagen2) }}" alt="...">
		                        </div>
		                        @endif
		                    </div>
		                    @if ($novedad->imagen && $novedad->imagen2)
		                    <button class="carousel-control-prev" type="button" data-bs-target="#carousel{{ $novedad->id }}" data-bs-slide="prev">
		                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
		                        <span class="visually-hidden">Previous</span>
		                    </button>
		                    <button class="carousel-control-next" type="button" data-bs-target="#carousel{{ $novedad->id }}" data-bs-slide="next">
		                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
		                        <span class="visually-hidden">Next</span>
		                    </button>
		                    @endif
		                </div>
		                <div class="card-body">
		                    <h5 class="card-title text-dark">{{ $novedad->titulo }}</h5>
		                    <div class="mt-2">
		                    <!-- <small class="text-muted offset"> {{ \Carbon\Carbon::parse($novedad->updated_at)->locale('es')->translatedFormat('d F Y') }}</small> -->

		                    </div>
		                    <p class="card-text text-secondary">{!! ($novedad->cuerpo) !!}</p>
		                    <div class="mt-2">
		                        @if($novedad->deCarrera->descripcion ?? '')
		                        <span class="badge bg-success">{{ $novedad->deCarrera->descripcion ?? '' }}</span>
		                        @endif
		                    </div>
		                    <div class="mt-2">
		                        @foreach ($novedad->etiquetas as $etiqueta)
		                        @if($etiqueta->nombre <> 'cronograma'))
		                        <span class="badge bg-primary me-1">{{ $etiqueta->descripcion ?? ''}}</span>
		                        @endif
		                        @endforeach
		                    </div>
		                    <br>
		                    <div class="mt-auto">
		                        @if ($novedad->archivo1)
		                        <a href="{{ asset('./storage/' . $novedad->archivo1) }}" target="_blank" class="btn btn-outline-primary btn-sm d-inline-block mb-1">{{ basename($novedad->archivo1) }}</a>
		                        @endif
		                        @if ($novedad->archivo2)
		                        <a href="{{ asset('./storage/' . $novedad->archivo2) }}" target="_blank" class="btn btn-outline-primary btn-sm d-inline-block mb-1">{{ basename($novedad->archivo2) }}</a>
		                        @endif
		                        @if ($novedad->archivo3)
		                        <a href="{{ asset('./storage/' . $novedad->archivo3) }}" target="_blank" class="btn btn-outline-primary btn-sm d-inline-block">{{ basename($novedad->archivo3) }}</a>
		                        @endif
		                    </div>
		                </div>
		            </div>
		        </div>
		        @endforeach
		    </div>
		</div>

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

		<script>
		    document.querySelectorAll('.card-link').forEach(link => {
		        link.addEventListener('click', function(event) {
		            event.preventDefault();
		        });
		    });
		</script>
		<!-- Scripts -->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-pzjw8f+ua7Kw1TI2dxKmj4c1PCL3Jg5sK/d6n83zM9E9j6LU4/ETHT2EBb4MfXJb" crossorigin="anonymous"></script>
		<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
		<script>

		    AOS.init();

		// Configurar el intervalo de cambio de imagen solo para el carousel de noticias
		document.addEventListener('DOMContentLoaded', function() {
		    // Selecciona solo los carousels con la clase 'tarjeta-carousel'
		    var carousels = document.querySelectorAll('.tarjeta-carousel');

		    carousels.forEach(function(carousel) {
		        var carouselInstance = new bootstrap.Carousel(carousel, {
		            interval: 12500 // Intervalo en milisegundos para las noticias
		        });
		    });
		});
		</script>
		<!--   swipper js -->
		<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

		<script>
		new Swiper('.card-wrapper', {

		loop: true,
		spaceBetween: 30,

		// If we need pagination
		pagination: {
		  el: '.swiper-pagination',
		},

		// Navigation arrows
		navigation: {
		  nextEl: '.swiper-button-next',
		  prevEl: '.swiper-button-prev',
		},
		breakpoints: {
		0: {
		  slidesPerView: 1
		},
		768: {
		  slidesPerView: 2
		},
		1024: {
		  slidesPerView: 3
		},
		}

		});
		</script>



		@endsection
