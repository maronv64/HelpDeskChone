// window.onload = function() {
//     window.onload=
//     crear_txtFiltroGeneral()
// };
//funcion para filtrar 

$('#cmbTipoBusqueda').change(function () {
    //alert("hoa");
    $('#panelBuscar').html('');
    $('#panelBuscartxt').html('');

    CargarPeticiones2();  // funcion del archivo GestionPeticiones4.js


    var orden='';   //para crear los combos
    var orden2='';  //para crear el txt por defecto
    var orden3='';
    
    // if ($('#cmbTipoBusqueda').val() !='Todas' &&
    //     $('#cmbTipoBusqueda').val() !='Usuario'
    //  ) {
        orden2+='<div class="form-group has-feedback">                                                                   ';
        orden2+='    <label> <b>Escriba la Busqueda:</b></label>                                                         ';
        orden2+='    <input type="text" class="form-control" placeholder="Escriba aquí" onkeyup="txtFiltroGeneral_KeyUp()" id="txtFiltroGeneral" required />      ';
        orden2+='</div> ';

        $('#panelBuscartxt').append( orden2 );
    // }

    if ($('#cmbTipoBusqueda').val()=='Todas') {
        $('#panelBuscartxt').html('');
        orden3+='<div class="form-group has-feedback">                                                                   ';
        orden3+='    <label> <b>Escriba la Busqueda:</b></label>                                                         ';
        orden3+='    <input type="text" class="form-control" placeholder="Escriba aquí" onkeyup="txtFiltroGeneral_KeyUp()" id="txtFiltroGeneral" required />';
        orden3+='</div> ';

        $('#panelBuscar').append( orden3 );
        

    }else if ($('#cmbTipoBusqueda').val()=='TipoPeticion') {
        orden+=' <div class="form-group has-feedback">                                          ';
        orden+='    <label> <b>Tipo de Peticion:</b></label>                                    ';
        orden+='    <select id="cmbTipoPeticionBusqueda" onchange="cmbTipoBusqueda_onChanged()" class="form-control" required>       ';
        orden+='    <!-- <option disabled selected>Seleccione el tipo de Peticion</option> -->  ';    
        orden+='    </select>                                                                   '; 
        orden+=' </div>                                                                         ';  

        $('#panelBuscar').append( orden );
        cargarCmbTipoPeticionBusqueda();


    }else if ($('#cmbTipoBusqueda').val()=='Prioridad') {
        orden+=' <div class="form-group has-feedback">                                          ';
        orden+='    <label> <b>Prioridad:</b></label>                                           ';
        orden+='    <select id="cmbPrioridadBusqueda" onchange="cmbTipoBusqueda_onChanged()"  class="form-control" required>          ';
        orden+='    <!-- <option disabled selected>Seleccione la Prioridad</option> -->  ';    
        orden+='    </select>                                                                   '; 
        orden+=' </div>                                                                         ';  

        $('#panelBuscar').append( orden );

        cargarCmbPrioridadBusqueda();
        
    }else if ($('#cmbTipoBusqueda').val()=='Estado') {
        orden+=' <div class="form-group has-feedback">                                          ';
        orden+='    <label> <b>Estado:</b></label>                                           ';
        orden+='    <select id="cmbEstadoBusqueda" onchange="cmbTipoBusqueda_onChanged()"  class="form-control" required>          ';
        orden+='    <!-- <option disabled selected>Seleccione el Estado</option> -->  ';    
        orden+='    </select>                                                                   '; 
        orden+=' </div>                                                                         ';  

        $('#panelBuscar').append( orden );

        cargarCmbEstadoBusqueda();
        
    }if ($('#cmbTipoBusqueda').val()=='Usuario') {
        $('#panelBuscartxt').html('');
        orden3+='<div class="form-group has-feedback">                                                                   ';
        orden3+='    <label> <b>Escriba la Busqueda:</b></label>                                                         ';
        orden3+='    <input type="text" class="form-control" placeholder="Escriba aquí" onkeyup="txtFiltroGeneral_KeyUp()" id="txtFiltroGeneral" required />';
        orden3+='</div> ';

        $('#panelBuscar').append( orden3 );

    }if ($('#cmbTipoBusqueda').val()=='Fecha') {
        //var fecha= '<?php echo date("Y-m-d");?>';
        orden+=' <div class="form-group has-feedback">                                          ';
        orden+='    <label> <b>Fecha Filtro:</b></label>                                          ';
        orden+='    <input type="date" class="form-control" id="dtpFechaFiltro" onchange="cmbTipoBusqueda_onChanged()" required />';    
        orden+=' </div>                                                                         ';  

        $('#panelBuscar').append( orden );
        
        $('#dtpFechaFiltro').val($('#dtpFechaFiltro2').val());

    }if ($('#cmbTipoBusqueda').val()=='Fecha') {
        $('#panelBuscartxt').html('');
    }
    

});


