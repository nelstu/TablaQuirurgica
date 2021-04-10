	$('#rut').keypress(function(event){
  
    var keycode = (event.keyCode ? event.keyCode : event.which);
    if(keycode == '13'){
        event.preventDefault();
        bus=$("#rut").val();
        $.ajax({
            url: "http://192.168.1.17/Tabla/api/public/api/clientes/"+bus,
            type:"GET",
            dataType: "json",
            })
            .then( function ( response ) {
         $.each( response, function ( i, val ) {
    		  n=val.nombres;
                ap=val.apellido_paterno;
                am=val.apellido_materno;
                nom=n+" "+ap+" "+am;
                pre=val.prevision;
                med=val.medico;
                edad=val.edad;
                la="20";
                $("#nombre").val(nom);
                $("#prevision").val(pre);
                $("#medico").val(med);
                $("#fecha_nacimiento").val(edad);
                // $("#edad").html(la);
                 $("#edad").empty();
$("#edad").append("some Text");
    	});
         

           }); 
    }
});

$("#txtbuscarrazon").keypress(function(e) {
              var code = (e.keyCode ? e.keyCode : e.which);
              if(code==13){
                  bus=$("#txtbuscarrazon").val();
                    $("#tablemodalRazon tbody tr").remove();
                    $.ajax({
                            url: "http://192.168.1.17/Tabla/api/public/api/clientes/"+bus,
                           type:"GET",
                           dataType: "json",

                           })
                           .then( function ( response ) {
                            $.each( response, function ( i, val ) {
                               var markup = "<tr><td><button id='selrazon' data-rut="+encodeURIComponent(val.rut)+" data-paciente="+encodeURIComponent(val.paciente)+"  data-medico="+encodeURIComponent(val.medico)+" data-nombre_accion_clinica="+encodeURIComponent(val.nombre_accion_clinica)+"  data-nombre_tipo_ojo="+encodeURIComponent(val.nombre_tipo_ojo)+" data-prevision="+encodeURIComponent(val.prevision)+ " >"+val.rut+"</button></td><td>"+val.fechapresupuesto+"</td><td>"+val.paciente+"</td><td>"+val.medico+"</td><td>"+val.nombre_accion_clinica+"</td><td>"+val.nombre_tipo_ojo+"</td></tr>";
                               $("#tablemodalRazon tbody").append(markup);
                          });
                         });
                 $("#txtbuscarrazon").val('');
             }
         });
         /*
         $('#ODI').click(function(){ 
             $('#ODI').prop( "checked", true );
            $('#OD').prop( "checked", false);
            $('#OI').prop( "checked", false );
            $('#OTR').prop( "checked", false );
          });
          
            $('#OD').click(function(){ 
             $('#ODI').prop( "checked", false );
            $('#OD').prop( "checked", true);
            $('#OI').prop( "checked", false );
            $('#OTR').prop( "checked", false );
          });
          
            $('#OI').click(function(){ 
             $('#ODI').prop( "checked", false );
            $('#OD').prop( "checked", false);
            $('#OI').prop( "checked", true );
            $('#OTR').prop( "checked", false );
          });
          
            $('#OTR').click(function(){ 
             $('#ODI').prop( "checked", false );
            $('#OD').prop( "checked", false);
            $('#OI').prop( "checked", false );
            $('#OTR').prop( "checked", true );
          });
          
          
          */
          
          
          
          
          
          
          