<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app=new \Slim\App;


//GET Todos los Clientes

$app->get('/api/clientes',function(Request $request,Response $response){
    $sql="SELECT * FROM PERSONA";
    
    try{
        $db=new db();
        $db=$db->conecDB();
        $resultado=$db->query($sql);
        if ($resultado->rowCount()>0){
            $clientes=$resultado->fetch(PDO::FETCH_OBJ);
            echo json_encode($clientes);

        }else{
            echo json_encode("No existen clientes en la BBDD");
        }
        $resultado=null;
        $db=null;
    }catch(PDOException $e){
        echo '{"error":{"text":'.$e->getMessage().'}}';

    }
});

  

//GET Recuperar Cliente por ID

$app->get('/api/clientes/{id}',function(Request $request,Response $response){
    //
   
    $id_cliente=$request->getAttribute('id');
     $sql="select * from PRESUPUESTO as p, ACCION_CLINICA_PRESUPUESTO as ac where p.codigo_presupuesto = ac.codigo_presupuesto and p.rut_paciente ='".$id_cliente."' order by ac.orden asc";
    
    try{
        $db=new db();
        $db=$db->conecDB();
        $resultado=$db->query($sql);
        while($row = $resultado->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)) {
              $d1=$row[0];
              $d2=$row[17];
              $d4=$row[24];
              //rut medico
              $d6=$row[5];
              //numero hermano gemelo
               $d7=$row[3];
                //evento
               $d8=$row[4];
            }
         
        $resultado=null;
        $db=null;
        }
       catch(PDOException $e){
            echo '{\"error\":{\"text\":'.$e->getMessage().'}}';

          }
       
          $sql="select *  from ACCION_CLINICA where codigo_accion_clinica = '".$d2."'";
    try{
        $db=new db();
        $db=$db->conecDB();
        $resultado=$db->query($sql);
        while($row = $resultado->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)) {
              $d3=$row[2];
          
            
            }
         
        $resultado=null;
        $db=null;
        }
       catch(PDOException $e){
            echo '{\"error\":{\"text\":'.$e->getMessage().'}}';

          }  
          
          
            $sql="select * from TIPO_OJO where codigo_tipo_ojo=$d4";
    try{
        $db=new db();
        $db=$db->conecDB();
        $resultado=$db->query($sql);
        while($row = $resultado->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)) {
              $d5=$row[1];
          
            
            }
         
        $resultado=null;
        $db=null;
        }
       catch(PDOException $e){
            echo '{\"error\":{\"text\":'.$e->getMessage().'}}';

          }  
          
                $sql="select p.nombres, pn.nombre_pnatural, pn.apellido_paterno, pn.apellido_materno
	  from PERSONA as p, 
	  PNATURAL as pn where p.rut = pn.rut_pnatural and p.rut = '".$d6."' and pn.numero_hermano_gemelo = $d7";
    try{
        $db=new db();
        $db=$db->conecDB();
        $resultado=$db->query($sql);
        while($row = $resultado->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)) {
              $d9=$row[0];
              $d10=$row[1];
              $d11=$row[2];
              $d12=$row[3];
              $med=$d9." ".$d11." ".$d12;
          
            
            }
         
        $resultado=null;
        $db=null;
        }
       catch(PDOException $e){
            echo '{\"error\":{\"text\":'.$e->getMessage().'}}';

          }  
          
          
                     $sql="select p.nombres, pn.nombre_pnatural, pn.apellido_paterno, pn.apellido_materno
	  from PERSONA as p, 
	  PNATURAL as pn where p.rut = pn.rut_pnatural and p.rut = '".$id_cliente."' and pn.numero_hermano_gemelo = $d7";
    try{
        $db=new db();
        $db=$db->conecDB();
        $resultado=$db->query($sql);
        while($row = $resultado->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)) {
              $d13=$row[0];
              $d14=$row[1];
              $d15=$row[2];
              $d16=$row[3];
              $pac=$d13." ".$d15." ".$d16;
          
            
            }
         
        $resultado=null;
        $db=null;
        }
       catch(PDOException $e){
            echo '{\"error\":{\"text\":'.$e->getMessage().'}}';

          }  
          
             $return[] = array(
                 'codigo_prespuesto' => $d1,
                 'codigo_accion_clinica' => $d2,
                 'nombre_accion_clinica' => $d3,
                 'ojos' => $d4,
                 'nombre_tipo_ojo' => $d5,
                 'medico' => $med,
                 'paciente' => $pac,

                );
             echo json_encode($return) ;

});

