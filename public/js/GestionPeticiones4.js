/* url interesantes
http://www.genesisvargasj.com/blog/insertar-y-consultar-con-ajax-php-y-mysql
https://cybmeta.com/ajax-con-json-y-php-ejemplo-paso-a-paso
*/

//-------------------- Funciones-----------------------

//esta funcion de trae todas la peticiones y la carga en la tabla 
// pero no la uso porque demanada muchas iteraciones 
// dentro de muchos bucles 
// no es muy corecto
// att. maron vera 
// no me eliminen la funcion.
// eliminen lo suyo !

// function CargarPeticiones(){ 
//     $.get('peticionesCargarDatos', function (data) { 
//             $.each(data.peticiones, function(a, peticion) { // recorremos cada uno de los datos que retorna el objero json n valores
                
//                 $('#dgvPeticiones').html('');
                
//                 var fila ="";

//                 fila+= '<tr>';
//                 fila+= '<td>'+peticion.descripcion  +'</td>';
//                 //añade la descripcion del tipo de peticion
                
//                     $.each(data.tipo_peticiones,function(b,tipo_peticion){
//                         if (peticion.idtipopeticion==tipo_peticion.idtipopeticion) {
//                             fila+= '<td>'+tipo_peticion.descripcion  +'</td>';
//                         }                           
//                     }); 
//                 ;
//                 //añade la descripcion de la prioridad
                
//                     $.each(data.prioridades,function(c,prioridad){
//                         if (peticion.idprioridad==prioridad.idprioridad) {
//                             fila+= '<td>'+prioridad.descripcion  +'</td>';
//                         }    
//                     }); 
//                 ;
                
//                 //añade la descripcion del estado
                
//                     $.each(data.estados,function(d,estado){
//                         if (peticion.idestado==estado.idestado) {
//                             fila+= '<td>'+estado.descripcion  +'</td>';
//                         }    
//                     }); 
//                 ;
//                 //añade la nombre del usuario
                
//                     $.each(data.usuarios,function(f,usuario){
//                         if (peticion.idusuario==usuario.id) {
//                             fila+= '<td>'+usuario.name  +'</td>';
//                             //añade la nombre del area
                            
//                             $.each(data.areas,function(g,area){
//                                 console.log(area);
//                                 console.log(usuario);                   
//                                 if (usuario.idarea==area.idarea) {
//                                     fila+= '<td>'+area.nombre  +'</td>';
//                                 }
//                             });

//                         }    
//                     }); 
//                 ;


//                 fila+= '</tr>';

//                 $('#dgvPeticiones').append(//identificamos ala nota que queremos add esta otra nota        
//                      fila									
//                 );
                
//             });  
  
//     }); 

// }

//esta funcion de trae todas la peticiones y la carga en la tabla 

function CargarPeticiones2(){
    $.get('peticionesCargarDatos2', function (data) { 
        $('#dgvPeticiones').html('');
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
            //añade la nombre del usuario
            fila+= '<td>'+item.usuario.name  +'</td>';
            //añade la nombre del area
            fila+= '<td>'+item.usuario.area.nombre  +'</td>';
            //
             //añade la nombre del area
            fila+= '<td>'+item.created_at  +'</td>';
            //añade la nombre del area
            fila+= '<td>'+item.update_at  +'</td>';
             //
            fila+= "<td class='row'> <center> <button type='button' class='btn btn-info' data-toggle='modal' data-target='#actualizarusuariomodal' onClick='verModalModicarPeticion("+item.idpeticion+")'><i class='fa fa-edit'></i></button>"+
                    "<button type='button' class='btn btn-danger' onClick='eliminarPeticion("+item.idpeticion+")'><i class='fa fa-trash'></i></button> </center> </td></tr>";
            //
            fila+= '</tr>';

            $('#dgvPeticiones').append(//identificamos ala nota que queremos add esta otra nota        
                 fila									
            );
            
        });  

    }); 

}

function CargarEstados()
{
    $.get('estadosCargarDatos', function (data) { 
        
        $('#cmbEstados').html('');
        $('#cmbEstados').html('<option disabled selected>Seleccione el Estado</option>');
        // cmb del modal
        $('#cmbEstadosModal').html('');

        $.each(data, function(a, item) { 
           
           
            //$('#cmbEstados').html('<option disabled selected>Seleccione el tipo de Peticion</option> ');
            var fila ="";

            fila+= '<option value='+ item.idestado +'>'+ item.descripcion +'</option>';

            
            $('#cmbEstados').append(  
                 fila									
            );
            // cmb del modal
            $('#cmbEstadosModal').append(  
                fila									
           );

        });  

    }); 
}

