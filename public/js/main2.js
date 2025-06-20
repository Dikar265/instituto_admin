


// Funciones: mostrar y ocultar
// trabaja? en caso de falso, no mostrar nada
function si_trabaja() {
  var contenido = document.getElementById("div_aspirante_si_trabaja");
  contenido.style.display = "block";
}

function no_trabaja() {
  var contenido = document.getElementById("div_aspirante_si_trabaja");
  contenido.style.display = "none";
}

// turnos rotativos: true = detallar todo; false = poner horarios de entrada y salida
function si_rotativos() {
  var contenido = document.getElementById("turnos-rotativos");
  contenido.style.display = "block";
  
  var contenido = document.getElementById("turnos-fijos");
  contenido.style.display = "none";
}

function no_rotativos() {
  var contenido = document.getElementById("turnos-rotativos");
  contenido.style.display = "none";
  
  var contenido = document.getElementById("turnos-fijos");
  contenido.style.display = "block";
}

