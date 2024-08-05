$(document).ready(function () { 
    $('#formRegistroEncontrado').on('submit', function (e) { 
        e.preventDefault(); 
        var formData = new FormData($('#formRegistroEncontrado')[0]);
        $.ajax({ 
            url: '../controllers/encontradoController.php', 
            type: 'POST', 
            data: formData, 
            contentType: false,
            processData: false, 
            success: function(response) { 
                $('#response').html('<div class="alert alert-success">Registro de encontrado guardado exitosamente!</div>'); 
            }, 
            error: function(err) { 
                $('#response').html('<div class="alert alert-danger">Error al registrar el encontrado.</div>'); 
            } 
        }); 
    }); 
});