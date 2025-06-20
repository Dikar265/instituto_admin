<form class="g-3 align-items-center my-3 mx-3 p-3 col-4"  action="{{ route('cargar.asignatura') }}"  method="POST" style="background: #fff; box-shadow: 0px 0px 3px #000">
   @csrf
   <h2 style="text-align: center;">Agregar agisnatura</h2>
   <hr>


   <div class="col-12">
      <div class="">
         <div class="mt-2">

            
            <div class="form-floating " >
               <select class="form-select" id="carrera_a_estudiar" name="id_carrera"  aria-label="Floating label select example">
                   
                  @foreach( $carreras as $item)
                     <option value="{{ $item->id }}">{{ $item->carrera }}</option>
                  @endforeach
               </select>
               <label for="estado-civil">Carrrera</label>
           </div>

            <div class="">
               <div class="form-floating mb-2 mx-1" >
                  <input type="text" class="form-control" name="asignatura" id="dur_carr" placeholder="name@example.com">
                  <label for="dur_carr" >Asignatura </label>
               </div>
               <div class="form-floating mb-2 mx-1" >
                  <input type="text" class="form-control" name="año" id="año_carrera" placeholder="name@example.com">
                  <label for="año_carrera" >Año</label>
               </div>
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