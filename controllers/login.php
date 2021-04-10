<?php
   session_start(); 
class Login extends Controller{
	function __construct()
	{
		//llama al constructor del Controlador Base
		parent::__construct();
	}
	   function render(){
 	$this->view->render('login/index');
  }
     function verificar(){
       $email=$_POST['email'];
       $pass=md5($_POST['pass']);
    if ($this->model->verificar($email,$pass)){
      
         $_SESSION["usuario"]=$email;
/*Pasar sus Permisos*/
         	$permisos=$this->model->getmenu($email); 	
        $this->view->usuariosperfil=$permisos;
        $perfil=$this->model->obtenerperfil($email,$pass);
        $foto=$this->model->obtenerfoto($email,$pass);
        $_SESSION["perfil"]=$perfil;
        $_SESSION["foto"]=$foto;
         /*fin*/
        $this->view->render('main/index');
    }else{
// remove all session variables
session_unset(); 
// destroy the session 
session_destroy(); 
header('Location:  http://192.168.1.17/Tabla/');
    }
    }
    	   function salir(){
 	$this->view->render('login/index');
  }
}
?>
