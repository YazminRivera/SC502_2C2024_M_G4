function initMap(mapId, lat, lng) {
    const coords = { lat: parseFloat(lat), lng: parseFloat(lng) };
    const mapElement = document.getElementById(mapId);

    if (mapElement) {
        const map = new google.maps.Map(mapElement, {
            center: coords,
            zoom: 15,
        });

        new google.maps.Marker({
            position: coords,
            map: map,
        });
    }
}

$(document).ready(function () {
    $.ajax({
        url: '../controllers/obtenerSolicitudesApoyoController.php',
        method: 'GET',
        dataType: 'json',
        success: function (data) {
            let container = $('#solicitudes-container');
            container.empty();

            if (data.length > 0) {
                data.forEach(function (solicitud, index) {
                    let mapId = `map-${index}`; // ID único para cada mapa
                    let latLng = solicitud.ubicacion.split(',');
                    let card = `
                    <div class="recuadro" id="recuadroSolicitudes">
                        <div class="card mb-3">
                            <div class="card-body">
                                <h5 class="card-title">Solicitud #${solicitud.idSolicitud}</h5>
                                <p class="card-text"><strong>Nombre:</strong> ${solicitud.nombre}</p>
                                <p class="card-text"><strong>Detalles del Rescate:</strong> ${solicitud.detalles_rescate}</p>
                                <p class="card-text"><strong>Correo:</strong> ${solicitud.correo}</p>
                                <p class="card-text"><strong>Teléfono:</strong> ${solicitud.telefono}</p>
                                <p class="card-text"><strong>Apellidos:</strong> ${solicitud.apellido}</p>
                                <p class="card-text"><strong>Detalles del Animal:</strong> ${solicitud.detalles_animal}</p>
                                <p class="card-text"><strong>Estado:</strong> ${solicitud.estado}</p>
                                <div id="${mapId}" class="mapa" style="height: 200px; width: 500px"></div>
                            </div>
                        </div>
                    </div>

                    `;

                    container.append(card);

                    // Inicializar el mapa para esta tarjeta específica
                    initMap(mapId, latLng[0], latLng[1]);
                });
            } else {
                container.html('<p>No hay solicitudes disponibles.</p>');
            }
        },
        error: function (xhr, status, error) {
            console.error('Error al obtener las solicitudes:', error);
            $('#solicitudes-container').html('<p>Error al cargar las solicitudes.</p>');
        }
    });
});