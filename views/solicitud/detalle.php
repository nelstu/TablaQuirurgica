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
		<h1 class="center">Detalle de <?php echo $this->solicitud->id ;?></h1>
    <div class="center"><?php echo $this->mensaje;?></div>
         <form action="<?php echo constant('URL');?>solicitud/actualizarSolicitud" method="POST" >
<div class="form-group">
<label for="id">id</label>
<input type="text" name="id" id="id"  id="id" readonly  value="<?php echo $this->solicitud->id;?>"  class="form-control"  >
</div>
<div class="form-group">
<label for="rut">Rut . , sin digito verificador ni -</label>
<input type="text" name="rut" id="rut"  value="<?php echo $this->solicitud->rut;?>"  class="form-control"  >
</div>
<div class="form-group">
<label for="nombre">Nombre Paciente</label>
<input type="text" name="nombre" id="nombre"  value="<?php echo $this->solicitud->nombre;?>"  class="form-control"  >
</div>
<div class="form-group">
<label for="medico">Medico</label>
<input type="text" name="medico" id="medico"  value="<?php echo $this->solicitud->medico;?>"  class="form-control"  >
</div>
<div class="form-group">
<label for="cirugia">Cirugia</label>
<input type="text" name="cirugia" id="cirugia"  value="<?php echo $this->solicitud->cirugia;?>"  class="form-control"  >
</div>
<div class="form-group">
<label for="fechasp">Fecha Solicitud de Pabellon</label>
<input type="date" name="fechasp" id="fechasp"  value="<?php echo $this->solicitud->fechasp;?>"  class="form-control"  >
</div>
           <div class="form-group">
          <label for="ODI">ODI</label>
<?php if ($this->solicitud->ODI=="N"){  ?>            <input type="checkbox" name="ODI"  id="ODI" class="form-control"  <?php }else{ ?>   <input type="checkbox" name="ODI" checked id="ODI" class="form-control"  <?php  } ?>>
 <input type="date" name="fechaodi" id="fechaodi"  class="form-control"  value="<?php echo $this->solicitud->fechaodi;?>" >
          </div>
           <div class="form-group">
          <label for="OD">OD</label>
<?php if ($this->solicitud->OD=="N"){  ?>            <input type="checkbox" name="OD"  id="OD" class="form-control"  <?php }else{ ?>   <input type="checkbox" name="OD" checked id="OD" class="form-control"  <?php  } ?>>
<input type="date" name="fechaod" id="fechaod"  class="form-control"  value="<?php echo $this->solicitud->fechaod;?>" >
          </div>
           <div class="form-group">
          <label for="OI">OI</label>
<?php if ($this->solicitud->OI=="N"){  ?>            <input type="checkbox" name="OI"  id="OI" class="form-control"  <?php }else{ ?>   <input type="checkbox" name="OI" checked id="OI" class="form-control"  <?php  } ?>>
<input type="date" name="fechaoi" id="fechaoi"  class="form-control"  value="<?php echo $this->solicitud->fechaoi;?>" >
          </div>
           <div class="form-group">
          <label for="OTR">OTR</label>
<?php if ($this->solicitud->OTR=="N"){  ?>            <input type="checkbox" name="OTR"  id="OTR" class="form-control"  <?php }else{ ?>   <input type="checkbox" name="OTR" checked id="OTR" class="form-control"  <?php  } ?>>
<input type="date" name="fechaotr" id="fechaotr"  class="form-control"  value="<?php echo $this->solicitud->fechaotr;?>" >
          </div>
<div class="form-group">
<label for="prevision">Prevision</label>
<input type="text" name="prevision" id="prevision"  value="<?php echo $this->solicitud->prevision;?>"  class="form-control"  >
</div>
<div class="form-group">
<label for="fechaag">Fecha de Cirugia</label>
<?php if ($_SESSION["perfil"]=="Admin"){  ?>
<input type="date" name="fechaag" id="fechaag"  value="<?php echo $this->solicitud->fechaag;?>"  class="form-control"  >
<?php   }else{  ?>
<input type="date" name="fechaag" id="fechaag"  value="<?php echo $this->solicitud->fechaag;?>" readonly class="form-control"  >

    <?php }  ?>
