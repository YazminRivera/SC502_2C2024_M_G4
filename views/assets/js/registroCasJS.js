$(document).ready(function () { 
    $('#formRegistroCas').on('submit', function (e) { 
        e.preventDefault(); 
        var formData = new FormData($('#formRegistroCas')[0])
        $.ajax({ 
            url: '../controllers/registroCasController.php', 
            type: 'POST', 
            data: formData, 
            contentType :  false,
            processData  : false, 
            success: function(response) { 
                $('#response').html('<div class="alert alert-success">Registro guardado exitosamente!</div>'); 
            }, 
            error: function(err) { 
                $('#response').html('<div class="alert alert-danger">Error al registrar.</div>'); 
            } 
        }); 
    }) 
});