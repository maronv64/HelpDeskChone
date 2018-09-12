$(document).ready(function()
       {
          MostrarTiposUsuarios();
        
          MostrarAreas();
 });
function MostrarTiposUsuarios(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var FrmData ;
    $.ajax({
        url: 'mostrartiposusuarios', // Url que se envia para la solicitud esta en el web php es la ruta
        method: "GET",             // Tipo de solicitud que se enviará, llamado como método
        data: FrmData,               // Datos enviados al servidor, un conjunto de pares clave / valor (es decir, campos de formulario y valores)
        success: function (data)   // Una función a ser llamada si la solicitud tiene éxito
        {   
        	$.each(data, function(i,item){
              $('#idtipousuario').append('<option value="'+item.idtipo_Usuario+'">'+item.descripcion+'</option>');
               $('#idtipousuarioup').append('<option value="'+item.idtipo_Usuario+'">'+item.descripcion+'</option>');
        	});          
        }
    });
}


function MostrarExtraTecnicos(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var FrmData ;
    $.ajax({
        url: 'mostrarextratecnico', // Url que se envia para la solicitud esta en el web php es la ruta
        method: "GET",             // Tipo de solicitud que se enviará, llamado como método
        data: FrmData,               // Datos enviados al servidor, un conjunto de pares clave / valor (es decir, campos de formulario y valores)
        success: function (data)   // Una función a ser llamada si la solicitud tiene éxito
        {   
        	$.each(data, function(i,item){
              $('#cmb_extratecnico').append('<option value="'+item.idextra_tecnico+'">'+item.especialidad+'</option>');
              $('#cmb_extratecnicoup').append('<option value="'+item.idextra_tecnico+'">'+item.especialidad+'</option>');
        	});          
        }
    });
}

function MostrarAreas(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var FrmData ;
    $.ajax({
        url: 'mostrarareas', // Url que se envia para la solicitud esta en el web php es la ruta
        method: "GET",             // Tipo de solicitud que se enviará, llamado como método
        data: FrmData,               // Datos enviados al servidor, un conjunto de pares clave / valor (es decir, campos de formulario y valores)
        success: function (data)   // Una función a ser llamada si la solicitud tiene éxito
        {   
            $.each(data, function(i,item){
              $('#cmb_area').append('<option value="'+item.idarea+'">'+item.nombre+'</option>');
              $('#cmb_areaup').append('<option value="'+item.idarea+'">'+item.nombre+'</option>');
            });          
        }
    });
}



