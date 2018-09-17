/*PARA LLAMAR A LAS FUNCIONES AL CARGARSE EL SISTEMA*/
$(document).ready(function()
       {
          UsuarioMostrar();
 });
/*FUNCIÓN PARA INGRESAR LOS USUARIOS*/
function UsuarioInsert(){ 
    //PARA CONFIRMACIÓN DE CONTRASEÑA
    if($('#password').val()!= $('#password_confirmation').val()){
        alert("Comprueba la contraseña")
    }else{
        var FrmData = {
            name: $('#name').val(),
            apellidos: $('#apellidos').val(),
            cedula: $('#cedula').val(),
            sexo: $('#sexo').val(),
            celular: $('#celular').val(),
            email: $('#email').val(),
            estado: $('#estado').val(),
            idtipousuario: $('#idtipousuario').val(),
            idextratecnico: $('#cmb_extratecnico').val(),
            idarea: $('#cmb_area').val(),
            password: $('#password').val(),
        }
        
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: 'GestionUsuarios', // Url que se envia para la solicitud esta en el web php es la ruta
            method: "POST",             // Tipo de solicitud que se enviará, llamado como método
            data: FrmData,               // Datos enviados al servidor, un conjunto de pares clave / valor (es decir, campos de formulario y valores)
            success: function (data)   // Una función a ser llamada si la solicitud tiene éxito
            {  
                mensaje1 = "DATOS GUARDADOS CORRECTAMENTE";
                alertify.success(mensaje1);
                UsuarioMostrar();      
                limpiar();
                $('#password_confirmation').val("")
            },
            error: function () {     
                mensaje = "OCURRIO UN ERROR";
                  alertify.error(mensaje);
            }
        });  
    }
}


/*MOSTRAR TODOS LO USUARIOS*/
function UsuarioMostrar(){
    $.get('usuariosMostrar', function (data) {
        $("#tablausuarios").html("");
        $.each(data, function(i, item) { //recorre el data 
            cargartablausuarios(item); // carga los datos en la tabla
        });      
    });
}
    /*$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var FrmData ;
    $.ajax({
        url: 'usuariosMostrar', // Url que se envia para la solicitud esta en el web php es la ruta
        method: "GET",             // Tipo de solicitud que se enviará, llamado como método
        data: FrmData,               // Datos enviados al servidor, un conjunto de pares clave / valor (es decir, campos de formulario y valores)
        success: function (data)   // Una función a ser llamada si la solicitud tiene éxito
        {   
            console.log(data);
            $("#tablausuarios").html("");
              $.each(data, function(i, item) { //recorre el data 
                  cargartablausuarios(item); // carga los datos en la tabla
              });               
        }
    });*/

/*FUNCIÓN PARA ELIMINARL USUARIO*/
function UsuarioDelete(id){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: 'eliminarusuario/'+id, // Url que se envia para la solicitud esta en el web php es la ruta
        method: "GET",             // Tipo de solicitud que se enviará, llamado como método
               // Datos enviados al servidor, un conjunto de pares clave / valor (es decir, campos de formulario y valores)
        success: function ()   // Una función a ser llamada si la solicitud tiene éxito
        {  
         alertify.success("Datos eliminados correctamente"); 
          UsuarioMostrar(); // carga los datos en la tabla                       
        }
    });
}

/*MUESTRA LOS DATOS DEL USUARIO SELECCIONADO  EN EL MODAL */
function prepararactualizarusuario(id){ 
    $('#passwordup').val("");
    $('#passwordup').prop("disabled",false);
    $('#passwordupdiv').prop("hidden",true);
    $('#actualizarclave').prop("checked",false);
    $.get('prepararactualizar/'+id,function(data){
        $('#idusuarioup').val(data.id);
        $('#nameup').val(data.name);
        $('#apellidosup').val(data.apellidos);
        $('#cedulaup').val(data.cedula);
        $('#sexoup').val(data.sexo);
        $('#celularup').val(data.celular);
        $('#emailup').val(data.email);
        $('#estadoup').val(data.estado);
        $('#idtipousuarioup').val(data.tipo_usuario.idtipo_Usuario);
        $('#cmb_areaup').val(data.area.idarea);
        if (data.extratecnicos != null) {
            //$('#cmb_extratecnicoup').val(data.idextratecnico);
            $('#cmb_extratecnicoup').val(data.extratecnicos.especialidad);
            $('#idextratecnicoup').prop('hidden',false);
        }else{
            $('#idextratecnicoup').prop('hidden',true);
        }
    });
}

