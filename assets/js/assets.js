document.addEventListener("DOMContentLoaded", function () {
    var formParte1 = document.getElementById("formParte1");
    var formParte2 = document.getElementById("formParte2");
    var btnSiguiente = document.getElementById("btnSiguiente");
  
    // Agregar un evento de clic al botón "Siguiente"
    btnSiguiente.addEventListener("click", function () {
      // Validar el formulario de la primera parte
      if (formParte1.checkValidity()) {
        // Mostrar el formulario de la segunda parte y ocultar el de la primera parte
        formParte1.style.display = "none";
        formParte2.style.display = "block";
      } else {
        // Si la validación no pasa, enfocar en el primer campo inválido
        formParte1.reportValidity();
      }
    });
  });