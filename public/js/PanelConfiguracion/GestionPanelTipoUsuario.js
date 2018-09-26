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
            out+="<td><center><a class='fa fa-edit btn btn-info' onclick='ModalPanelConfiguracion(1,"+item.idtipo_Usuario+")' title='Modificar datos del registro'></a></center></td>";
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
var tipoPanel=0;
function ModalPanelConfiguracion(num, id) {
    $('#id_modal_panel_actualizacion').modal('show');
    var agregar='';
    if(num==1){
        ///////////Se ejecuta si es llamado desde tipos de usuarios///////////
        agregar+="<label>Descripción del tipo de usuario</label>"
        agregar+="<input type='text' autocomplete='off' class='form-control form-control-sm' placeholder='Descripción' id='modif_descrip_tipo_usu' required>"
        $('#id_titulo_panel').text('Datos del tipo de usuario');
        $('#id_ingresar_todo_aqui').empty();
        $('#id_ingresar_todo_aqui').html(agregar);
        eliminarClasesIconos();
        $( "#id_icono_mostrar").addClass("fa fa-user");
        tipoUsuarioFind(id);
        tipoPanel=1;
    }else{
        if (num==2) {
            ////////////Se ejecuta si se la llama desde especialidades////////////
            agregar+="<label>Descripción de la especialidad</label>"
            agregar+="<input type='text' autocomplete='off' class='form-control form-control-sm' placeholder='Descripción' id='modif_descrip_especi' required>"
            $('#id_titulo_panel').text('Datos de especialidad');
            $('#id_ingresar_todo_aqui').empty();
            $('#id_ingresar_todo_aqui').html(agregar);
            eliminarClasesIconos();
            $( "#id_icono_mostrar").addClass("fa fa-industry");
            especialidadFind(id);
            tipoPanel=2;
        }
        else{
            if (num==3) {
                ///////////Se ejecuta si se la llama desde el tipo de dispositivo/////////////
                agregar+="<label>Descripción del tipo de dispositivo</label>"
                agregar+="<input type='text' autocomplete='off' class='form-control form-control-sm' placeholder='Descripción' id='modif_descrip_tipo_disp' required>"
                $('#id_titulo_panel').text('Datos del tipo de dispositivo');
                $('#id_ingresar_todo_aqui').empty();
                $('#id_ingresar_todo_aqui').html(agregar);
                eliminarClasesIconos();
                $( "#id_icono_mostrar").addClass("fa fa-laptop");
                tipoDispositivoFind(id);
                tipoPanel=3;
            }else{
                if(num==4){
                    ////////////Se ejecuta si se llama desde el formulario de áreas///////////
                    agregar+="<label>Nombre del área</label>"
                    agregar+="<input type='text' autocomplete='off' class='form-control form-control-sm' placeholder=''  id='modif_nomb_area' required>"
                    agregar+="<label>Correo</label>"
                    agregar+="<input type='text' autocomplete='off' class='form-control form-control-sm' placeholder=''  id='modif_correo_area' required>"
                    agregar+="<label>Extensión</label>"
                    agregar+="<input type='text' autocomplete='off' class='form-control form-control-sm' placeholder=''  id='modif_extension_area' required>"
                    agregar+="<label>Siglas</label>"
                    agregar+="<input type='text' autocomplete='off' class='form-control form-control-sm' placeholder=''  id='modif_siglas_area' required>"
                    $('#id_titulo_panel').text('Datos del tipo de dispositivo');
                    $('#id_ingresar_todo_aqui').empty();
                    $('#id_ingresar_todo_aqui').html(agregar);
                    eliminarClasesIconos();
                    $( "#id_icono_mostrar").addClass("fa fa-building");
                    $('#id_titulo_panel').text('Datos del área');
                    areaFind(id);
                    tipoPanel=4;
                }
            }
        }
    }
    $( "#id_modalPanel_validar").val(id);
    $( "#id_modalPanel_cerrar").val(num);
    
}
///////////////////////////////Eliminar clases iconos de el titulo////////////////////
function eliminarClasesIconos() {
    $( "#id_icono_mostrar").removeClass("fa fa-building");
    $( "#id_icono_mostrar").removeClass("fa fa-industry");
    $( "#id_icono_mostrar").removeClass("fa fa-user");
    $( "#id_icono_mostrar").removeClass("fa fa-laptop");
}

