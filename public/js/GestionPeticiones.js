function consultaRepuesto(){ 
    $.get('/peticionesCargarDatos', function (data) { 
            $.each(data, function(i, item) { // recorremos cada uno de los datos que retorna el objero json n valores
                $('#dgvPeticiones').append(//identificamos ala nota que queremos add esta otra nota
                      '<option value="'+item.idrepuesto+'">'+item.nombre+'</option>'
                      
                );
                
         });  
  
    }); 

}