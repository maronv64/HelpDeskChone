$('#id_toggle_especialidades').click(function(event)
	{
		MostrarExtraTecnicos();
});
// $('#frm_ingresar_tipos_dispositivos').on('submit',function(e){
// 	e.preventDefault();
// 	guardarTipoEspecialidades();
// })

function MostrarExtraTecnicos(){
    $('#tablaEspecialidades tbody tr').empty();
    $.get('mostrarespecialidad',function(data){
            $.each(data, function(i,item){
                var out="";
                out+="<tr>";
                out+="<td>"+item.descripcion+"</td>";
                out+="<td><center><a class='fa fa-edit btn btn-info' title='Modificar estado del dispositivo'></a></center></td>";
                out+="</tr>";
                $('#tablaEspecialidades tbody tr:last').after(out);
            }); 
    });
}
// function guardarTipoEspecialidades() {
//     $.ajaxSetup({
//         headers: {
//             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//         }
//     }); 
//     var FrmData = {
//         descripcion:$('#id_txt_tipo_dispositivo').val(),
//     }
//     $.ajax({
//         url:'tiposdispositivos', // Url que se envia para la solicitud
//         method: 'POST',             // Tipo de solicitud que se enviará, llamado como método
//         data: FrmData,               // Datos enviados al servidor, un conjunto de pares clave / valor (es decir, campos de formulario y valores)
//         dataType: 'json',
//         success: function(requestData)   // Una función a ser llamada si la solicitud tiene éxito
//         {
//             alertify.success("DATOS INGRESADOS CORRECTAMENTE");
//             MostrarTiposDispositivos();
//             $('#id_txt_tipo_dispositivo').val('')
//         },
//         fail:function(){
//             alertify.error("HA OCURRIDO UN ERROR");
//             $('#id_txt_tipo_dispositivo').val('')
//         }
//     });
// }
