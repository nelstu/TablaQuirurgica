<!DOCTYPE html>
<html>
<head><meta http-equiv='Content-Type' content='text/html; charset=utf-8'>
  
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Solicitud</title>
  <link rel="stylesheet" href="">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.0/css/buttons.dataTables.min.css">

<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>
<body>
  <?php require 'views/header.php'?>
  <div class="container">
    <h3 class="center">Documentos Solicitud</h3>
   
              <div class="card-body">
         <table id="example2" class="table table-bordered table-hover">
          <thead>
            <tr>
                
                 <th >Id<a class="ordenar" href="#" data="id"></a></th>
                 <th >Ide<a class="ordenar" href="nombre" data="ide"></a></th>
                 <th >Archivo<a class="ordenar" href="#" data="archivo"></a></th>
                 <th ></th>
              </tr>
          </thead>
          <tbody>
                 <?php
                 include_once 'models/sdoc.php';
                 foreach($this->sdoc as $row){
                     $sdoc2=new Sdoc();
                     $sdoc2=$row;
                  ?>
                  <tr>
                  <td><?php echo $sdoc2->id;?></td>
                  <td><?php echo $sdoc2->ide;?></td>
                  <td><a href="<?php echo constant('URL').'public/uploadsdoc/'.$sdoc2->archivo?>"><?php echo $sdoc2->archivo;?></a></td>
                  <td> <a class="delete" href="#" data="<?php echo $sdoc2->id?>"><i class="fas fa-trash"></i> </a></td>
                  </tr>
                  <?php
                     }
                  ?>
          </tbody>
         </table>


              
               
            </tr>
          </thead>
          <tbody>
           
          </tbody>
         </table>
         </div>
 
  </div>
  <?php require 'views/footer.php'?>
    
   <script src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script> 
     <script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.html5.min.js"></script>
    
    
    
