<div class="register0 not-display en-comun ">
    <header class="mb-3 d-flex" style="justify-content: space-between; position: relative;">
        <h4>
            Datos personales [1/5]
        </h4>
        <div class="" style="position: relative;">
            <img src="../img/logo1.png" alt="logo isft38" draggable="false"
                style="position: absolute; right: -17px; width: 45px; bottom:-15px">
        </div>
    </header>
    <div class="progress" style="width: 90%; margin: auto; margin-bottom: 10px; height: 20px;">
        <div class="progress-bar" style="width:10%; ">
            <span class="progress-bar-text">0%</span>
        </div>
    </div>

    <div class="mx-3">
        <div class=""
            style="display: flex; justify-content: space-between; align-items:center; position: relative;">

            <label class="custom-file-upload" style="text-align:center; margin:0px 30px; margin-right:20px;">
                <input type="file" id="foto-aspirante" class="btn btn-secondary" name="foto_aspirante"
                    onchange="previewImage(event, '#imgPreview')">
                Subir foto
            </label>
            <div class="container d-flex justify-content-center"
                style="height: 130px;width:130px;  display:flex; justify-content: center; box-shadow: 0px 0px 1px #000; background:#fff">
                <a href="#" type="button">
                    <img id="imgPreview" style="height: 130px; width:130px;">
                </a>
            </div>
            <span style="font-size: 0.67em;position: absolute; left:15.4em;top: 12.2em; color:grey;text-align:center">
                Foto
                4x4 (hasta 5 MB) (*)</span>

        </div>


        <h5 class="mt-3 mx-2">Datos personales</h5>
        <div class="d-flex mt-2 ">
            <div class="form-floating mb-2 mx-1">
                <input type="text" class="form-control is-invalid" name="nombre_aspirante" id="nombres"
                    placeholder="nombre aspirante" maxlength="30">
                <label for="nombres">Nombres (*)</label>
            </div>
            <div class="form-floating mb-2 mx-1">
                <input type="text" class="form-control is-invalid" name="apellido_aspirante" id="apellidos"
                    placeholder="Apellido Aspirante" maxlength="30">
                <label for="apellidos">Apellido (*)</label>
            </div>
        </div>

        <div class="d-flex justify-content-center my-3 mt-1 " style="width:100%;">

            <div class="form-floating mx-1" style="width: 50%">
                {{--  <select class="form-select" id="estado-civil" name="estado_civil_aspirante"
                    aria-label="Floating label select example">
                    <option value="" selected hidden>Seleccione</option>
                    <option value="soltero/a">Soltero/a</option>
                    <option value="casado/a">Casado/a</option>>
                    <option value="viudo/a">Viudo/a</option>
                    <option value="divorciado/a">Divorciado/a</option>
                </select>
                <label for="estado-civil">Estado civil</label>  --}}
                <input type="text" class="form-control is-invalid" name="estado_civil_aspirante" id="estado-civil"
                    list="estados_civiles" placeholder="Estado Civil" maxlength="20">
                <label for="estado-civil">Estado Civil (*)</label>
                <datalist id="estados_civiles">
                    <option value="Soltero/a"></option>
                    <option value="Casado/a"></option>
                    <option value="Viudo/a"></option>
                    <option value="Divorciado/a"></option>
                </datalist>
            </div>


            <div class="form-floating mx-1" style="width: 50%">
                {{--  <select class="form-select" name="sexo_aspirante" id="sexo"
                    aria-label="Floating label select example">
                    <option value="" selected hidden>Seleccione</option>
                    <option value="masculino">Masculino</option>
                    <option value="femenino">Femenino</option>
                </select>  
                <label for="sexo">Sexo</label> --}}
                <input type="text" class="form-control is-invalid" name="sexo_aspirante" id="sexo"
                    list="sexos" placeholder="Género" maxlength="15">
                <label for="sexo_aspirante">Género (*)</label>
                <datalist id="sexos">
                    <option value="Femenino"></option>
                    <option value="Masculino"></option>
                </datalist>

            </div>

        </div>

        <div class="mt-10 d-flex" style="width:100%;">

            <div class="form-floating mb-2 mx-1">
                @if ($dni == '')
                    <input type="text" name="dni_aspirante" value=""
                        class="form-control numeric-input is-invalid" id="dni" placeholder="DNI">
                @else
                    <input type="text" name="dni_aspirante" value="{{ $dni }}"
                        class="form-control numeric-input is-valid" id="dni" placeholder="DNI" readonly>
                @endif
                <label for="dni">DNI (*)</label>
            </div>


            <div class="form-floating mb-2 mx-1">
                <input type="text" name="cuil_aspirante" class="form-control numeric-input is-invalid" id="cuil"
                    placeholder="Cuil" maxlength="11">
                <label for="cuil">CUIL (*)</label>
            </div>

        </div>

    </div>
    <div class="bottom">
        <button href="#" id="myButton" rel="register1" class="btn btn-success linkform m-4">
            Siguiente
            <i class="fa-solid fa-arrow-right"></i>
        </button>

        <div class="clear"></div>
    </div>
</div>
