let userLatitude;
let userLongitude;
function obtenerUbicacionUsuario(map, marker,) {
  if (navigator.geolocation) {
    navigator.geolocation.watchPosition(
      ({ coords: { latitude, longitude } }) => {
        const coords = {
          lat: latitude,
          lng: longitude,
        };
        userLatitude = latitude;
        userLongitude = longitude;

        map.setCenter(coords);
        map.setZoom(8);
        marker.setPosition(coords);
      },
      (error) => {
        console.error("Error al obtener la ubicación:", error);

        switch (error.code) {
          case error.PERMISSION_DENIED:
            toastr.error("El usuario denegó el acceso a la geolocalización.");
            break;
          case error.POSITION_UNAVAILABLE:
            toastr.error("La información de ubicación no está disponible.");
            break;
          case error.TIMEOUT:
            toastr.error("La solicitud de ubicación expiró.");
            break;
          default:
            toastr.error("Ocurrió un error al obtener la ubicación.");
            break;
        }
      },
      {
        enableHighAccuracy: true,
        timeout: 5000,
        maximumAge: 0,
      }
    );
  } else {
    toastr.error("Tu navegador no dispone de geolocalización.");
  }
}

function initMap() {
  const argCoords = { lat: -33.61, lng: 63.61 };
  const mapElement = document.getElementById("map");
  const map = new google.maps.Map(mapElement, {
    center: argCoords,
    zoom: 6,
  });
  const marker = new google.maps.Marker({
    position: argCoords,
    map: map,
  });

  window.addEventListener("load", () => {
    obtenerUbicacionUsuario(map, marker);
  });
}



$(document).ready(function () {
  $("#formSolicitudApoyo").on("submit", function (e) {
    e.preventDefault();
    var nombre = document.querySelector("#nombre").value;
    var apellidos = document.querySelector("#apellidos").value;
    var correo = document.querySelector("#correo").value;
    var telefono = document.querySelector("#telefono").value;
    var detalleRescate = document.querySelector("#detalleRescate").value;
    var detalleAnimal = document.querySelector("#detalleAnimal").value;

    if (
      nombre === "" ||
      apellidos === "" ||
      correo === "" ||
      detalleRescate === "" ||
      telefono === "" ||
      detalleAnimal === ""
    ) {
      toastr.error("Hay uno o más campos incompletos");
    } else {
      var formData = new FormData($("#formSolicitudApoyo")[0]);
      formData.append("userLatitude", userLatitude);
      formData.append("userLongitude", userLongitude);
      $.ajax({
        url: "../controllers/solicitudApoyoController.php",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function (datos) {
          toastr.success("Solicitud de apoyo ingresado");
          setTimeout(function() {
            window.location.href = "./index.php";
        }, 1600);
        },
        error: function (datos) {
          toastr.error("No se ha logrado ingresar la solicitud de apoyo");
        },
      });
    }
  });
});
