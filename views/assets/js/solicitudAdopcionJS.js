$(document).ready(function () { 
    
    $('#formSolicitudAdopcion').on('submit', function (e) { 
        e.preventDefault(); 
        var formData = new FormData($('#formSolicitudAdopcion')[0]);
        $.ajax({ 
            url: '../controllers/solicitudAdopcionController.php', 
            type: 'POST', 
            data: formData, 
            contentType: false,
            processData: false, 
            success: function(response) { 
                $('#response').html('<div class="alert alert-success">Registro guardado exitosamente!</div>'); 
            }, 
            error: function(err) { 
                $('#response').html('<div class="alert alert-danger">Error al registrar.</div>'); 
            } 
        }); 
    }); 
});