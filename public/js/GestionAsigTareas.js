//esta funcion de trae todas la peticiones y la carga en la tabla 
$(document).ready(function()
    {
        BandejadePeticiones();
        mostrartecnicos();
        mostrarasigportectnico();
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
            fila+= '<td>'+item.created_at +'</td>';
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
    /*$("#modal-btn-si").on("click", function(){
        $("#mi-modal1").modal('hide');
    });
    $("#modal-btn-no").on("click", function(){
        $("#mi-modal1").modal('hide');
    });*/
  }

function  mostrartecnicos(){
    var filac=0;
    $.get('listaTecnicos', function (data) {
        $("#tablaasignartecnico").html("");
        $.each(data, function(i, item) { //recorre el data 3
          filac=filac+1;
            cargartablatecnicos(item,filac); // carga los datos en la tabla
        });      
    });
}

function cargartablatecnicos(data, filacod){
    $("#tablaasignartecnico").append(
          "<tr id='filaid"+filacod+"'><td hidden>"+ data.id +"</td>\
        <td>"+data.name +" "+ data.apellidos+"</td>\
         <td>"+data.extratecnicos.especialidad+"</td>\
         <td class='row' style='text-align: center'><button id='botonagregar"+filacod+"'  type='button'  class='btn btn-info btn-sm'  onClick='cambiariconoboton("+data.id+","+filacod+")'><i id='ibotoagra"+filacod+"' class='fa fa-arrow-right'></i></button>\
         <td class='row' style='text-align: center'><button id='tareaboton' data-toggle='modal' data-target='#modalvertareas' type='button' class='btn btn-success btn-sm' onClick='tablaportareas("+data.id+")'><i  class='fa fa-eye'></i> Ver</button>\
         </tr>"
    );
}

/*PARA FILTRAR LOS TÉCNICOS SI ACCEDER A LA BASE DE DATOS*/
function filtrotecnicos() {
    var input, filter, table, tr, td,td1, i;
    input = document.getElementById("buscar_tecnicos");
    filter = input.value.toUpperCase();
    table = document.getElementById("tablaasignartecnico");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[1];
        if (td) {
            if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }       
    }
}

/*CAMBIAR LAS CLASES A LOS BOTONES*/
function cambiariconoboton(valor,filacod1){
  if ( $('#botonagregar'+filacod1).hasClass('btn btn-danger') ) { 
       $('#botonagregar'+filacod1).removeClass('btn btn-danger');
       $('#botonagregar'+filacod1).addClass('btn btn-info');
       $('#ibotoagra'+filacod1).removeClass('fa fa-times');
       $('#ibotoagra'+filacod1).addClass('fa fa-arrow-right');
   }else{
       $('#botonagregar'+filacod1).removeClass('btn btn-info');
       $('#botonagregar'+filacod1).addClass('btn btn-danger');
       $('#ibotoagra'+filacod1).removeClass('fa fa-arrow-right');
       $('#ibotoagra'+filacod1).addClass('fa fa-times');
  }
  bloquearboton(filacod1);
    /* var filacod=0;
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
    $("#tabladetecnicosasignados").prop('hidden',false);*/
}

/*
function limpiartablatacnicos(){
    $("#tecnicosasignadostable").html("");
    $("#tabladetecnicosasignados").prop('hidden',true);
}*/

/*PARA ELIMINAR UNA FILA DE UNA TABLA*/
/*function eliminarFila(index) {
    $('#fila_cod'+index).remove();
}*/

/*MUESTRA LOS DATOS DE LAS PETICIONES*/
function datospeticion(val){
     $.get('datospeticion/'+val, function (data) {  //esta la uso para limpiar la tabla en el modulo de asignacion por Jose Sabando
        console.log(data);
        $.each(data, function(a, item) {
            document.getElementById('usuariop').innerHTML = item.usuario.name +" "+item.usuario.apellidos;
            document.getElementById('areap').innerHTML =  item.usuario.area.nombre;
            document.getElementById('tipopp').innerHTML = item.tipo_peticion.descripcion;
            document.getElementById('fechap').innerHTML = item.created_at;
            document.getElementById('prioridadp').innerHTML = item.prioridad.descripcion;
            document.getElementById('estadop').innerHTML =  item.estado.descripcion;
            document.getElementById('descripcionp').innerHTML = item.descripcion;
        });
    });
}

/*GUARDAR LOS TÉCNICOS ASIGNADOS*/
/*function guardartecnicosasignados(idusuario,idasig){ 
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
}*/

/*BLOQUEAR BOTONES*/
function bloquearboton(filacod1){
    var filac=0;
    var con=0;
    var id;
    $('#tablaasignartecnico tr').each(function () {
       filac=filac+1;
       // $('#botonagregar'+filac).prop('disabled',true);
        if ( $('#botonagregar'+filacod1).hasClass('btn btn-danger')){          
            $('#botonagregar'+filac).prop('disabled',true);
            $('#botonagregar'+filacod1).prop('disabled',false);
        }else if($('#botonagregar'+filacod1).hasClass('btn btn-info')){
          $('#botonagregar'+filac).prop('disabled',false);
          $('#botonagregar'+filacod1).prop('disabled',false);                 
        }       
    });
}

