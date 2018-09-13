$(document).ready(function() {
	
	cargarListaDispositivos();
	$('#guardar_datos').click(function(event)
	{
		guardar();
		cargarListaDispositivos();
	});

});
function guardar() {
    if ($('#add_nom_dispositivo').val()=='') {
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
                $('#add_nom_dispositivo').val('')
                $('#add_tipodispositivo').val()
                $('#add_num_serie').val('')
                $('#add_color').val('')
                $('#add_modelo').val('')
                $('#add_marca').val('')
                $('#add_cod_activo').val()
                alert('Datos Guardados Correctamente');
            },
            complete: function(){
                
            }
        });
}

function modificar(iddispositivo) {
      // $.ajaxSetup({
      //        headers:{
      //            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      //        }
      //    });
      //     var FrmData = {
      //                   cod_activo:$('#add_cod_activo').val(), 
      //               }
      //    $.ajax({
      //        type: "PUT",
      //        url:'dispositivos/' + iddispositivo,
      //        success: function (data) {
      //           alert('Modificacion realizada con éxito')
      //           cargarListaDispositivos();
      //        },  
      //    });

 }
function modal(id_dispositivo)
{
    $.ajax({
        url: 'obtenerDispositivos',
		type: 'GET',
		dataType: 'json',
        success: function (response) {
            $('#modal_descripcion').val('')
            $('#add_tipodispositivo').val()
            $('#add_num_serie').val('')
            $('#add_color').val('')
            $('#add_modelo').val('')
            $('#add_marca').val('')
            $('#add_cod_activo').val()
            $('#miModalnuevo').modal('show');
        }
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

//modificar("+val.iddispositivos+")
//=========================gestion Proveedores===========================
 /*function ingresarProveedor(){
  if ($('#descripcion').val()=='') {
                alertify.set({ delay: 3000 });
                alertify.set({ color: 'blue' });
                alertify.error("Algun campos vacio");
                return;
        }
    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        }); 

        var FrmData = {
            descripcion:$('#descripcion').val(),
          
        }
        $.ajax({
            url:'/mantenimientoSoft/public/registroProveedor', // Url que se envia para la solicitud
            method: 'POST',             // Tipo de solicitud que se enviará, llamado como método
            data: FrmData,               // Datos enviados al servidor, un conjunto de pares clave / valor (es decir, campos de formulario y valores)
            dataType: 'json',
            success: function(requestData)   // Una función a ser llamada si la solicitud tiene éxito
            {
             
              llenarProveedor();  
               $('#formularioModalProveedores')[0].reset();
            },
            complete: function(){
                alertify.set({ delay: 3000 });

                // log will hide after 10 seconds
                alertify.log("Guardado Correctamente");
            }
        });
}
*/
