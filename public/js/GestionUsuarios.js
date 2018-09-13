
/*FUNCION PARA INGRESAR LOS USUARIOS*/
function UsuarioInsert(){ 
    //Datos que se envian a la ruta
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
           
            mensaje1 = "DATOS GUARDADOS CORRECTAMENTE!";
             alert(mensaje1);
          
            UsuarioMostrar();      
            limpiar();
        },
        error: function () {     
            mensaje = "OCURRIO UN ERRORniaw";
            alert(mensaje);
        }
    });  
}

/*MOSTRAR TODOS LO USUARIOS*/
function UsuarioMostrar(){
    $.ajaxSetup({
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
    });
}

function UsuarioDelete(id){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var FrmData ;
    $.ajax({
        url: 'GestionUsuarios/'+id, // Url que se envia para la solicitud esta en el web php es la ruta
        method: "DELETE",             // Tipo de solicitud que se enviará, llamado como método
        data: FrmData,               // Datos enviados al servidor, un conjunto de pares clave / valor (es decir, campos de formulario y valores)
        success: function (data)   // Una función a ser llamada si la solicitud tiene éxito
        {   
          UsuarioMostrar(); // carga los datos en la tabla                       
        }
    });
}


/*MUESTRA LOS DATOS DEL USUARIO SELECCIONADO  EN EL MODAL */
function prepararactualizarusuario(id){ 

        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var FrmData;

            $.ajax({
                url: 'prepararactualizar/'+id, // Url que se envia para la solicitud esta en el web php es la ruta
                method: "GET",             // Tipo de solicitud que se enviará, llamado como método
                data: FrmData,               // Datos enviados al servidor, un conjunto de pares clave / valor (es decir, campos de formulario y valores)
           
        success: function (data)   // Una función a ser llamada si la solicitud tiene éxito
            {  
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
                     $('#passwordup').val(data.password);
                    if (data.extratecnicos != null) {
                        //$('#cmb_extratecnicoup').val(data.idextratecnico);
                        $('#cmb_extratecnicoup').val(data.extratecnicos.especialidad);
                        $('#idextratecnicoup').prop('hidden',false);
                    }else{
                        $('#idextratecnicoup').prop('hidden',true);
                    }

                   
               
            }
        }
    );
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
            mensaje = "DATOS ACTUALIZADOS CORRECTAMENTE!";
            alert(mensaje);
            limpiar();
        },
        error: function () {     
            mensaje = "OCURRIO UN ERROR";
            alert(mensaje);
            limpiar();
        }
    });  
}


/*PARA LIMPIAR LOS COMPONENTES DEL FORMULARIO*/
function limpiar(){
    $('#name').val('');
    $('#apellidos').val('');
    $('#cedula').val('');
    $('#sexo').val('Sexo');
    $('#celular').val('');
    $('#email').val('');
    $('#estado').val('Estado');
    //$('#cmb_extratecnico').val('Especialización')
    $('#password').val('');
    $('#passwordconfir').val('');
   
}

/*FUNCIÓN PARA VALIDAR EL FORMULARIO EL REGISTRO CUANDO SE EJECUTA EL SUBMIT*/
$('#frm_registrarUsuario').on('submit',function(e){
	e.preventDefault();
	registrousuarioclic();
});


/*FUNCION DEL BOTON DE REGISTRO  DE USUARIO*/
function registrousuarioclic(){
    UsuarioInsert();
}
/*FUNCION DEL BOTON DE ACTUALIZARUSUARIO*/
function usuarioActualizar(){
    usuarioUpdate();
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
