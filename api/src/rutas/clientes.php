<?php
header("Access-Control-Allow-Origin: *");
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
              //fecha presupuesto
              $df=$row[11];
              $d1=$row[0];
              $d2=$row[17];
              $d4=$row[24];
              //rut medico
              $d6=$row[5];
              //numero hermano gemelo
               $d7=$row[3];
                //evento
               $d8=$row[4];
                 //prevision
               $d20=$row[8];
               
               //buscar datos
               
   $sql0="select * from PREVISION where codigo_prevision=".$d20;
    try{
        $db0=new db();
        $db0=$db0->conecDB();
        $resultado0=$db0->query($sql0);
        while($row0 = $resultado0->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)) {
              $d21=$row0[1];
          
            
            }
         
        $resultado0=null;
        $db0=null;
        }
       catch(PDOException $e0){
            echo '{\"error\":{\"text\":'.$e0->getMessage().'}}';

          }  
               
               
                    $sql1="select *  from ACCION_CLINICA where codigo_accion_clinica = '".$d2."'";
    try{
        $db1=new db();
        $db1=$db1->conecDB();
        $resultado1=$db1->query($sql1);
        while($row1 = $resultado1->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)) {
              $d3=$row1[2];
          
            
            }
         
        $resultado1=null;
        $db1=null;
        }
       catch(PDOException $e1){
            echo '{\"error\":{\"text\":'.$e1->getMessage().'}}';

          }  
          
          
            $sql2="select * from TIPO_OJO where codigo_tipo_ojo=$d4";
    try{
        $db2=new db();
        $db2=$db2->conecDB();
        $resultado2=$db2->query($sql2);
        while($row2 = $resultado2->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)) {
              $d5=$row2[1];
          
            
            }
         
        $resultado2=null;
        $db2=null;
        }
       catch(PDOException $e2){
            echo '{\"error\":{\"text\":'.$e2->getMessage().'}}';

          }  
          
                $sql3="select p.nombres, pn.nombre_pnatural, pn.apellido_paterno, pn.apellido_materno,p.telefono_trabajo,p.correo_electronico,pn.fecha_nacimiento 
	  from PERSONA as p, 
	  PNATURAL as pn where p.rut = pn.rut_pnatural and p.rut = '".$d6."' and pn.numero_hermano_gemelo = $d7";
    try{
        $db3=new db();
        $db3=$db3->conecDB();
        $resultado3=$db3->query($sql3);
        while($row3 = $resultado3->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)) {
              $d9=$row3[0];
              $d10=$row3[1];
              $d11=$row3[2];
              $d12=$row3[3];
              $med=$d9." ".$d11." ".$d12;
          
            
            }
         
        $resultado3=null;
        $db3=null;
        }
       catch(PDOException $e3){
            echo '{\"error\":{\"text\":'.$e3->getMessage().'}}';

          }  
          
          
                     $sql4="select p.nombres, pn.nombre_pnatural, pn.apellido_paterno, pn.apellido_materno,p.telefono_trabajo,p.correo_electronico,pn.fecha_nacimiento
	  from PERSONA as p, 
	  PNATURAL as pn where p.rut = pn.rut_pnatural and p.rut = '".$id_cliente."' and pn.numero_hermano_gemelo = $d7";
    try{
        $db4=new db();
        $db4=$db4->conecDB();
        $resultado4=$db4->query($sql4);
        while($row4 = $resultado4->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)) {
              $d13=$row4[0];
              $d14=$row4[1];
              $d15=$row4[2];
              $d16=$row4[3];
              $pac=$d13." ".$d15." ".$d16;
                $demail=$row4[5];
                  $dedad=$row4[6];
                    $dtelefono=$row4[4];
          
            
            }
         
        $resultado4=null;
        $db4=null;
        }
       catch(PDOException $e4){
            echo '{\"error\":{\"text\":'.$e4->getMessage().'}}';

          }  
          
              //$fecha = "2018-07-30T20:55:20";
              $fechaEntera = strtotime($df);
              $anio = date("Y",  $fechaEntera);
              $mes = date("m",  $fechaEntera);
              $dia = date("d",  $fechaEntera);
              $df0=$anio."-".$mes."-".$dia;

             $return[] = array(
                 'fechapresupuesto' =>$df0,
                 'rut' =>$id_cliente,
                 'codigo_prespuesto' => $d1,
                 'codigo_accion_clinica' => $d2,
                 'nombre_accion_clinica' => $d3,
                 'ojos' => $d4,
                 'nombre_tipo_ojo' => $d5,
                 'medico' => $med,
                 'paciente' => $pac,
                 'prevision' => $d21,
                 'email' => $demail,
                 'edad' => $dedad,
                 'telefono' => $dtelefono,

                );
     
               //fin buscar datos
               
            }
         
        $resultado=null;
        $db=null;
        }
       catch(PDOException $e){
            echo '{\"error\":{\"text\":'.$e->getMessage().'}}';

          }
       
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