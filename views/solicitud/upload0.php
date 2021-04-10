<!DOCTYPE html>
<html>
<head>
	
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
<script src='<?php echo constant('URL'); ?>public/js/a076d05399.js'></script>
</head>
<body>
	<?php require 'views/header.php'?>

<form action="<?php echo constant('URL').'solicitud/upload/'.$solicitud->id; ?>" method="post" enctype="multipart/form-data">
  Seleccionar Archivo:
   <input type="text" name="id" id="id" hidden value="<?php  echo $this->solicitudid;?>"><br>
  <input type="file" name="fileToUpload" id="fileToUpload"><br>
  <input type="submit" value="Subir Archivo" name="submit">
</form>



</body>
</html>