/*ASIGNAR LOS TÉCNICOS*/
function asignartecnicos(){
    var filac=0;
    var idtecnico=0;
    $('#tablaasignartecnico tr').each(function () {
        filac=filac+1;
        if ( $('#botonagregar'+filac).hasClass('btn btn-danger') ) { 
        idtecnico = $(this).find("td").eq(0).html();
        }
    });
     if(idtecnico!= "0"){
     AsignacionInsert(idtecnico);
    // $('#Asignacionmodal').modal('hide');
     }else{
           alertify.error("Por favor seleccione un técnico");
           return;
     }
}

/*ASIGNAR UNA PETICIÓN*/
function asignaridpeticion(idpeticion,idusuario){
    mostrarasignacionesporpeticion(idpeticion);
    $('#idpeticionasig').val(idpeticion);
    $('#idusuarioasig').val(idusuario);
}

/*SUBMIT DEL BOTÓN DEL MODAL DE ASIGNACIÓN*/
$('#formasig').on('submit',function(e){
    e.preventDefault();
    asignartecnicos();
});

/*LIMPIAR MODAL ASGNACIÓN TAREAS*/
function limpiarmodalasignacion(){
    mostrartecnicos();
    //$('#idpeticionasig').val("");
    $('#fechainicialAsig').val("dd/mm/aaaa");
    $('#fechafinalAsig').val("dd/mm/aaaa");
    $('#horainicialAsig').val("H:i");
    $('#horafinalAsig').val("H:i");
    $('#observacionAsig').val("");
}

/*INSERTAR ASIGNACIONES*/
function AsignacionInsert(iduser){ 
    var FrmData = {
        idpeticion: $('#idpeticionasig').val(),
        FechaInicial: $('#fechainicialAsig').val(),
        FechaLimite: $('#fechafinalAsig').val(),
        observacion: $('#observacionAsig').val(),
        HoraInicial: $('#horainicialAsig').val(),
        HoraLimite: $('#horafinalAsig').val(),
        idusuario:iduser,
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
              if(data=="0"){
                alertify.error("Técnico ya asignado");
              }else if(data=="1"){
                  alertify.error("El técnico no puede ser asignado en este horario");
                //$("#modalvertareas").modal("show");
                //tablaportareas(iduser);
                //alert("Este Tëcnico no puede ser asignado en este horario porque tiene tareas.");
              }else{
                 mensaje1 = "Datos guardados correctamente";
                 alertify.success(mensaje1);
                      limpiarmodalasignacion();
                  mostrarasignacionesporpeticion($('#idpeticionasig').val());
              }
        },
        error: function () {     
            mensaje = "OCURRIO UN ERROR";
            alert(mensaje);
        }
    });  
}

 function  mostrarasignacionesporpeticion(idpeticion){
    $.get('mostrarasignaciones/'+idpeticion, function (data) {
        $("#tablaasignacionporpeticion").html("");
        $.each(data, function(i, item) { //recorre el data 3
            cargartablaasignacionporpeticion(item); // carga los datos en la tabla
        });      
    });
}


function cargartablaasignacionporpeticion(data){
    $("#tablaasignacionporpeticion").append(
          "<tr><td hidden>"+ data.id +"</td>\
          <td>"+ data.name +" "+ data.apellidos +"</td>\
        <td>"+data.FechaInicio +" - "+ data.HoraInicial+"</td>\
       <td>"+data.FechaLimite +" - "+ data.HoraLimite+"</td>\
         <td class='row' style='text-align: center'><button data-toggle='modal' data-target='#modalobser' onClick='mostarobservacion("+data.iduser_asignacion+")'  type='button'class='btn btn-success'></i>Ver</button>\
         </tr>"
    );
}



function mostarobservacion(idasignacion){

      $.get('mostrarobservacion/'+idasignacion, function (data) {
        document.getElementById('mostrarinforobserasig').innerHTML = data.Observacion;
       });
}

function mostarobservacionPeticion(idpeticion){

    $.get('mostrarobservacionpeticion/'+idpeticion, function (data) {
         document.getElementById('mostrarobserpeticion').innerHTML = data.descripcion;
       });
      
}

function mostarobservacionAsignacion(idasignacion){

    $.get('mostrarobservacion/'+idasignacion, function (data) {
        console.log(data);
         document.getElementById('mostrarobseraasig').innerHTML = data.Observacion;
       });
      
}


function tablaportareas(iduser){

      $.get('consultarPeticionEstado/'+iduser, function (data) {
        console.log(data);
        $("#tablavertareas").html("");
        $.each(data, function(i, item) { //recorre el data 3
        $("#tablavertareas").append(
        "<tr><td>"+ item.nombre+"</td>\
        <td>"+item.FechaInicio +" - "+ item.HoraInicial+"</td>\
        <td>"+item.FechaLimite +" - "+ item.HoraLimite+"</td>\
        </tr>"
    );
        });      
    });

}