/*PARA ACTUALIZAR LOS DATOS DEL USUARIO*/
function usuarioUpdate(){ 
   var FrmData = {
        id: $('#idusuarioup').val(),
        name: $('#nameup').val(),
        apellidos: $('#apellidosup').val(),
        cedula: $('#cedulaup').val(),
        sexo: $('#sexoup').val(),
        celular: $('#celularup').val(),
        email: $('#emailup').val(),
        estado: $('#estadoup').val(),
        idtipousuario: $('#idtipousuarioup').val(),
        idextratecnico: $('#cmb_extratecnicoup').val(),
        idarea: $('#cmb_areaup').val(),
        password: $('#passwordup').val(),
        actualizarclave: $('#actualizarclave').val(),
    }
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: 'GestionUsuarios/'+ $('#idusuarioup').val(), // Url que se envia para la solicitud esta en el web php es la ruta
        method: "PUT",             // Tipo de solicitud que se enviará, llamado como método
        data: FrmData,               // Datos enviados al servidor, un conjunto de pares clave / valor (es decir, campos de formulario y valores)
        success: function (data)   // Una función a ser llamada si la solicitud tiene éxito
        {
            UsuarioMostrar(); 
            limpiar();
             alertify.success("Datos actualizados correctamente");
             $("#actualizarusuariomodal").modal('hide');
             $("#passwordup").prop('required',false);

        },
        error: function () {     
            mensaje = "OCURRIO UN ERROR";
            alertify.error(mensaje);
            limpiar();
        }
    });  
}

/*PARA HACER FILTROS DE USUARIOS*/
function buscar_usuarios(){ // funcion que realiza una peticion get enviando un parametro de busqueda       
    $.get('buscar_usuarios/'+$('#buscar_usuarios').val(), function (data) {
        $("#tablausuarios").html("");
      $.each(data, function(i, item) { //recorre el data 
          cargartablausuarios(item); // carga los datos en la tabla
      });      
    });  
}

/*FUNCIÓN PARA CARGAR LOS USUARIOS EN LA TABLA*/
function cargartablausuarios(data){
  
  var especialidad="N/A";
  if(data.extratecnicos != null){
    especialidad=data.extratecnicos.especialidad;
  }
    $("#tablausuarios").append(
        "<tr id='fila_cod"+"'><td>"+ data.cedula +"\
         <td>"+ data.name +" "+ data.apellidos  +"</td>\
         <td>"+ data.celular +"</td>\
         <td>"+ data.sexo +"</td>\
         <td>"+ data.estado +"</td>\
         <td>"+ data.tipo_usuario.descripcion+"</td>\
         <td>"+ especialidad+"</td>\
         <td>"+ data.area.nombre +"</td>\
         <td>"+ data.email +"</td>\
         <td class='row'><button type='button' class='btn btn-info' data-toggle='modal' data-target='#actualizarusuariomodal' onClick='prepararactualizarusuario("+data.id+")'><i class='fa fa-edit'></i></button>\
         <button type='button' class='btn btn-danger' id='btn-confirm' onClick='mostrarmodal("+data.id+")'><i class='fa fa-trash'></i></button></td></tr>"
    );
}

/*PARA LIMPIAR LOS COMPONENTES DEL FORMULARIO*/
function limpiar(){
    $('#name').val('');
    $('#apellidos').val('');
    $('#cedula').val('');
    $('#celular').val('');
    $('#email').val('');
    //$('#cmb_extratecnico').val('Especialización')
    $('#password').val('');
    $('#passwordconfir').val('');
   
}

