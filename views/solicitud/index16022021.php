<!DOCTYPE html>
<html>
<head><meta http-equiv='Content-Type' content='text/html; charset=utf-8'>
  
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Solicitud</title>
  <link rel="stylesheet" href="">
<script src='https://kit.fontawesome.com/a076d05399.js'></script>
</head>
<body>
  <?php require 'views/header.php'?>
  <div class="container">
    <h3 class="center">Solicitud</h3>
    <a href="<?php echo constant('URL')?>solicitud/nuevoSolicitud" ><i class="fa fa-plus-square" ></i></a><br><br>
  <form id="form-buscar" action="<?php echo constant('URL'); ?>solicitud/verPaginacionsearch/1" method="POST" >
    Buscar<input type="text" name="txtbuscar" id="txtbuscar"><button id="btnbuscar" type="Submit">Buscar</button>
        </form>

        <form id="form-buscarfecha">
            Fecha<input type="date" name="searchfecha" id="searchfecha"/>
        </form>

         <form id="form-buscarestado">
            Estado<select id="searchestado" name="searchestado">
              <option value="Sin Agendar">Sin Agendar</option>
              <option value="Agendado">Agendado</option>
            </select>
        </form>
<div class="table-responsive">
         <table class="table table-striped">
          <thead>
            <tr>
                
                 <th >rut<a class="ordenar" href="#" data="rut"><i class="fas fa-sort"></i></a></th>
                 <th >Nombre Paciente<a class="ordenar" href="nombre" data="rut"><i class="fas fa-sort"></i></a></th>
                 <th >Medico<a class="ordenar" href="#" data="medico"><i class="fas fa-sort"></i></a></th>
                 <th >Cirugia<a class="ordenar" href="#" data="cirugia"><i class="fas fa-sort"></i></a></th>
                 <th >Fecha Solicitud de Pabellon<a class="ordenar" href="#" data="fechasp"><i class="fas fa-sort"></i></a></th>
                 <th >Prevision<a class="ordenar" href="#" data="prevision"><i class="fas fa-sort"></i></a></th>
                 <th >Estado Solicitud Pabellon<a class="ordenar" href="#" data="estado"><i class="fas fa-sort"></i></a></th>
                 <th >Dias Sin Asignar<a class="ordenar" href="#" data="fechasp"><i class="fas fa-sort"></i></a></th>
                 <th></th>
               
            </tr>
          </thead>
          <tbody>
            <?php
               include_once 'models/solicitud.php';
                   foreach($this->solicitud as $row){
                      $solicitud=new Solicitud();
                      $solicitud=$row;
            ?>
            <tr>
                 
<td><?php echo $solicitud->rut;?></td>
<td><?php echo $solicitud->nombre;?></td>
<td><?php echo $solicitud->medico;?></td>
<td><?php echo $solicitud->cirugia;?></td>
<td><?php echo $solicitud->fechasp;?></td>
<td><?php echo $solicitud->prevision;?></td>
<td><?php echo $solicitud->estado;?></td>
<?php
$date1 = new DateTime($solicitud->fechasp);
$date2 = new DateTime("now");
$diasdif = $date1->diff($date2);
$diasdif=$diasdif->format('%d');

if ($solicitud->estado=="Agendado"){
?>

  
  <td><img src="<?php echo constant('URL').'public/img/ok.png'?>" width="30px" height="=30" /></td>
<?php
      }else{
        ?>
      <td><img src="<?php echo constant('URL').'public/img/rojo.png'?>" width="30px" height="=30" /><?php echo $diasdif;?></td>
   <?php
    }
    ?>
              <td><a  href="<?php echo constant('URL').'solicitud/verSolicitud/'.$solicitud->id; ?>"><i class="fas fa-edit"></i></a></td>

            </tr>
              <?php
                     }
              ?>
          </tbody>
         </table>
         </div>
 <nav aria-label="Page navigation example">
       <ul class="pagination">
       <li class="page-item
       <?php  echo $this->paginaactual<=1 ? 'disabled' : '' ?>
       "><a class="page-link" href="<?php echo constant('URL'); ?>solicitud/verPaginacion/<?php echo $this->paginaactual-1 ?>">Anterior</a></li>
       <?php for($i=0;$i<$this->paginas;$i++):?>
       <?php if ($i<=10){ ?>
       <li class="page-item <?php  echo $this->paginaactual>=$this->paginas==$i+1 ? 'active' :'' ?>">
            <a class="page-link" href="<?php echo constant('URL'); ?>solicitud/verPaginacion/<?php echo $i+1 ?>">
           <?php echo $i+1 ?>
        </a></li>
         <?php } ?>
         <?php endfor ?>
       <li class="page-item
       <?php  echo $this->paginaactual>=$this->paginas ? 'disabled' : '' ?>
       "><a class="page-link" href="<?php echo constant('URL'); ?>solicitud/verPaginacion/<?php echo $this->paginaactual+1 ?>">Siguiente</a></li>
       </ul>
     </nav>
  </div>
  <?php require 'views/footer.php'?>
<script>
$(document).ready(function(){
    
        $('.ordenar').on('click', function(e) {
            e.preventDefault();
            var item = $(this).attr('data');
           // alert("ordenar por rut:"+item);
            var url = "<?php echo constant('URL');?>solicitud/verPaginacion/1/"+item;   
            $(location).attr('href',url);
        });
    
 $('.delete').on('click', function(e) {
        e.preventDefault();
              var parent = $(this).parent().parent().attr('id');
              var item = $(this).attr('data');
              var dataString = 'item='+item;
        $.confirm({
        title: 'Confirma Eliminacion?',
        content: '',
        buttons: {
        confirm: function () {
        $.ajax({
            type: "POST",
            url: "<?php echo constant('URL');?>solicitud/eliminarSolicitud/",
            data: dataString,
            success: function(response) { 
                   var url = "<?php echo constant('URL');?>solicitud/verPaginacion/1";   
                   $(location).attr('href',url);
            }
        });
        },
        cancel: function () {
            //$.alert('Canceled!');
        }
    }
});
    });   
});
</script>
<script>
$("table").tableExport({
  formats: ["xlsx","txt", "csv"], 
  position: 'button',  
  bootstrap: true,
  fileName: "ArchivoExportado",     
});
</script>
</body>
</html>
