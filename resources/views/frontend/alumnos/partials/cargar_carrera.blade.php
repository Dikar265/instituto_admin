<form class="g-3 align-items-center my-3 mr-3 p-3 col-4" action="{{ route('cargar.carrera') }}" method="POST"
    style="background: #fff; box-shadow: 0px 0px 3px #000">
    @csrf
    <h2 style="text-align: center;">Agregar Carrera</h2>
    <hr>
    {{-- <div class="" style="display: flex; justify-content: space-between; align-items:center; position: relative;">

      <label class="custom-file-upload" style="text-align:center; margin:0px 30px; margin-right:20px;">
         <input type="file" id="foto-aspirante" class="btn btn-secondary" name="gorra" onchange="previewImage(event, '#imgPreview')" >
         Subir foto
      </label>
      <div class="container d-flex justify-content-center" style="height: 130px;width:130px;  display:flex; justify-content: center; box-shadow: 0px 0px 1px #000; background:#fff">
         <a href="#" type="button">
            
            <img id="imgPreview" style="height: 130px; width:130px;">
            
         </a>
      </div>
   </div> --}}

    <div class="col-12">
        <div class="">
            <div class="mt-2">
                <div class="form-floating mb-2 mx-1">
                    <input type="text" name="carrera" class="form-control" id="nombre_carr"
                        placeholder="name@example.com">
                    <label for="nombre_carr">Nombre carrera (*)</label>
                </div>
                <div class="d-flex">
                    <div class="form-floating mb-2 mx-1">
                        <input type="text" class="form-control" name="anios_duracion" id="dur_carr"
                            placeholder="name@example.com">
                        <label for="dur_carr">Años duracion (*)</label>
                    </div>
                    <div class="form-floating mb-2 mx-1">
                        <input type="text" class="form-control" name="resolucion" id="resolucion"
                            placeholder="name@example.com">
                        <label for="resolucion">Resolución (*)</label>
                    </div>
                </div>
                <div class="mx-1">
                    <label for="descripcion_carr">Descripcion (*)</label>
                    <textarea name="descripcion" class="my-2 form-control" id="descripcion_carr" rows="4"
                        placeholder="Una descripcion para la carrera a cargar." style="height:100px"></textarea>
                </div>


            </div>

        </div>
    </div>
    @if (session('mensaje'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Enhorabuena!</strong> {{ session('mensaje') }}<br>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="d-grid mx-1">
        <input type="submit" value="Cargar carrera" class="btn btn-primary">
    </div>
</form>
