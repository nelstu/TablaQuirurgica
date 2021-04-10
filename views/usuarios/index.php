<!DOCTYPE html>
<html>
<head><meta http-equiv='Content-Type' content='text/html; charset=utf-8'>
	
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Usuarios</title>
	<link rel="stylesheet" href="">
<script src='https://kit.fontawesome.com/a076d05399.js'></script>
</head>
<body>
	<?php require 'views/header.php'?>
	<div class="container">
		<h3 class="center">Usuarios</h3>
		<a href="<?php echo constant('URL')?>usuarios/nuevoUsuarios" ><i class="fa fa-plus-square" ></i></a><br><br>
	<form id="form-buscar" action="<?php echo constant('URL'); ?>usuarios/verPaginacionsearch/1" method="POST" >
		Buscar<input type="text" name="txtbuscar" id="txtbuscar"><button id="btnbuscar" type="Submit">Buscar</button>
        </form>
<div class="table-responsive">
         <table class="table table-striped">
         	<thead>
         		<tr>
                 <th>id</th>
                 <th>email</th>
                 <th>pass</th>
                 <th></th>
                 <th></th>
         		</tr>
         	</thead>
         	<tbody>
         		<?php
         		   include_once 'models/usuarios.php';
                   foreach($this->usuarios as $row){
                   	  $usuarios=new Usuarios();
                   	  $usuarios=$row;
         		?>
         		<tr>

<td><?php echo $usuarios->id;?></td>

<td><?php echo $usuarios->email;?></td>

<td>********</td>
         			<td><a  href="<?php echo constant('URL').'usuarios/verUsuarios/'.$usuarios->id; ?>"><i class="fas fa-edit"></i></a></td>
<td> <a class="delete" href="#" data="<?php echo $usuarios->id?>"><i class="fas fa-trash"></i> </a></td>
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
       "><a class="page-link" href="<?php echo constant('URL'); ?>usuarios/verPaginacion/<?php echo $this->paginaactual-1 ?>">Anterior</a></li>
       <?php for($i=0;$i<$this->paginas;$i++):?>
       <?php if ($i<=10){ ?>
       <li class="page-item <?php  echo $this->paginaactual>=$this->paginas==$i+1 ? 'active' :'' ?>">
            <a class="page-link" href="<?php echo constant('URL'); ?>usuarios/verPaginacion/<?php echo $i+1 ?>">
           <?php echo $i+1 ?>
        </a></li>
         <?php } ?>
         <?php endfor ?>
       <li class="page-item
       <?php  echo $this->paginaactual>=$this->paginas ? 'disabled' : '' ?>
       "><a class="page-link" href="<?php echo constant('URL'); ?>usuarios/verPaginacion/<?php echo $this->paginaactual+1 ?>">Siguiente</a></li>
       </ul>
     </nav>
	</div>
	<?php require 'views/footer.php'?>
<script>
$(document).ready(function(){
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
            url: "<?php echo constant('URL');?>usuarios/eliminarUsuarios/",
            data: dataString,
            success: function(response) {	
                   var url = "<?php echo constant('URL');?>usuarios/verPaginacion/1";   
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
