//Validacion de contraseñas
var password1 = document.getElementById("password1"), password2 = document.getElementById("password2");
    function validatePassword(){
      if(password1.value !== password2.value) {
        password2.setCustomValidity("Las contraseñas no son iguales");
      } else {
        password2.setCustomValidity('');
      }
    }
    password1.onchange = validatePassword;
    password2.onkeyup = validatePassword;

// Validacion de formulario NO campos vacios
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();

// Mensajes de alerta
  window.setTimeout(function() {
    $("#tempAlert").fadeTo(200, 0).slideUp(500, function(){
        $(this).remove();
    });
  }, 4000);

// Mensajes de alerta Modal
$(document).ready(function(){
  $('#alertbox').click(function(){
    $("#error").html("You Clicked on Click here Button");
      $('#myModal').modal("show");
    });
  });
