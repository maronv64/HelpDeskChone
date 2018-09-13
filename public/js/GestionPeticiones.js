/* url interesantes
http://www.genesisvargasj.com/blog/insertar-y-consultar-con-ajax-php-y-mysql
https://cybmeta.com/ajax-con-json-y-php-ejemplo-paso-a-paso
*/


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
            fila+= "<td class='row'> <center> <button type='button' class='btn btn-info' data-toggle='modal' data-target='#actualizarusuariomodal' onClick='prepararactualizarusuario("+item.idpeticion+")'><i class='fa fa-edit'></i></button>"+
                    "<button type='button' class='btn btn-danger' onClick='UsuarioDelete("+item.idpeticion+")'><i class='fa fa-trash'></i></button> </center> </td></tr>";
            //
            fila+= '</tr>';

            $('#dgvPeticiones').append(//identificamos ala nota que queremos add esta otra nota        
                 fila									
            );
            
        });  

    }); 

}

//al dar clic se refresca la tabla de peticiones
$( "#btnMostrar" ).click(function() {
    //CargarPeticiones();
    $( "#prueba" ).html('');
    CargarPeticiones2();
});

function CargarEstados()
{
    $.get('estadosCargarDatos', function (data) { 
        $('#cmbEstados').html('');
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

window.onload = function() {
    window.onload=CargarEstados(),
    CargarPeticiones2(),
    CargarPrioridades(),
    CargarTipoPeticiones()
};
//window.onload=CargarEstados();