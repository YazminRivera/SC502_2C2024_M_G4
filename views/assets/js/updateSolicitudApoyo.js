document.getElementById('guardarCambios').addEventListener('click', async () => {
    const form = document.getElementById('editForm');
    const formData = new FormData(form);

    try {
      const response = await fetch('../controllers/updateSolicitudApoyoController.php', {
        method: 'POST',
        body: formData
      });

      const result = await response.json();
      if (result.success) {
        Swal.fire({
          title: 'Éxito',
          text: result.message,
          icon: 'success'
        }).then(() => {
          window.location.href = 'listarSolicitudes.php'; // Redirige a listarSolicitudes.php
        });
      } else {
        Swal.fire({
          title: 'Error',
          text: result.message,
          icon: 'error'
        });
      }
      console.log('Resultado del update:', result);
    } catch (error) {
      Swal.fire({
        title: 'Error',
        text: 'Error en la solicitud',
        icon: 'error'
      });
      console.error('Error:', error);
    }
  });