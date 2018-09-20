// envento al cargar la vista
window.onload = function() {
    window.onload=//CargarEstados(),
    CargarPrioridades(),
    CargarTipoPeticiones(),
    CargarPeticionesNorm()
};

//////////////////////////////////////interacciones para usuarios sin pribilegios//////////////////////////////////////////////////////////


function CargarPrioridades()
{
    $.get('prioridadesCargarDatos', function (data) { 
        
        //combo de la pagina Principal
        $('#cmbPrioridadesN').html('');
        $('#cmbPrioridadesN').html('<option disabled selected>Seleccione la Prioridad</option>');
        
        //combo de la modal
        $('#cmbPrioridadesNM').html('');

        $.each(data, function(a, item) { 
           
            
            //$('#cmbEstados').html('<option disabled selected>Seleccione el tipo de Peticion</option> ');
            var fila ="";

            fila+= '<option value='+ item.idprioridad +'>'+ item.descripcion +'</option>';

             //combo de la pagina Principal
            $('#cmbPrioridadesN').append(  
                 fila									
            );
            //combo de la modal
            $('#cmbPrioridadesNM').append(  
                fila									
           );
            
        });  

    }); 
}

function CargarTipoPeticiones()
{
    $.get('tipopeticionesCargarDatos', function (data) { 

        //combo de la pagina Principal
        $('#cmbTipoPeticionesN').html('');
        $('#cmbTipoPeticionesN').html('<option disabled selected>Seleccione el tipo de Peticion</option>');
        //combo de la modal
        $('#cmbTipoPeticionesNM').html('');

        $.each(data, function(a, item) { 
           
            
            //$('#cmbEstados').html('<option disabled selected>Seleccione el tipo de Peticion</option> ');
            var fila ="";

            fila+= '<option value='+ item.idtipopeticion +'>'+ item.descripcion +'</option>';

             //combo de la pagina Principal
            $('#cmbTipoPeticionesN').append(  
                 fila									
            );
            //combo de la modal
            $('#cmbTipoPeticionesNM').append(  
                fila									
           );
            
        });  

    }); 
}


function CargarPeticionesNorm(){
    var FrmData = {
        idusuario:     $('#idmiuser').val(),
    }
    $.get('peticionesNormCargarDatos/'+FrmData.idusuario, function (data) { 
        $('#dgvMisPeticiones').html('');
        $.each(data, function(a, item) { // recorremos cada uno de los datos que retorna el objero json n valores
            
           
            
            var fila ="";

            fila+= '<tr>';
            //
            fila+= '<td>'+item.descripcion  +'</td>';
            //añade la descripcion del tipo de peticion
            fila+= '<td>'+item.tipo_peticion.descripcion  +'</td>';
            //añade la descripcion de la prioridad
            fila+= '<td>'+item.prioridad.descripcion  +'</td>';
            //añade la descripcion del estado
            fila+= '<td>'+item.estado.descripcion  +'</td>';
            //
             //añade la fecha
             fila+= '<td>'+item.created_at  +'</td>';
             //
            fila+= "<td class='row'> <center> <button type='button' class='btn btn-info' data-toggle='modal' data-target='#actualizarusuariomodal' onClick='verModalModicarPeticion("+item.idpeticion+")'><i class='fa fa-edit'></i></button>"+
                    "<button type='button' class='btn btn-danger' onClick='eliminarPeticion("+item.idpeticion+")'><i class='fa fa-trash'></i></button> </center> </td></tr>";
            //
            fila+= '</tr>';

            $('#dgvMisPeticiones').append(//identificamos ala nota que queremos add esta otra nota        
                 fila									
            );
            
        });  

    }); 

}

//-----------------------------otras funciones-------------------------
function verModalModicarPeticion(id) {
    
   
    $.get('peticiones/'+id, function (data) { 
        $('#txtDescripcionNM').val(data.descripcion); 
        $('#cmbTipoPeticionesNM').val(data.idtipopeticion);
        $('#idmiestado').val(data.idestado);
        $('#cmbPrioridadesNM').val(data.idprioridad);
        $('#idmiuser').val(data.usuario.id);
        $('#var_idpeticionN').val(id);
    }); 
    $( "#modalEditarPeticionNorm" ).modal('show');
}

