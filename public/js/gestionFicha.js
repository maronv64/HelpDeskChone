
$(document).ready(function()
    {
        mostrardispositivos();
 });
function  mostrardispositivos(){
    var filac=0;
    $.get('todosdispositivos', function (data) {
        $("#dispotivosficha").html("");
        $.each(data, function(i, item) { //recorre el data 3
          filac=filac+1;
            cargartabladispositivos(item,filac); // carga los datos en la tabla
        });      
    });
}

function cargartabladispositivos(data, filcod){
    $("#dispotivosficha").append(
          "<tr id='fid"+filcod+"'><td hidden>"+ data.id +"</td>\
        <td>"+data.num_activo+"</td>\
         <td>"+data.serie+"</td>\
         <td>"+data.nombredispositivo+"</td>\
         <td>"+data.marca+"</td>\
         <td>"+data.modelo+"</td>\
         <td class='row' style='text-align: center'><button id='botonagrega"+filcod+"'  type='button'  class='btn btn-info btn-sm'  onClick='seleccion("+data.id+","+filcod+")'><i id='ibotoa"+filcod+"' class='fa fa-square'></i></button>\
         </tr>"
    );
}

function seleccion(valor,filacod1){
  if ( $('#botonagrega'+filacod1).hasClass('btn btn-success') ) { 
       $('#botonagrega'+filacod1).removeClass('btn btn-success');
       $('#botonagrega'+filacod1).addClass('btn btn-info');
       $('#ibotoa'+filacod1).removeClass('fa fa-check-square');
       $('#ibotoa'+filacod1).addClass('fa fa-square');
   }else{
       $('#botonagrega'+filacod1).removeClass('btn btn-info');
       $('#botonagrega'+filacod1).addClass('btn btn-success');
       $('#ibotoa'+filacod1).removeClass('fa fa-square');
       $('#ibotoa'+filacod1).addClass('fa fa-check-square');
  }
}