document.addEventListener('DOMContentLoaded', function() {
    // Obtener el ID del animal de la URL
    const params = new URLSearchParams(window.location.search);
    const idAnimal = params.get('id');

    if (idAnimal) {
        // Realizar la solicitud AJAX
        fetch(`perfilAdopciones.php?id=${idAnimal}`)
            .then(response => response.json())
            .then(data => {
                if (data.error) {
                    document.getElementById('animal-profile').innerHTML = `<p>${data.error}</p>`;
                } else {
                    // Mostrar la información del animal en el perfil
                    document.getElementById('nombreMascota').textContent = data.nombreAnm;
                    document.getElementById('especie').value = data.tipoAnimal;
                    document.getElementById('colorPelaje').value = data.colorPelaje;
                    document.getElementById('edad').value = data.edadAnm + ' años';
                    document.getElementById('tamano').value = data.tamano;
                    document.getElementById('raza').value = data.razaAnm;
                    document.getElementById('castracion').value = data.castrado ? 'Sí' : 'No';

                    // Configurar el carrusel de imágenes
                    const carouselInner = document.getElementById('carousel-inner');
                    const images = [data.imagenAnm, data.img2, data.img3, data.img4].filter(img => img);
                    carouselInner.innerHTML = images.map((img, index) => `
                        <div class="carousel-item ${index === 0 ? 'active' : ''}">
                            <img src="${img}" class="pfp w-100" alt="Imagen ${index + 1}">
                        </div>
                    `).join('');

                    document.getElementById('img1').src = images[0] || '';
                    if (images[1]) document.getElementById('img2').src = images[1];
                    if (images[2]) document.getElementById('img3').src = images[2];
                }
            })
            .catch(error => {
                console.error('Error:', error);
                document.getElementById('animal-profile').innerHTML = `<p>Error al cargar los datos</p>`;
            });
    } else {
        document.getElementById('animal-profile').innerHTML = `<p>ID del animal no proporcionado</p>`;
    }
});
