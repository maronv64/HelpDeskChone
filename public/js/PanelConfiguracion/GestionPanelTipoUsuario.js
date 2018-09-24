$('#id_toggle_tipo_usuarios').click(function(event)
	{
		MostrarTiposUsuarios();
});
$('#frm_ingresar_tipo_usuario').on('submit',function(e){
	e.preventDefault();
	guardarTipoUsuario();
})
function MostrarTiposUsuarios(){
    $('#tablaTiposUsuarios tbody tr').empty();
    $.get('mostrartiposusuarios',function(data){
        $.each(data, function(i,item){
            var out="";
            out+="<tr>";
            out+="<td>"+item.descripcion+"</td>";
            out+="<td><center><a class='fa fa-edit btn btn-info' title='Modificar estado del dispositivo'></a></center></td>";
            out+="</tr>";
            $('#tablaTiposUsuarios tbody tr:last').after(out);
            });
    });
}

function guardarTipoUsuario() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    }); 
    var FrmData = {
        descripcion:$('#id_txt_tipo_usuario').val(),
    }
    $.ajax({
        url:'tiposdeusuarios', // Url que se envia para la solicitud
        method: 'POST',             // Tipo de solicitud que se enviará, llamado como método
        data: FrmData,               // Datos enviados al servidor, un conjunto de pares clave / valor (es decir, campos de formulario y valores)
        dataType: 'json',
        success: function(requestData)   // Una función a ser llamada si la solicitud tiene éxito
        {
            alertify.success("DATOS INGRESADOS CORRECTAMENTE");
            MostrarTiposUsuarios();
            $('#id_txt_tipo_usuario').val('')
        },
        fail:function(){
            alertify.error("HA OCURRIDO UN ERROR");
            $('#id_txt_tipo_usuario').val('')
        }
    });
}