document.addEventListener('DOMContentLoaded', function () {
    const idAnimal = new URLSearchParams(window.location.search).get('id');
    if (idAnimal) {
        fetch(`perfilAdopcion.php?id=${idAnimal}`, {
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
            .then(response => response.json())
            .then(data => {
                if (data.error) {
                    document.getElementById('animal-profile').innerHTML = `<p>${data.error}</p>`;
                } else {
                    document.getElementById('nombreMascota').textContent = data.nombreAnm;
                    document.getElementById('especie').value = data.tipoAnimal;
                    document.getElementById('colorPelaje').value = data.colorPelaje;
                    document.getElementById('edad').value = data.edadAnm + ' años';
                    document.getElementById('tamano').value = data.tamano || ''; // Si no hay tamaño disponible
                    document.getElementById('raza').value = data.razaAnm;
                    document.getElementById('castracion').value = data.castrado ? 'Sí' : 'No';

                    // ubicacion
                    ubicacion = data.ubicacion;

                    // carrousel
                    const carouselInner = document.getElementById('carousel-inner');
                    const images = [data.imagenAnm, data.img2, data.img3, data.img4].filter(img => img !== null);

                    if (images.length > 0) {
                        carouselInner.innerHTML = images.map((img, index) => `
                        <div class="carousel-item ${index === 0 ? 'active' : ''}">
                            <img src="${img}" class="pfp w-100" alt="Imagen ${index + 1}">
                        </div>
                    `).join('');
                    } else {
                        carouselInner.innerHTML = '<p>No hay imágenes disponibles</p>';
                    }
                }
            })
    }
});

// variable global para guardar la ubicación 
var ubicacion;

const crearPuntoEnElMapa = (map, marker, coords) => {
    marker.setPosition(coords);
    map.panTo(coords);
    map.setZoom(15);
}

function initMap() {
    let lat = 10.00236
    let lng = -84.11651

    // ubicacion = "lat, long"
    if(ubicacion) {
        lat = ubicacion.split(',')[0]
        lng = ubicacion.split(',')[1]
    }

    const argCoords = { lat: 10.00236, lng: -84.11651 };
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
        crearPuntoEnElMapa(map, marker, argCoords);
    });
}