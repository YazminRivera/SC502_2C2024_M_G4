$(document).ready(function () {
  $("#formInicioSesion").on("submit", function (e) {
    e.preventDefault();
    var correo = document.querySelector("#correo").value;
    var contrasena = document.querySelector("#contrasena").value;
    if (correo === "" || contrasena === "") {
      toastr.error(
        'Campo incompleto de usuario o contraseña'
      );
    } else {
      var formData = new FormData($("#formInicioSesion")[0]);
      $.ajax({
        url: "../controllers/inicioSesionController.php",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function (datos) {
          switch (datos) {
            case '1':
              toastr.success(
                'Se ha ingresado correctamente'
              );
              window.location.href = './index.php';
              break;
            case '2':
              toastr.error(
                'No se ha encontrado el correo ingresado'
              );
              break;
    
            case '3':
              toastr.error('Contraseña incorrecta');
              break;
            default:
              toastr.error(datos);
              break;
          }
        },
        error: function (err) {
          toastr.error(
            'No se ha logrado iniciar sesion'
          );
        },
      });
    }
  });
});
