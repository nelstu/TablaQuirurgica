<!DOCTYPE html>
<html>
<head>
	
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
<script src='<?php echo constant('URL'); ?>public/js/a076d05399.js'></script>
</head>
<body>
	<?php require 'views/header.php'?>
	<div class="container">
	<div id="main">
<a href="<?php echo constant('URL')?>solicitud/verPaginacion/1"><i class="fa fa-backward" ></i></a><br>
		<h1 class="center">Nuevo Solicitud</h1>
    <div class="center"><?php echo $this->mensaje;?></div>
         <form action="<?php echo constant('URL');?>solicitud/crearSolicitud" method="POST" enctype="multipart/form-data">





           <div class="form-group">
          <label for="rut">Rut . , sin digito verificador ni -</label>
          <input type="text" name="rut" id="rut"   class="form-control"           value=""   >
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModalrazon">Buscar Paciente</button> 
          </div>
           <div class="form-group">
          <label for="nombre">Nombre Paciente</label>
          <input type="text" name="nombre" id="nombre"   class="form-control"           value=""   >
          </div>
           <div class="form-group">
          <label for="medico">Medico</label>
          <input type="text" name="medico" id="medico"   class="form-control"           value=""   >
          </div>
           <div class="form-group">
          <label for="cirugia">Cirugia</label>
          <input type="text" name="cirugia" id="cirugia"   class="form-control"           value=""   >
          </div>
           <div class="form-group">
          <label for="fechasp">Fecha Solicitud de Pabellon</label>
          <input type="date" name="fechasp" id="fechasp"  class="form-control"  value="<?php echo  date("Y-m-d") ?>" >
          </div>
           <div class="form-group">
          <label for="ODI">ODI</label>
          <input type="checkbox" name="ODI"  id="ODI" class="form-control" >
          <input type="date" name="fechaodi" id="fechaodi"  class="form-control"   >
          </div>
           <div class="form-group">
          <label for="OD">OD</label>
          <input type="checkbox" name="OD"  id="OD" class="form-control" >
          <input type="date" name="fechaod" id="fechaod"  class="form-control"   >
          </div>
           <div class="form-group">
          <label for="OI">OI</label>
          <input type="checkbox" name="OI"  id="OI" class="form-control" >
          <input type="date" name="fechaoi" id="fechaoi"  class="form-control"   >
          </div>
           <div class="form-group">
          <label for="OTR">OTR</label>
          <input type="checkbox" name="OTR"  id="OTR" class="form-control" >
          <input type="date" name="fechaotr" id="fechaotr"  class="form-control"   >
          </div>
           <div class="form-group">
          <label for="prevision">Prevision</label>
          <input type="text" name="prevision" id="prevision"   class="form-control"   required        value=""   >
          </div>
           <div class="form-group">
          <label for="fechaag">Fecha de Cirugia</label>
          <?php if ($_SESSION["perfil"]=="Admin"){  ?>
          <input type="date" name="fechaag" id="fechaag"  class="form-control"  value="" >
          <?php   }else{  ?>
           <input type="date" name="fechaag" id="fechaag"  readonly class="form-control"  value="" >
           <?php }  ?>

          
          </div>
           <div class="form-group">
          <label for="telefono_trabajo">Telefono</label>
          <input type="text" name="telefono_trabajo" id="telefono_trabajo"   class="form-control"           value=""   >
          </div>
           <div class="form-group">
          <label for="correo_electronico">email</label>
          <input type="text" name="correo_electronico" id="correo_electronico"   class="form-control"           value=""   >
          </div>
           <div class="form-group">
          <label for="fecha_nacimiento">fecha_nacimiento</label>
          <input type="date" name="fecha_nacimiento" id="fecha_nacimiento"  class="form-control"  value="" >
          <label for="edad" id="edad">Edad</label>
          </div>
           <div class="form-group">
          <label for="estado">Estado Solicitud Pabellon</label>

          <?php if ($_SESSION["perfil"]=="Admin"){  ?>
          <select id="estado" name="estado" id="estado" value=""  class="form-control">
          </select>
           <?php   }else{  ?>
       <select id="estado" name="estado" id="estado"  disabled  value=""  class="form-control">
          </select>

           <?php }  ?>

          </div>
             <div>
                 <label for="region">Region</label>
                    <select id="region" name="region" id="region" required class="form-control">
                        
                        
                     </select>
                 
                 
             </div>
             
             
             
           <div class="form-group">
          <label for="observaciones">observaciones</label>
 <textarea  name="observaciones" value="" id="observaciones" class="form-control"> </textarea>          </div>
          <input type="submit" class="btn btn-primary" value="Grabar">
         </form>    
	</div>
	</div>
	<?php require 'views/footer.php'?>
