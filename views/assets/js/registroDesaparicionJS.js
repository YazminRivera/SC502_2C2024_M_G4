$(document).ready(function () { 
    $('#formRegistroDesaparicion').on('submit', function (e) { 
        e.preventDefault(); 
        var formData = new FormData($('#formRegistroDesaparicion')[0]);
        $.ajax({ 
            url: '../controllers/desaparicionController.php', 
            type: 'POST', 
            data: formData, 
            contentType: false,
            processData: false, 
            success: function(response) { 
                $('#response').html('<div class="alert alert-success">Registro de desaparición guardado exitosamente!</div>'); 
            }, 
            error: function(err) { 
                $('#response').html('<div class="alert alert-danger">Error al registrar la desaparición.</div>'); 
            } 
        }); 
    }); 
});