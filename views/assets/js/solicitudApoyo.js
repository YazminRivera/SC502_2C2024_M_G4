let userLatitude;
let userLongitude;

function obtenerUbicacionUsuario(map, marker) {
  if (navigator.geolocation) {
    navigator.geolocation.watchPosition(
      ({ coords: { latitude, longitude } }) => {
        const coords = { lat: latitude, lng: longitude };
        userLatitude = latitude;
        userLongitude = longitude;

        marker.setPosition(coords);
        map.setCenter(coords);
        map.setZoom(8);

        // Actualiza los campos ocultos con las coordenadas del usuario
        document.getElementById("latitud").value = userLatitude;
        document.getElementById("longitud").value = userLongitude;
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
  const initialCoords = { lat: -33.61, lng: -63.61 }; // Coordenadas iniciales
  const mapElement = document.getElementById("map");
  const map = new google.maps.Map(mapElement, {
    center: initialCoords,
    zoom: 6,
  });
  const marker = new google.maps.Marker({
    position: initialCoords,
    map: map,
    draggable: true, // Permite mover el marcador
  });

  // Configura el evento de 'dragend' para actualizar las coordenadas
  marker.addListener('dragend', (event) => {
    const coords = { lat: event.latLng.lat(), lng: event.latLng.lng() };
    userLatitude = coords.lat;
    userLongitude = coords.lng;

    // Actualiza los campos ocultos con las coordenadas nuevas
    document.getElementById("latitud").value = userLatitude;
    document.getElementById("longitud").value = userLongitude;
  });

  window.addEventListener("load", () => {
    obtenerUbicacionUsuario(map, marker);
  });
}

$(document).ready(function () {
  $("#formSolicitudApoyo").on("submit", function (e) {
    e.preventDefault();

    var nombre = $("#nombre").val();
    var apellidos = $("#apellidos").val();
    var correo = $("#correo").val();
    var telefono = $("#telefono").val();
    var detalleRescate = $("#detalleRescate").val();
    var detalleAnimal = $("#detalleAnimal").val();

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
      // Asegúrate de que userLatitude y userLongitude estén definidos
      var latitud = userLatitude !== undefined ? userLatitude : "0";
      var longitud = userLongitude !== undefined ? userLongitude : "0";

      let formData = new FormData();
      formData.append("nombre", nombre);
      formData.append("apellidos", apellidos);
      formData.append("correo", correo);
      formData.append("telefono", telefono);
      formData.append("detalleRescate", detalleRescate);
      formData.append("detalleAnimal", detalleAnimal);
      formData.append("latitud", latitud);
      formData.append("longitud", longitud);

      $.ajax({
        url: "../controllers/solicitudApoyoController.php",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function () {
          toastr.success("Solicitud de apoyo ingresada");
          $("#formSolicitudApoyo")[0].reset();
        },
        error: function () {
          toastr.error("No se ha logrado ingresar la solicitud de apoyo");
        },
      });
    }
  });
});
