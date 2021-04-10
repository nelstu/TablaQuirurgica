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
<a href="<?php echo constant('URL')?>usuarios/verPaginacion/1"><i class="fa fa-backward" ></i></a><br>
		<h1 class="center">Detalle de <?php echo $this->usuarios->id ;?></h1>
    <div class="center"><?php echo $this->mensaje;?></div>
         <form action="<?php echo constant('URL');?>usuarios/actualizarUsuarios" method="POST" >
<div class="form-group">
<label for="id">id</label>
<input type="text" name="id" id="id"  id="id" readonly  value="<?php echo $this->usuarios->id;?>"  class="form-control"  >
</div>
<div class="form-group">
<label for="email">email</label>
<input type="text" name="email" id="email"  value="<?php echo $this->usuarios->email;?>"  class="form-control"  >
</div>
<div class="form-group">
<label for="pass">pass</label>
<input type="text" name="pass" id="pass"  value="**************"  class="form-control"  >
</div>
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
