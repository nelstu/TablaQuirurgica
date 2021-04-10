<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require_once "vendor/autoload.php";
class Solicitud extends Controller{
  function __construct()
  {
    parent::__construct();
      $this->view->solicitud=[];
                if (!isset($_SESSION['usuario'])){
                echo "Acceso Negado";
                  session_destroy();    
                $location=constant('URL');
                header("Location: " . $location);
                exit;
                }else{
            }
  }
     function generanc($param=null){
    $id = $param[0];
     if ($this->model->generanc($id)){
   }else{
   }
$this->verPaginacion('1');
       }
 public function obtenerestado(){
             $estado2 = $this->model->getestado();
           echo json_encode($estado2);
    }
 public function obteneruestado(){
             $estado2 = $this->model->getuestado();
           echo json_encode($estado2);
    }
function imprimir($param=null){
    $id = $param[0];
   $solicitud = $this->model->getById($id);
   $this->view->solicitud=$solicitud;
   $this->view->mensaje='';
    /*Pasar sus Permisos*/
   $permisos=$this->model->getmenu($_SESSION['usuario']); 
   $this->view->usuariosperfil=$permisos;
     /*fin*/
  $this->view->render('solicitud/imprimir');
  }
     function render(){
      $solicitud=$this->model->get();   
        $this->view->solicitud=$solicitud;
      $this->view->render('solicitud/index');
       }
     function verPaginacion($param=null){
        $id = $param[0];
        $order = $param[1];
        if ($order==null or !isset($order)){
            $order="id";
        }
        $autorizacionporpagina=5;
        $totalautorizaciones = $this->model->getregistros(null,$order);
        $paginas =$totalautorizaciones/$autorizacionporpagina; 
        $iniciar = ($id-1)*$autorizacionporpagina; 
       $solicitud = $this->model->getpag($iniciar,$autorizacionporpagina,null,$order);
       $this->view->solicitud=$solicitud;
       $this->view->mensaje='son'. $totalautorizaciones;
  $this->view->son=$totalautorizaciones;
        $this->view->paginas=$paginas;
        $this->view->paginaactual=$id;
     $this->view->usuario=$_SESSION['usuario'];
        /*Pasar sus Permisos*/
            $permisos=$this->model->getmenu($_SESSION['usuario']);  
         $this->view->usuariosperfil=$permisos;
          /*fin*/
    //  echo "id->".$id;
    //  echo "order->".$order;
    //  echo "iniciar->". $iniciar;
    //  echo "total autorizaciones->". $totalautorizaciones;
    //  echo "total autorizaciones->". $totalautorizaciones;
    //   echo "solicitud->". var_dump($solicitud);
      $this->view->render('solicitud/index');
    }

 function verPaginacionFecha($param=null){
        $id = $param[0];
       
       $solicitud = $this->model->getpagfecha($id);
       $this->view->solicitud=$solicitud;
    
     $this->view->usuario=$_SESSION['usuario'];
        /*Pasar sus Permisos*/
      $permisos=$this->model->getmenu($_SESSION['usuario']);  
      $this->view->usuariosperfil=$permisos;

      $this->view->render('solicitud/index');
    }

 function verPaginacionEstado($param=null){
        $id = $param[0];
       
       $solicitud = $this->model->getpagestado($id);
       $this->view->solicitud=$solicitud;
    
     $this->view->usuario=$_SESSION['usuario'];
        /*Pasar sus Permisos*/
      $permisos=$this->model->getmenu($_SESSION['usuario']);  
      $this->view->usuariosperfil=$permisos;

      $this->view->render('solicitud/index');
    }


