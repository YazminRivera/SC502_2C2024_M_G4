$(document).ready(function () {
    $("#formRegistro").on("submit", function (e) {
      e.preventDefault();
      var nombre = document.querySelector("#nombre").value;
      var apellidos = document.querySelector("#apellidos").value;
      var correo = document.querySelector("#correo").value;
      var contrasena = document.querySelector("#contrasena").value;
      var confirmarContrasena = document.querySelector("#confirmarContrasena").value;
      var telefono = document.querySelector("#telefono").value;
      var rol = document.querySelector("#rol").value;
      if (
        nombre === "" ||
        apellidos === "" ||
        correo === "" ||
        contrasena === "" ||
        telefono === "" ||
        confirmarContrasena === "" ||
        rol === 'Selecciona el rol del usuario'
      ) {
        toastr.error(
          'Hay uno o más campos incompletos'
        );
      } else {
        if (contrasena === confirmarContrasena) {
          var formData = new FormData($("#formRegistro")[0]);
          $.ajax({
            url: "../controllers/registroController.php?op=insertar",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function (datos) {
              switch (datos) {
                case '1':
                  toastr.success(
                    'Usuario registrado correctamente'
                  );
                  setTimeout(function() {
                    window.location.href = './indexadm.php';
                }, 1500);
                  break;
                case '2':
                  toastr.error(
                    'El correo ingresado ya esta en uso'
                  );
                  break;
        
                case '3':
                  toastr.error('Hubo un error al tratar de ingresar los datos.');
                  break;
                default:
                  toastr.error(datos);
                  break;
              }
            },
            error: function (datos) {
              toastr.error(
                'No se ha logrado registrar'
              );
            },
          });
        } else {
          toastr.error(
            'Se han digitado contraseñas diferentes'
          );
        }
      }
    });
  });
  