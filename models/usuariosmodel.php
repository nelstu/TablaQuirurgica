<?php
include_once 'models/usuarios.php';
include_once 'models/.php';
class UsuariosModel extends Model
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
    public function get(){
        $items = [];
        try{
            $query=$this->db->connect()->query("SELECT * FROM usuarios");
            while($row=$query->fetch()){
                 $item = new Usuarios();
                 $item->id     = $row['id'];
                 $item->email     = $row['email'];
                 $item->pass     = $row['pass'];
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
                  $query=$this->db->connect()->query("SELECT count(*) as son FROM usuarios");
              }else{
                  $query=$this->db->connect()->query("SELECT count(*) as son FROM usuarios  WHERE (id LIKE '%".$s."%')  OR (email LIKE '%".$s."%')  OR (pass LIKE '%".$s."%')  "); 
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
                 $query=$this->db->connect()->query("SELECT * FROM usuarios order by id DESC LIMIT $iniciar,$autoporpag");
              }else{
                 $query=$this->db->connect()->query("SELECT * FROM usuarios  WHERE (id LIKE '%".$s."%')  OR (email LIKE '%".$s."%')  OR (pass LIKE '%".$s."%')   order by id DESC LIMIT $iniciar,$autoporpag");
              }
             while($row=$query->fetch()){
                  $item = new Usuarios();
                $item->id     =$row['id'];
                $item->email     =$row['email'];
                $item->pass     =$row['pass'];
                  array_push($items,$item);
                   }
            return $items;
         }catch(PDOException $e){
             return [];
         }
     }
    public function getById($id){
        $item=new Usuarios();
        $query=$this->db->connect()->prepare("SELECT * FROM usuarios WHERE id=:id");
        try{
           $query->execute(['id'=>$id]);
            while($row=$query->fetch()){
                 $item->id     = $row['id'];
                 $item->email     = $row['email'];
                 $item->pass     = $row['pass'];
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
$query=$this->db->connect()->prepare("UPDATE usuarios SET email=:email,pass=:pass WHERE id=:id");
    try{
       $query->execute(['id'=>$item['id'],'email'=>$item['email'],'pass'=>$item['pass']]);
       return true;
    }catch(PDOException $e){
       return false;
    }
    }
public function insert($datos){
       try{
         $query=$this->db->connect()->prepare('INSERT INTO usuarios(id,email,pass) VALUES  (:id,:email,:pass)');
          $query->execute(['id'=>$datos['id'],'email'=>$datos['email'],'pass'=>$datos['pass']]);
  /*llevar datos a perfil*/
         $query2=$this->db->connect()->prepare("SELECT * FROM menu");
          $query2->execute();
           while($row2=$query2->fetch()){
                $id       = $row2['id'];
                $menu     = $row2['menu'];
                $principal    = $row2['principal'];
                $query3=$this->db->connect()->prepare('INSERT INTO usuariosperfil(idusuario,habilitado,menu,principal) VALUES  ("'.$datos['email'].'","S","'.$menu.'","'.$principal.'")');
                $query3->execute();
              }
         /*fin llevar datos a perfil*/
           return true;
       }catch(PDOException $e){
          return false;
      }
    } 
public function insertcsv($datos){
       try{
         $query=$this->db->connect()->prepare('INSERT INTO usuarios(id,email,pass) VALUES  (:id,:email,:pass)');
          $query->execute(['id'=>$datos['id'],'email'=>$datos['email'],'pass'=>$datos['pass']]);
           return true;
       }catch(PDOException $e){
          return false;
      }
    } 
    public function delete($id){
$query=$this->db->connect()->prepare("DELETE FROM usuarios WHERE id=:id");
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
