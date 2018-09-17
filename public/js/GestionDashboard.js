function CargarDashboardHelp(){
    $.get('/peticionesCargarDatos2', function (data) { 
        $.each(data, function(a, item) { // recorremos cada uno de los datos que retorna el objero json n valores
            
            $('#dgvPeticiones').html('');
            
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
            fila+= '</tr>';

            $('#dgvPeticiones').append(//identificamos ala nota que queremos add esta otra nota        
                 fila									
            );
            
        });  

    }); 

}

$( "#btnMostrar" ).click(function() {
    //CargarPeticiones();
    CargarDashboardHelp();
});