<script>


  $(function () {
 
    $('#example2').DataTable({
         "language": {
           "processing": "Procesando...",
    "lengthMenu": "Mostrar _MENU_ registros",
    "zeroRecords": "No se encontraron resultados",
    "emptyTable": "Ningún dato disponible en esta tabla",
    "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
    "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
    "infoFiltered": "(filtrado de un total de _MAX_ registros)",
    "search": "Buscar:",
    "infoThousands": ",",
    "loadingRecords": "Cargando...",
    "paginate": {
        "first": "Primero",
        "last": "Último",
        "next": "Siguiente",
        "previous": "Anterior"
    },
    "aria": {
        "sortAscending": ": Activar para ordenar la columna de manera ascendente",
        "sortDescending": ": Activar para ordenar la columna de manera descendente"
    },
    "buttons": {
        "copy": "Copiar",
        "colvis": "Visibilidad",
        "collection": "Colección",
        "colvisRestore": "Restaurar visibilidad",
        "copyKeys": "Presione ctrl o u2318 + C para copiar los datos de la tabla al portapapeles del sistema. <br \/> <br \/> Para cancelar, haga clic en este mensaje o presione escape.",
        "copySuccess": {
            "1": "Copiada 1 fila al portapapeles",
            "_": "Copiadas %d fila al portapapeles"
        },
        "copyTitle": "Copiar al portapapeles",
        "csv": "CSV",
        "excel": "Excel",
        "pageLength": {
            "-1": "Mostrar todas las filas",
            "1": "Mostrar 1 fila",
            "_": "Mostrar %d filas"
        },
        "pdf": "PDF",
        "print": "Imprimir"
    },
    "autoFill": {
        "cancel": "Cancelar",
        "fill": "Rellene todas las celdas con <i>%d<\/i>",
        "fillHorizontal": "Rellenar celdas horizontalmente",
        "fillVertical": "Rellenar celdas verticalmentemente"
    },
    "decimal": ",",
    "searchBuilder": {
        "add": "Añadir condición",
        "button": {
            "0": "Constructor de búsqueda",
            "_": "Constructor de búsqueda (%d)"
        },
        "clearAll": "Borrar todo",
        "condition": "Condición",
        "conditions": {
            "date": {
                "after": "Despues",
                "before": "Antes",
                "between": "Entre",
                "empty": "Vacío",
                "equals": "Igual a",
                "notBetween": "No entre",
                "notEmpty": "No Vacio",
                "not": "Diferente de"
            },
            "number": {
                "between": "Entre",
                "empty": "Vacio",
                "equals": "Igual a",
                "gt": "Mayor a",
                "gte": "Mayor o igual a",
                "lt": "Menor que",
                "lte": "Menor o igual que",
                "notBetween": "No entre",
                "notEmpty": "No vacío",
                "not": "Diferente de"
            },
            "string": {
                "contains": "Contiene",
                "empty": "Vacío",
                "endsWith": "Termina en",
                "equals": "Igual a",
                "notEmpty": "No Vacio",
                "startsWith": "Empieza con",
                "not": "Diferente de"
            },
            "array": {
                "not": "Diferente de",
                "equals": "Igual",
                "empty": "Vacío",
                "contains": "Contiene",
                "notEmpty": "No Vacío",
                "without": "Sin"
            }
        },
        "data": "Data",
        "deleteTitle": "Eliminar regla de filtrado",
        "leftTitle": "Criterios anulados",
        "logicAnd": "Y",
        "logicOr": "O",
        "rightTitle": "Criterios de sangría",
        "title": {
            "0": "Constructor de búsqueda",
            "_": "Constructor de búsqueda (%d)"
        },
        "value": "Valor"
    },
    "searchPanes": {
        "clearMessage": "Borrar todo",
        "collapse": {
            "0": "Paneles de búsqueda",
            "_": "Paneles de búsqueda (%d)"
        },
        "count": "{total}",
        "countFiltered": "{shown} ({total})",
        "emptyPanes": "Sin paneles de búsqueda",
        "loadMessage": "Cargando paneles de búsqueda",
        "title": "Filtros Activos - %d"
    },
    "select": {
        "1": "%d fila seleccionada",
        "_": "%d filas seleccionadas",
        "cells": {
            "1": "1 celda seleccionada",
            "_": "$d celdas seleccionadas"
        },
        "columns": {
            "1": "1 columna seleccionada",
            "_": "%d columnas seleccionadas"
        }
    },
    "thousands": ".",
    "datetime": {
        "previous": "Anterior",
        "next": "Proximo",
        "hours": "Horas",
        "minutes": "Minutos",
        "seconds": "Segundos",
        "unknown": "-",
        "amPm": [
            "am",
            "pm"
        ]
    },
    "editor": {
        "close": "Cerrar",
        "create": {
            "button": "Nuevo",
            "title": "Crear Nuevo Registro",
            "submit": "Crear"
        },
        "edit": {
            "button": "Editar",
            "title": "Editar Registro",
            "submit": "Actualizar"
        },
        "remove": {
            "button": "Eliminar",
            "title": "Eliminar Registro",
            "submit": "Eliminar",
            "confirm": {
                "_": "¿Está seguro que desea eliminar %d filas?",
                "1": "¿Está seguro que desea eliminar 1 fila?"
            }
        },
        "error": {
            "system": "Ha ocurrido un error en el sistema (<a target=\"\\\" rel=\"\\ nofollow\" href=\"\\\">Más información&lt;\\\/a&gt;).<\/a>"
        },
        "multi": {
            "title": "Múltiples Valores",
            "info": "Los elementos seleccionados contienen diferentes valores para este registro. Para editar y establecer todos los elementos de este registro con el mismo valor, hacer click o tap aquí, de lo contrario conservarán sus valores individuales.",
            "restore": "Deshacer Cambios",
            "noMulti": "Este registro puede ser editado individualmente, pero no como parte de un grupo."
        }
    }
        },
         dom: 'Bfrtip',
        buttons: [
           
            'excelHtml5'
        ],
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "order": [[ 4, "desc" ]],
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>

<script>
$(document).ready(function(){
 $('.delete').on('click', function(e) {
        e.preventDefault();
              var parent = $(this).parent().parent().attr('id');
              var item = $(this).attr('data');
              var dataString = 'item='+item;
        $.confirm({
        title: 'Confirma Eliminacion?'+item,
        content: '',
        buttons: {
        confirm: function () {
        $.ajax({
            type: "POST",
            url: "<?php echo constant('URL');?>solicitud/eliminardocadj/",
            data: dataString,
            success: function(response) { 
                   var url = "<?php echo constant('URL');?>solicitud/verdoc/"+item;   
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


</body>
</html>