function CargarPrioridades()
{
    $.get('prioridadesCargarDatos', function (data) { 
        
        $('#cmbPrioridades').html('');
        $('#cmbPrioridades').html('<option disabled selected>Seleccione la Prioridad</option>');

        //cmb del modal
        $('#cmbPrioridadesModal').html('');
        //<option disabled selected>Seleccione la Prioridad</option>

        $.each(data, function(a, item) { 
           
            
            //$('#cmbEstados').html('<option disabled selected>Seleccione el tipo de Peticion</option> ');
            var fila ="";

            fila+= '<option value='+ item.idprioridad +'>'+ item.descripcion +'</option>';

            
            $('#cmbPrioridades').append(  
                 fila									
            );
             //cmb del modal
            $('#cmbPrioridadesModal').append(  
                fila									
           );

            
        });  

    }); 
}

function CargarTipoPeticiones()
{
    $.get('tipopeticionesCargarDatos', function (data) { 

        $('#cmbTipoPeticiones').html('');
        $('#cmbTipoPeticiones').html('<option disabled selected>Seleccione el tipo de Peticion</option>');

        //cmb del modal
        $('#cmbTipoPeticionesModal').html('');

        $.each(data, function(a, item) { 
           
            
            //$('#cmbEstados').html('<option disabled selected>Seleccione el tipo de Peticion</option> ');
            var fila ="";

            fila+= '<option value='+ item.idtipopeticion +'>'+ item.descripcion +'</option>';

            
            $('#cmbTipoPeticiones').append(  
                 fila									
            );
             //cmb del modal
            $('#cmbTipoPeticionesModal').append(  
                fila									
           );

        });  

    }); 
}

function CargarAreas()
{
    $.get('areasCargarDatos', function (data) { 
        $('#cmbAreas').html('');
        $.each(data, function(a, item) { 
           
            
            //$('#cmbEstados').html('<option disabled selected>Seleccione el tipo de Peticion</option> ');
            var fila ="";

            fila+= '<option value='+ item.idarea +'>'+ item.nombre +'</option>';

            
            $('#cmbAreas').append(  
                 fila									
            );
            
        });  

    }); 
}

function CargarUsuariosPorArea(idarea,consulta){
    $.get('usuariosFiltroPorArea/'+idarea+'/'+consulta, function (data) { 
        $('#dgvUsuarios1').html('');
        $.each(data, function(a, item) { // recorremos cada uno de los datos que retorna el objero json n valores
            
           
            
            var fila ="";

            fila+= '<tr>';
            //añade la cedula
            fila+= '<td>'+item.cedula  +'</td>';
            //añade el nombre
            fila+= '<td>'+item.name  +'</td>';
            //añade el apellidos
            fila+= '<td>'+item.apellidos  +'</td>';
            //añade el celular
            fila+= '<td>'+item.celular  +'</td>';
            //añade el area
            fila+= '<td>'+item.area.nombre  +'</td>';
            //añade el email
            fila+= '<td>'+item.email  +'</td>';
            //añade el boton
            fila+= "<td class='row'> <center> <button type='button' class='btn btn-info' data-toggle='modal' data-target='#actualizarusuariomodal' onClick='pasarDatosUsuario("+item.id+")'><i class='fa fa-edit'></i></button>";
         
            //
            fila+= '</tr>';

            $('#dgvUsuarios1').append(//identificamos ala nota que queremos add esta otra nota        
                 fila									
            );
            
        });  

    });     
}

function pasarDatosUsuario(id)
{
    $.get('usuarioBuscar/'+id, function (data) { 

        $('#txtUsuario').html(''); 
        var fila ="";
        fila+= data.name +" "+data.apellidos;
        //$('#txtDescripcion').val('hola');
        $('#txtUsuario').val(fila);
        $('#iduser').val(data.id);//iduser
        $( "#modalBuscarUsuario1" ).modal('hide');


        // $.each(data, function(a, item) { 

        //     $('#txtUsuario').html(''); 
        //     var fila ="";
        //     fila+= item.name +" "+item.apellidos;
        //     //$('#txtDescripcion').val('hola');
        //     $('#txtUsuario').val(fila);
        //     $('#iduser').val(item.id);//iduser
        //     $( "#modalBuscarUsuario" ).modal('hide');
        // }); 

    }); 
}

