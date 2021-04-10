<?php
session_start();
class Micontrolador extends Controller{
	function __construct()
	{
		parent::__construct();
	
    }
	
 

     function buscarpacienterut($param=null){
              $id = $param[0];
	          $buscardatos=$this->model->getpacienterut($id); 
              echo json_encode($buscardatos);
              }
    
        }
?>
