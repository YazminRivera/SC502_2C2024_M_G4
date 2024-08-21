$(document).ready(function (){
    tabla = $('#tbllistado').dataTable({ //obtiene el id de lal tabla 
        aProcessing: true, //actiavmos el procesamiento de datatables
        aServerSide: true, //paginacion y filtrado del lado del serevr
        dom: 'Bfrtip', //definimos los elementos del control de tabla
        buttons: ['copyHtml5', 'excelHtml5', 'csvHtml5', 'pdf'],
        ajax: {
          url: '../controllers/infoSoliAdopcionController.php', //ruta del controller
          type: 'get',
          dataType: 'json',
          error: function (e) {
            console.log(e.responseText);
            alert("Error al cargar datos");
          },
          bDestroy: true,
          iDisplayLength: 5,
        },
      });
});