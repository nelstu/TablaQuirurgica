<?php
include_once 'models/solicitud.php';
include_once 'models/.php';
class SolicitudModel extends Model
{
	  public function __construct(){
        parent::__construct();
    }
public function generanc($id){
$items = [];
        try{
            //buscar folio
            $queryf=$this->db->connect()->query("SELECT * FROM contador WHERE tipo =61 ");
           while($rowf=$queryf->fetch()){
            $contador   = $rowf['contador']+1;
           }
           //fin buscar folio
           $query=$this->db->connect()->query("SELECT * FROM documentos WHERE id=$id");
           while($row=$query->fetch()){
                $id        = $row['id'];
                $fecha     = $row['fecha'];
                $rut       = $row['rut'];
                $razon     = $row['razon'];
                $direccion = $row['direccion'];
                $comuna    = $row['comuna'];
                $ciudad    = $row['ciudad'];
                $neto      = $row['neto'];
                $iva       = $row['iva'];
                $total     = $row['total'];
                $numero    = $row['numero'];
                $giro      = $row['giro'];
                $estado    = $row['estado'];
                $region    = $row['region'];
                $sucursal  = $row['sucursal'];
                //insertar nc
                $query1=$this->db->connect()->prepare('INSERT INTO documentosncv(codref,razonref,feref,tpodocref,folioref,numero,fecha,rut,razon,neto,iva,total,direccion,comuna,ciudad,giro,estado,region,sucursal) VALUES  (:codref,:razonref,:feref,:tpodocref,:folioref,:numero,:fecha,:rut,:razon,:neto,:iva,:total,:direccion,:comuna,:ciudad,:giro,:estado,:region,:sucursal)');
         $query1->execute(['codref'=>1,'razonref'=>'Anula Doc','feref'=>$fecha,'tpodocref'=>33,'folioref'=>$numero,'numero'=>$contador,'fecha'=>$fecha,'rut'=>$rut,'razon'=>$razon,'neto'=>$neto,'iva'=>$iva,'total'=>$total,'direccion'=>$direccion,'comuna'=>$comuna,'ciudad'=>$ciudad,'giro'=>$giro,'estado'=>'estado','region'=>$region,'sucursal'=>$sucursal]);
                //fin insertar nc
                //obtener lastid
                  $queryl=$this->db->connect()->query("SELECT * FROM documentosncv order by id ASC ");
                  while($rowl=$queryl->fetch()){
                        $lastid   = $rowl['id'];
                        }
                //fin obtener lastid
                //buscar detalle
                 try{
           $query=$this->db->connect()->query("SELECT * FROM detdocumentos WHERE ide=".$id);
           while($row=$query->fetch()){
               $codigo       = $row['codigo'];
               $producto     = $row['producto'];
               $un           = $row['un'];
               $precio       = $row['precio'];
               $cantidad     = $row['cantidad'];
               $ltotal        = $row['total'];
               //insertar detdocu
               $query0=$this->db->connect()->prepare('INSERT INTO detdocumentosncv(ide,codigo,producto,un,precio,cantidad,total) VALUES  (:ide,:codigo,:producto,:unidad,:precio,:cantidad,:ltotal)');
               $query0->execute(['ide'=>$lastid,'codigo'=>$codigo,'producto'=>$producto,'unidad'=>$unidad,'precio'=>$precio,'cantidad'=>$cantidad,'ltotal'=>$ltotal]);
               //fin insertar detdocu
                }
                //actualizar contador
                $queryu=$this->db->connect()->prepare("UPDATE contador SET contador=".$contador." WHERE tipo=61");
                $queryu->execute();
                //fin actualizar contador
        return $items;
      }catch(PDOException $e){
          return [];
     }
              //fin buscar detalle
               }
        return $items;
     }catch(PDOException $e){
         return [];
     }
}
 public function getmenu($idu){
        $items = [];
        include_once 'models/usuariosperfil.php';
        try{
            $query=$this->db->connect()->query("SELECT * FROM usuariosperfil WHERE idusuario='".$idu."' AND  habilitado='S'");
            while($row=$query->fetch()){
                 $item = new Usuariosperfil();
                 $item->id            = $row['id'];
                 $item->idusuario     = $row['idusuario'];
                 $item->menu          = $row['menu'];
                 $item->habilitado    = $row['habilitado'];
                 $item->principal    = $row['principal'];
                 $item->titulo    = $row['titulo'];
                 array_push($items,$item);
                 }
          return $items;
       }catch(PDOException $e){
           return [];
       }
   }
   public function getfolio(){
   try{
       $query=$this->db->connect()->query("SELECT * FROM contador WHERE tipo =0 ");
      while($row=$query->fetch()){
             $contador   = $row['contador']+1;
            }
    return ($contador);
  }catch(PDOException $e){
      return [];
 }
 }
  public function getpacienterut($id){
try{
    $sql="select p.nombres, p.telefono_movil,p.telefono_trabajo, pn.numero_hermano_gemelo, pn.fecha_nacimiento, pn.nombre_pnatural, pn.apellido_paterno, pn.apellido_materno, pn.sexo, p.correo_electronico,pn.codigo_nacionalidad from PERSONA as p, PNATURAL as pn 
 where p.rut = pn.rut_pnatural and p.rut = '".$id."'";
   $query=$this->db->connect()->query($sql);
   while($row=$query->fetch()){
         $return[] = array(
           'nombres' => $row['nombres'],
        //   'telefono_movil' => ($row['telefono_movil']),
        //   'numero_hermano_gemelo' => ($row['numero_hermano_gemelo']),
        //   'fecha_nacimiento' => ($row['fecha_nacimiento']),
        // 'nombre_pnatural' => ($row['nombre_pnatural']),
         'apellido_paterno' => ($row['apellido_paterno']),
         'apellido_materno' => ($row['apellido_materno'])
        // 'correo_electronico' => ($row['correo_electronico'])
      );
       }
 return ($return);
 }catch(PDOException $e){
   return [];
}
 }
    public function get(){
        $items = [];
        try{
            $query=$this->db->connect()->query("SELECT * FROM solicitud");
            while($row=$query->fetch()){
                 $item = new Solicitud();
                 $item->id     = $row['id'];
                 $item->rut     = $row['rut'];
                 $item->nombre     = $row['nombre'];
                 $item->medico     = $row['medico'];
                 $item->cirugia     = $row['cirugia'];
                 $item->ojo     = $row['ojo'];
                 $item->fechasp     = $row['fechasp'];
                 $item->ODI     = $row['ODI'];
                 $item->OD     = $row['OD'];
                 $item->OI     = $row['OI'];
                 $item->OTR     = $row['OTR'];
                 array_push($items,$item);
                  }
           return $items;
        }catch(PDOException $e){
            return [];
        }
    }
    public function getregistros($s){
         try{
    if ($s==null){ 
                  $query=$this->db->connect()->query("SELECT count(*) as son FROM solicitud");
              }else{
                  $query=$this->db->connect()->query("SELECT count(*) as son FROM solicitud  WHERE (id LIKE '%".$s."%')  OR (rut LIKE '%".$s."%')  OR (nombre LIKE '%".$s."%')  OR (medico LIKE '%".$s."%')  OR (cirugia LIKE '%".$s."%')  OR (ojo LIKE '%".$s."%')  OR (fechasp LIKE '%".$s."%')  OR (ODI LIKE '%".$s."%')  OR (OD LIKE '%".$s."%')  OR (OI LIKE '%".$s."%')  OR (OTR LIKE '%".$s."%')  "); 
                               }
             while($row=$query->fetch()){
                  $cuantos    = $row['son'];
                   }
            return $cuantos;
         }catch(PDOException $e){
             return [];
         }
     }
         public function getpag($iniciar,$autoporpag,$s){
         $items = [];
         try{
     if ($s==null){
                 $query=$this->db->connect()->query("SELECT * FROM solicitud order by id DESC LIMIT $iniciar,$autoporpag");
              }else{
                 $query=$this->db->connect()->query("SELECT * FROM solicitud  WHERE (id LIKE '%".$s."%')  OR (rut LIKE '%".$s."%')  OR (nombre LIKE '%".$s."%')  OR (medico LIKE '%".$s."%')  OR (cirugia LIKE '%".$s."%')  OR (ojo LIKE '%".$s."%')  OR (fechasp LIKE '%".$s."%')  OR (ODI LIKE '%".$s."%')  OR (OD LIKE '%".$s."%')  OR (OI LIKE '%".$s."%')  OR (OTR LIKE '%".$s."%')   order by id DESC LIMIT $iniciar,$autoporpag");
              }
             while($row=$query->fetch()){
                  $item = new Solicitud();
                $item->id     =$row['id'];
                $item->rut     =$row['rut'];
                $item->nombre     =$row['nombre'];
                $item->medico     =$row['medico'];
                $item->cirugia     =$row['cirugia'];
                $item->ojo     =$row['ojo'];
                $item->fechasp     =$row['fechasp'];
                $item->ODI     =$row['ODI'];
                $item->OD     =$row['OD'];
                $item->OI     =$row['OI'];
                $item->OTR     =$row['OTR'];
                  array_push($items,$item);
                   }
            return $items;
         }catch(PDOException $e){
             return [];
         }
     }
    public function getById($id){
        $item=new Solicitud();
        $query=$this->db->connect()->prepare("SELECT * FROM solicitud WHERE id=:id");
        try{
           $query->execute(['id'=>$id]);
            while($row=$query->fetch()){
                 $item->id     = $row['id'];
                 $item->rut     = $row['rut'];
                 $item->nombre     = $row['nombre'];
                 $item->medico     = $row['medico'];
                 $item->cirugia     = $row['cirugia'];
                 $item->ojo     = $row['ojo'];
                 $item->fechasp     = $row['fechasp'];
                 $item->ODI     = $row['ODI'];
                 $item->OD     = $row['OD'];
                 $item->OI     = $row['OI'];
                 $item->OTR     = $row['OTR'];
                  }
           return $item;
        }catch(PDOException $e){
           return null;
        }
    }
    public function updatecontador($es){
   $query=$this->db->connect()->prepare("UPDATE contador SET contador=".$es." WHERE tipo=0");
    try{
       $query->execute();
      return true;
   }catch(PDOException $e){
      return false;
   }
   }
    public function update($item){
$query=$this->db->connect()->prepare("UPDATE solicitud SET rut=:rut,nombre=:nombre,medico=:medico,cirugia=:cirugia,ojo=:ojo,fechasp=:fechasp,ODI=:ODI,OD=:OD,OI=:OI,OTR=:OTR WHERE id=:id");
    try{
       $query->execute(['id'=>$item['id'],'rut'=>$item['rut'],'nombre'=>$item['nombre'],'medico'=>$item['medico'],'cirugia'=>$item['cirugia'],'ojo'=>$item['ojo'],'fechasp'=>$item['fechasp'],'ODI'=>$item['ODI'],'OD'=>$item['OD'],'OI'=>$item['OI'],'OTR'=>$item['OTR']]);
       return true;
    }catch(PDOException $e){
       return false;
    }
    }
public function insert($datos){
       try{
         $query=$this->db->connect()->prepare('INSERT INTO solicitud(id,rut,nombre,medico,cirugia,ojo,fechasp,ODI,OD,OI,OTR) VALUES  (:id,:rut,:nombre,:medico,:cirugia,:ojo,:fechasp,:ODI,:OD,:OI,:OTR)');
          $query->execute(['id'=>$datos['id'],'rut'=>$datos['rut'],'nombre'=>$datos['nombre'],'medico'=>$datos['medico'],'cirugia'=>$datos['cirugia'],'ojo'=>$datos['ojo'],'fechasp'=>$datos['fechasp'],'ODI'=>$datos['ODI'],'OD'=>$datos['OD'],'OI'=>$datos['OI'],'OTR'=>$datos['OTR']]);
           return true;
       }catch(PDOException $e){
          return false;
      }
    } 
public function insertcsv($datos){
       try{
         $query=$this->db->connect()->prepare('INSERT INTO solicitud(id,rut,nombre,medico,cirugia,ojo,fechasp,ODI,OD,OI,OTR) VALUES  (:id,:rut,:nombre,:medico,:cirugia,:ojo,:fechasp,:ODI,:OD,:OI,:OTR)');
          $query->execute(['id'=>$datos['id'],'rut'=>$datos['rut'],'nombre'=>$datos['nombre'],'medico'=>$datos['medico'],'cirugia'=>$datos['cirugia'],'ojo'=>$datos['ojo'],'fechasp'=>$datos['fechasp'],'ODI'=>$datos['ODI'],'OD'=>$datos['OD'],'OI'=>$datos['OI'],'OTR'=>$datos['OTR']]);
           return true;
       }catch(PDOException $e){
          return false;
      }
    } 
    public function delete($id){
$query=$this->db->connect()->prepare("DELETE FROM solicitud WHERE id=:id");
    try{
       $query->execute([
         'id'=>$id,
       ]);
       return true;
    }catch(PDOException $e){
       return false;
    }
    }
}
?>