     function verPaginacionsearch($param=null){
       $id = $param[0];
            $order = $param[1];
    
        if ($order==null or !isset($order)){
            $order="id";
        }
        $txtbuscar=$_POST['txtbuscar'];
        $autorizacionporpagina=5;
        $totalautorizaciones = $this->model->getregistros($txtbuscar,$order);
        $paginas =$totalautorizaciones/$autorizacionporpagina; 
        $iniciar = ($id-1)*$autorizacionporpagina; 
       $solicitud = $this->model->getpag($iniciar,$autorizacionporpagina,$txtbuscar,$order);
       $this->view->solicitud=$solicitud;
       $this->view->mensaje='son'. $totalautorizaciones;
        $this->view->paginas=$paginas;
        $this->view->paginaactual=$id;
        /*Pasar sus Permisos*/
            $permisos=$this->model->getmenu($_SESSION['usuario']);  
         $this->view->usuariosperfil=$permisos;
          /*fin*/
       $this->view->render('solicitud/index');
    }
    function verSolicitud($param=null){
       $id = $param[0];
       $solicitud = $this->model->getById($id);
       $this->view->solicitud=$solicitud;
       $this->view->mensaje='';
        /*Pasar sus Permisos*/
            $permisos=$this->model->getmenu($_SESSION['usuario']);  
         $this->view->usuariosperfil=$permisos;
          /*fin*/
       $this->view->render('solicitud/detalle');
    }
 function buscarproductos($param=null){
       $id = $param[0];
     $buscardatos=$this->model->getproductos($id); 
       echo json_encode($buscardatos);
    }
  function buscarclienterut($param=null){
      $id = $param[0];
     $buscardatos=$this->model->getclientesrut($id); 
      echo json_encode($buscardatos);
   }
      function buscarclientes($param=null){
       $id = $param[0];
     $buscardatos=$this->model->getclientes($id); 
      echo json_encode($buscardatos);
    }
  function buscarproductoscod($param=null){
      $id = $param[0];
     $buscardatos=$this->model->getproductoscod($id); 
      echo json_encode($buscardatos);
   }
    function nuevoSolicitud($param=null){
        /*Pasar sus Permisos*/
            $permisos=$this->model->getmenu($_SESSION['usuario']);  
         $this->view->usuariosperfil=$permisos;
          /*fin*/
     $folio=$this->model->getfolio(); 
   $this->view->mensaje='';
     $this->view->folio=$folio;
       $this->view->render('solicitud/nuevo');
    }
      function importarSolicitud($param=null){
       $this->view->render('solicitud/importar');
    }
 function imguploadSolicitud(){
         $target_dir = $_SERVER['DOCUMENT_ROOT'] ."/irebsol/public/uploads/";
         $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
         $uploadOk = 1;
         $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
         // Check if image file is a actual image or fake image
         if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if($check !== false) {
               echo "File is an image - " . $check["mime"] . ".";
               $uploadOk = 1;
               } else {
               echo "File is not an image.";
               $uploadOk = 0;
               }
            }
            // Check if file already exists
            if (file_exists($target_file)) {
               echo "Sorry, file already exists.";
              $uploadOk = 0;
               }
            // Check file size
            if ($_FILES["fileToUpload"]["size"] > 500000) {
               echo "Sorry, your file is too large.";
               $uploadOk = 0;
               }
              // Allow certain file formats
              if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
              && $imageFileType != "gif" ) {
              echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
              $uploadOk = 0;
              }
            if ($uploadOk == 0) {
               echo "Sorry, your file was not uploaded.";
               // if everything is ok, try to upload file
               } else {
                 if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                     echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
                     } else {
                     echo "Sorry, there was an error uploading your file.";
                }
                }
       }
 function xlsuploadSolicitud(){
 $target_dir = $_SERVER['DOCUMENT_ROOT'] ."/irebsol/public/uploads/";
         $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
         $uploadOk = 1;
         $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
         // Check if image file is a actual image or fake image
            // Check if file already exists
            if (file_exists($target_file)) {
               echo "Sorry, file already exists.";
              $uploadOk = 0;
               }
            // Check file size
            if ($_FILES["fileToUpload"]["size"] > 5000000) {
               echo "Sorry, your file is too large.";
               $uploadOk = 0;
               }
              // Allow certain file formats
              if($imageFileType != "xls" && $imageFileType != "xlsx" ) {
              echo "Sorry, only xls & xlsx files are allowed.";
              $uploadOk = 0;
              }
             // Check if  is set to 0 by an error
            if ($uploadOk == 0) {
               echo "Sorry, your file was not uploaded.";
               // if everything is ok, try to upload file
               } else {
                 if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                     echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
                     } else {
                     echo "Sorry, there was an error uploading your file.";
                }
                }
       }
 function csvuploadSolicitud(){
 $target_dir = $_SERVER['DOCUMENT_ROOT'] ."/irebsol/public/uploads/";
         $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
         $uploadOk = 1;
         $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
         // Check if image file is a actual image or fake image
            // Check if file already exists
            if (file_exists($target_file)) {
               echo "Sorry, file already exists.";
              $uploadOk = 0;
               }
            // Check file size
            if ($_FILES["fileToUpload"]["size"] > 5000000) {
               echo "Sorry, your file is too large.";
               $uploadOk = 0;
               }
              // Allow certain file formats
              if($imageFileType != "csv" ) {
              echo "Sorry, only csv files are allowed.";
              $uploadOk = 0;
              }
             // Check if  is set to 0 by an error
            if ($uploadOk == 0) {
               echo "Sorry, your file was not uploaded.";
               // if everything is ok, try to upload file
               } else {
                 if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                   //  echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
                       //leer datos
                       $linea = 0;
                       $linea2 =0 ;
                       $archivo = $target_dir .basename( $_FILES["fileToUpload"]["name"]);
                       $archivo = fopen($archivo, "r");
                       while (($datos = fgetcsv($archivo, ",")) == true) 
                             {
                             $num = count($datos);
                             $linea++;
                             $pos=0;
                             for ($columna = 0; $columna < $num; $columna++) 
                                 {
                                 if ($pos==0){ 
                                     $c1=$datos[$columna] ;
                                    }
                                if ($pos==1){ 
                                     $c2=$datos[$columna] ;
                                     $pos=0;
                                     //insertar datos
                                     if ($this->model->insertcsv([ 'id'=>$c1, 'nacionalidad'=>$c2])){
                                        $mensaje="Nuevo Nacionalidades Creado";
                                   }
                                     //fin insertar datos
                               }else{
                                $pos++;    
                                 }
                               }
                            }
                            //Cerramos el archivo
                            fclose($archivo);
                        $nacionalidades=$this->model->get();  
                        $this->view->nacionalidades=$nacionalidades;
                      $this->view->render('nacionalidades/index');
                     } else {
                     echo "Sorry, there was an error uploading your file.";
                }
                }
       }
   function actualizarSolicitud(){
   $id=$_POST['id'];
   $rut=$_POST['rut'];
   $nombre=$_POST['nombre'];
   $medico=$_POST['medico'];
   $cirugia=$_POST['cirugia'];
   $fechasp=$_POST['fechasp'];
   $ODI=$_POST['ODI'];
 if ($ODI=="on"){
$ODI="S";
}else{
$ODI="N";
}
   $OD=$_POST['OD'];
 if ($OD=="on"){
$OD="S";
}else{
$OD="N";
}
   $OI=$_POST['OI'];
 if ($OI=="on"){
$OI="S";
}else{
$OI="N";
}
   $OTR=$_POST['OTR'];
 if ($OTR=="on"){
$OTR="S";
}else{
$OTR="N";
}
   $prevision=$_POST['prevision'];
   $fechaag=$_POST['fechaag'];
   $telefono_trabajo=$_POST['telefono_trabajo'];
   $correo_electronico=$_POST['correo_electronico'];
   $fecha_nacimiento=$_POST['fecha_nacimiento'];
   $estado=$_POST['estado'];
   $observaciones=$_POST['observaciones'];
   if ($this->model->update(['id'=>$id,'rut'=>$rut,'nombre'=>$nombre,'medico'=>$medico,'cirugia'=>$cirugia,'fechasp'=>$fechasp,'ODI'=>$ODI,'OD'=>$OD,'OI'=>$OI,'OTR'=>$OTR,'prevision'=>$prevision,'fechaag'=>$fechaag,'telefono_trabajo'=>$telefono_trabajo,'correo_electronico'=>$correo_electronico,'fecha_nacimiento'=>$fecha_nacimiento,'estado'=>$estado,'observaciones'=>$observaciones,])) {
      $solicitud=new Solicitud();
      $solicitud->id=$id;
      $solicitud->rut=$rut;
      $solicitud->nombre=$nombre;
      $solicitud->medico=$medico;
      $solicitud->cirugia=$cirugia;
      $solicitud->ojo=$ojo;
      $solicitud->fechasp=$fechasp;
      $solicitud->ODI=$ODI;
      $solicitud->OD=$OD;
      $solicitud->OI=$OI;
      $solicitud->OTR=$OTR;
      $solicitud->prevision=$prevision;
      $solicitud->fechaag=$fechaag;
      $solicitud->telefono_trabajo=$telefono_trabajo;
      $solicitud->correo_electronico=$correo_electronico;
      $solicitud->fecha_nacimiento=$fecha_nacimiento;
      $solicitud->estado=$estado;
      $solicitud->observaciones=$observaciones;
      $solicitud->diasdif=$diasdif;
      $this->view->solicitud=$solicitud;
      $this->view->mensaje='solicitud Actualizado Correctamente';
   }else{
      $this->view->mensaje='No se puedo Actualizar';
   }
 header("Location: http://192.168.1.17/Tabla/solicitud/verPaginacion/1");     }
   function crearSolicitud(){
   $id=$_POST['id'];
   $rut=$_POST['rut'];
   $nombre=$_POST['nombre'];
   $medico=$_POST['medico'];
   $cirugia=$_POST['cirugia'];
   $ojo=$_POST['ojo'];
   $fechasp=$_POST['fechasp'];
   $ODI=$_POST['ODI'];
 if ($ODI=="on"){
$ODI="S";
}else{
$ODI="N";
}
   $OD=$_POST['OD'];
 if ($OD=="on"){
$OD="S";
}else{
$OD="N";
}
   $OI=$_POST['OI'];
 if ($OI=="on"){
$OI="S";
}else{
$OI="N";
}
   $OTR=$_POST['OTR'];
 if ($OTR=="on"){
$OTR="S";
}else{
$OTR="N";
}
   $prevision=$_POST['prevision'];
   $fechaag=$_POST['fechaag'];
   $telefono_trabajo=$_POST['telefono_trabajo'];
   $correo_electronico=$_POST['correo_electronico'];
   $fecha_nacimiento=$_POST['fecha_nacimiento'];
   $estado=$_POST['estado'];
   $observaciones=$_POST['observaciones'];
  $mensaje="";
    if ($this->model->insert([ 'id'=>$id, 'rut'=>$rut, 'nombre'=>$nombre, 'medico'=>$medico, 'cirugia'=>$cirugia, 'ojo'=>$ojo, 'fechasp'=>$fechasp, 'ODI'=>$ODI, 'OD'=>$OD, 'OI'=>$OI, 'OTR'=>$OTR, 'prevision'=>$prevision, 'fechaag'=>$fechaag, 'telefono_trabajo'=>$telefono_trabajo, 'correo_electronico'=>$correo_electronico, 'fecha_nacimiento'=>$fecha_nacimiento, 'estado'=>$estado, 'observaciones'=>$observaciones])){
             $mensaje="Nuevo Solicitud Creado";
  $mail = new PHPMailer(true);
 $mail->isSMTP();   
 $mail->Host = "mail.pcfacil.cl";
 $mail->SMTPAuth = false;   
 $mail->Username = "info@pcfacil.cl";   
 $mail->Password = "NSloteria2015";    
 $mail->SMTPSecure = "tls";    
 $mail->Port = 587;       
 $mail->From = "info@pcfacil.cl";
 $mail->FromName = "info@pcfacil.cl";
 $mail->addAddress("nstuardo@gmail.com", "Recepient Name");
 $mail->addAddress("info@pcfacil.cl", "Recepient Name");
 $mail->isHTML(true);
 $mail->Subject = "Subject Text";
 $mail->Body = "<i>Mail body in HTML</i>";
 $mail->AltBody = "This is the plain text version of the email content";
 try {
     $mail->send();
     echo "Message has been sent successfully";
 } catch (Exception $e) {
     echo "Mailer Error: " . $mail->ErrorInfo;
 }
    }else{
             $mensaje="solicitud ya Existe";
    }
 header("Location: http://192.168.1.17/Tabla/solicitud/verPaginacion/1");     }
   function eliminarSolicitud($param = null){
   $id=$_POST['item'];
     if ($this->model->delete($id)){
      $this->view->mensaje='solicitud Eliminado Correctamente';
   }else{
      $this->view->mensaje='No se puedo Eliminado';
   }
 header("Location: http://192.168.1.17/Tabla/solicitud/verPaginacion/1");   }
}
?>