function tablamisasignaciones(iduser){

      var hoy;

       $.get('fechaactual', function (data) {
        tmphoy = data.split('/');
        hoy = tmphoy[2]+tmphoy[1]+tmphoy[0];
       });   

       var horactualhh;
       var horactualhhmm; 
        $.get('horaactual', function (data) {
        hoyh = data.split(":"); 
        horactualhh = parseInt(hoyh[0],10); 
        horactualhhmm = parseInt(hoyh[1],10); 
       }); 
 
       
      $.get('CargarMisAsignaciones/'+iduser, function (data) {
        console.log(data);
        
        $("#tablamisasignaciones").html("");
        $.each(data.mis_asignaciones, function(i, item) { //recorre el data 3
        var contenido = "<td class='row' style='text-align: center'><a  title='Funciona' style='height: 40px;width:40px;background-color: #31B404;border-radius: 50%;display: inline-block;'><i style='margin-top: 8px;color: white' class='fa fa-check fa-fw fa-2x'></i></a></td>";
       
        fechainicion = item.FechaInicio;
        fechalimite = item.FechaLimite;
        horainicio = item.HoraInicial;
        horalimite = item.HoraLimite;


        // convierte las fechas a yyyymmdd
        tmp = fechainicion.split('/');
        fini = tmp[2]+tmp[1]+tmp[0];
        tmp = fechalimite.split('/');
        ffin = tmp[2]+tmp[1]+tmp[0];

      
        // la comparación
        if(ffin<hoy){
           contenido= "<td class='row' style='text-align: center'><a data-toggle='tooltip' data-placement='top' title='Su asignación se encuentra vencida' style='height: 40px;width:40px;background-color: #DF0101;border-radius: 50%;display: inline-block;'><i style='margin-top: 8px;color: white' class='fa fa-times fa-fw fa-2x'></i></a></td>";
        }else if(ffin==hoy){


                var arHorainicio = horainicio.split(":"); 
                var arHoralimite = horalimite.split(":"); 
                 
                // Obtener horas y minutos (hora inicio) 
                var hh1 = parseInt(arHorainicio[0],10); 
                var mm1 = parseInt(arHorainicio[1],10); 

                // Obtener horas y minutos (hora 2) 
                var hh2 = parseInt(arHoralimite[0],10); 
                var mm2 = parseInt(arHoralimite[1],10); 

                // Comparar 
                if (hh2<horactualhh || (hh2==horactualhh && mm2<horactualhhmm)){
   
                              contenido = "<td class='row' style='text-align: center'><a  data-toggle='tooltip' data-placement='top' title='Su asignación se encuentra vencida' style='height: 40px;width:40px;background-color: #DF0101;border-radius: 50%;display: inline-block;'><i style='margin-top: 6px;color: white' class='fa fa-times fa-fw fa-2x'></i></a></td>";

                }
                else if (hh1>hh2 || (hh1==horactualhh && mm1>horactualhhmm)){ 
         
                }else  {
                  
                }


        }else{
                         contenido = "<td class='row' style='text-align: center'><a  data-toggle='tooltip' data-placement='top' title='Se ecnuentra dentro de la fecha asignada' style='height: 40px;width:40px;background-color: #31B404;border-radius: 50%;display: inline-block;'><i style='margin-top: 6px;color: white' class='fa fa-check fa-fw fa-2x'></i></a></td>";

        }
        $("#tablamisasignaciones").append(
        "<tr><td>"+ item.peticion.usuario.area.nombre+"</td>\
        <td>"+item.peticion.usuario.name +" "+item.peticion.usuario.apellidos+"</td>\
        <td>"+item.peticion.prioridad.descripcion+"</td>\
        <td>"+item.peticion.tipo_peticion.descripcion+"</td>\
        <td class='row' style='text-align: center'><button id='botonobserpeticion' data-toggle='modal' data-target='#modalobpeticion' onClick='mostarobservacionPeticion("+item.peticion.idpeticion+")'  type='button' class='btn btn-success btn-sm' ><i  class='fa fa-eye'></i> Ver</button></td>\
        <td class='row' style='text-align: center'><button id='botonobserasig' data-toggle='modal' data-target='#modalobasig' onClick='mostarobservacionAsignacion("+item.iduser_asignacion+")'  type='button' class='btn btn-success btn-sm' ><i  class='fa fa-eye'></i> Ver</button></td>\
        <td>"+item.FechaInicio +" - "+ item.HoraInicial+"</td>\
        <td>"+item.FechaLimite +" - "+ item.HoraLimite+"</td>\
        <td>"+item.peticion.tipo_peticion.tolerancia+" Horas"+"</td>"+
        contenido+
        "</tr>"
    );
        });      
    });

}

function mostrarasigportectnico(){
   $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: 'idususario',  // Url que se envia para la solicitud esta en el web php es la ruta
            method: "get",             // Tipo de solicitud que se enviará, llamado como métod              // Datos enviados al servidor, un conjunto de pares clave / valor (es decir, campos de formulario y valores)
            success: function (data)   // Una función a ser llamada si la solicitud tiene éxito
            {  

              tablamisasignaciones(data);
            },
            error: function () {   
         
        
            }

});
}