/////////////////Funciones para llenar datos en el modal////////////////////////
function tipoUsuarioFind(id) {
    $.ajax({
        url: 'buscartipousuarios/'+id,
		type: 'GET',
		dataType: 'json',
        success: function (response) {
            $( "#modif_descrip_tipo_usu").val(response.descripcion);
        }
    });
}
function tipoDispositivoFind(id) {
    $.ajax({
        url: 'buscartipodispositivo/'+id,
		type: 'GET',
		dataType: 'json',
        success: function (response) {
            $( "#modif_descrip_tipo_disp").val(response.descripcion);
        }
    });
}
function especialidadFind(id) {
    $.ajax({
        url: 'buscarespecialidades/'+id,
		type: 'GET',
		dataType: 'json',
        success: function (response) {
            $( "#modif_descrip_especi").val(response.descripcion);
        }
    });
}

function areaFind(id) {
    $.ajax({
        url: 'buscarareas/'+id,
		type: 'GET',
		dataType: 'json',
        success: function (response) {
            $( "#modif_nomb_area").val(response.nombre);
            $( "#modif_correo_area").val(response.correo);
            $( "#modif_extension_area").val(response.extencion);
            $( "#modif_siglas_area").val(response.siglas);
        }
    });
}

function modificarDatosPanel() {
    debugger
    var FrmData;
    var ruta='', id=$("#id_modalPanel_validar").val();
    switch ($("#id_modalPanel_cerrar").val()) {
        case '1':
            FrmData = {
                idtipo_Usuario:$("#id_modalPanel_validar").val(),
                descripcion:$( "#modif_descrip_tipo_usu").val(),
            }
            ruta='tiposdeusuariosUp';
            break;
        case '2':
            FrmData = {
                idespecialidad:$("#id_modalPanel_validar").val(),
                descripcion:$( "#modif_descrip_especi").val(),
                }
                ruta='especialidadIngreso';
            break;
        case '3':
            FrmData = {
                idtipodispositivos:$("#id_modalPanel_validar").val(),
                descripcion:$( "#modif_descrip_tipo_disp").val(),
            }
            ruta='tiposdispositivosUp';
            break;
        case '4':
            FrmData = {
                idarea:$("#id_modalPanel_validar").val(),
                nombre:$("#modif_nomb_area").val(),
                correo:$("#modif_correo_area").val(),
                extencion:$("#modif_extension_area").val(),
                siglas:$("#modif_siglas_area").val(),
            }
            ruta='areasIngresos';
            break;
    
        default:
            break;
    }
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    }); 
    $.ajax({
        url: ruta+'/'+id, // Url que se envia para la solicitud esta en el web php es la ruta
        method: "PUT",             // Tipo de solicitud que se enviará, llamado como método
        data: FrmData,   
            success: function (datos) {
            mensaje = "DATOS MODIFICADOS CORRECTAMENTE";
            alertify.success(mensaje);
            $('#id_modal_panel_actualizacion').modal('hide');
        },
        error: function () {     
            mensaje = "HA OCURRIDO UN ERROR";
            alertify.error(mensaje);
            $('#id_modal_panel_actualizacion').modal('hide');
        }
    });
}

$('#formmodalactualizarPanel').on('submit',function(e){
	e.preventDefault();
    modificarDatosPanel();
    MostrarTiposDispositivos();
    MostrarEspecialidades();
    MostrarAreas();
    MostrarTiposUsuarios();
});