<!-- The Modal -->
<div class="modal" id="myModalrazon">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Seleccionar Presupuesto</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
        
          <input type="text" name="txtbuscarrazon" id="txtbuscarrazon"/>
        <table class="table  table-striped" id="tablemodalRazon">
            <thead>
            <th>Rut</th>
            <th>Fecha</th>
            <th>Paciente</th>
            <th>Medico</th>
            <th>Cirugia</th>
            <th>Ojo</th>
            </thead>
            <tbody></tbody>
        </table>
      </div>
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Salir</button>
      </div>
    </div>
  </div>
</div>

<script>
    $(document).ready(function(){
  $.ajax({
    type: 'GET',
    url : '<?php echo constant('URL')?>solicitud/obtenerestado',
    dataType: 'json'
  })
  .done(function( response){
        var len = response.length;
        for(var i=0; i<len; i++){
                var id = response[i].id;
                var estado = response[i].estado;
                var tr_str = " <option value='"+estado+"'>"+estado+"</option>";
                $("#estado").append(tr_str);
            }
  })
  .fail(function(){
    console.log("Fallo!");
  })
  //obtener regiones
    $.ajax({
    type: 'GET',
    url : '<?php echo constant('URL')?>solicitud/obtenerregiones',
    dataType: 'json'
  })
  .done(function( response){
        var len = response.length;
        $("#region").append(" <option value=''>Seleccionar</option>");
        for(var i=0; i<len; i++){
                var id = response[i].id;
                var regiones = response[i].region;
                var tr_str = " <option value='"+regiones+"'>"+regiones+"</option>";
                $("#region").append(tr_str);
            }
  })
  .fail(function(){
    console.log("Fallo!");
  })
  
//fin obtener regiones
 }); 

               $(document).on('click', '#selrazon', function(){
             rut=decodeURIComponent($(this).data("rut"));
             paciente=decodeURIComponent($(this).data("paciente"));
             medico=decodeURIComponent($(this).data("medico"));
           nombre_accion_clinica=decodeURIComponent($(this).data("nombre_accion_clinica"));
             nombre_tipo_ojo=decodeURIComponent($(this).data("nombre_tipo_ojo"));
              prevision=decodeURIComponent($(this).data("prevision"));
            
             $("#rut").val(rut);
             $("#nombre").val(paciente);
             $("#medico").val(medico);
             $("#cirugia").val(nombre_accion_clinica);
             $("#prevision").val(prevision);
               
               if (nombre_tipo_ojo=="OD"){
                   $("#OD").attr("checked",true);
               }
                 if (nombre_tipo_ojo=="OI"){
                   $("#OI").attr("checked",true);
               }
                if (nombre_tipo_ojo=="ODI"){
                   $("#ODI").attr("checked",true);
               }
                 if (nombre_tipo_ojo=="OTR"){
                   $("#OTR").attr("checked",true);
               }
             
             $("#myModalrazon").modal('hide');
             }); 

  </script>
<script src="<?php echo constant('URL');?>public/js/nuevo_solicitud.js"></script>
</body>
</html>
