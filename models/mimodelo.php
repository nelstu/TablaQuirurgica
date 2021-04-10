<?php

class MimodeloModel extends Model
{
	  public function __construct(){
        parent::__construct();
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
  
 
}
?>
