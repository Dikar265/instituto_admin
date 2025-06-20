<div class="datos-laborales not-display en-comun">
    <header class="mb-3 d-flex" style="justify-content: space-between; position: relative; padding: 20px 24px 20px 18px ">
        <h4>
            Últimos datos...
        </h4>
        <div class="" style="position: relative;">
            <img src="../img/logo1.png" alt="logo isft38" draggable="false"
                style="position: absolute; right: -5px; width: 45px; bottom:-15px">
        </div>
    </header>
    <div class="progress" style="width: 90%; margin: auto; margin-bottom: 10px; height: 20px;">
        <div class="progress-bar" style="width:10%; ">
            <span class="progress-bar-text">0%</span>
        </div>
    </div>
    <div class="mx-3 ">
        <h4>
            Datos laborales
        </h4>

        <div class="mb-2">

            {{--  <div class="" style="font-size: 0.9rem;">
                <p class="d-inline mx-1" style="font-size: 1.0rem;">- ¿Vos tenés obra social?</p>

                <label for="si_aspirante_obra_social">Sí</label>
                <input type="radio" value="1" name="aspirante_obra_social" id="si_aspirante_obra_social">

                <label for="no_aspirante_obra_social">No</label>
                <input type="radio" value="0" name="aspirante_obra_social" id="no_aspirante_obra_social">
            </div>  --}}

            <div class="mb-2" style="font-size: 0.9rem;">
                <p class="d-inline mx-1" style="font-size: 1.0rem;">- ¿Vos trabajás?</p>

                <label for="si_aspirante_trabaja">Sí</label>
                <input type="radio" name="aspirante_trabaja" value="1" onchange="si_trabaja()"
                    id="si_aspirante_trabaja">

                <label for="no_aspirante_trabaja">No</label>
                <input type="radio" value="0" name="aspirante_trabaja" onchange="no_trabaja()"
                    id="no_aspirante_trabaja" checked>
            </div>


            <div id="div_aspirante_si_trabaja" style="display: none" class="mt-2">
                <div class="">
                    <div class="form-floating mb-2 mx-1">
                        <input type="text" class="form-control" name="rol_trabajo" id="rol-trabajo"
                            placeholder="Rol en el trabajo" maxlength="60">
                        <label for="act">Ingresá tu actividad en el trabajo</label>
                    </div>

                </div>
                <div class="mt-2">

                    <div class="" style="font-size: 0.9rem;">
                        <p class="d-inline mx-1" style="font-size: 1.0rem;">- ¿Tenés turnos rotativos?</p>
                        <label for="si_turnos_rotativos">Sí</label>
                        <input type="radio" name="turnos_rotativos" value="1" id="si_turnos_rotativos"
                            onchange="si_rotativos()">

                        <label for="no_turnos_rotativos">No</label>
                        <input type="radio" name="turnos_rotativos" value="0" id="no_turnos_rotativos"
                            onchange="no_rotativos()">
                    </div>

                    <!-- Turnos rotativos -->
                    <div id="turnos-rotativos" style="display: none">
                        <label for=""><strong class="mx-1">Horario de trabajo</strong></label>

                        <div class="mx-1">
                            <textarea name="horarios_rotativos_asp" class="form-control" id="descripcion_carr" rows="4"
                                placeholder="Detallá tus horarios." maxlength="40" style="height:100px"></textarea>
                        </div>
                    </div>

                    <!-- Turnos fijos -->
                    <div id="turnos-fijos"style="display: none " class="mt-2">

                        <label for=""><strong class="mx-1">Horario de trabajo</strong></label>

                        <div class="d-flex mt-1">

                            <div class="">
                                <label for="">Entrada</label>
                                <input type="time" name="entrada" id="">
                            </div>
                            <div class="mx-2">
                                <label for="">Salida</label>
                                <input type="time" name="salida" id="">
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="d-flex mt-2 ">
                <div class="form-floating mb-2 col-12 px-1">
                    <input type="text" name="aspirante_obra_social" class="form-control"
                        id="si_aspirante_obra_social" placeholder="Obra social" maxlength="30">
                    <label for="si_aspirante_obra_social">Obra Social</label>
                </div>
            </div>
        </div>
    </div>
    <div class="bottom">
        <button href="#" rel="otro-estudio2" class="btn btn-primary linkform mx-2 my-4">
            <i class="fa-solid fa-arrow-left"></i>
            Atrás
        </button>
        <button href="#" rel="finalizando-inscripcion" class="btn btn-success linkform my-4">
            Siguiente
            <i class="fa-solid fa-arrow-right"></i>
        </button>
        <div class="clear"></div>

    </div>
</div>
