 window.onload = function() {
    UsuarioMostrar();
};

function UsuarioMostrar(){
    $.get('usuariosMostrar', function (data) {
        $("#tablausuarios").html("");
        $.each(data, function(i, item) { //recorre el data 
            cargartablausuarios(item); // carga los datos en la tabla
        });      
    });
}

function cargartablausuarios(data){
  var especialidad="N/A";
  if(data.extratecnicos != null){
    especialidad=data.extratecnicos.especialidad;
  }
    $("#tablausuarios").append(
        "<tr id='fila_cod"+"'><td>"+ data.cedula +"\
         <td>"+ data.name +" "+ data.apellidos  +"</td>\
         <td>"+ data.celular +"</td>\
         <td>"+ data.sexo +"</td>\
         <td>"+ data.estado +"</td>\
         <td>"+ data.tipo_usuario.descripcion+"</td>\
         <td>"+ especialidad+"</td>\
         <td>"+ data.area.nombre +"</td>\
         <td>"+ data.email +"</td>\
         <td class='row'><button type='button' class='btn btn-success' id='btn-confirm' onClick='mostrarModal("+data.id+")'>Agregar</button></td></tr>"
    );
}

function mostrarModal() {
    $('#modalAsignacion').modal('show');
    cargarListaDispositivos();
}

function cargarListaDispositivos() {
	$('#tablaDispositivosA tbody tr').empty();
	$.ajax({
		url: 'obtenerDispositivos',
		type: 'GET',
		dataType: 'json',
		
	})
	.done(function(datos) {
        id_fila = 0;
		$.each(datos.dispositivos, function(index, val) {
            var out="";
            if (val.cod_activo=="Activo") {
                id_fila = id_fila + 1;
                out+="<tr id='numero_fila"+id_fila+"'>";
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
                out+="<td class='row'><center><button type='button' class='btn btn-info' id='agregarDispositivo"+id_fila+"' onClick='asignacionDispositivos("+val.iddispositivos+","+id_fila+")'><i id='id_icono"+id_fila+"' class='fa fa-arrow-right'></i></button></center></td>"
                out+="</tr>";
            }
            $('#tablaDispositivosA tbody tr:last').after(out);
	    })
	})
	.fail(function() {
		console.log("error");
	})
};

function asignacionDispositivos(valor,numero_dispositivo){
    if ($('#agregarDispositivo'+numero_dispositivo).hasClass('btn btn-danger'))
    { 
        $('#agregarDispositivo'+numero_dispositivo).removeClass('btn btn-danger');
        $('#agregarDispositivo'+numero_dispositivo).addClass('btn btn-info');
        $('#id_icono'+numero_dispositivo).removeClass('fa fa-times');
        $('#id_icono'+numero_dispositivo).addClass('fa fa-arrow-right');
     }
     else
     {
        $('#agregarDispositivo'+numero_dispositivo).removeClass('btn btn-info');
        $('#agregarDispositivo'+numero_dispositivo).addClass('btn btn-danger');
        $('#id_icono'+numero_dispositivo).removeClass('fa fa-arrow-right');
        $('#id_icono'+numero_dispositivo).addClass('fa fa-times');
    }
}

function guardarAsignaciones(){

}