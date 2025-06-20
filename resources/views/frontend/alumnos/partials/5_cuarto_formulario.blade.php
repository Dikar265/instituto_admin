<div class="register3 not-display en-comun">
    <header class="mb-3 d-flex" style="justify-content: space-between; position: relative;">
        <h4>
            Datos personales [5/5]
        </h4>
        <div class="" style="position: relative;">
            <img src="../img/logo1.png" alt="logo isft38" draggable="false"
                style="position: absolute; right: -17px; width: 45px; bottom:-15px">
        </div>
    </header>
    <div class="progress" style="width: 90%; margin: auto; margin-bottom: 10px; height: 20px;">
        <div class="progress-bar" style="width:80%; ">
            <span class="progress-bar-text">80%</span>
        </div>
    </div>
    <div class="mx-4">

        {{--  <h4>Familia</h4>  --}}

        {{--  <h5 for="">Hijos (cantidad)</h5>  --}}
        <div class="form-floating mb-2 col-12 px-1">
            {{--  <div class="">  --}}
            {{--  <input class="form-check-input" type="radio" name="aspirante_tiene_hijos" id="si_tiene_hijos"
                    value="1">  --}}
            <input class="form-control" id="si_tiene_hijos" name="aspirante_tiene_hijos" type="number" min="0"
                placeholder="Hijos (cantidad)" maxlength="2" />
            <label for="pertenecea">Hijos (cantidad)</label>
            {{--  <label class="form-check-label" for="si_tiene_hijos">
                    Si
                </label>  --}}
            {{--  </div>  --}}
            {{--  <div class="form-check mx-3">
                <input class="form-check-input" type="radio" name="aspirante_tiene_hijos" id="no_tiene_hijos"
                    value="0">
                <label class="form-check-label" for="no_tiene_hijos">
                    No
                </label>
            </div>  --}}
        </div>

        {{--  <h5 class="mt-3">Familiares a cargo</h5>  --}}
        <div class="">
            <div class="d-flex mt-2 ">
                <div class="form-floating mb-2 col-12 px-1">
                    <input type="text" name="fam_a_cargo_aspirante" class="form-control" id="si_fam_a_cargo"
                        placeholder="Familiares a cargo" maxlength="25">
                    <label for="pertenecea">Familiares a cargo</label>
                </div>
            </div>
            {{--  <div class="">
                <input class="form-check-input" type="radio" value="1" name="fam_a_cargo_aspirante"
                    id="si_fam_a_cargo">
                <label class="form-check-label" for="si_fam_a_cargo">
                    Sí
                </label>
            </div>
            <div class="form-check mx-3">
                <input class="form-check-input" type="radio" value="0" name="fam_a_cargo_aspirante"
                    id="no_fam_a_cargo">
                <label class="form-check-label" for="no_fam_a_cargo">
                    No
                </label>
            </div>  --}}
        </div>
        <div class="my-3 mx-2">

            <h5>Confirme la carrera a la que se preinscribe</h5>
            <div class="form-floating ">
                <select class="form-select" id="carrera_a_estudiar" name="carrera_elejida_aspirante"
                    aria-label="Floating label select example">
                    <option value="Default" selected hidden>Elija la carrera</option>
                    @foreach ($carreras as $item)
                        @if ($item->id == $carrera_id || $carrera_id == 0)
                            <option value="{{ $item->id }}">{{ $item->descripcion }}</option>
                        @endif
                    @endforeach
                </select>
                <label for="carrera_a_estudiar">Carrrera elegida</label>
            </div>

        </div>




    </div>

    <div class="bottom">
        <button href="#" rel="register2" class="btn btn-primary linkform mx-2 my-4">

            <i class="fa-solid fa-arrow-left"></i>
            Atrás
        </button>

        <button id="myButton5" rel="register4" class="btn btn-success linkform my-4">
            Siguiente
            <i class="fa-solid fa-arrow-right"></i>
        </button>
        <div class="clear"></div>
    </div>
</div>
