$('#id_toggle_tipo_dispositivos').click(function(event)
	{
		MostrarTiposUsuarios();
});
function MostrarTiposUsuarios(){
    $('#tablaTiposDispositivos tbody tr').empty();
    $.get('mostrartiposdispositivos',function(data){
        $.each(data, function(i,item){
            debugger
            var out="";
            out+="<tr>";
            out+="<td>"+item.descripcion+"</td>";
            out+="<td><center><a class='fa fa-edit btn btn-info' title='Modificar estado del dispositivo'></a></center></td>";
            out+="</tr>";
            $('#tablaTiposDispositivos tbody tr:last').after(out);
        });
    }
    );
}

// function cargarListaTipos() {
// 	$('#tablaDispositivos tbody tr').empty();
// 	$.ajax({
// 		url: 'obtenerDispositivos',
// 		type: 'GET',
// 		dataType: 'json',
// 	})
// 	.done(function(datos) {
// 		$.each(datos.dispositivos, function(index, val) {
//             var out="";
//             if (val.cod_activo=="Activo") {
//                 out+="<tr>";
//                 out+="<td>"+val.nombredispositivo+"</td>";
//                 $.each(datos.tipos, function(index, val2) {
//                 if (val2.idtipodispositivos==val.idtipodispositivos) {
//                     out+="<td>"+val2.descripcion+"</td>";
//                 }
//                 });
//                 out+="<td>"+val.serie+"</td>";
//                 out+="<td>"+val.color+"</td>";
//                 out+="<td>"+val.modelo+"</td>";
//                 out+="<td>"+val.marca+"</td>";
//                 out+="<td class='text-success'>"+val.cod_activo+"</td>";
//                 out+="<td><center><a class='fa fa-edit btn btn-info' onclick='modal("+val.iddispositivos+")' title='Modificar estado del dispositivo'></a> <a class='glyphicon glyphicon-trash btn btn-danger' onclick='modificar("+val.iddispositivos+",1)' title='Desactivar disponibilidad del dispositivo'></a></center></td>";
//                 //<span class='glyphicon glyphicon-phone form-control-feedback'></span>
//                 out+="</tr>";
//             }
//             $('#tablaDispositivos tbody tr:last').after(out);
// 	    })
// 	})
// 	.fail(function() {
// 		console.log("error");
// 	})
// };
