<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?php echo constant('URL');?>public/AdminLTE-3.0.5/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="<?php echo constant('URL');?>public/css/ionicons.min.css">
  <link rel="stylesheet" href="<?php echo constant('URL');?>public/AdminLTE-3.0.5/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo constant('URL');?>public/AdminLTE-3.0.5/dist/css/adminlte.min.css">
 <link href="<?php echo constant('URL');?>public/css/googlefont.css" rel="stylesheet">
 <style>
</style>
</head>
<body>
<body class="hold-transition login-page">
<form class='form-signin' method='POST' action='login/verificar'>
<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>Tabla Quirúrgica</b></a>
  </div>
  <!-- /.login-logo -->
 <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Ingrese a Su Sesion</p>
      <form action="../../index3.html" method="post">
       <div class="input-group mb-3">
          <input type="text" class="form-control"  required id='email' name='email' placeholder="Usuario">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
           </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" required id='pass' name='pass' placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
             <span class="fas fa-lock"></span>
           </div>
         </div>
       </div>
       <div class="row">
         <div class="col-8">
           <div class="icheck-primary">
            
             <label for="remember">
             
             </label>
           </div>
         </div>
         <!-- /.col -->
         <div class="col-4">
           <button type="submit" class="btn btn-primary btn-block">Log In</button>
         </div>
        <!-- /.col -->
       </div>
     </form>
     <p class="mb-1">
     
    </p>
     <p class="mb-0">
       
     </p>
   </div>
   <!-- /.login-card-body -->
 </div>
</div>
<!-- /.login-box -->
<script src="<?php echo constant('URL');?>public/AdminLTE-3.0.5//plugins/jquery/jquery.min.js"></script>
<script src="<?php echo constant('URL');?>public/AdminLTE-3.0.5//plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo constant('URL');?>public/AdminLTE-3.0.5//dist/js/adminlte.min.js"></script>
</form>
</body>
</html>
