$('#id_toggle_areas').click(function(event)
	{
        //document.write('<script src="js/PanelConfiguracion/GestionPanelTipoUsuario.js"></script>');
        MostrarAreas();
});
$('#frm_ingresar_areas').on('submit',function(e){
	e.preventDefault();
	guardarAreas();
})
///////////Muestra las areas//////////
function MostrarAreas(){
    $('#tabla_Areas tbody tr').empty();
    $.get('mostrarareas',function(data){
          $.each(data, function(i,item){
                var out="";
                out+="<tr>";
                out+="<td>"+item.nombre+"</td>";
                out+="<td>"+item.correo+"</td>";
                out+="<td>"+item.extencion+"</td>";
                out+="<td>"+item.siglas+"</td>";
                out+="<td><center><a class='fa fa-edit btn btn-info' onclick='ModalPanelConfiguracion(4,"+item.idarea+")' title='Modificar datos del registro'></a></center></td>";
                out+="</tr>";
                $('#tabla_Areas tbody tr:last').after(out);
            });  
    });
}

function guardarAreas() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    }); 
    var FrmData = {
        nombre:$('#id_nombre_areas').val(),
        correo:$('#id_correo_areas').val(),
        extencion:$('#id_ext_telef_areas').val(),
        siglas:$('#id_siglas_area').val(),
    }
    $.ajax({
        url:'areasIngresos', // Url que se envia para la solicitud
        method: 'POST',             // Tipo de solicitud que se enviará, llamado como método
        data: FrmData,               // Datos enviados al servidor, un conjunto de pares clave / valor (es decir, campos de formulario y valores)
        dataType: 'json',
        success: function(requestData)   // Una función a ser llamada si la solicitud tiene éxito
        {
            alertify.success("DATOS INGRESADOS CORRECTAMENTE");
            MostrarAreas();
            limpiarAreasCampos();
        },
        fail:function(){
            alertify.error("HA OCURRIDO UN ERROR");
            limpiarAreasCampos();
        }
    });
}

function limpiarAreasCampos() {
    $('#id_nombre_areas').val('');
    $('#id_correo_areas').val('');
    $('#id_ext_telef_areas').val('');
    $('#id_siglas_area').val('');
}