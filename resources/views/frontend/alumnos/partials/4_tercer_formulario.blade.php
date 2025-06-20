<div class="register2 not-display en-comun">
    <header class="mb-3 d-flex" style="justify-content: space-between; position: relative;">
        <h4>
            Datos personales [4/5]
        </h4>
        <div class="" style="position: relative;">
            <img src="../img/logo1.png" alt="logo isft38" draggable="false"
                style="position: absolute; right: -17px; width: 45px; bottom:-15px">
        </div>
    </header>
    <div class="progress" style="width: 90%; margin: auto; margin-bottom: 10px; height: 20px;">
        <div class="progress-bar" style="width:60%; ">
            <span class="progress-bar-text">60%</span>
        </div>
    </div>
    <div class="mx-4">

        <h4>Correo personal</h4>
        <div class="mt-2 ">
            <div class="form-floating mb-2 ">
                <input type="email" class="form-control is-invalid" name="correo_aspirante" id="correo"
                    placeholder="name@example.com" maxlength="200">
                <label for="correo">Correo electrónico (*)</label>
            </div>
            <div class="form-floating mb-2 ">
                <input id="confirm_email" type="email" class="form-control is-invalid"
                    name="confirmar_correo_aspirante" maxlength="200" placeholder="name@example.com">
                <label for="confirm_email">Confirme Correo electrónico (*)</label>
            </div>
        </div>



        <h4>Contacto</h4>
        <div class="mb-2">
            <div class="d-flex mt-2 ">
                <div class="form-floating mb-0 mx-1">
                    <input type="text" name="celular_aspirante" class="form-control numeric-input is-invalid"
                        id="celular" placeholder="celular" maxlength="15">
                    <label for="domicilio">Celular (*)</label>
                </div>
                <div class="form-floating mb-0 mx-1">
                    <input type="text" name="tel_fijo_aspirante" class="form-control numeric-input" id="tel_fijo"
                        placeholder="telefono_fijo" maxlength="15">
                    <label for="barrio">Tel fijo</label>
                </div>
            </div>
            <div class="d-flex mt-2 ">
                <div class="form-floating mb-2 col-12 px-1">
                    <input type="text" name="tel_alterno_aspirante" class="form-control numeric-input is-invalid"
                        id="tel_alternativo" placeholder="Tel Alternativo" maxlength="15">
                    <label for="domicilio">Tel Alternativo (*)</label>
                </div>
            </div>
            <div class="d-flex mt-2 ">
                <div class="form-floating mb-2 col-12 px-1">
                    <input type="text" name="tel_alterno_aspirante_pertenece_a" class="form-control is-invalid"
                        id="pertenecea" placeholder="Pertenece a..." maxlength="20">
                    <label for="pertenecea">Tel. Alternativo Pertenece a...(*)</label>
                </div>
            </div>
            {{--  <p style="font-size:0.75em; color:grey; line-height:16px; text-align:justify"> El télofono alternativo es
                para usar en casos de urgencia, se recomienda insertarlo, por ejemplo, que sea el número de un pariente
                en quien contar en dicha situación.</p>  --}}

        </div>




    </div>

    <div class="bottom">
        <button href="#" rel="register1-1" class="btn btn-primary linkform mx-2 my-4">

            <i class="fa-solid fa-arrow-left"></i>
            Atrás
        </button>

        <button id="myButton4" rel="register3" class="btn btn-success linkform my-4">
            Siguiente
            <i class="fa-solid fa-arrow-right"></i>
        </button>
        <div class="clear"></div>
    </div>
</div>
