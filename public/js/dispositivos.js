
window.onload = function() {
    cargarListaDispositivos();
};

$('#guardar_datos').click(function(event)
	{
		guardar();
});

function limpiarModal() {
    $('#modal_descripcion').val('')
    $('#modal_tipo_dispositivo').val()
    $('#modal_serie').val('')
    $('#modal_color').val('')
    $('#modal_modelo').val('')
    $('#modal_marca').val('')
}

function limpiarPrincipal() {
    $('#add_nom_dispositivo').val('')
    $('#add_tipodispositivo').val('Tipo de dispositivo')
    $('#add_num_serie').val('')
    $('#add_color').val('')
    $('#add_modelo').val('')
    $('#add_marca').val('')
}

//VERIFICA SI LOS CAMPOS DE EL FORMULARIO DE INGRESO SE ENCUENTRAN CON INFORMACION INGRESADA
function Validar_campos() {
    if ($('#add_nom_dispositivo').val()==''||
        $('#add_tipodispositivo').val()==''||
        $('#add_num_serie').val()==''||
        $('#add_color').val()==''||
        $('#add_modelo').val()==''||
        $('#add_marca').val()=='') 
    {
        return false;
    }
    else
    {
        return true;
    }
}

//VERIFICA SI LOS CAMPOS DEL MODAL SE ENCUENTRAN CON INFORMACION
function Validar_campos_modal() {
    if ($('#modal_descripcion').val()==''||
        $('#modal_tipo_dispositivo').val()==''||
        $('#modal_serie').val()==''||
        $('#modal_color').val()==''||
        $('#modal_modelo').val()==''||
        $('#modal_marca').val()=='')
    {
        return false;
    }
    else
    {
        return true;
    }
}

function guardar() {
    if (Validar_campos()==false) {
        alertify.error("LLENE TODOS LOS CAMPOS");
        return;
    }
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    }); 
    var actividad='Activo';
    var FrmData = {
        nombredispositivo:$('#add_nom_dispositivo').val(),
        idtipodispositivos:$('#add_tipodispositivo').val(),
        serie:$('#add_num_serie').val(),
        color:$('#add_color').val(),
        modelo:$('#add_modelo').val(),
        marca:$('#add_marca').val(),
        cod_activo:actividad, 
    }
    $.ajax({
        url:'dispositivos', // Url que se envia para la solicitud
        method: 'POST',             // Tipo de solicitud que se enviará, llamado como método
        data: FrmData,               // Datos enviados al servidor, un conjunto de pares clave / valor (es decir, campos de formulario y valores)
        dataType: 'json',
        success: function(requestData)   // Una función a ser llamada si la solicitud tiene éxito
        {
            limpiarPrincipal();
            alertify.success("DATOS INGRESADOS CORRECTAMENTE");
        },
        complete: function(){ 
            cargarListaDispositivos();
        }
    });
}

//Funcion para modificar los valores de la base de datos por los cambiados en el modal
function modificar(iddispositivo, exp) {
    var actividad='Activo';
    var FrmData;
    if(exp==1){
            $("#id_modal_conf_elim").modal('show');
            $("#btn-modal-dispo-si").val(iddispositivo);
        }
    else{
        if (Validar_campos_modal()==false) {
            return;
        }
        FrmData = {
            idDispositivo:iddispositivo,
            nombredispositivo:$('#modal_descripcion').val(),
            idtipodispositivos:$('#modal_tipo_dispositivo').val(),
            serie:$('#modal_serie').val(),
            color:$('#modal_color').val(),
            modelo:$('#modal_modelo').val(),
            marca:$('#modal_marca').val(),
            cod_activo:actividad,
        }
        ReferenciaModificar(FrmData, iddispositivo);
    }
 }

 //Muestra un modal para confirmar eliminacion de dispositivos
 $("#btn-modal-dispo-si").on("click", function(){
    var FrmData;
    actividad='Inactivo';
    FrmData = {
        idDispositivo:$("#btn-modal-dispo-si").val(),
        nombredispositivo:'',
        idtipodispositivos:'',
        serie:'',
        color:'',
        modelo:'',
        marca:'',
        cod_activo:actividad,
    }
    ReferenciaModificar(FrmData, $("#btn-modal-dispo-si").val());
    $("#id_modal_conf_elim").modal('hide');
});

//Mensaje de cancelado del modal eliminacion
$("#btn-modal-dispo-no").on("click", function(){
    alertify.error('ACCIÓN CANCELADA')
    $("#id_modal_conf_elim").modal('hide');
});

//funcion para activar el envio de datos en funcion modificar
 function ReferenciaModificar(FrmData, iddispositivo) {
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
            alertify.success(mensaje);
            $('#miModalnuevo').modal('hide');
            cargarListaDispositivos();
        },
        error: function () {     
            mensaje = "HA OCURRIDO UN ERROR";
            alertify.error(mensaje);
            $('#miModalnuevo').modal('hide');
        }
    });
 }

//Muestra un modal con los datos de la grilla seleccionada para poder modificarlos
function modal(id_dispositivo)
{
    $('#modal_validar_cambios').val(id_dispositivo);
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
        }
    });
}

//Elimina un registro si se le envia un id en su llamada
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

//Carga la lista de los dispositivos en la tabla de la ventana principal
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
            if (val.cod_activo=="Activo") {
                out+="<tr>";
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
                out+="<td class='text-success'>"+val.cod_activo+"</td>";
                out+="<td><center><a class='fa fa-edit btn btn-info' onclick='modal("+val.iddispositivos+")' title='Modificar estado del dispositivo'></a> <a class='glyphicon glyphicon-trash btn btn-danger' onclick='modificar("+val.iddispositivos+",1)' title='Desactivar disponibilidad del dispositivo'></a></center></td>";
                //<span class='glyphicon glyphicon-phone form-control-feedback'></span>
                out+="</tr>";
            }
            $('#tablaDispositivos tbody tr:last').after(out);
	    })
	})
	.fail(function() {
		console.log("error");
	})
};

$('#frm_registrardispositivo').on('submit',function(e){
	e.preventDefault();
	guardar();
});

$('#frm_modal_registrardispositivo').on('submit',function(e){
	e.preventDefault();
	modificar($('#modal_validar_cambios').val(),2);
    limpiarModal();
});
