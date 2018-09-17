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
            fila+= '<td>'+item.usuario.area.nombre +'</td>';
            //añade la descripcion de la prioridad
            fila+= '<td>'+item.tipo_peticion.descripcion  +'</td>';
            //añade la descripcion del estado
            fila+= '<td>'+'00-00-00' +'</td>';
            //añade la nombre del usuario
            fila+= '<td>'+item.estado.descripcion +'</td>';
            //añade la nombre del area
            //
          fila+= "<td class='row'> <center> <button type='button' data-toggle='modal' data-target='#datospeticion' onClick='datospeticion("+item.idpeticion+")' class='btn btn-info'><i class='fa fa-eye'></i>  Ver</button></td>";
           fila+= "<td class='row'> <center> <button type='button' class='btn btn-success'  data-toggle='modal' data-target='#Asignacionmodal'><i class='fa fa-plus'></i>  Asignar</button></td>";
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
 
    $.get('listaTecnicos', function (data) {
        $("#tablaasignartecnico").html("");
        $.each(data, function(i, item) { //recorre el data 
            cargartablatecnicos(item); // carga los datos en la tabla
        });      
    });
}

function cargartablatecnicos(data){

    $("#tablaasignartecnico").append(
        "<tr id='fila_cod"+"'><td>"+data.name +" "+ data.apellidos+"\
         <td>"+ data.extratecnicos.especialidad +"</td>\
         <td class='row' style='text-align: center'><button  type='button' class='btn btn-info' data-toggle='modal' data-target='#actualizarusuariomodal' onClick='tablatecnicosAsig("+data.id+")'><i class='fa fa-arrow-right'></i></button>\
         </tr>"
    );

}


function tablatecnicosAsig(valor){
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
            alert(item.descripcion);
            document.getElementById('usuariop').innerHTML = '<b>Usuario:</b>'+ item.descripcion;
            $("#usuariop").val(item.descripcion);

        });
    });
}