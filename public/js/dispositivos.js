
$('#id_mostrar_dispositivos').click(function(event)
{
    cargarListaDispositivos();
});
$('#guardar_datos').click(function(event)
	{
		guardar();
		cargarListaDispositivos();
	});
function limpiarModal() {
    $('#modal_descripcion').val('')
    $('#modal_tipo_dispositivo').val()
    $('#modal_serie').val('')
    $('#modal_color').val('')
    $('#modal_modelo').val('')
    $('#modal_marca').val('')
    $('#modal_estado').val()
}
function limpiarPrincipal() {
    $('#add_nom_dispositivo').val('')
    $('#add_tipodispositivo').val()
    $('#add_num_serie').val('')
    $('#add_color').val('')
    $('#add_modelo').val('')
    $('#add_marca').val('')
    $('#add_cod_activo').val()
}
function Validar_campos() {
    if (
        $('#add_nom_dispositivo').val()==''||
        $('#add_tipodispositivo').val()==''||
        $('#add_num_serie').val()==''||
        $('#add_color').val()==''||
        $('#add_modelo').val()==''||
        $('#add_marca').val()==''||
        $('#add_cod_activo').val()==''
    ) {
        return false;
    }
    else{
        return true;
    }
}
function Validar_campos_modal() {
    if (
        $('#modal_descripcion').val()==''||
        $('#modal_tipo_dispositivo').val()==''||
        $('#modal_serie').val()==''||
        $('#modal_color').val()==''||
        $('#modal_modelo').val()==''||
        $('#modal_marca').val()==''||
        $('#modal_estado').val()==''
    ) {
        return false;
    }
    else{
        return true;
    }
}
function guardar() {
    if (Validar_campos()==false) {
        return;
    }
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    }); 

        var FrmData = {
            nombredispositivo:$('#add_nom_dispositivo').val(),
            idtipodispositivos:$('#add_tipodispositivo').val(),
            serie:$('#add_num_serie').val(),
            color:$('#add_color').val(),
            modelo:$('#add_modelo').val(),
            marca:$('#add_marca').val(),
            cod_activo:$('#add_cod_activo').val(), 
        }
        $.ajax({
            url:'dispositivos', // Url que se envia para la solicitud
            method: 'POST',             // Tipo de solicitud que se enviará, llamado como método
            data: FrmData,               // Datos enviados al servidor, un conjunto de pares clave / valor (es decir, campos de formulario y valores)
            dataType: 'json',
            success: function(requestData)   // Una función a ser llamada si la solicitud tiene éxito
            {
                limpiarPrincipal();
                alert('Datos Guardados Correctamente');
            },
            complete: function(){
                
            }
        });
}

function modificar(iddispositivo) {
    if (Validar_campos_modal()==false) {
        return;
    }
    var FrmData = {
        idDispositivo:iddispositivo,
        nombredispositivo:$('#modal_descripcion').val(),
        idtipodispositivos:$('#modal_tipo_dispositivo').val(),
        serie:$('#modal_serie').val(),
        color:$('#modal_color').val(),
        modelo:$('#modal_modelo').val(),
        marca:$('#modal_marca').val(),
        cod_activo:$('#modal_estado').val(), 
    }
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    }); 
    $.ajax({
        url: 'dispositivos/'+iddispositivo, // Url que se envia para la solicitud esta en el web php es la ruta
        method: "PUT",             // Tipo de solicitud que se enviará, llamado como método
        data: FrmData,   
          success: function (datos) {
            mensaje = "DATOS MODIFICADOS CORRECTAMENTE";
            alert(mensaje);
            limpiarModal();
            $('#miModalnuevo').modal('hide');
            cargarListaDispositivos();
          },
          error: function () {     
              mensaje = "HA OCURRIDO UN ERROR";
              alert(mensaje);
              limpiarModal();
            $('#miModalnuevo').modal('hide');
            }
      });
 }
function modal(id_dispositivo)
{
    $.ajax({
        url: 'obtenerDispositivos/'+id_dispositivo,
		type: 'GET',
		dataType: 'json',
        success: function (response) {
            $('#miModalnuevo').modal('show');
            $('#modal_descripcion').val(response.nombredispositivo)
            $('#modal_tipo_dispositivo').val(response.idtipodispositivos)
            $('#modal_serie').val(response.serie)
            $('#modal_color').val(response.color)
            $('#modal_modelo').val(response.modelo)
            $('#modal_marca').val(response.marca)
            $('#modal_estado').val(response.cod_activo)
        }
    });
    $('#modal_validar_cambios').click(function(event)
	{
        modificar(id_dispositivo);
        limpiarModal();
	});
    
}
function eliminar(iddispositivo){
     
        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "DELETE",
            url:'dispositivos/' + iddispositivo,
            success: function (data) {
               cargarListaDispositivos();
            },  
        });
 }

function cargarListaDispositivos() {

	$('#tablaDispositivos tbody tr').empty();
	$.ajax({
		url: 'obtenerDispositivos',
		type: 'GET',
		dataType: 'json',
		
	})
	.done(function(datos) {
		$.each(datos.dispositivos, function(index, val) {
 		 	 var out="";
 		 	 out+="<tr>";
 		 	 out+="<td>"+val.iddispositivos+"</td>";
 		 	 out+="<td>"+val.nombredispositivo+"</td>";
 		 	 $.each(datos.tipos, function(index, val2) {
 		 	 	if (val2.idtipodispositivos==val.idtipodispositivos) {
 		 	 		out+="<td>"+val2.descripcion+"</td>";
 		 	 	}
 		  	 	
 		  	 });
 		 	 out+="<td>"+val.serie+"</td>";
 		 	 out+="<td>"+val.color+"</td>";
 		 	 out+="<td>"+val.modelo+"</td>";
 		 	 out+="<td>"+val.marca+"</td>";
 		 	 if (val.cod_activo=="Activo") {
 		 	 	out+="<td class='text-success'>"+val.cod_activo+"</td>";
 		 	 }
 		 	 else {
 		 	 	out+="<td class='text-danger'>"+val.cod_activo+"</td>";
 		 	 }
 		 	 out+="<td><center><a class='fa fa-edit btn btn-info' onclick='modal("+val.iddispositivos+")' title='Modificar estado del dispositivo'></a></center></td>";
             //<span class='glyphicon glyphicon-phone form-control-feedback'></span>
 		 	 out+="</tr>";
		 	 $('#tablaDispositivos tbody tr:last').after(out);
	})
	})
	.fail(function() {
		console.log("error");
	})
	
};
