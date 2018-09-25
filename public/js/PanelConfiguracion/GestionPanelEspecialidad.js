$('#id_toggle_especialidades').click(function(event)
	{
		MostrarEspecialidades();
});
$('#frm_ingresar_especialidades').on('submit',function(e){
	e.preventDefault();
	guardarTipoEspecialidades();
})

function MostrarEspecialidades(){
    $('#tablaEspecialidades tbody tr').empty();
    $.get('mostrarespecialidad',function(data){
            $.each(data, function(i,item){
                var out="";
                out+="<tr>";
                out+="<td>"+item.descripcion+"</td>";
                out+="<td><center><a class='fa fa-edit btn btn-info' onclick='ModalPanelConfiguracion()' title='Modificar datos del registro'></a></center></td>";
                out+="</tr>";
                $('#tablaEspecialidades tbody tr:last').after(out);
            }); 
    });
}
function guardarTipoEspecialidades() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    }); 
    var FrmData = {
        descripcion:$('#id_descripcion_especialidad').val(),
    }
    $.ajax({
        url:'especialidadIngreso', // Url que se envia para la solicitud
        method: 'POST',             // Tipo de solicitud que se enviará, llamado como método
        data: FrmData,               // Datos enviados al servidor, un conjunto de pares clave / valor (es decir, campos de formulario y valores)
        dataType: 'json',
        success: function(requestData)   // Una función a ser llamada si la solicitud tiene éxito
        {
            alertify.success("DATOS INGRESADOS CORRECTAMENTE");
            MostrarEspecialidades();
            $('#id_descripcion_especialidad').val('')
        },
        fail:function(){
            alertify.error("HA OCURRIDO UN ERROR");
            $('#id_descripcion_especialidad').val('')
        }
    });
}
