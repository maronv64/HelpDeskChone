$('#id_toggle_areas').click(function(event)
	{
		MostrarAreas();
});
function MostrarAreas(){
    $('#tabla_Areas tbody tr').empty();
    $.get('mostrarareas',function(data){
          $.each(data, function(i,item){
                var out="";
                out+="<tr>";
                out+="<td>"+item.nombre+"</td>";
                out+="<td>"+item.correo+"</td>";
                out+="<td>"+item.extencion+"</td>";
                out+="<td>"+item.siglas+"</td>";
                out+="<td><center><a class='fa fa-edit btn btn-info' title='Modificar estado del dispositivo'></a></center></td>";
                out+="</tr>";
                $('#tabla_Areas tbody tr:last').after(out);
            });  
    });
}