//POST Crear nuevo Cliente

$app->post('/api/clientes/nuevo',function(Request $request,Response $response){
    $nombre=$request->getParam('nombre');
    $apellidos=$request->getParam('apellidos');
    $telefono=$request->getParam('telefono');
    $email=$request->getParam('email');
    $direccion=$request->getParam('direccion');
    $ciudad=$request->getParam('ciudad');

    $sql='INSERT INTO clientes (nombre,apellidos,telefono,email,direccion,ciudad) VALUES (:nombre,:apellidos,:telefono,:email,:direccion,:ciudad)';

    try{
        $db=new db();
        $db=$db->conecDB();
        $resultado=$db->prepare($sql);
        $resultado->bindParam(':nombre',$nombre);
        $resultado->bindParam(':apellidos',$apellidos);
        $resultado->bindParam(':telefono',$telefono);
        $resultado->bindParam(':email',$email);
        $resultado->bindParam(':direccion',$direccion);
        $resultado->bindParam(':ciudad',$ciudad);
        $resultado->execute();
        echo json_encode('Nuevo Cliente Guardado');


        $resultado=null;
        $db=null;
    }catch(PDOException $e){
        echo '{\"error\":{\"text\":'.$e->getMessage().'}}';

    }
});

//POST Crear nuevo Cliente

$app->put('/api/clientes/modificar/{id}',function(Request $request,Response $response){
    $id_cliente=$request->getAttribute('id');
    $nombre=$request->getParam('nombre');
    $apellidos=$request->getParam('apellidos');
    $telefono=$request->getParam('telefono');
    $email=$request->getParam('email');
    $direccion=$request->getParam('direccion');
    $ciudad=$request->getParam('ciudad');
    
    $sql='UPDATE clientes SET nombre=:nombre,apellidos=:apellidos,telefono=:telefono,email=:email,direccion=:direccion,ciudad=:ciudad WHERE id=$id_cliente';

    try{
        $db=new db();
        $db=$db->conecDB();
        $resultado=$db->prepare($sql);
        $resultado->bindParam(':nombre',$nombre);
        $resultado->bindParam(':apellidos',$apellidos);
        $resultado->bindParam(':telefono',$telefono);
        $resultado->bindParam(':email',$email);
        $resultado->bindParam(':direccion',$direccion);
        $resultado->bindParam(':ciudad',$ciudad);
        $resultado->execute();
        echo json_encode('Cliente Modificado');


        $resultado=null;
        $db=null;
    }catch(PDOException $e){
        echo '{\"error\":{\"text\":'.$e->getMessage().'}}';

    }
});



//POST Crear nuevo Cliente

$app->delete('/api/clientes/delete/{id}',function(Request $request,Response $response){
    $id_cliente=$request->getAttribute('id');

    
    $sql='DELETE FROM clientes WHERE id=$id_cliente';

    try{
        $db=new db();
        $db=$db->conecDB();
        $resultado=$db->prepare($sql);
        $resultado->execute();
        if ($resultado->rowCount()>0){
          
            echo json_encode('Cliente Eliminado');

        }else{
            echo json_encode('No existe Cliente con este ID');
        }


        $resultado=null;
        $db=null;
    }catch(PDOException $e){
        echo '{\"error\":{\"text\":'.$e->getMessage().'}}';

    }
});