</div>
<div class="form-group">
<label for="telefono_trabajo">Telefono</label>
<input type="text" name="telefono_trabajo" id="telefono_trabajo"  value="<?php echo $this->solicitud->telefono_trabajo;?>"  class="form-control"  >
</div>
<div class="form-group">
<label for="correo_electronico">email</label>
<input type="text" name="correo_electronico" id="correo_electronico"  value="<?php echo $this->solicitud->correo_electronico;?>"  class="form-control"  >
</div>
<div class="form-group">
<label for="fecha_nacimiento">fecha_nacimiento</label>
<input type="date" name="fecha_nacimiento" id="fecha_nacimiento"  value="<?php echo $this->solicitud->fecha_nacimiento;?>"  class="form-control"  >
</div>
           <div class="form-group">
          <label for="estado">Estado Solicitud Pabellon</label>
          <?php if ($_SESSION["perfil"]=="Admin"){  ?>
          <select id="estado" id="estado"  name="estado"   class="form-control">
          </select>
          <?php   }else{  ?>

           <select id="estado" id="estado"  name="estado"  disabled class="form-control">
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
 <textarea  name="observaciones" id="observaciones"  value=""  class="form-control"> <?php echo $this->solicitud->observaciones;?> </textarea>          </div>
          <input type="submit" class="btn btn-primary" value="Grabar">
         </form>    
	</div>
	</div>
	<?php require 'views/footer.php'?>
<script src="<?php echo constant('URL');?>public/js/nuevo_solicitud.js"></script>
<!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Seleccionar Producto</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
     </div>
      <!-- Modal body -->
      <div class="modal-body">
          <input type="text" name="txtbuscar" id="txtbuscar"/>
        <table class="table  table-striped" id="tablemodal">
            <thead>
            <th>Codigo</th>
            <th>Producto</th>
            <th>Unidad</th>
            <th>Precio</th>
            </thead>
            <tbody></tbody>
        </table>
      </div>
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- Fin Modal -->
<!-- The Modal -->
<div class="modal" id="myModalrazon">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Seleccionar Cliente</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
          <input type="text" name="txtbuscarrazon" id="txtbuscarrazon"/>
        <table class="table  table-striped" id="tablemodalRazon">
            <thead>
            <th>Rut</th>
            <th>Razon</th>
            <th>Direccion</th>
            <th>Comuna</th>
            </thead>
            <tbody></tbody>
        </table>
      </div>
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<script>
  function cal(){
       var filas = [];
	           var net=0;
               $('#tabla tbody tr').each(function() {
               var total = $(this).find('input[type="number"]').val();
               var val = parseInt(total);
	           net+=val;
            });
   iv=Math.round(net*0.19);
          tot=net+iv;
          $("#neto").val(net);
         $("#iva").val(iv);
          $("#total").val(tot);
  }
  $(document).on('keyup', '#txtcantidad', function(){
               precio=$("#txtprecio").val();
               cantidad=$("#txtcantidad").val();
               total=precio*cantidad;
              $("#txttotal").val(total);
              });
               $(document).on('blur', '#txtcantidad', function(){
              precio=$("#txtprecio").val();
              cantidad=$("#txtcantidad").val();
              total=precio*cantidad;
             $("#txttotal").val(total);
             });
             $(document).on('keyup', '#txtprecio', function(){
             precio=$("#txtprecio").val();
             cantidad=$("#txtcantidad").val();
             total=precio*cantidad;
            $("#txttotal").val(total);
            });
               $(document).on('blur', '#txtprecio', function(){
             precio=$("#txtprecio").val();
             cantidad=$("#txtcantidad").val();
             total=precio*cantidad;
            $("#txttotal").val(total);
            });
	        $(document).on('click', '#sel', function(){
             cod=$(this).data("cod");
             prod=decodeURIComponent($(this).data("prod"));
             un=$(this).data("un");
             venta=$(this).data("venta");
             $("#txtcodigo").val(cod);
             $("#txtproducto").val(prod);
             $("#txtunidad").val(un);
             $("#txtprecio").val(venta);
             $("#myModal").modal('hide');
             });
               $(document).on('click', '#selrazon', function(){
             rut=decodeURIComponent($(this).data("rut"));
             nombre=decodeURIComponent($(this).data("nombre"));
             direccion=decodeURIComponent($(this).data("direccion"));
           comuna=decodeURIComponent($(this).data("comuna"));
             ciudad=decodeURIComponent($(this).data("ciudad"));
             giro=decodeURIComponent($(this).data("giro"));
             $("#rut").val(rut);
             $("#razon").val(nombre);
               $("#direccion").val(direccion);
               $("#comuna").val(comuna);
               $("#ciudad").val(ciudad);
               $("#giro").val(giro);
             $("#myModalrazon").modal('hide');
             }); 
	    $(document).ready(function(){
	$.ajax({
		type: 'GET',
		url : '<?php echo constant('URL')?>solicitud/obteneruestado',
		dataType: 'json'
	})
	.done(function( response){
        var len = response.length;
        for(var i=0; i<len; i++){
                var id = response[i].id;
                var estado = response[i].estado;
 var tr_str = " <option value='"+estado+"'";
            if (estado ===  "<?php  echo  $this->solicitud->estado ?>") {
                tr_str += " selected ";
                 }
            tr_str += ">"+estado+"</option>";
                $("#estado").append(tr_str);
            }
	})
	.fail(function(){
		console.log("Fallo!");
	})
        
        //obtener u region
        	$.ajax({
		type: 'GET',
		url : '<?php echo constant('URL')?>solicitud/obteneruregion',
		dataType: 'json'
	})
	.done(function( response){
        var len = response.length;
        for(var i=0; i<len; i++){
                var id = response[i].id;
                var region = response[i].region;
 var tr_str = " <option value='"+region+"'";
            if (estado ===  "<?php  echo  $this->solicitud->region ?>") {
                tr_str += " selected ";
                 }
            tr_str += ">"+region+"</option>";
                $("#region").append(tr_str);
            }
	})
	.fail(function(){
		console.log("Fallo!");
	})
        
        
        //fin obtener u region
        
        
        
 $(".foto").change(function(){
           var imagen=this.files[0];
           console.log("imagen",imagen);
           if (imagen["type"]!="image/jpeg" && imagen["type"]!="image/png"){
               $(".foto").val("");
               alert("!La Imagen debe estar en formato JPG o PNG!");
           }else if(imagen["size"]>200000000){
               $(".foto").val("");
               alert("!La Imagen No debe pesar mas de 200MB");
           }else{
               var datosImagen=new FileReader;
               datosImagen.readAsDataURL(imagen);
               $(datosImagen).on("load",function(event){
                   var rutaImagen=event.target.result;
                   $(".previsualizar").attr("src",rutaImagen)
               });
           }
        });
	    });
	</script>
</body>
</html>