function esta_vacio(cadena)
{
    if (cadena==null) {
        return true;
    }
}
//-----------------------------eventos---------------------------------------------


//----------------------insertar una peticion
$('#btnEnviarPN').click(function() {
    var FrmData = {
        idprioridad:    $('#cmbPrioridadesN').val(),
        idestado:       1,
        idtipopeticion: $('#cmbTipoPeticionesN').val(),
        idusuario:      $('#idmiuser').val(),
        descripcion:    $('#txtDescripcionN').val(),
    }
    
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        url: 'peticiones', // Url que se envia para la solicitud esta en el web php es la ruta
        method: "POST",             // Tipo de solicitud que se enviará, llamado como método
        data: FrmData,               // Datos enviados al servidor, un conjunto de pares clave / valor (es decir, campos de formulario y valores)
        success: function (data)   // Una función a ser llamada si la solicitud tiene éxito
        {  
            mensaje1 = "DATOS GUARDADOS CORRECTAMENTE";
            CargarPeticionesNorm();     
            alert(mensaje1);
            
        },
        error: function () {     
            mensaje = "OCURRIO UN ERROR";
            alert(mensaje);
        }
    });  

    // $.post("peticiones", FrmData, function(result){
    //     alert('Su petcion fue enviada...');
    //     CargarPeticiones2();
    // });
});
//----------------------eliminar una peticion
function eliminarPeticion(id) {

    var FrmData = {
        idpeticion:     id,
    }

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        url: 'peticiones/'+id, // Url que se envia para la solicitud esta en el web php es la ruta
        method: "DELETE",             // Tipo de solicitud que se enviará, llamado como método
        data: FrmData,               // Datos enviados al servidor, un conjunto de pares clave / valor (es decir, campos de formulario y valores)
        success: function (data)   // Una función a ser llamada si la solicitud tiene éxito
        {  
            mensaje1 = "DATOS ELIMINADOS CON EXITO";
            CargarPeticionesNorm();     
            alert(mensaje1);
            
        },
        error: function () {     
            mensaje = "OCURRIO UN ERROR";
            alert(mensaje);
        }
    });  
}
//----------------------modificar una peticion
$( "#btnActualizarPeticionNM" ).click(function() {
    
    var FrmData = {
        idpeticion:     $('#var_idpeticionN').val(),
        idprioridad:    $('#cmbPrioridadesNM').val(),
        idestado:       1,
        idtipopeticion: $('#cmbTipoPeticionesNM').val(),
        idusuario:      $('#idmiuser').val(),
        descripcion:    $('#txtDescripcionNM').val(),
    }
    debugger
    //alert("llene los campos correspondientes "+$('#iduser').val())
    

    if (
        esta_vacio($('#var_idpeticionN  ').val())      ||  
        esta_vacio($('#cmbPrioridadesNM').val())      ||
        esta_vacio($('#cmbTipoPeticionesNM').val())   || 
        esta_vacio($('#txtDescripcionNM').val()) 
        )
    {
        alert('LLçlene todos los campos por favor');
    } else{

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    
        $.ajax({
            url: 'peticiones/'+FrmData, // Url que se envia para la solicitud esta en el web php es la ruta
            method: "PUT",             // Tipo de solicitud que se enviará, llamado como método
            data: FrmData,               // Datos enviados al servidor, un conjunto de pares clave / valor (es decir, campos de formulario y valores)
            success: function (data)   // Una función a ser llamada si la solicitud tiene éxito
            {  
                mensaje1 = "DATOS GUARDADOS CORRECTAMENTE";
                CargarPeticionesNorm();     
                alert(mensaje1);
                
            },
            error: function () {     
                mensaje = "OCURRIO UN ERROR";
                alert(mensaje);
            }
        });  
    
    }
});
