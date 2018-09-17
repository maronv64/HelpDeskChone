//esta funcion de trae todas la peticiones y la carga en la tabla 

$(document).ready(function()
       {
          BandejadePeticiones();
          mostrartecnicos();

 });
/*FUNCIÓN PARA CARGAR LAS PAETICIONES QUE SE ENCUENTRAN DISPONIBLES */
function BandejadePeticiones(){

    $.get('peticionesCargarDatos2', function (data) { 
        $('#tablapeticionesasignar').html(''); //esta la uso para limpiar la tabla en el modulo de asignacion por Jose Sabando
        $.each(data, function(a, item) { // recorremos cada uno de los datos que retorna el objero json n valores
            
       
            
            var fila ="";

            fila+= '<tr>';
            //
            fila+= '<td>'+item.usuario.area.nombre  +'</td>';
            //añade la descripcion del tipo de peticion
            fila+= '<td>'+item.usuario.name + " "+ item.usuario.apellidos  +'</td>';
            //añade la descripcion de la prioridad
            fila+= '<td>'+item.tipo_peticion.descripcion  +'</td>';
            //añade la descripcion del estado
            fila+= '<td>'+'00-00-00' +'</td>';
            //añade la nombre del usuario
            fila+= '<td>'+item.estado.descripcion +'</td>';
            //añade la nombre del area
            //
          fila+= "<td class='row'> <center> <button type='button' data-toggle='modal' data-target='#datospeticion' onClick='datospeticion("+item.idpeticion+")' class='btn btn-info'><i class='fa fa-eye'></i>  Ver</button></td>";
           fila+= "<td class='row'> <center> <button type='button' class='btn btn-success' onClick='asignaridpeticion("+item.idpeticion+","+item.usuario.id+")' data-toggle='modal' data-target='#Asignacionmodal'><i class='fa fa-plus'></i>  Asignar</button></td>";
            fila+= '</tr>';



            //para agregar la fila a la tabla por Jose Sabando
             $('#tablapeticionesasignar').append(      
                 fila                                   
            );
            
            
        });  

    }); 

}

function mostrarasignartecnico(){
       $('#mostrarformAsig1').prop('hidden','true');

   // $('#tabladepeticionesaAsig').prop('hidden','true');


}

function mostrarmodal1 (){
  
    $('#Asignacionmodal').modal('show');
    
/*    $("#modal-btn-si").on("click", function(){

        $("#mi-modal1").modal('hide');
    });
      
    $("#modal-btn-no").on("click", function(){
        $("#mi-modal1").modal('hide');
      });*/
  }


function  mostrartecnicos(){
    var filacod=0;
    $.get('listaTecnicos', function (data) {
        $("#tablaasignartecnico").html("");
        $.each(data, function(i, item) { //recorre el data 3
          filacod+1;
            cargartablatecnicos(item,filacod); // carga los datos en la tabla
        });      
    });
}

function cargartablatecnicos(data, filacod){
     
    $("#tablaasignartecnico").append(
        "<tr id='fila_codtec"+"'><td>"+data.name +" "+ data.apellidos+"\
         <td>"+ data.extratecnicos.especialidad +"</td>\
         <td class='row' style='text-align: center'><button id='botonagregar"+filacod+"'  type='button' class='btn btn-info' data-toggle='modal' data-target='#actualizarusuariomodal' onClick='tablatecnicosAsig("+data.id+","+filacod+")'><i id='ibotoagra' class='fa fa-arrow-right'></i></button>\
         </tr>"
    );
}