/*FUNCIÓN PARA VALIDAR EL FORMULARIO EL REGISTRO CUANDO SE EJECUTA EL SUBMIT*/
$('#frm_registrarUsuario').on('submit',function(e){
	e.preventDefault();
	registrousuarioclic();
});

/*FUNCIÓN PARA VALIDAR EL FORMULARIO DEL MODAL ACTUALIZAR CUANDO SE EJECUTA EL SUBMIT*/
$('#formmodalactualizar').on('submit',function(e){
    e.preventDefault();
    usuarioActualizar();
});


/*FUNCION DEL BOTON DE REGISTRO  DE USUARIO*/
function registrousuarioclic(){
    UsuarioInsert();
}
/*FUNCION DEL BOTON DE ACTUALIZARUSUARIO*/
function usuarioActualizar(){
    usuarioUpdate();

}




/*FUNCIÓN PARA MOSTRAR LOS CAMPOS DE LOS TECNICOS*/
function mostrarcampostecnicosregistro(val){  
   if(val=="5"){
    $('#idextratecnico').prop('hidden',false);
   }else{
    $('#idextratecnico').prop('hidden',true);
   }
}
/*FUNCIÓN PARA MOSTRAR LOS CAMPOS DE LOS TECNICOS EN LA ACTUALIZACIÓN*/
function mostrarcampostecnicosactualizar(val){  
   if(val=="5"){
    $('#idextratecnicoup').prop('hidden',false);
   }else{
    $('#idextratecnicoup').prop('hidden',true);
   }
}

/*PARA INGRESAR DATOS EXTRAS DE LOS TÉCNICOS*/
function ExtraInsert(id){ 
    //Datos que se envian a la ruta
    var FrmData = {
        descripcion: $('#cmb_extratecnico').val(),
        idusuario: id,
    }
    
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: 'extratecnico', // Url que se envia para la solicitud esta en el web php es la ruta
        method: "POST",             // Tipo de solicitud que se enviará, llamado como método
        data: FrmData,               // Datos enviados al servidor, un conjunto de pares clave / valor (es decir, campos de formulario y valores)
        success: function (data)   // Una función a ser llamada si la solicitud tiene éxito
        {          
        },
        error: function () {     

        }
    });  
}


/*PARA MOSTRAR EL MODAL DE CONFIRMACIÓN DE ELIMINACIÓN DE USUARIOS*/
function mostrarmodal (valor){
  
    $("#mi-modal").modal('show');
    $("#modal-btn-si").on("click", function(){
        UsuarioDelete(valor);
        $("#mi-modal").modal('hide');
    });
      
    $("#modal-btn-no").on("click", function(){
        $("#mi-modal").modal('hide');
      });
  }



/*PARA MOSTRAR EL INPUT DE ACTUALIZACIÓN DE CLAVES*/
$("#actualizarclave").on('change', function(e){
    if (this.checked) {
        $("#passwordupdiv").prop('hidden',false);
        $("#passwordup").prop('disabled',false);
        $("#passwordup").prop('required',true);
        $("#actualizarclave").val('1');

    } else {
        $("#passwordupdiv").prop('hidden',true);
        $("#passwordup").prop('disabled',true);
        $("#passwordup").prop('required',false);
        $("#actualizarclave").val('0');
    
    }
});
/*OTRA FORMA DE BUSCAR*/
/*function buscar_usuarios1(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var FrmData ;
    $.ajax({
        url: 'buscar_usuarios/'+ $('#buscar_usuarios').val(),// Url que se envia para la solicitud esta en el web php es la ruta
        method: "GET",             // Tipo de solicitud que se enviará, llamado como método
        data: FrmData,               // Datos enviados al servidor, un conjunto de pares clave / valor (es decir, campos de formulario y valores)
        success: function (data)   // Una función a ser llamada si la solicitud tiene éxito
        {   
            $("#tablausuarios").html("");
              $.each(data, function(i, item) { //recorre el data 
                  cargartablausuarios(item); // carga los datos en la tabla
              });               
        }
    });
}*/



