// window.onload = function() {
//     window.onload=
//     crear_txtFiltroGeneral()
// };
//funcion para filtrar 

$('#cmbTipoBusqueda').change(function () {
    //alert("hoa");
    $('#panelBuscar').html('');
    $('#panelBuscartxt').html('');
    var orden='';
    var orden2='';
    if ($('#cmbTipoBusqueda').val() !='Todas' &&
        $('#cmbTipoBusqueda').val() !='Usuario'
     ) {
        orden2+='<div class="form-group has-feedback">                                                                   ';
        orden2+='    <label> <b>Escriba la Busqueda:</b></label>                                                         ';
        orden2+='    <input type="text" class="form-control" placeholder="Escriba aquí" onkeyup="myFunction()" id="txtFiltroGeneral" required />      ';
        orden2+='</div> ';

        $('#panelBuscartxt').append( orden2 );
    }

    if ($('#cmbTipoBusqueda').val()=='Todas') {
        

        orden+='<div class="form-group has-feedback">                                                                   ';
        orden+='    <label> <b>Escriba la Busqueda:</b></label>                                                         ';
        orden+='    <input type="text" class="form-control" placeholder="Escriba aquí" onkeyup="myFunction()" id="txtFiltroGeneral" required />';
        orden+='</div> ';

        $('#panelBuscar').append( orden );


    }else if ($('#cmbTipoBusqueda').val()=='TipoPeticion') {
        orden+=' <div class="form-group has-feedback">                                          ';
        orden+='    <label> <b>Tipo de Peticion:</b></label>                                    ';
        orden+='    <select id="cmbTipoPeticionBusqueda"   class="form-control" required>       ';
        orden+='    <!-- <option disabled selected>Seleccione el tipo de Peticion</option> -->  ';    
        orden+='    </select>                                                                   '; 
        orden+=' </div>                                                                         ';  

        $('#panelBuscar').append( orden );
        cargarCmbTipoPeticionBusqueda();


    }else if ($('#cmbTipoBusqueda').val()=='Prioridad') {
        orden+=' <div class="form-group has-feedback">                                          ';
        orden+='    <label> <b>Prioridad:</b></label>                                           ';
        orden+='    <select id="cmbPrioridadBusqueda"   class="form-control" required>          ';
        orden+='    <!-- <option disabled selected>Seleccione la Prioridad</option> -->  ';    
        orden+='    </select>                                                                   '; 
        orden+=' </div>                                                                         ';  

        $('#panelBuscar').append( orden );

        cargarCmbPrioridadBusqueda();
        
    }else if ($('#cmbTipoBusqueda').val()=='Estado') {
        orden+=' <div class="form-group has-feedback">                                          ';
        orden+='    <label> <b>Estado:</b></label>                                           ';
        orden+='    <select id="cmbEstadoBusqueda"   class="form-control" required>          ';
        orden+='    <!-- <option disabled selected>Seleccione el Estado</option> -->  ';    
        orden+='    </select>                                                                   '; 
        orden+=' </div>                                                                         ';  

        $('#panelBuscar').append( orden );

        cargarCmbEstadoBusqueda();
        
    }if ($('#cmbTipoBusqueda').val()=='Usuario') {
        

        orden+='<div class="form-group has-feedback">                                                                   ';
        orden+='    <label> <b>Escriba el nombre del Usuario:</b></label>                                                         ';
        orden+='    <input type="text" class="form-control" placeholder="Escriba aquí"  onkeyup="myFunction()" id="txtFiltroGeneral" required />      ';
        orden+='</div> ';

        $('#panelBuscar').append( orden );

    }
    

});

function crear_txtFiltroGeneral() {
    var orden='';
        orden+='<div class="form-group has-feedback">                                                                   ';
        orden+='    <label> <b>Escriba la Busqueda:</b></label>                                                         ';
        orden+='    <input type="text" class="form-control" placeholder="Escriba aquí"  onkeyup="myFunction()" id="txtFiltroGeneral" required />      ';
        orden+='</div> ';
        $('#panelBuscar').append( orden );
}

function cargarCmbTipoPeticionBusqueda() {
    //alert("hola");
    $.get('tipopeticionesCargarDatos', function (data) { 

        $('#cmbTipoPeticionBusqueda').html('<option disabled selected>Seleccione el tipo de Peticion</option>');

        $.each(data, function(a, item) { 
           
            
            //$('#cmbEstados').html('<option disabled selected>Seleccione el tipo de Peticion</option> ');
            var fila ="";

            fila+= '<option value='+ item.idtipopeticion +'>'+ item.descripcion +'</option>';

            
            $('#cmbTipoPeticionBusqueda').append(  
                 fila									
            );
             

        });  

    }); 
}

function cargarCmbPrioridadBusqueda() {
    $.get('prioridadesCargarDatos', function (data) { 
        
        $('#cmbPrioridadBusqueda').html('<option disabled selected>Seleccione la Prioridad</option>');

        $.each(data, function(a, item) { 
           
            
            //$('#cmbEstados').html('<option disabled selected>Seleccione el tipo de Peticion</option> ');
            var fila ="";
            fila+= '<option value='+ item.idprioridad +'>'+ item.descripcion +'</option>';

            
            $('#cmbPrioridadBusqueda').append(  
                 fila									
            );
                       
        });  

    });
}

function cargarCmbEstadoBusqueda() {
    $.get('estadosCargarDatos', function (data) { 
        
        
        $('#cmbEstadoBusqueda').html('<option disabled selected>Seleccione el Estado</option>');
        
        $.each(data, function(a, item) { 
           
           
            //$('#cmbEstados').html('<option disabled selected>Seleccione el tipo de Peticion</option> ');
            var fila ="";

            fila+= '<option value='+ item.idestado +'>'+ item.descripcion +'</option>';

            
            $('#cmbEstadoBusqueda').append(  
                 fila									
            );
            

        });  

    }); 
}

function myFunction() {
    alert($("#txtFiltroGeneral").val());
}

// <div class="col-md-3">
//                 <div class="form-group has-feedback">
//                     <label> <b>Tipo de Busqueda:</b></label>
//                     <select id="cmbTipoBusqueda"   class="form-control" required>
//                         <!-- <option disabled selected>Seleccione el tipo de Peticion</option> -->
//                         <option value="TipoPeticion" selected>Por Tipo de Peticion</option>
//                         <option value="Prioridad" >Por Prioridad</option>
//                         <option value="Estado" >Por Estado</option>
//                         <option value="Usuario" >Por Usario</option>
//                         <option value="Fecha" >Por Fecha</option>
//                         <option value="Todas" >Por todas las anteriores</option>

//                     </select>
//                     <!-- <input type="date" class="form-control" id="fechaFiltroP" name="fechainicialAsig"required value="<?php echo date("Y-m-d");?>" /> -->
//                 </div>
//             </div>

//             <div class="col-md-3">
//                 <div class="form-group has-feedback">
//                     <label> <b>Fecha Filtro:</b></label>
//                     <input type="date" class="form-control" id="fechaFiltroP" name="fechainicialAsig"required value="<?php echo date("Y-m-d");?>" />
//                 </div>
//             </div>
            
//             <div class="col-md-3">
//                 <div class="form-group has-feedback">
//                     <label> <b>Escriba la Busqueda:</b></label>
//                     <input type="text" class="form-control" placeholder="Describa la peticion"  id="txtBuscarP" required />
//                     </div>
//                 </div>
//             </div>