function tablatecnicosAsig(valor,filacod1){
  $('#botonagregar'+filacod1).removeClass('btn btn-info');
  $('#botonagregar'+filacod1).addClass('btn btn-danger');
    $('#ibotoagra').removeClass('fa fa-arrow-right');
  $('#ibotoagra').addClass('fa fa-times');
  
   var filacod=0;
 $.get('listaTecnicos', function (data) {
        $.each(data, function(i, item) { //recorre el data 

            filacod+1;
        if(item.id==valor){
            $("#tecnicosasignadostable").append(
            "<tr id='fila_cod"+filacod+"'><td hidden>"+ item.id +"\
            <td>"+item.name +" "+ item.apellidos+"</td>\
             <td>"+ item.extratecnicos.especialidad +"</td>\
             <td class='row' style='text-align: center'><button  type='button' class='btn btn-danger' data-toggle='modal' data-target='#actualizarusuariomodal' onClick='eliminarFila("+filacod+")'><i class='fa fa-times'></i></button>\
            </tr>"
             );
        }
        });      
    });
 $("#tabladetecnicosasignados").prop('hidden',false);
 
}

function limpiartablatacnicos(){
      $("#tecnicosasignadostable").html("");
        $("#tabladetecnicosasignados").prop('hidden',true);
}

function eliminarFila(index) {
    $('#fila_cod'+index).remove();
}

function datospeticion(val){
     $.get('datospeticion/'+val, function (data) {  //esta la uso para limpiar la tabla en el modulo de asignacion por Jose Sabando
        console.log(data);

        $.each(data, function(a, item) {
            document.getElementById('usuariop').innerHTML = item.usuario.name +" "+item.usuario.apellidos;
            document.getElementById('areap').innerHTML =  item.usuario.area.nombre;
            document.getElementById('tipopp').innerHTML = item.tipo_peticion.descripcion;
            document.getElementById('fechap').innerHTML = '00-00-00';
            document.getElementById('prioridadp').innerHTML = item.prioridad.descripcion;
            document.getElementById('estadop').innerHTML =  item.estado.descripcion;
            document.getElementById('descripcionp').innerHTML = item.descripcion;
        });
    });
}



function guardartecnicosasignados(idusuario,idasig){ 
        var FrmData = {
            idasig: idasig,
            idusuario: idusuario,
        }
        
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: 'guardarUsuariosAsignacion/'+idusuario+'/'+idasig,  // Url que se envia para la solicitud esta en el web php es la ruta
            method: "POST",             // Tipo de solicitud que se enviará, llamado como método
            data: FrmData,               // Datos enviados al servidor, un conjunto de pares clave / valor (es decir, campos de formulario y valores)
            success: function (data)   // Una función a ser llamada si la solicitud tiene éxito
            {  

        
            },
            error: function () {   
         
        
            }
        });  
}

    function asignartecnicos(idasig){
      $('#tecnicosasignadostable tr').each(function () {
        idtecnico = $(this).find("td").eq(0).html();
        guardartecnicosasignados(idtecnico,idasig);
        //console.log(costo_t);
    });
    }

function asignaridpeticion(idpeticion,idusuario){
  $('#idpeticionasig').val(idpeticion);
   $('#idusuarioasig').val(idusuario);
  
}


$('#formasig').on('submit',function(e){
  e.preventDefault();
  AsignacionInsert();
  $('#Asignacionmodal').modal('hide');
    
  limpiartablatacnicos();

});

/*INSERTAR ASIGNACIONES*/
function AsignacionInsert(){ 
        var FrmData = {
            idpeticion: $('#idpeticionasig').val(),
            FechaInicial: $('#fechainicialAsig').val(),
            FechaLimite: $('#fechafinalAsig').val(),
            observacion: $('#observacionAsig').val(),
        }
        
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: 'asigtareas', // Url que se envia para la solicitud esta en el web php es la ruta
            method: "POST",             // Tipo de solicitud que se enviará, llamado como método
            data: FrmData,               // Datos enviados al servidor, un conjunto de pares clave / valor (es decir, campos de formulario y valores)
            success: function (data)   // Una función a ser llamada si la solicitud tiene éxito
            {  
              asignartecnicos(data.idasignacion);
                mensaje1 = "Datos guardados correctamente";
                 alertify.success(mensaje1);
                 
        
            },
            error: function () {     
                mensaje = "OCURRIO UN ERROR";
                alert(mensaje);
            }
        });  
    }