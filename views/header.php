
<!DOCTYPE html>
<html>
<head>
  
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Tabla Quirúrgica</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/AdminLTE-3.0.5/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/AdminLTE-3.0.5/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/AdminLTE-3.0.5/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/AdminLTE-3.0.5/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- Font Awesome -->





  
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="../../index3.html" class="nav-link">Inicio</a>
      </li>
       <li class="nav-item d-none d-sm-inline-block">
        <a href="http://192.168.1.17/Tabla/index.php" class="nav-link">Salir</a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="<?php echo constant('URL');?>public/AdminLTE-3.0.5/dist/img/AdminLTELogo.png"
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Tabla Quirúrgica V1.1</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo constant('URL');?>public/uploads/<?php echo $_SESSION["foto"]; ?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $_SESSION["usuario"];?><br><?php echo $_SESSION["perfil"];?></a>
        </div>
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Solicitudes
                <i class="right fas fa-angle-left"></i>
             </p>
            </a>
            <ul class="nav nav-treeview">
	<?php
		   include_once 'models/usuariosperfil.php';
         foreach($this->usuariosperfil as $row){
         	  $usuariosperfil=new Usuariosperfil();
         	  $usuariosperfil=$row;
 if ($usuariosperfil->principal=="Solicitudes"){		?>
              <li class="nav-item">
                <a href="<?php echo constant('URL'); ?><?php echo $usuariosperfil->menu;?>/verPaginacion/1" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p><?php echo $usuariosperfil->titulo;?></p>
                </a>
              </li>
	  			<?php
            }
            }
    	?>  
            </ul>
          </li>
        </ul>
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Configuracion
                <i class="right fas fa-angle-left"></i>
             </p>
            </a>
            <ul class="nav nav-treeview">
	<?php
		   include_once 'models/usuariosperfil.php';
         foreach($this->usuariosperfil as $row){
         	  $usuariosperfil=new Usuariosperfil();
         	  $usuariosperfil=$row;
 if ($usuariosperfil->principal=="Configuracion"){		?>
              <li class="nav-item">
                <a href="<?php echo constant('URL'); ?><?php echo $usuariosperfil->menu;?>/verPaginacion/1" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p><?php echo $usuariosperfil->titulo;?></p>
                </a>
              </li>
	  			<?php
            }
            }
    	?>  
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1> </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Inicio</a></li>
              <li class="breadcrumb-item active"> </li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title"> </h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">
