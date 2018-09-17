$(document).ready(function()
       {
          MostrarTiposUsuarios();
          MostrarAreas();
          MostrarExtraTecnicos();
 });
function MostrarTiposUsuarios(){
    $.get('mostrartiposusuarios',function(data){
        $.each(data, function(i,item){
              $('#idtipousuario').append('<option value="'+item.idtipo_Usuario+'">'+item.descripcion+'</option>');
               $('#idtipousuarioup').append('<option value="'+item.idtipo_Usuario+'">'+item.descripcion+'</option>');
            });
    });
}


function MostrarExtraTecnicos(){
    $.get('mostrarespecialidad',function(data){
            $.each(data, function(i,item){
              $('#cmb_extratecnico').append('<option>'+item.descripcion+'</option>');
              $('#cmb_extratecnicoup').append('<option>'+item.descripcion+'</option>');
            }); 
    });
}

function MostrarAreas(){
    $.get('mostrarareas',function(data){
          $.each(data, function(i,item){
              $('#cmb_area').append('<option value="'+item.idarea+'">'+item.nombre+'</option>');
              $('#cmb_areaup').append('<option value="'+item.idarea+'">'+item.nombre+'</option>');
            });  
    });
}



