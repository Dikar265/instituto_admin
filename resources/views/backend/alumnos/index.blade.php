@extends('backend.layouts.layout')
@section('content')
<!-- formulario.blade.php -->
<div class="container">
<h2 class="d-block mx-auto align-items-center text-center abs-center" style="font-size:300%">Busqueda De DNI</h2>
<div class="row">
<div class="col-xs-6">
<br/>

<form class="needs-validation"  action="{{ route('alumnos.buscar') }}" method="POST" >
    @csrf
    <input class="form-control w-10 h-10" style="text-align: center"type="number" name="dni" placeholder="DNI" id="validationCustom01" required>
    <br/>
    <button class="d-block mx-auto btn btn-success align-items-center text-center h-90 w-90" type="submit" >Buscar</button>

    
</form>
</div>
</div>
</div>

<style>.abs-center {
  display: flex;
  align-items: center;
  justify-content: center;
  padding-top: 220px;
}

</style>


<script>// Example starter JavaScript for disabling form submissions if there are invalid fields
(() => {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  const forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.from(forms).forEach(form => {
    form.addEventListener('submit', event => {
      if (!form.checkValidity()) {
        event.preventDefault()
        event.stopPropagation()
      }

      form.classList.add('was-validated')
    }, false)
  })
})()</script>