function verModalModicarPeticion(id) {
    
    $('#var_idpeticion').val(id);
    $( "#modalEditarPeticion" ).modal('show');
    //alert(id);
    traerPeticion(id);
}

function mensaje(id)
{
    alert('este es el id: '+id);
}
///-------------------------- eventos ------------------------

// envento al cargar la vista
window.onload = function() {
    window.onload=CargarEstados(),
    CargarPeticiones2(),
    CargarPrioridades(),
    CargarTipoPeticiones()
};
//window.onload=CargarEstados();

//al dar clic se refresca la tabla de peticiones
$( "#btnMostrarPeticiones" ).click(function() {
    //CargarPeticiones();
    $( "#prueba" ).html('');
    CargarPeticiones2();
});

$( "#btnAgregarUsuario" ).click(function() {

    $( "#modalBuscarUsuario1" ).modal('show');
    CargarAreas();
    
});



$('#txtBuscar1').keyup(function() { 
    //alert('changed!');
    CargarUsuariosPorArea($('#cmbAreas').val(),$('#txtBuscar1').val());
    //alert("idarea "+$('#cmbAreas').val()+ " consulta: " +$('#txtBuscar1').val());
});

//-----------------------------------------------------------------

$('#cmbAreas').change(function() { 
    //alert( $('#cmbAreas').val() );
    CargarUsuariosPorArea($('#cmbAreas').val(),$('#txtBuscar1').val());
    //alert("idarea "+$('#cmbAreas').val()+ " consulta: " +$('#txtBuscar1').val());
});

$('#btnEnviarP').click(function() {
    var FrmData = {
        idprioridad:    $('#cmbPrioridades').val(),
        idestado:       $('#cmbEstados').val(),
        idtipopeticion: $('#cmbTipoPeticiones').val(),
        idusuario:      $('#iduser').val(),
        descripcion:    $('#txtDescripcion').val(),
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
            CargarPeticiones2();     
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

$( "#btnAgregarUsuario2" ).click(function() {

    $( "#modalBuscarUsuario1" ).modal('show');
    CargarAreas();
    
});

$( "#btnActualizarPeticion" ).click(function() {
    
    var FrmData = {
        idpeticion:     $('#var_idpeticion').val(),
        idprioridad:    $('#cmbPrioridadesModal').val(),
        idestado:       $('#cmbEstadosModal').val(),
        idtipopeticion: $('#cmbTipoPeticionesModal').val(),
        idusuario:      $('#iduser').val(),
        descripcion:    $('#txtDescripcionModal').val(),
    }

    //alert("llene los campos correspondientes "+$('#iduser').val())


    if (
        esta_vacio($('#var_idpeticion').val())      ||  
        esta_vacio($('#cmbPrioridadesModal').val())      ||
        esta_vacio($('#cmbEstadosModal').val())          || 
        esta_vacio($('#cmbTipoPeticionesModal').val())   || 
        ($('#txtUsuarioModal').val()=="Usuario")         || 
        esta_vacio($('#txtDescripcionModal').val()) 
        )
    {
        alert('Llene todos los campos por favor');
        // alert(  " idpeticion: "+FrmData.idpeticion+
        //         " idprioridad: "+FrmData.idprioridad+
        //         " idestado: "+FrmData.idestado+
        //         " idtipopeticion: "+FrmData.idtipopeticion+
        //         " idusuario: "+FrmData.idusuario+
        //         " descripcion: "+FrmData.descripcion
        //         )
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
                CargarPeticiones2();     
                alert(mensaje1);
                
            },
            error: function () {     
                mensaje = "OCURRIO UN ERROR";
                alert(mensaje);
            }
        });  
    
    }
});

function esta_vacio(cadena)
{
    if (cadena==null) {
        return true;
    }
}

function traerPeticion(id) {
    $.get('peticiones/'+id, function (data) { 
        $('#txtDescripcionModal').val(data.descripcion); 
        $('#cmbTipoPeticionesModal').val(data.idtipopeticion);
        $('#cmbEstadosModal').val(data.idestado);
        $('#cmbPrioridadesModal').val(data.idprioridad);
        $('#iduser').val(data.usuario.id);
        $('#txtUsuarioModal').val(data.usuario.name+ " " +data.usuario.apellidos); 

    }); 
}

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
            CargarPeticiones2();     
            alert(mensaje1);
            
        },
        error: function () {     
            mensaje = "OCURRIO UN ERROR";
            alert(mensaje);
        }
    });  
}

