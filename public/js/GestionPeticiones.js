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
function CargarPeticiones(){ 
    $.get('peticionesCargarDatos', function (data) { 
            $.each(data.peticiones, function(a, peticion) { // recorremos cada uno de los datos que retorna el objero json n valores
                
                $('#dgvPeticiones').html('');
                
                var fila ="";

                fila+= '<tr>';
                fila+= '<td>'+peticion.descripcion  +'</td>';
                //añade la descripcion del tipo de peticion
                
                    $.each(data.tipo_peticiones,function(b,tipo_peticion){
                        if (peticion.idtipopeticion==tipo_peticion.idtipopeticion) {
                            fila+= '<td>'+tipo_peticion.descripcion  +'</td>';
                        }                           
                    }); 
                ;
                //añade la descripcion de la prioridad
                
                    $.each(data.prioridades,function(c,prioridad){
                        if (peticion.idprioridad==prioridad.idprioridad) {
                            fila+= '<td>'+prioridad.descripcion  +'</td>';
                        }    
                    }); 
                ;
                
                //añade la descripcion del estado
                
                    $.each(data.estados,function(d,estado){
                        if (peticion.idestado==estado.idestado) {
                            fila+= '<td>'+estado.descripcion  +'</td>';
                        }    
                    }); 
                ;
                //añade la nombre del usuario
                
                    $.each(data.usuarios,function(f,usuario){
                        if (peticion.idusuario==usuario.id) {
                            fila+= '<td>'+usuario.name  +'</td>';
                            //añade la nombre del area
                            
                            $.each(data.areas,function(g,area){
                                console.log(area);
                                console.log(usuario);                   
                                if (usuario.idarea==area.idarea) {
                                    fila+= '<td>'+area.nombre  +'</td>';
                                }
                            });

                        }    
                    }); 
                ;


                fila+= '</tr>';

                $('#dgvPeticiones').append(//identificamos ala nota que queremos add esta otra nota        
                     fila									
                );
                
            });  
  
    }); 

}

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
            fila+= "<td class='row'> <center> <button type='button' class='btn btn-info' data-toggle='modal' data-target='#actualizarusuariomodal' onClick='verModalPeticionesActualizar("+item.idpeticion+")'><i class='fa fa-edit'></i></button>"+
                    "<button type='button' class='btn btn-danger' onClick='UsuarioDelete("+item.idpeticion+")'><i class='fa fa-trash'></i></button> </center> </td></tr>";
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
        $.each(data, function(a, item) { 
           
           
            //$('#cmbEstados').html('<option disabled selected>Seleccione el tipo de Peticion</option> ');
            var fila ="";

            fila+= '<option value='+ item.idestado +'>'+ item.descripcion +'</option>';

            
            $('#cmbEstados').append(  
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
        //<option disabled selected>Seleccione la Prioridad</option>

        $.each(data, function(a, item) { 
           
            
            //$('#cmbEstados').html('<option disabled selected>Seleccione el tipo de Peticion</option> ');
            var fila ="";

            fila+= '<option value='+ item.idprioridad +'>'+ item.descripcion +'</option>';

            
            $('#cmbPrioridades').append(  
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
        $.each(data, function(a, item) { 
           
            
            //$('#cmbEstados').html('<option disabled selected>Seleccione el tipo de Peticion</option> ');
            var fila ="";

            fila+= '<option value='+ item.idtipopeticion +'>'+ item.descripcion +'</option>';

            
            $('#cmbTipoPeticiones').append(  
                 fila									
            );
            
        });  

    }); 
}

function verModalPeticionesActualizar(id)
{
    $( "#modalBuscarUsuario" ).modal('show');
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

function CargarUsuariosPorArea(idarea,consul){
    $.get('usuariosFiltroPorArea/'+idarea+'/'+consul, function (data) { 
        $('#dgvUsuarios').html('');
        $.each(data, function(a, item) { // recorremos cada uno de los datos que retorna el objero json n valores
            
           
            
            var fila ="";

            fila+= '<tr>';
            //añade la cedula
            fila+= '<td>'+item.cedula  +'</td>';
            //añade el nombre
            fila+= '<td>'+item.name  +'</td>';
            //añade el celular
            fila+= '<td>'+item.celular  +'</td>';
            //añade el area
            fila+= '<td>'+item.area.nombre  +'</td>';
            //añade el email
            fila+= '<td>'+item.email  +'</td>';
            //añade el boton
            fila+= "<td class='row'> <center> <button type='button' class='btn btn-info' data-toggle='modal' data-target='#actualizarusuariomodal' onClick='AddUsuario("+item.id+")'><i class='fa fa-edit'></i></button>";
         
            //
            fila+= '</tr>';

            $('#dgvUsuarios').append(//identificamos ala nota que queremos add esta otra nota        
                 fila									
            );
            
        });  

    });     
}

function AddUsuario(id)
{
    $.get('usuarioBuscar/'+id, function (data) {
        var fila='';
        //alert(data.id);
        fila=data.name+" "+data.apellidos;
        $( "#txtUsuario" ).val(fila);
        $( "#iduser" ).val(id );
        $( "#modalBuscarUsuario" ).modal('hide');
    });
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
$( "#btnMostrar" ).click(function() {
    //CargarPeticiones();
    $( "#prueba" ).html('');
    CargarPeticiones2();
});


$( "#btnAgregarUsuario" ).click(function() {

    $( "#modalBuscarUsuario" ).modal('show');
    CargarAreas();
    
});


$('#txtBuscar').keyup(function() { 
    //alert('changed!');
    CargarUsuariosPorArea($('#cmbAreas').val(),$('#txtBuscar').val());
});

//-----------------------------------------------------------------


$('#cmbAreas').change(function() { 
    //alert( $('#cmbAreas').val() );
    CargarUsuariosPorArea($('#cmbAreas').val(),$('#txtBuscar').val());

});

$( "#btnEnviarPeticion" ).click(function() {
    var FrmData = {
        idprioridad:    $('#cmbPrioridades').val(),
        idestado:       $('#cmbEstados').val(),
        idtipopeticion: $('#cmbTipoPeticiones').val(),
        idusuario:      $('#iduser').val(),
        descripcion:    $('#txtDescripcion').val(),
    }
    // alert(
    //     "idPrioridad:     "+$('#cmbPrioridades').val()+
    //     "idestado:        "+$('#cmbEstados').val()+
    //     "idtipopeticion:  "+$('#cmbTipoPeticiones').val()+
    //     "idusuario:       "+$('#iduser').val()+
    //     "descripcion:     "+$('#txtDescripcion').val()
    // );
    
});