function crear_txtFiltroGeneral() {
    var orden='';
        orden+='<div class="form-group has-feedback">                                                                   ';
        orden+='    <label> <b>Escriba la Busqueda:</b></label>                                                         ';
        orden+='    <input type="text" class="form-control" placeholder="Escriba aquí"  onkeyup="txtFiltroGeneral_KeyUp()" id="txtFiltroGeneral" required />      ';
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

function cmbTipoBusqueda_onChanged(){
    
    var FrmData = {
        idpeticion:     '',
        idprioridad:    $('#cmbPrioridadBusqueda').val(),
        idestado:       $('#cmbEstadoBusqueda').val(),
        idtipopeticion: $('#cmbTipoPeticionBusqueda').val(),
        username:       $('#txtFiltroGeneral').val(),
        descripcion:    $('#txtFiltroGeneral').val(),
        created_at:     $('#dtpFechaFiltro').val(),
    }
    // alert(
    //     " - Tipo de Busqueda: "+$('#cmbTipoBusqueda').val()+
    //     " - idprioridad: "+FrmData.idprioridad+
    //     " - idestado: "+FrmData.idestado+
    //     " - idtipopeticion: "+FrmData.idtipopeticion+
    //     " - username: "+FrmData.username+
    //     " - descripcion: "+FrmData.descripcion+
    //     " - fecha: "+FrmData.created_at
    // );
    //SuperFiltro('TipoPeticion',FrmData);   $('#cmbTipoBusqueda').val()  $('#cmbTipoPeticionBusqueda').val()
    SuperFiltro($('#cmbTipoBusqueda').val(),FrmData);
}


function txtFiltroGeneral_KeyUp() {
    //alert($("#txtFiltroGeneral").val());
    var FrmData = {
        idpeticion:     '',
        idprioridad:    $('#cmbPrioridadBusqueda').val(),
        idestado:       $('#cmbEstadoBusqueda').val(),
        idtipopeticion: $('#cmbTipoPeticionBusqueda').val(),
        username:       $('#txtFiltroGeneral').val(),
        descripcion:    $('#txtFiltroGeneral').val(),
        created_at:     $('#dtpFechaFiltro').val(),
    }
    // alert(
    //     " - Tipo de Busqueda: "+$('#cmbTipoBusqueda').val()+
    //     " - idprioridad: "+FrmData.idprioridad+
    //     " - idestado: "+FrmData.idestado+
    //     " - idtipopeticion: "+FrmData.idtipopeticion+
    //     " - username: "+FrmData.username+
    //     " - descripcion: "+FrmData.descripcion
    // );
     SuperFiltro($('#cmbTipoBusqueda').val(),FrmData);
}

function SuperFiltro(tipoConsulta,FrmData) {
    //console.log('id de tipo peticion:     '+tipoConsulta);
    //console.log(tipoConsulta);

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        url: 'peticionesFiltroAbmin/'+tipoConsulta+'/'+FrmData,// Url que se envia para la solicitud esta en el web php es la ruta
        method: "GET",             // Tipo de solicitud que se enviará, llamado como método
        data: FrmData,               // Datos enviados al servidor, un conjunto de pares clave / valor (es decir, campos de formulario y valores)
        success: function (data)   // Una función a ser llamada si la solicitud tiene éxito
        {  
           console.log(data);
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
            //añade la nombre del area
            fila+= '<td>'+item.created_at  +'</td>';
            //añade la nombre del area
            fila+= '<td>'+item.update_at  +'</td>';
            //
            fila+= "<td class='row'> <center> <button type='button' class='btn btn-info' data-toggle='modal' data-target='#actualizarusuariomodal' onClick='verModalModicarPeticion("+item.idpeticion+")'><i class='fa fa-edit'></i></button>"+
                    "<button type='button' class='btn btn-danger' onClick='eliminarPeticion("+item.idpeticion+")'><i class='fa fa-trash'></i></button> </center> </td></tr>";
            //
            fila+= '</tr>';

            $('#dgvPeticiones').append(//identificamos ala nota que queremos add esta otra nota        
                fila									
            );
        
        });  
        },
        error: function () {     
            mensaje = "OCURRIO UN ERROR";
            alert(mensaje);
        }
    });  
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


$('#txtDescripcion').keyup(function(){
    $('#txtFiltroGeneral').val($('#txtDescripcion').val() );
});
