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
         <td class='row'><button type='button' class='btn btn-success' onClick='mostrarModal("+data.id+")'>Agregar</button></td></tr>"
    );
}

function mostrarModal(id_usuario) {
    $('#modalAsignacion').modal('show');
    cargarListaDispositivos();
    $('#asignar_dispositivos').val(id_usuario)
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
                out+="<td class='row'><center><button type='button' value ='0' class='btn btn-info' id='agregarDispositivo"+id_fila+"' onClick='marcarDispositivos("+val.iddispositivos+","+id_fila+")'><i id='id_icono"+id_fila+"' class='fa fa-arrow-right'></i></button></center></td>"
                out+="</tr>";
            }
            $('#tablaDispositivosA tbody').append(out);
	    })
	})
	.fail(function() {
		console.log("error");
	})
};

function marcarDispositivos(valor,numero_dispositivo){
    if ($('#agregarDispositivo'+numero_dispositivo).hasClass('btn btn-danger'))
    {
        $('#agregarDispositivo'+numero_dispositivo).val(0);
        $('#agregarDispositivo'+numero_dispositivo).removeClass('btn btn-danger');
        $('#agregarDispositivo'+numero_dispositivo).addClass('btn btn-info');
        $('#id_icono'+numero_dispositivo).removeClass('fa fa-times');
        $('#id_icono'+numero_dispositivo).addClass('fa fa-arrow-right');
     }
     else
     {
        $('#agregarDispositivo'+numero_dispositivo).val(valor);
        $('#agregarDispositivo'+numero_dispositivo).removeClass('btn btn-info');
        $('#agregarDispositivo'+numero_dispositivo).addClass('btn btn-danger');
        $('#id_icono'+numero_dispositivo).removeClass('fa fa-arrow-right');
        $('#id_icono'+numero_dispositivo).addClass('fa fa-times');
    }
}

function filtro_dispositivos() {
    var input, filter, table, tr, td,td1, i;
    input = document.getElementById("buscar_dispositivos");
    filter = input.value.toUpperCase();
    table = document.getElementById("tablaDispositivosA");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("td")[0];
      if (td) {
        if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
          tr[i].style.display = "";
        } else {
          tr[i].style.display = "none";
        }
      }       
    }
}

function guardarAsignaciones(){
    var arreglo = new Array();
    var dIc = false;
    $('#tablaDispositivosA tbody tr').each( function(){
        var id_dispositivo = ($(this).find("td").eq(7).find("button").val());
         if(id_dispositivo != 0){
             arreglo.push(id_dispositivo);
         }
    });
    $(arreglo).each(function (index, element) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        }); 
        var FrmData = {
            idusuario:$('#asignar_dispositivos').val(),
            iddispositivo:element,
            fecha_inicio:$('#fechaRecivido').val(),
            fecha_fin:$('#fechaEntrega').val(),
        }
        $.ajax({
            url:'asignacionDispositivos', 
            method: 'POST',          
            data: FrmData,    
            dataType: 'json',
            success: function(requestData) 
            {
                //alertify.success("DATOS INGRESADOS CORRECTAMENTE");
                dIc = true;
                $('#modalAsignacion').modal('hide');
            },
        });
    });
    if (dIc == true) {
        alertify.success("DATOS INGRESADOS CORRECTAMENTE");
    }
}

$('#asignar_dispositivos').on('submit',function(e){
	e.preventDefault();
	guardarAsignaciones();
});
