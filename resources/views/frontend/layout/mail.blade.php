<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ISFT N°38</title>
    <style>
        @page {
            margin: 1em;
        }

        body {
            padding: 5%;
        }

        #header {
            position: fixed;
            top: 0;
            height: 3em;
            width: 90%;
            left: 50%;
            padding: 1em;
            transform: translateX(-50%);
            text-align: center;
            background: white;
            {{--  border-bottom: 5px darkred solid;  --}}
        }

        .wrapper {
            position: relative;
            width: 100%;
        }

        .contain {
            position: absolute;
            width: 70%;
            left: 50%;
            transform: translateX(-50%);
        }

        #header img {
            height: 8em;
            float: left;
        }

        .title {
            float: right;
            width: 25em;
        }

        #footer {
            position: fixed;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 90%;
            height: 3em;
            border-top: 5px gray solid;
            background: white;
        }

        #footer p:first-child {
            float: left;
        }

        #footer p:last-child {
            float: right;
        }
    </style>
</head>

<body>
    {{--  <div id="header">
        <div class="wrapper">
            <div class="contain">
                <img src="{{ asset('/img/logo.png') }}" alt="">
                <div class="title">
                    <h1>ISFT N°38</h1>
                    <h2>Instituto Superior de Formación Técnica N°38</h2>
                </div>
            </div>
        </div>
    </div>  --}}
    <div id="article">
        <table>
            <tr>
                <td><img src="{{ asset('/img/logo.png') }}" width="40px" alt=""></td>
                <td></td>
                <td>
                    <h2>Instituto Superior de Formación Técnica N°38</h2>
                </td>
    </div>
    <hr>
    @yield('content')
    </div>
    <div id="footer">
        <p>
            ©2024 - ISFT N° 38
        </p>
        <p>
            Sede Central San Nicolás - Avenida Central 1825
        </p>
    </div>
</body>

</html>
