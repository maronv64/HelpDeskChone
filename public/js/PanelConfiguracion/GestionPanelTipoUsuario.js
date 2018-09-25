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
            out+="<td><center><a class='fa fa-edit btn btn-info' onclick='ModalPanelConfiguracion(1)' title='Modificar datos del registro'></a></center></td>";
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

////////////////////////////////////////////Panel Configuracion objetos//////////////////////////////////

function ModalPanelConfiguracion(num) {
    $('#id_modal_panel_actualizacion').modal('show');
    var agregar='';
    if(num==1){
        ///////////Se ejecuta si es llamado desde tipos de usuarios///////////
        agregar+="<label>Descripción del tipo de usuario</label>"
        agregar+="<input type='text' class='form-control form-control-sm' placeholder='Descripción' id='modif_descrip_tipo_usu' required>"
        $('#id_titulo_panel').text('Datos del tipo de usuario');
        $('#id_ingresar_todo_aqui').empty();
        $('#id_ingresar_todo_aqui').html(agregar);
        eliminarClasesIconos();
        $( "#id_icono_mostrar").addClass("fa fa-user");
    }else{
        if (num==2) {
            ////////////Se ejecuta si se la llama desde especialidades////////////
            agregar+="<label>Descripción de la especialidad</label>"
            agregar+="<input type='text' class='form-control form-control-sm' placeholder='Descripción' id='modif_descrip_especi' required>"
            $('#id_titulo_panel').text('Datos de especialidad');
            $('#id_ingresar_todo_aqui').empty();
            $('#id_ingresar_todo_aqui').html(agregar);
            eliminarClasesIconos();
            $( "#id_icono_mostrar").addClass("fa fa-industry");
        }
        else{
            if (num==3) {
                ///////////Se ejecuta si se la llama desde el tipo de dispositivo/////////////
                agregar+="<label>Descripción del tipo de dispositivo</label>"
                agregar+="<input type='text' class='form-control form-control-sm' placeholder='Descripción' id='modif_descrip_tipo_disp' required>"
                $('#id_titulo_panel').text('Datos del tipo de dispositivo');
                $('#id_ingresar_todo_aqui').empty();
                $('#id_ingresar_todo_aqui').html(agregar);
                eliminarClasesIconos();
                $( "#id_icono_mostrar").addClass("fa fa-laptop");
            }else{
                if(num==4){
                    ////////////Se ejecuta si se llama desde el formulario de áreas///////////
                    agregar+="<label>Nombre del area</label>"
                    agregar+="<input type='text' class='form-control form-control-sm' placeholder=''  id='modif_nomb_area' required>"
                    agregar+="<label>Correo</label>"
                    agregar+="<input type='text' class='form-control form-control-sm' placeholder=''  id='modif_correo_area' required>"
                    agregar+="<label>Extensión</label>"
                    agregar+="<input type='text' class='form-control form-control-sm' placeholder=''  id='modif_extension_area' required>"
                    agregar+="<label>Siglas</label>"
                    agregar+="<input type='text' class='form-control form-control-sm' placeholder=''  id='modif_siglas_area' required>"
                    $('#id_titulo_panel').text('Datos del tipo de dispositivo');
                    $('#id_ingresar_todo_aqui').empty();
                    $('#id_ingresar_todo_aqui').html(agregar);
                    eliminarClasesIconos();
                    $( "#id_icono_mostrar").addClass("fa fa-building");
                    $('#id_titulo_panel').text('Datos del área');
                }
            }
        }
    }
}
///////////////////////////////Eliminar clases iconos de el titulo////////////////////
function eliminarClasesIconos() {
    $( "#id_icono_mostrar").removeClass("fa fa-building");
    $( "#id_icono_mostrar").removeClass("fa fa-industry");
    $( "#id_icono_mostrar").removeClass("fa fa-user");
    $( "#id_icono_mostrar").removeClass("fa fa-laptop");
}

$('#formmodalactualizarPanel').on('submit',function(e){
	e.preventDefault();
	alert("");
});